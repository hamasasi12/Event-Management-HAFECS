<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seminar;
use App\Models\SeminarRegistration;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $this->seminar = Seminar::findOrFail($seminarId);
        
        // Isi otomatis data pengguna jika sudah login
        if (Auth::check()) {
            $this->name = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
    }

    public function render()
    {
        return view('livewire.pendftaran-seminar');
    }

    public function register()
    {
        $this->validate();

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
    }
}
