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
        $this->loadRegistrations();
    }

    /**
     * Dipanggil setiap kali komponen dirender (termasuk oleh wire:poll).
     * Tugas utamanya: Mengambil data terbaru dari database.
     */
    public function render()
    {
        $this->loadRegistrations();

        // Melewatkan data ke view Livewire
        return view('livewire.seminar-registrants', [
            'seminar' => $this->seminar,
            'registrations' => $this->registrations,
        ]);
    }

    /**
     * Method untuk memuat data registrations dengan eager loading
     */
    private function loadRegistrations()
    {
        // Ambil data seminar beserta pendaftarannya dengan eager loading
        $this->seminar = Seminar::with(['registrations.user'])
            ->findOrFail($this->seminarId);

        // Filter registrations berdasarkan permission (jika diperlukan)
        $this->registrations = $this->seminar->registrations
            ->filter(function ($registration) {
                // Jika user ada dan memiliki permission 'access_seminar', tampilkan
                if ($registration->user && $registration->user->can('access_seminar')) {
                    return true;
                }
                // Jika tidak ada user (guest registration), tetap tampilkan
                if (!$registration->user) {
                    return true;
                }
                return false;
            });
    }
}