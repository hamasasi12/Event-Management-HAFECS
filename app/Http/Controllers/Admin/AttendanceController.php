<?php

namespace App\Http\Controllers\Admin;

use App\Models\Seminar;
use App\Models\Province;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Jobs\IssueCertificateFromRegistration;
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

        // REMOVED: Check if token is already used (we want reusable tokens)
        // if ($attendance->scanned_at) { ... }
        $provinces = Province::all();
        return view('absen.form', compact('seminar', 'attendance', 'token', 'provinces'));
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
                'kabupaten' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',
                'ulasan' => 'nullable|string|max:1000',
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

        // REMOVED: Check if token is already used
        // if ($attendance->scanned_at) { ... }

        // 1. Cek apakah email ini SUDAH absen di seminar ini?
        $existingAttendance = Attendance::where('seminar_id', $seminar->id)
            ->whereRaw('LOWER(email) = ?', [strtolower(trim($request->email))])
            ->whereNotNull('scanned_at') // Hanya yang sudah scan
            ->first();

        if ($existingAttendance) {
             return redirect()->back()->with('info', 'Anda sudah melakukan absensi sebelumnya.');
        }

        // 2. Buat Record Attendance BARU (jangan update token master)
        // Token master ($attendance) hanya validasi bahwa link valid.
        
        $newAttendance = Attendance::create([
            'seminar_id' => $seminar->id,
            'token' => \Illuminate\Support\Str::uuid(), // Generate token unik baru untuk record ini
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'jenjang_sekolah' => $request->jenjang_sekolah,
            'asal_sekolah' => $request->asal_sekolah,
            'jabatan' => $request->jabatan,
            'kota_kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
            'ulasan' => $request->ulasan,
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
                'kota_kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
                'ulasan' => $request->ulasan,
            ]);

            // Link attendance baru ke registration
            $newAttendance->update(['seminar_registration_id' => $registration->id]);

            \Log::info('Attendance matched with registration', [
                'registration_id' => $registration->id,
                'email'           => $registration->email,
            ]);

            // Gunakan afterResponse agar user tidak menunggu loading generate PDF
            IssueCertificateFromRegistration::dispatch($registration->id)->afterResponse();

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
