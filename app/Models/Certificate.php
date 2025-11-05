<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property int $user_id
 * @property int $seminar_id
 * @property int|null $registration_id
 * @property string|null $certificate_number
 * @property string $name
 * @property \Illuminate\Support\Carbon $issue_date
 * @property \Illuminate\Support\Carbon|null $issued_at
 * @property \Illuminate\Support\Carbon|null $sent_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Certificate extends Model
{
    protected $fillable = [
        'user_id',
        'certificate_number',
        'name',
        'issue_date',
        // dipakai saat penerbitan dari registration
        'seminar_id',
        'registration_id',
        'issued_at',
        'sent_at',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'issued_at'  => 'datetime',
        'sent_at'    => 'datetime',
    ];

    /* =========================
     *        RELATIONS
     * ========================= */

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function seminar()
    {
        return $this->belongsTo(\App\Models\Seminar::class);
    }

    public function registration()
    {
        return $this->belongsTo(\App\Models\SeminarRegistration::class, 'registration_id');
    }

    /* =========================
     *   SINGLE SOURCE OF TRUTH
     *   Generator nomor sertifikat
     * ========================= */

    /**
     * Generator nomor sertifikat dengan prioritas:
     * 1) Berbasis attendance (urutan dari scanned_at per seminar).
     * 2) Fallback berbasis registration (urutan deterministik antar peserta attended).
     *
     * Format (attendance):
     *   {YEAR}/HAFECS/S-{INITIALS}/{ROMAN_MONTH}/{SEQ3}
     *
     * @param \App\Models\Seminar $seminar
     * @param \App\Models\Attendance|null $attendance
     * @param \App\Models\SeminarRegistration|null $registration
     * @return string
     */
    public static function generateNumberFor(
        \App\Models\Seminar $seminar,
        ?\App\Models\Attendance $attendance = null,
        ?\App\Models\SeminarRegistration $registration = null
    ): string {
        // Prefer urutan berbasis attendance
        if ($attendance) {
            return self::numberFromAttendance($attendance, $seminar);
        }

        // Fallback: urutan deterministik berbasis registration (hanya attended)
        $when       = $seminar->start_time ? Carbon::parse($seminar->start_time) : now();
        $year       = $when->format('Y');
        $romanMonth = self::romanMonth((int) $when->format('n'));
        $initials   = self::initialsFromTitle($seminar->title);

        $seq = 1;
        if ($registration) {
            // Gunakan updated_at kalau ada (umumnya status attended diupdate),
            // jika tidak ada gunakan created_at sebagai fallback penentu urutan.
            $cutoffTs = $registration->updated_at ?? $registration->created_at;

            $seq = \App\Models\SeminarRegistration::where('seminar_id', $seminar->id)
                ->whereRaw('LOWER(attendance_status) = "attended"')
                ->where(function ($q) use ($cutoffTs, $registration) {
                    $q->where('updated_at', '<', $cutoffTs)
                      ->orWhere(function ($qq) use ($cutoffTs, $registration) {
                          $qq->where('updated_at', $cutoffTs)->where('id', '<=', $registration->id);
                      });
                })
                ->count();

            $seq = max(1, $seq);
        }

        $seq3 = str_pad((string) $seq, 3, '0', STR_PAD_LEFT);
        return "{$year}/HAFECS/S-{$initials}/{$romanMonth}/{$seq3}";
    }

    /**
     * (Opsional) Isi certificate_number jika masih kosong,
     * dengan logika yang sama seperti generateNumberFor().
     *
     * @param \App\Models\Seminar $seminar
     * @param \App\Models\Attendance|null $attendance
     * @param \App\Models\SeminarRegistration|null $registration
     * @return $this
     */
    public function ensureNumber(
        \App\Models\Seminar $seminar,
        ?\App\Models\Attendance $attendance = null,
        ?\App\Models\SeminarRegistration $registration = null
    ): self {
        if (empty($this->certificate_number)) {
            $this->certificate_number = self::generateNumberFor($seminar, $attendance, $registration);
            $this->save();
        }
        return $this;
    }

    /**
     * Generator nomor sertifikat berbasis attendance (urutan scan).
     * Format: {YEAR}/HAFECS/S-{INITIALS}/{ROMAN_MONTH}/{SEQ3}
     *
     * @param \App\Models\Attendance $att
     * @param \App\Models\Seminar $seminar
     * @return string
     */
    public static function numberFromAttendance(\App\Models\Attendance $att, \App\Models\Seminar $seminar): string
    {
        $when       = $seminar->start_time ? Carbon::parse($seminar->start_time) : now();
        $year       = $when->format('Y');
        $romanMonth = self::romanMonth((int) $when->format('n'));
        $initials   = self::initialsFromTitle($seminar->title);

        // urutan absen (scanned_at <= current; tie-break id)
        $ts  = $att->scanned_at ?: $att->created_at;

        $seq = \App\Models\Attendance::where('seminar_id', $seminar->id)
            ->whereNotNull('scanned_at')
            ->where(function ($q) use ($ts, $att) {
                $q->where('scanned_at', '<', $ts)
                  ->orWhere(function ($qq) use ($ts, $att) {
                      $qq->where('scanned_at', $ts)->where('id', '<=', $att->id);
                  });
            })
            ->count();

        $seq  = max(1, $seq);
        $seq3 = str_pad((string) $seq, 3, '0', STR_PAD_LEFT);

        return "{$year}/HAFECS/S-{$initials}/{$romanMonth}/{$seq3}";
    }

    /* =========================
     *         HELPERS
     * ========================= */

    /**
     * Ambil inisial dari judul seminar.
     *
     * @param string|null $title
     * @return string
     */
    private static function initialsFromTitle(?string $title): string
    {
        if (!$title) return 'WEB';

        $clean = preg_replace('/[^\pL\pN\s]+/u', ' ', $title);
        $words = preg_split('/\s+/u', trim($clean)) ?: [];

        // stopwords umum ID/EN
        $stop = [
            'dan','yang','di','ke','dari','pada','untuk','dengan','atau','para','sebagai',
            'the','of','and','a','an','to','in','on','at','by','for','with','from','as','into'
        ];

        $letters = '';
        foreach ($words as $w) {
            $lw = mb_strtolower($w, 'UTF-8');
            if ($lw === '' || in_array($lw, $stop, true)) continue;
            $letters .= mb_strtoupper(mb_substr($w, 0, 1, 'UTF-8'), 'UTF-8');
        }

        $letters = preg_replace('/[^A-Z0-9]/u', '', $letters ?: 'WEB');
        return $letters;
    }

    /**
     * Konversi bulan angka ke romawi.
     *
     * @param int $m
     * @return string
     */
    private static function romanMonth(int $m): string
    {
        static $map = [
            1=>'I', 2=>'II', 3=>'III', 4=>'IV', 5=>'V', 6=>'VI',
            7=>'VII', 8=>'VIII', 9=>'IX', 10=>'X', 11=>'XI', 12=>'XII'
        ];
        return $map[$m] ?? 'I';
    }
}
