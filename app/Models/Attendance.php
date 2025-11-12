<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
    'seminar_id',
    'token',
    'name',
    'email',
    'phone',
    'jenjang_sekolah',
    'asal_sekolah',
    'jabatan',
    'kota_kabupaten',
    'provinsi',
    'scanned_at',          
];

    /**
     * Casting supaya query & format tanggal enak dipakai.
     */
    protected $casts = [
        'scanned_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /* =========================
     *        RELATIONS
     * ========================= */

    public function seminar()
    {
        return $this->belongsTo(\App\Models\Seminar::class);
    }

    public function registration()
    {
        // Pastikan FK di tabel attendance bernama 'seminar_registration_id'
        return $this->belongsTo(\App\Models\SeminarRegistration::class, 'seminar_registration_id');
    }

    public function user()
    {
        // Opsional: hanya akan aktif jika kolom user_id memang ada
        return $this->belongsTo(\App\Models\User::class);
    }

    /* =========================
     *         SCOPES
     * ========================= */

    /**
     * Urutkan attendance secara konsisten:
     * - utama: scanned_at
     * - tie-breaker: id
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('scanned_at')->orderBy('id');
    }

    /**
     * Filter untuk 1 seminar spesifik + urutan yang konsisten.
     */
    public function scopeForSeminarOrdered($query, int $seminarId)
    {
        return $query->where('seminar_id', $seminarId)->ordered();
    }

    /**
     * Mencari attendance kandidat untuk user/email tertentu.
     * Berguna saat kamu ingin “cocokkan by user_id ATAU email”.
     */
    public function scopeForUserOrEmail($query, ?int $userId, ?string $email)
    {
        return $query->where(function ($q) use ($userId, $email) {
            if (!empty($userId)) {
                $q->where('user_id', $userId);
            }
            if (!empty($email)) {
                $q->orWhereRaw('LOWER(email) = ?', [strtolower(trim($email))]);
            }
        });
    }

    /* =========================
     *        HELPERS
     * ========================= */

    /**
     * Tandai discan sekarang jika belum ada timestamp scan.
     * Mengembalikan instance untuk chaining.
     */
    public function markScanned(?Carbon $when = null): self
    {
        if (empty($this->scanned_at)) {
            $this->scanned_at = $when ?: now();
            $this->save();
        }
        return $this;
    }
}
