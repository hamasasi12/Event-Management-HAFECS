<?php

namespace App\Http\Controllers;

use App\Models\SeminarRegistration;
use Illuminate\Http\Request;

class PublicUlasanController extends Controller
{
    /**
     * Menampilkan halaman ulasan publik
     * Hanya menampilkan ulasan yang sudah di-approve
     */
    public function index()
    {
        // Ambil ulasan yang sudah diapprove saja
        $ulasans = SeminarRegistration::with(['seminar'])
            ->whereNotNull('ulasan')
            ->where('ulasan', '!=', '')
            ->where('ulasan_status', 'approved')
            ->orderBy('updated_at', 'desc')
            ->paginate(12); // 12 ulasan per halaman

        return view('public.ulasan', compact('ulasans'));
    }
}
