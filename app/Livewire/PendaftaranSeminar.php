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
use RealRashid\SweetAlert\Facades\Alert;
use Vinkla\Hashids\Facades\Hashids;

// #[Layout('components.layouts.app')]
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

    public function mount($hashid)
    {
        try {
            // Decode the hashid to get the actual seminar ID
            $decoded = Hashids::decode($hashid);

            if (empty($decoded)) {
                Log::error('Invalid hashid provided: ' . $hashid);
                session()->flash('error', 'ID Seminar tidak valid.');
                return redirect()->route('welcome');
            }

            $seminarId = $decoded[0];

            Log::info('Mounting PendftaranSeminar component with decoded ID: ' . $seminarId);
            $this->seminar = Seminar::findOrFail($seminarId);
            Log::info('Seminar found: ' . $this->seminar->title);

            if (Auth::check()) {
                // Allow setting initial values from authenticated user but keep them editable
                $this->name = $this->name ?? Auth::user()->name;
                $this->email = $this->email ?? Auth::user()->email;
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
            // Cek apakah pengguna sudah terdaftar ke seminar ini sebelumnya (tidak peduli sudah bayar atau belum)
            $existingRegistration = SeminarRegistration::where('email', $this->email)
                ->where('seminar_id', $this->seminar->id)
                ->first();

            if ($existingRegistration) {
                if ($existingRegistration->is_paid === 'yes') {
                    $this->dispatch('show-error', title: 'Gagal Mendaftar', message: 'Anda sudah terdaftar dan membayar di seminar ini.');
                } else {
                    $this->dispatch('show-error', title: 'Gagal Mendaftar', message: 'Anda sudah terdaftar di seminar ini. Silakan selesaikan pembayaran terlebih dahulu.', redirectTo: 'payments/' . \Hashids::encode($existingRegistration->id) . '/create');
                }
                return;
            }

            // If user is authenticated and has changed their name or email, update their profile
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->name !== $this->name || $user->email !== $this->email) {
                    $user->update([
                        'name' => $this->name,
                        'email' => $this->email
                    ]);
                }
            }

            if($this->seminar->type === 'gratis') {
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

                $this->reset(['name', 'email', 'phone']);

                // Kirim event untuk menampilkan SweetAlert
                $this->dispatch('show-success', title: 'Success!', message: 'Pendaftaran berhasil! Silakan cek email Anda untuk konfirmasi.', redirectTo: '/');
            } else {
                // Registrasi berbayar: buat dengan status "belum bayar"
                $registration = SeminarRegistration::create([
                    'seminar_id' => $this->seminar->id,
                    'name' => $this->name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'user_id' => Auth::check() ? Auth::id() : null,
                    'is_paid' => 'no', // Belum bayar
                ]);

                // Langsung redirect ke halaman pembayaran
                return redirect('payments/' . \Hashids::encode($registration->id) . '/create');
            }
        } catch (\Exception $e) {
            Log::error('Error in register method: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            $this->dispatch('show-error', title: 'Terjadi Kesalahan', message: 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }
}
