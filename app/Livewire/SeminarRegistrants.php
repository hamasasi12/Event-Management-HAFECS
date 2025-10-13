<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seminar;
use Illuminate\Support\Collection;

class SeminarRegistrants extends Component
{
    // Properti publik untuk menerima ID Seminar dari view utama
    public $seminarId;

    // Properti untuk menyimpan data seminar dan pendaftaran
    public Seminar $seminar;
    public Collection $registrations;

    /**
     * Dipanggil sekali saat komponen diinisialisasi.
     * Digunakan untuk menetapkan properti awal, seperti Seminar ID.
     */
    public function mount($seminarId)
    {
        $this->seminarId = $seminarId;
    }

    /**
     * Dipanggil setiap kali komponen dirender (termasuk oleh wire:poll).
     * Tugas utamanya: Mengambil data terbaru dari database.
     */
    public function render()
    {
        // Ambil data seminar beserta pendaftarannya (registrations)
        // load('registrations.user') penting untuk performa
        $this->seminar = Seminar::with('registrations.user')
            ->findOrFail($this->seminarId);

        // Simpan koleksi pendaftaran untuk diakses di view
        $this->registrations = $this->seminar->registrations;

        // Melewatkan data ke view Livewire
        return view('livewire.seminar-registrants', [
            'seminar' => $this->seminar,
            'registrations' => $this->registrations,
        ]);
    }
}
