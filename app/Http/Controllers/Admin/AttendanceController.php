<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\IssueCertificateFromRegistration;
use App\Models\Seminar;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    public function showAttendanceForm(Seminar $seminar, $token)
    {
        Log::info('Attendance form requested', [
            'seminar_id' => $seminar->id,
            'token'      => $token,
        ]);

        $attendance = Attendance::where('seminar_id', $seminar->id)
            ->where('token', $token)
            ->first();

        if (!$attendance) {
            Log::warning('Invalid attendance link', [
                'seminar_id' => $seminar->id,
                'token'      => $token,
            ]);
            return redirect()->route('welcome')->with('error', 'Invalid attendance link.');
        }

        if ($attendance->scanned_at) {
            Log::warning('QR code already used', [
                'seminar_id' => $seminar->id,
                'token'      => $token,
                'scanned_at' => $attendance->scanned_at,
            ]);
            return redirect()->route('welcome')->with('error', 'This QR code has already been used.');
        }

        return view('absen.form', compact('seminar', 'attendance', 'token'));
    }

    public function markAttendance(Request $request, Seminar $seminar, $token)
    {
        Log::info('Marking attendance', [
            'seminar_id'   => $seminar->id,
            'token'        => $token,
            'request_data' => $request->all(),
        ]);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $attendance = Attendance::where('seminar_id', $seminar->id)
            ->where('token', $token)
            ->first();

        if (!$attendance) {
            Log::warning('Invalid attendance link for marking', [
                'seminar_id' => $seminar->id,
                'token'      => $token,
            ]);
            return redirect()->back()->with('error', 'Invalid attendance link.');
        }

        if ($attendance->scanned_at) {
            Log::warning('QR code already used for marking', [
                'seminar_id' => $seminar->id,
                'token'      => $token,
                'scanned_at' => $attendance->scanned_at,
            ]);
            return redirect()->back()->with('error', 'This QR code has already been used.');
        }

        // Tandai hadir
        $attendance->name       = $request->name;
        $attendance->email      = $request->email;
        $attendance->phone      = $request->phone;
        $attendance->scanned_at = now();
        $attendance->save();

        // Cocokkan pendaftaran by email (case-insensitive)
        $registration = $seminar->registrations()
            ->whereRaw('LOWER(email) = ?', [strtolower(trim($request->email))])
            ->first();

        if ($registration) {
            // Update status hadir di pendaftaran
            $registration->update(['attendance_status' => 'attended']);

            Log::info('Attendance matched with registration', [
                'registration_id' => $registration->id,
                'email'           => $request->email,
            ]);

            // TRIGGER: kirim sertifikat via job (jalan setelah commit)
            Log::info('Dispatching IssueCertificateFromRegistration', [
                'registration_id' => $registration->id,
                'email'           => $registration->email,
            ]);

            IssueCertificateFromRegistration::dispatch($registration->id)->afterCommit();

            // Redirect ke index certificate (opsional: bawa email untuk filter di UI)
            return redirect()
                ->route('certificates.index', ['email' => $request->email])
                ->with('success', 'Attendance berhasil! Sertifikat segera dikirim ke email Anda.');
        }

        Log::info('No matching registration found', ['email' => $request->email]);

        return redirect()
            ->back()
            ->with('success', 'Attendance berhasil, namun email tidak terdaftar sebagai peserta. Sertifikat tidak dikirim.');
    }
}
