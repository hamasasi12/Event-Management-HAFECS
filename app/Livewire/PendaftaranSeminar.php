<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seminar;
use App\Models\SeminarRegistration;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\SeminarRegistrationMail;
use Vinkla\Hashids\Facades\Hashids;

class PendaftaranSeminar extends Component
{
    public $seminar;
    public $name;
    public $email;
    public $phone;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => ['required', 'regex:/^[0-9]+$/', 'min:10', 'max:15'],
    ];

    public function mount($hashid)
    {
        try {
            $decoded = Hashids::decode($hashid);

            if (empty($decoded)) {
                Log::error('Invalid hashid provided: ' . $hashid);
                session()->flash('error', 'ID Seminar tidak valid.');
                return redirect()->route('welcome');
            }

            $seminarId = $decoded[0];

            Log::info('Mounting PendaftaranSeminar component with decoded ID: ' . $seminarId);
            $this->seminar = Seminar::findOrFail($seminarId);
            Log::info('Seminar found: ' . $this->seminar->title);

            if (Auth::check()) {
                $this->name = $this->name ?? Auth::user()->name;
                $this->email = $this->email ?? Auth::user()->email;
            }
        } catch (\Exception $e) {
            Log::error('Error mounting PendaftaranSeminar: ' . $e->getMessage());
            session()->flash('error', 'Seminar tidak ditemukan.');
            return redirect()->route('welcome');
        }
    }

    public function render()
    {
        try {
            Log::info('Rendering PendaftaranSeminar component');
            return view('livewire.pendftaran-seminar');
        } catch (\Exception $e) {
            Log::error('Error rendering PendaftaranSeminar: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan saat memuat formulir.');
            return view('livewire.pendftaran-seminar');
        }
    }

    /**
     * Public method untuk handle register
     */
    public function register()
    {
        $this->validate();

        try {
            Log::info('Register method called for email: ' . $this->email . ', Seminar ID: ' . $this->seminar->id . ', Seminar type: ' . $this->seminar->type);

            // ✅ STEP 1: Cek apakah sudah ada registrasi dengan email dan seminar yang sama
            $existingRegistration = SeminarRegistration::where('email', $this->email)
                ->where('seminar_id', $this->seminar->id)
                ->first();

            if ($existingRegistration) {
                Log::warning('Existing registration found for: ' . $this->email . ' on seminar: ' . $this->seminar->id);
                
                // CASE 1: Sudah bayar (is_paid = 'yes')
                if ($existingRegistration->is_paid === 'yes') {
                    Log::warning('Registration already paid');
                    $this->dispatch('show-error', 
                        title: 'Sudah Terdaftar', 
                        message: 'Anda sudah terdaftar dan menyelesaikan pembayaran di seminar ini.'

                    );
                    return;
                }

                // CASE 2: Belum bayar (is_paid = 'no') - cek apakah ada payment
                Log::info('Registration found but not paid yet. Checking for existing payments...');
                
                $existingPayment = Payment::where('seminar_registration_id', $existingRegistration->id)
                    ->whereIn('status', ['pending', 'settlement'])
                    ->latest()
                    ->first();

                if ($existingPayment) {
                    // Ada payment pending/settlement - arahkan ke checkout payment yang ada
                    Log::info('Found existing payment with status: ' . $existingPayment->status . ', Payment ID: ' . $existingPayment->id);
                    // ✅ Langsung redirect dengan hashid, bukan plain ID
                    return redirect()->route('payments.checkout', Hashids::encode($existingPayment->id));
                    return;
                } else {
                    // Tidak ada payment - arahkan ke create payment
                    Log::info('No payment found. Redirecting to create payment page for registration: ' . $existingRegistration->id);
                    $paymentUrl = 'payments/' . Hashids::encode($existingRegistration->id) . '/create';
                    
                    $this->dispatch('show-error', 
                        title: 'Pendaftaran Ditemukan', 
                        message: 'Anda sudah mendaftar. Silakan selesaikan pembayaran terlebih dahulu.', 
                        redirectTo: $paymentUrl
                    );
                    return;
                }
            }

            // Update profile user jika sudah login
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->name !== $this->name || $user->email !== $this->email) {
                    $user->update([
                        'name' => $this->name,
                        'email' => $this->email
                    ]);
                    Log::info('User profile updated for: ' . $user->id);
                }
            }

            // Routing berdasarkan tipe seminar
            if ($this->seminar->type === 'gratis') {
                Log::info('Processing GRATIS registration');
                $this->registerGratis();
            } elseif ($this->seminar->type === 'berbayar') {
                Log::info('Processing BERBAYAR registration');
                $this->registerBerbayar();
            } else {
                Log::error('Unknown seminar type: ' . $this->seminar->type);
                $this->dispatch('show-error', 
                    title: 'Error', 
                    message: 'Tipe seminar tidak dikenali.'
                );
            }

        } catch (\Exception $e) {
            Log::error('Error in register method: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            $this->dispatch('show-error', 
                title: 'Terjadi Kesalahan', 
                message: 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.'
            );
        }
    }

    /**
     * ✅ Registrasi untuk SEMINAR GRATIS
     */
    private function registerGratis()
    {
        try {
            Log::info('=== START registerGratis ===');

            // Step 1: Ambil atau buat user
            $user = Auth::check()
                ? Auth::user()
                : User::firstOrCreate(
                    ['email' => $this->email],
                    [
                        'name' => $this->name,
                        'phone' => $this->phone,
                    ]
                );

            Log::info('Step 1: User retrieved/created with ID: ' . $user->id);

            // Step 2: Refresh user dari database
            $user = User::findOrFail($user->id);
            Log::info('Step 2: User refreshed from database');

            // Step 3: Berikan permission jika belum ada
            if (!$user->hasPermissionTo('access_seminar')) {
                $user->givePermissionTo('access_seminar');
                Log::info('Step 3: Permission access_seminar granted to user: ' . $user->id);
            } else {
                Log::info('Step 3: User already has access_seminar permission');
            }

            // Step 4: Simpan registrasi seminar
            $registration = SeminarRegistration::create([
                'seminar_id' => $this->seminar->id,
                'name'       => $this->name,
                'email'      => $this->email,
                'phone'      => $this->phone,
                'user_id'    => $user->id,
                'is_paid'    => 'yes', // Gratis dianggap sudah "bayar"
                
            ]);

              $this->dispatch('show-success', 
                title: 'Pendaftaran berhasil', 
                message: 'Terima kasih telah mendaftar. Silakan cek email Anda untuk konfirmasi.',
                redirectTo: route('welcome')
            );

            Log::info('Step 4: Registration created with ID: ' . $registration->id);

            // Step 5: Kirim email konfirmasi
            try {
                Mail::to($this->email)->send(new SeminarRegistrationMail($this->seminar, $registration));
                Log::info('Step 5: Confirmation email sent to: ' . $this->email);
            } catch (\Exception $e) {
                Log::error('Step 5: Error sending email: ' . $e->getMessage());
            }

            // Step 6: Reset form
            $this->reset(['name', 'email', 'phone']);
            Log::info('Step 6: Form reset');

            // Step 7: Dispatch success event
            Log::info('Step 7: Dispatching show-success event');
            // return redirect('/')->with('success', 'Pendaftaran berhasil! Silakan cek email Anda untuk konfirmasi.');

            Log::info('=== END registerGratis (SUCCESS) ===');

        } catch (\Exception $e) {
            Log::error('ERROR in registerGratis: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            $this->dispatch('show-error', 
                title: 'Terjadi Kesalahan', 
                message: 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.'
            );
        }
    }

    /**
     * ✅ Registrasi untuk SEMINAR BERBAYAR
     */
    private function registerBerbayar()
    {
        try {
            Log::info('=== START registerBerbayar ===');

            // Step 1: Ambil atau buat user
            $user = Auth::check()
                ? Auth::user()
                : User::firstOrCreate(
                    ['email' => $this->email],
                    [
                        'name' => $this->name,
                        'phone' => $this->phone,
                        'password' => bcrypt('defaultpassword'),
                    ]
                );

            Log::info('Step 1: User retrieved/created with ID: ' . $user->id);

            // Step 2: Simpan registrasi seminar
            $registration = SeminarRegistration::create([
                'seminar_id' => $this->seminar->id,
                'name'       => $this->name,
                'email'      => $this->email,
                'phone'      => $this->phone,
                'user_id'    => $user->id,
                'is_paid'    => 'no', // Belum bayar
            ]);

            Log::info('Step 2: Registration created with ID: ' . $registration->id);

            // Step 3: Buat URL pembayaran
            $paymentUrl = 'payments/' . Hashids::encode($registration->id) . '/create';
            Log::info('Step 3: Payment URL generated: ' . $paymentUrl);

            // Step 4: Redirect ke halaman pembayaran
            Log::info('Step 4: Redirecting to payment page');
            Log::info('=== END registerBerbayar (REDIRECT) ===');
            
            return redirect($paymentUrl);

        } catch (\Exception $e) {
            Log::error('ERROR in registerBerbayar: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            $this->dispatch('show-error', 
                title: 'Terjadi Kesalahan', 
                message: 'Terjadi kesalahan saat membuat registrasi. Silakan coba lagi.'
            );
        }
    }
}