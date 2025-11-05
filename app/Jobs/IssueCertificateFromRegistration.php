<?php

namespace App\Jobs;

use App\Models\Attendance;
use App\Models\Certificate;
use App\Models\SeminarRegistration;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class IssueCertificateFromRegistration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public int $registrationId,
        public bool $force = false
    ) {}

    public function handle(): void
    {
        // 1) Ambil registrasi + seminar
        $reg = SeminarRegistration::with('seminar')->find($this->registrationId);
        if (!$reg || !$reg->seminar) {
            Log::warning('IssueCertFromReg: reg/seminar not found', ['registration_id' => $this->registrationId]);
            return;
        }

        // 2) Hanya proses kalau attended
        if (strtolower($reg->attendance_status ?? '') !== 'attended') {
            Log::info('IssueCertFromReg: status != attended, skip', ['registration_id' => $reg->id]);
            return;
        }

        $seminar = $reg->seminar;

        // 3) Pastikan user_id valid (FIX FK)
        $userId = $reg->user_id ?: null;
        if (!$userId && !empty($reg->email)) {
            $userId = User::whereRaw('LOWER(email) = ?', [strtolower(trim($reg->email))])->value('id');
        }
        if (!$userId) {
            $name  = $reg->name ?: 'Peserta';
            $email = $reg->email ?: ('no-reply+'.Str::uuid().'@example.com');
            $user  = User::create([
                'name'     => $name,
                'email'    => $email,
                'password' => bcrypt(Str::random(16)),
            ]);
            $userId = $user->id;
            Log::info('IssueCertFromReg: created ghost user for certificate', [
                'registration_id' => $reg->id,
                'user_id'         => $userId,
                'email'           => $email,
            ]);
        }

        // 4) Attendance kandidat (pakai seminar_registration_id/email — TIDAK pakai user_id)
        $attendance = Attendance::where('seminar_id', $seminar->id)
            ->where(function ($q) use ($reg) {
                $q->where('seminar_registration_id', $reg->id);
                if (!empty($reg->email)) {
                    $q->orWhereRaw('LOWER(email) = ?', [strtolower(trim($reg->email))]);
                }
            })
            ->whereNotNull('scanned_at')
            ->orderBy('scanned_at')
            ->orderBy('id')
            ->first();

        // 5) Nomor sertifikat via SSOT
        $certificateNumber = Certificate::generateNumberFor($seminar, $attendance, $reg);

        // 6) Upsert Certificate
        $certificate = Certificate::firstOrCreate(
            ['seminar_id' => $seminar->id, 'registration_id' => $reg->id],
            [
                'user_id'            => $userId,
                'name'               => $reg->name,
                'issue_date'         => now()->toDateString(),
                'certificate_number' => $certificateNumber,
                'issued_at'          => now(),
            ]
        );
        if (empty($certificate->certificate_number)) {
            $certificate->certificate_number = $certificateNumber;
            $certificate->save();
        }

        // 7) Skip kirim jika sudah terkirim & no-force
        if (!$this->force && !empty($certificate->sent_at)) {
            Log::info('IssueCertFromReg: already sent, skip (no-force)', ['certificate_id' => $certificate->id]);
            return;
        }

        // 8) Siapkan background sebagai base64 (AMAN untuk DomPDF)
        $bgPath = public_path('images/sertifikat/sertifikat.png');
        $backgroundImage = null;
        $backgroundType  = 'png';
        if (is_file($bgPath)) {
            $backgroundImage = 'data:image/png;base64,' . base64_encode(file_get_contents($bgPath));
        }

        $webinarSentence = 'Has attended the event: ' . ($seminar->title ?? 'Seminar');
        $givenOn         = 'GIVEN ON ' . Carbon::now()->isoFormat('D MMMM Y');
        $qrSvg           = null;

        // 9) Render PDF (pakai nomor dari DB)
        $pdfBinary = Pdf::loadView('certificates.sertifikat', [
            'seminar'           => $seminar,
            'registration'      => $reg,
            'certificate'       => $certificate,
            'certificateNumber' => $certificate->certificate_number,
            'name'              => $reg->name ?? 'Peserta',
            'backgroundImage'   => $backgroundImage,
            'backgroundType'    => $backgroundType,
            'webinarSentence'   => $webinarSentence,
            'givenOn'           => $givenOn,
            'qrSvg'             => $qrSvg,
        ])->setPaper('a4', 'landscape')->output();

        // 10) Kirim email
        $toEmail = $reg->email ?: ($attendance->email ?? null);
        $toName   = $reg->name ?? 'Peserta';
        $subject  = 'Sertifikat ' . $seminar->title . ' - ' . $toName;
        $filename = 'Sertifikat-' . Str::slug($seminar->title) . '-' . $reg->id . '.pdf';

        if (empty($toEmail)) {
            Log::warning('IssueCertFromReg: email missing, certificate issued but not emailed', [
                'certificate_id'  => $certificate->id,
                'registration_id' => $reg->id,
            ]);
            return;
        }

        $html = '<p>Halo ' . e($toName) . ',</p>'
              . '<p>Sertifikat <strong>' . e($seminar->title) . '</strong> terlampir.</p>'
              . '<p>Terima kasih.</p>';

        Mail::html($html, function ($m) use ($toEmail, $toName, $subject, $pdfBinary, $filename) {
            $m->to($toEmail, $toName)->subject($subject)
              ->attachData($pdfBinary, $filename, ['mime' => 'application/pdf']);
        });

        // 11) Tandai terkirim
        $certificate->sent_at = now();
        $certificate->save();

        Log::info('IssueCertFromReg: sent' . ($this->force ? ' (forced)' : ''), [
            'certificate_id'  => $certificate->id,
            'registration_id' => $reg->id,
            'email'           => $toEmail
        ]);
    }
}
