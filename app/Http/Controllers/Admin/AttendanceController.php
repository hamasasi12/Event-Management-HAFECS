<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\IssueCertificateFromRegistration;
use App\Models\Seminar;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Vinkla\Hashids\Facades\Hashids;

class AttendanceController extends Controller
{
    public function showAttendanceForm($seminar_hashid, $token)
    {
        $seminar_id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($seminar_id);

        Log::info('Attendance form requested', [
            'seminar_id' => $seminar->id,
            'token'      => $token,
        ]);

        // Verify the token is valid
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

    public function markAttendance(Request $request, $seminar_hashid, $token)
    {
        $seminar_id = Hashids::decode($seminar_hashid)[0] ?? null;
        $seminar = Seminar::findOrFail($seminar_id);
        
        Log::info('Marking attendance', [
            'seminar_id'   => $seminar->id,
            'token'        => $token,
            'request_data' => $request->all(),
        ]);

        $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'jenjang_sekolah' => 'nullable|string|max:255',
                'asal_sekolah' => 'nullable|string|max:255',
                'jabatan' => 'required|string|max:255',
                'kota_kabupaten' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',            
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

        // Update attendance record
        $attendance->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'jenjang_sekolah' => $request->jenjang_sekolah,
                'asal_sekolah' => $request->asal_sekolah,
                'jabatan' => $request->jabatan,
                'kota_kabupaten' => $request->kota_kabupaten,
                'provinsi' => $request->provinsi,
                'scanned_at' => now(),
            ]);

        // Cocokkan pendaftaran by email (case-insensitive)
        $registration = $seminar->registrations()
            ->whereRaw('LOWER(email) = ?', [strtolower(trim($request->email))])
            ->first();

        if ($registration) {
    // Update registration attendance status
            $registration->update([
                'attendance_status' => 'attended',
                'jenjang_sekolah' => $request->jenjang_sekolah,
                'asal_sekolah' => $request->asal_sekolah,
                'jabatan' => $request->jabatan,
                'kota_kabupaten' => $request->kota_kabupaten,
                'provinsi' => $request->provinsi,
            ]);

            \Log::info('Attendance matched with registration', [
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
