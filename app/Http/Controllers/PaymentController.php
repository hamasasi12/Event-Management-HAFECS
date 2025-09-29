<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\User;
use App\Models\SeminarRegistration;
use App\Models\Seminar;
use App\Models\Payment;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Events\PaymentSuccessful;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\SeminarRegistrationMail;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set Midtrans configuration
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$clientKey = config('midtrans.client_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production', false);
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized', true);
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds', true);
    }

    public function create(string $id)
    {
        try {
            $decoded = Hashids::decode($id);

            if (empty($decoded)) {
                abort(404, 'ID Tidak Valid');
            }

            $registrationId = $decoded[0];
            $seminarRegistration = SeminarRegistration::with('seminar')->find($registrationId);
            $seminar = $seminarRegistration ? $seminarRegistration->seminar : null;

            if (!$seminarRegistration || !$seminar) {
                return redirect('/')->with('error', 'Registrasi tidak ditemukan');
            }

            // Cek apakah sudah dibayar
            if ($seminarRegistration->is_paid === 'yes') {
                return redirect('/')->with('error', 'Pendaftaran sudah diproses');
            }

            return view('payments.create', [
                'seminarRegistration' => $seminarRegistration, 
                'seminar' => $seminar
            ]);
        } catch (\Exception $e) {
            Log::error('Error in create payment: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect('/')->with('error', 'Terjadi kesalahan saat mengakses pembayaran.');
        }
    }

    public function store(Request $request)
    {
        try {
            $this->setupMidtransConfig();

            $request->validate([
                'amount' => 'required|numeric|min:10000',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:15',
                'seminar_id' => 'required|exists:seminars,id',
            ]);

            // Cari registrasi berdasarkan email dan seminar (untuk validasi)
            $seminarRegistration = SeminarRegistration::where('email', $request->email)
                ->where('seminar_id', $request->seminar_id)
                ->where('is_paid', 'no')
                ->first();

            if (!$seminarRegistration) {
                return redirect()->back()->with('error', 'Data pendaftaran tidak ditemukan atau sudah diproses');
            }

            // Cek apakah ada pembayaran pending untuk registrasi ini
            $existingPayment = Payment::where('seminar_registration_id', $seminarRegistration->id)
                ->whereIn('status', ['pending', 'settlement'])
                ->first();

            if ($existingPayment) {
                return redirect()->route('payments.checkout', $existingPayment->id)
                    ->with('info', 'Pembayaran sedang diproses. Silakan selesaikan pembayaran sebelumnya.');
            }

            $orderId = 'ORDER-' . time() . '-' . Str::random(5);

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $request->amount,
                ],
                'customer_details' => [
                    'first_name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone ?? '',
                ],
            ];

            $snapToken = Snap::getSnapToken($params);

            // Create payment record
            $payment = Payment::create([
                'user_id' => Auth::check() ? Auth::id() : null,
                'seminar_registration_id' => $seminarRegistration->id,
                'order_id' => $orderId,
                'amount' => $request->amount,
                'snap_token' => $snapToken,
                'status' => 'pending',
            ]);

            return redirect()->route('payments.checkout', ['id' => $payment->id]);
        } catch (\Exception $e) {
            Log::error('Midtrans Error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'order_id' => $orderId ?? 'unknown',
            ]);

            return redirect()->back()->with('error', 'Error creating payment: ' . $e->getMessage());
        }
    }

    private function setupMidtransConfig()
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$clientKey = config('midtrans.client_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production', false);
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized', true);
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds', true);
    }

    public function checkout($id)
    {
        try {
            $payment = Payment::with('seminarRegistration.seminar')->findOrFail($id);
            $seminarRegistration = $payment->seminarRegistration;

            if (Auth::check() && $payment->user_id && $payment->user_id != Auth::id()) {
                abort(403);
            }

            if ($payment->status != 'pending') {
                return redirect()->route('payments.detail', $id)
                    ->with('error', 'Pembayaran ini sudah diproses sebelumnya');
            }

            if (!$payment->snap_token || $payment->snap_token === '...') {
                $this->setupMidtransConfig();

                $params = [
                    'transaction_details' => [
                        'order_id' => $payment->order_id,
                        'gross_amount' => (int) $payment->amount,
                    ],
                    'customer_details' => [
                        'first_name' => $seminarRegistration->name,
                        'email' => $seminarRegistration->email,
                        'phone' => $seminarRegistration->phone ?? '',
                    ]
                ];

                $snapToken = Snap::getSnapToken($params);
                $payment->update(['snap_token' => $snapToken]);

                Log::info('Snap token regenerated successfully:', [
                    'payment_id' => $payment->id,
                    'order_id' => $payment->order_id,
                    'new_token' => substr($snapToken, 0, 20) . '...'
                ]);
            }

            $snapToken = $payment->snap_token;

            return view('payments.checkout', compact('payment', 'snapToken'));
        } catch (\Exception $e) {
            Log::error('Error in checkout: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return redirect('/')->with('error', 'Terjadi kesalahan saat menuju pembayaran.');
        }
    }

    public function finish(string $id)
    {
        $payment = Payment::with('seminarRegistration.seminar')->where('order_id', $id)->first();
        
        if (!$payment) {
            abort(404);
        }

        $payment->update([
            'status' => 'success'
        ]);

        $payment->refresh();

        if($payment->status === 'success') {
            $seminarRegistration = $payment->seminarRegistration;
            
            if ($seminarRegistration) {
                $seminarRegistration->update([
                    'is_paid' => 'yes'
                ]);
                
                Mail::to($seminarRegistration->email)->send(new SeminarRegistrationMail($seminarRegistration->seminar, $seminarRegistration));
            }
        }

        // Redirect to home page with success parameter
        return redirect('/').'?payment_success=true';
        Alert::classic('Success', 'Payment completed successfully!');
    }

    public function notification(Request $request)
    {
        try {
            $this->setupMidtransConfig();

            $notif = new \Midtrans\Notification();

            $orderId = $notif->order_id;
            $status = $notif->transaction_status;
            $fraudStatus = $notif->fraud_status;
            $paymentType = $notif->payment_type;

            $payment = Payment::with('user', 'seminarRegistration.seminar')->where('order_id', $orderId)->firstOrFail();

            $previousStatus = $payment->status;

            if ($status == 'capture') {
                if ($fraudStatus == 'challenge') {
                    $payment->status = 'pending';
                } else if ($fraudStatus == 'accept') {
                    $payment->status = 'success';
                }
            } else if ($status == 'settlement') {
                $payment->status = 'success';
            } else if ($status == 'cancel' || $status == 'deny' || $status == 'expire') {
                $payment->status = 'failed';
            } else if ($status == 'pending') {
                $payment->status = 'pending';
            }

            $payment->transaction_id = $notif->transaction_id;
            $payment->payment_type = $paymentType;
            $payment->payment_time = now();
            $payment->payment_details = json_decode(json_encode($notif), true);
            $payment->save();

            if ($previousStatus != 'success' && $payment->status == 'success') {
                $seminarRegistration = $payment->seminarRegistration;
                if ($seminarRegistration) {
                    $seminarRegistration->update([
                        'is_paid' => 'yes'
                    ]);
                    
                    Mail::to($seminarRegistration->email)->send(new SeminarRegistrationMail($seminarRegistration->seminar, $seminarRegistration));
                }
                
                if ($payment->status === 'success') {
                    event(new PaymentSuccessful($payment));
                }
                return response()->json(['status' => 'success']);
            }

        } catch (\Exception $e) {
            Log::error('Notification Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['status' => 'error']);
        }
    }

    public function detail($id)
    {
        try {
            $payment = Payment::findOrFail($id);

            if (Auth::check() && $payment->user_id && $payment->user_id != Auth::id()) {
                abort(403);
            }

            return view('payments.detail', compact('payment'));
        } catch (\Exception $e) {
            Log::error('Error in payment detail: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            // session()->flash('error', 'Terjadi kesalahan saat mengakses detail pembayaran.');
            Alert::error('Error', 'Terjadi kesalahan saat mengakses detail pembayaran.');
             return redirect('/');
            // return redirect()->view('welcome');
        }
        
    }
}
