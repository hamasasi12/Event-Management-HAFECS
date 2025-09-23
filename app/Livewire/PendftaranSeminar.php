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

#[Layout('components.layouts.app')]
class PendftaranSeminar extends Component
{
    public $seminar;
    public $name;
    public $email;
    public $phone;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:15',
    ];

    public function mount($seminarId)
    {
        try {
            Log::info('Mounting PendftaranSeminar component with ID: ' . $seminarId);
            $this->seminar = Seminar::findOrFail($seminarId);
            Log::info('Seminar found: ' . $this->seminar->title);
            
            // Isi otomatis data pengguna jika sudah login, tetapi tetap bisa diubah
            if (Auth::check()) {
                $this->name = Auth::user()->name;
                $this->email = Auth::user()->email;
            }
        } catch (\Exception $e) {
            Log::error('Error mounting PendftaranSeminar: ' . $e->getMessage());
            throw $e;
        }
    }

    public function render()
    {
        try {
            Log::info('Rendering PendftaranSeminar component');
            return view('livewire.pendftaran-seminar');
        } catch (\Exception $e) {
            Log::error('Error rendering PendftaranSeminar: ' . $e->getMessage());
            throw $e;
        }
    }

    public function register()
    {
        $this->validate();

        try {
            if($this->seminar->type === 'gratis') {
            // Handle registration logic here
            $registration = SeminarRegistration::create([
                'seminar_id' => $this->seminar->id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'user_id' => Auth::check() ? Auth::id() : null, // Isi user_id jika pengguna login
            ]);

            // Kirim email konfirmasi
            Mail::to($this->email)->send(new SeminarRegistrationMail($this->seminar, $registration));

            session()->flash('message', 'Pendaftaran berhasil! Silakan cek email Anda untuk konfirmasi.');

            $this->reset(['name', 'email', 'phone']);
            } else{
                // Handle registration logic here
            $registration = SeminarRegistration::create([
                'seminar_id' => $this->seminar->id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'user_id' => Auth::check() ? Auth::id() : null, // Isi user_id jika pengguna login
            ]);
            return redirect()->route('payments.create', \Hashids::encode($this->seminar->id));

            }
           
        } catch (\Exception $e) {
            Log::error('Error in register method: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }
}
