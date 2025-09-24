<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seminar;
use App\Models\SeminarRegistration;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\SeminarRegistrationMail;
use Illuminate\Validation\Rule;

class PendaftaranSeminar extends Component
{
    public $seminar;
    public $name;
    public $email;
    public $phone;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
    ];

    public function mount($seminarId)
    {
        try {
            Log::info('Mounting PendftaranSeminar component with ID: ' . $seminarId);
            $this->seminar = Seminar::findOrFail($seminarId);
            Log::info('Seminar found: ' . $this->seminar->title);
            
            if (Auth::check()) {
                $this->name = Auth::user()->name;
                $this->email = Auth::user()->email;
            }
        } catch (\Exception $e) {
            Log::error('Error mounting PendftaranSeminar: ' . $e->getMessage());
            session()->flash('error', 'Seminar tidak ditemukan.');
            return redirect()->route('welcome');
        }
    }

    public function render()
    {
        try {
            Log::info('Rendering PendftaranSeminar component');
            return view('livewire.pendftaran-seminar');
        } catch (\Exception $e) {
            Log::error('Error rendering PendftaranSeminar: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat memuat formulir.');
            return view('livewire.pendftaran-seminar');
        }
    }

    public function register()
    {
        $this->validate();

        try {
            if($this->seminar->type === 'gratis') {
                // Cek apakah pengguna sudah terdaftar sebelumnya
                $existingRegistration = SeminarRegistration::where('email', $this->email)
                    ->where('seminar_id', $this->seminar->id)
                    ->first();

                if ($existingRegistration) {
                    session()->flash('error', 'Anda sudah terdaftar di seminar ini.');
                    return;
                }

                // Registrasi gratis langsung masuk database
                $registration = SeminarRegistration::create([
                    'seminar_id' => $this->seminar->id,
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'user_id' => Auth::check() ? Auth::id() : null,
                    'is_paid' => 'yes', // Gratis dianggap sudah bayar
                ]);

                Mail::to($this->email)->send(new SeminarRegistrationMail($this->seminar, $registration));
                session()->flash('message', 'Pendaftaran berhasil! Silakan cek email Anda untuk konfirmasi.');
                $this->reset(['name', 'email', 'phone']);
            } else {
                // Cek apakah pengguna sudah terdaftar sebelumnya
                $existingRegistration = SeminarRegistration::where('email', $this->email)
                    ->where('seminar_id', $this->seminar->id)
                    ->where('is_paid', 'no') // Hanya cek yang belum bayar
                    ->first();

                if ($existingRegistration) {
                    // Jika sudah terdaftar tapi belum bayar, arahkan ke pembayaran
                    return redirect()->route('payments.create', \Hashids::encode($existingRegistration->id));
                }

                // Registrasi berbayar: buat dengan status "belum bayar"
                $registration = SeminarRegistration::create([
                    'seminar_id' => $this->seminar->id,
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'user_id' => Auth::check() ? Auth::id() : null,
                    'is_paid' => 'no', // Belum bayar
                ]);

                // Redirect ke pembayaran dengan ID registrasi
                return redirect()->route('payments.create', \Hashids::encode($registration->id));
            }
        } catch (\Exception $e) {
            Log::error('Error in register method: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            session()->flash('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }
}
