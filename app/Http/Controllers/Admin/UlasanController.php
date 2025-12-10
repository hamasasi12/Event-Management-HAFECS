<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\SeminarRegistration;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class UlasanController extends Controller
{
    public function index()
    {
        // Ambil semua pendaftaran seminar yang memiliki ulasan
        $ulasans = SeminarRegistration::with(['seminar'])
            ->whereNotNull('ulasan')
            ->where('ulasan', '!=', '')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('admin.ulasan.index', compact('ulasans'));
    }

    public function approve($hashid)
    {
        try {
            $id = Hashids::decode($hashid)[0];
            $registration = SeminarRegistration::findOrFail($id);

            $registration->ulasan_status = 'approved';
            $registration->save();

            // Update juga di attendance jika ada
            $attendance = Attendance::where('seminar_id', $registration->seminar_id)
                ->whereRaw('LOWER(email) = ?', [strtolower(trim($registration->email))])
                ->first();

            if ($attendance) {
                $attendance->ulasan_status = 'approved';
                $attendance->save();
            }

            return response()->json(['success' => true, 'message' => 'Ulasan berhasil diterima']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menerima ulasan: ' . $e->getMessage()]);
        }
    }

    public function reject($hashid)
    {
        try {
            $id = Hashids::decode($hashid)[0];
            $registration = SeminarRegistration::findOrFail($id);

            $registration->ulasan_status = 'rejected';
            $registration->save();

            // Update juga di attendance jika ada
            $attendance = Attendance::where('seminar_id', $registration->seminar_id)
                ->whereRaw('LOWER(email) = ?', [strtolower(trim($registration->email))])
                ->first();

            if ($attendance) {
                $attendance->ulasan_status = 'rejected';
                $attendance->save();
            }

            return response()->json(['success' => true, 'message' => 'Ulasan berhasil ditolak']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menolak ulasan: ' . $e->getMessage()]);
        }
    }
}
