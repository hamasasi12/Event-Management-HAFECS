<?php

namespace App\Http\Controllers\Sertifikasi;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::with(['seminar', 'registration'])
            ->latest()
            ->paginate(20);

        return view('certificates.index', compact('certificates'));
    }

    // =========================
    // DOWNLOAD / PREVIEW BY ID
    // =========================
    public function download($id)
    {
        $certificate = Certificate::with(['seminar', 'registration'])->findOrFail($id);
        $seminar     = $certificate->seminar;
        $reg         = $certificate->registration;

        // --- cari attendance utk fallback meta (opsional)
        $attendance = Attendance::where('seminar_id', $certificate->seminar_id)
            ->when(!empty($certificate->registration_id), function ($q) use ($certificate) {
                $q->where('seminar_registration_id', $certificate->registration_id);
            })
            ->when(!empty($reg?->email), function ($q) use ($reg) {
                $q->orWhereRaw('LOWER(email) = ?', [strtolower(trim($reg->email))]);
            })
            ->whereNotNull('scanned_at')
            ->orderBy('scanned_at')->orderBy('id')
            ->first();

        // --- pastikan nomor terisi SEKALI di record certificate (bukan di blade)
        if (empty($certificate->certificate_number)) {
            $certificate->certificate_number = Certificate::generateNumberFor($seminar, $attendance, $reg);
        }

        // --- tentukan issue_date prioritas: Certificate → Attendance → Seminar
        $issueDate = $certificate->issue_date
            ?? ($attendance->issued_at ?? ($seminar->date ?? null));

        if ($issueDate) {
            $certificate->issue_date = Carbon::parse($issueDate)->toDateString();
        }

        $certificate->save();

        // --- tracking download
        $certificate->increment('download_count');
        $certificate->last_downloaded_at = now();
        $certificate->save();

        // --- background
        $bg         = $this->loadBg();
        $background = $bg['image'];
        $bgType     = $bg['type'];

        // --- render PDF (pakai issueDate dari record, TIDAK pakai now())
        $pdfBinary = Pdf::loadView('certificates.sertifikat', [
            'seminar'           => $seminar,
            'registration'      => $reg,
            'certificate'       => $certificate,
            'certificateNumber' => $certificate->certificate_number,
            'issueDate'         => $certificate->issue_date ? Carbon::parse($certificate->issue_date) : null,
            'name'              => $certificate->name ?? ($reg->name ?? 'Peserta'),
            'backgroundImage'   => $background,
            'backgroundType'    => $bgType,
            'webinarSentence'   => 'Has attended the event: ' . ($seminar->title ?? 'Seminar'),
            'qrSvg'             => null,
        ])->setPaper('a4', 'landscape')->output();

        return response($pdfBinary, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Sertifikat-' . $certificate->id . '.pdf"',
        ])->header('X-Content-Type-Options', 'nosniff');
    }

    // =========================
    // DEMO PREVIEW (HTML)
    // =========================
    public function demoPreview()
    {
        [$seminar, $reg, $certificate, $bg] = $this->buildDemoPayload();

        return view('certificates.sertifikat', [
            'seminar'           => $seminar,
            'registration'      => $reg,
            'certificate'       => $certificate,
            'certificateNumber' => $certificate->certificate_number,
            'issueDate'         => $certificate->issue_date ? Carbon::parse($certificate->issue_date) : null,
            'name'              => $certificate->name ?? ($reg->name ?? 'Peserta'),
            'backgroundImage'   => $bg['image'],
            'backgroundType'    => $bg['type'],
            'webinarSentence'   => 'Has attended the event: ' . ($seminar->title ?? 'Seminar'),
            'qrSvg'             => null,
        ]);
    }

    // =========================
    // DEMO PREVIEW (PDF inline)
    // =========================
    public function demoPreviewPdf()
    {
        [$seminar, $reg, $certificate, $bg] = $this->buildDemoPayload();

        $pdfBinary = Pdf::loadView('certificates.sertifikat', [
            'seminar'           => $seminar,
            'registration'      => $reg,
            'certificate'       => $certificate,
            'certificateNumber' => $certificate->certificate_number,
            'issueDate'         => $certificate->issue_date ? Carbon::parse($certificate->issue_date) : null,
            'name'              => $certificate->name ?? ($reg->name ?? 'Peserta'),
            'backgroundImage'   => $bg['image'],
            'backgroundType'    => $bg['type'],
            'webinarSentence'   => 'Has attended the event: ' . ($seminar->title ?? 'Seminar'),
            'qrSvg'             => null,
        ])->setPaper('a4', 'landscape')->output();

        return response($pdfBinary, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Preview-Sertifikat.pdf"',
        ])->header('X-Content-Type-Options', 'nosniff');
    }

    // =========================
    // PREVIEW DARI ATTENDANCE
    // =========================
    public function attendancePreview(Attendance $attendance)
    {
        [$seminar, $reg, $certificate, $bg] = $this->buildAttendancePayload($attendance);

        return view('certificates.sertifikat', [
            'seminar'           => $seminar,
            'registration'      => $reg,
            'certificate'       => $certificate,
            'certificateNumber' => $certificate->certificate_number,
            'issueDate'         => $certificate->issue_date ? Carbon::parse($certificate->issue_date) : null,
            'name'              => $certificate->name ?? ($reg->name ?? 'Peserta'),
            'backgroundImage'   => $bg['image'],
            'backgroundType'    => $bg['type'],
            'webinarSentence'   => 'Has attended the event: ' . ($seminar->title ?? 'Seminar'),
            'qrSvg'             => null,
        ]);
    }

    public function attendancePreviewPdf(Attendance $attendance)
    {
        [$seminar, $reg, $certificate, $bg] = $this->buildAttendancePayload($attendance);

        $pdfBinary = Pdf::loadView('certificates.sertifikat', [
            'seminar'           => $seminar,
            'registration'      => $reg,
            'certificate'       => $certificate,
            'certificateNumber' => $certificate->certificate_number,
            'issueDate'         => $certificate->issue_date ? Carbon::parse($certificate->issue_date) : null,
            'name'              => $certificate->name ?? ($reg->name ?? 'Peserta'),
            'backgroundImage'   => $bg['image'],
            'backgroundType'    => $bg['type'],
            'webinarSentence'   => 'Has attended the event: ' . ($seminar->title ?? 'Seminar'),
            'qrSvg'             => null,
        ])->setPaper('a4', 'landscape')->output();

        return response($pdfBinary, 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Preview-Sertifikat.pdf"',
        ])->header('X-Content-Type-Options', 'nosniff');
    }

    // =========================
    // PAYLOAD BUILDERS
    // =========================
    private function buildDemoPayload(): array
    {
        $seminar = (object)['id' => 1, 'title' => 'Teknologi Web Terkini', 'date' => now()->toDateString()];
        $reg     = (object)['id' => 1, 'name' => 'Dwipa Ranum', 'email' => 'dwipa@example.com', 'user_id' => null];

        $certificate = new Certificate([
            'name'               => $reg->name,
            'certificate_number' => 'HFC/2025/TEKNOLOGIWEBTERKINI-00001',
            'issue_date'         => $seminar->date, // konsisten: pakai tanggal seminar utk demo
        ]);

        $bg = $this->loadBg();
        return [$seminar, $reg, $certificate, $bg];
    }

    private function buildAttendancePayload(Attendance $attendance): array
    {
        $seminar = $attendance->seminar;
        $email   = strtolower(trim((string) $attendance->email));

        $reg = $seminar?->registrations()
            ->whereRaw('LOWER(email) = ?', [$email])
            ->first();

        if (!$reg) {
            $reg = (object)[
                'id'    => null,
                'name'  => $attendance->name ?? 'Peserta',
                'email' => $attendance->email,
            ];
        }

        $number = Certificate::generateNumberFor($seminar, $attendance, $reg);

        $certificate = Certificate::firstOrNew(
            [
                'seminar_id'      => $seminar?->id,
                'registration_id' => $reg->id,
            ],
            [
                'name'               => $reg->name ?? 'Peserta',
                'issue_date'         => ($attendance->issued_at ?? $seminar->date) ? Carbon::parse($attendance->issued_at ?? $seminar->date)->toDateString() : null,
                'certificate_number' => $number,
            ]
        );

        if (empty($certificate->certificate_number)) {
            $certificate->certificate_number = $number;
        }
        if (empty($certificate->issue_date)) {
            $fallback = $attendance->issued_at ?? $seminar->date ?? now();
            $certificate->issue_date = Carbon::parse($fallback)->toDateString();
        }

        $bg = $this->loadBg();
        return [$seminar, $reg, $certificate, $bg];
    }

    // =========================
    // HELPERS
    // =========================
    private function loadBg(): array
    {
        $bgPath = public_path('images/sertifikat/sertifikat.png');
        $img = is_file($bgPath) ? 'data:image/png;base64,' . base64_encode(file_get_contents($bgPath)) : null;
        return ['image' => $img, 'type' => 'png'];
    }

    private function emailBody(string $name, $seminar): string
    {
        $indexUrl = route('certificates.index');
        return <<<HTML
<p>Halo {$name},</p>
<p>Sertifikat untuk kegiatan <strong>{$seminar->title}</strong> telah terbit dan terlampir pada email ini.</p>
<p>Anda juga dapat melihat daftar sertifikat pada laman berikut: <a href="{$indexUrl}">{$indexUrl}</a>.</p>
<p>Terima kasih.</p>
HTML;
    }

    private function ok(string $msg)
    {
        if (request()->expectsJson()) return response()->json(['status' => 'ok', 'message' => $msg]);
        return back()->with('success', $msg);
    }

    private function fail(string $msg, int $code = 422)
    {
        if (request()->expectsJson()) return response()->json(['status' => 'error', 'message' => $msg], $code);
        return back()->with('error', $msg);
    }
}
