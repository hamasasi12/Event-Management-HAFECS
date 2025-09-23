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

    public function index()
    {
        $payments = Payment::where('id')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('payments.index', compact('payments'));
    }

    public function create(string $id)
    {
        $decoded = Hashids::decode($id);

        if (empty($decoded)) {
            abort(404, 'ID Tidak Valid');
        }

        $id = $decoded[0];
        $seminarRegistration = SeminarRegistration::find($id);
        $seminar = Seminar::find($id);

        if (!$seminarRegistration) {
            return redirect()->back()->with('error', 'Registrasi tidak ditemukan');
        }

        return view('payments.create', ['seminarRegistration' => $seminarRegistration, 'seminar' => $seminar]);
    }


    public function store(Request $request)
    {
        // Set up Midtrans configuration explicitly
        $this->setupMidtransConfig();

        // Validate request
        $request->validate([
            'amount' => 'required|numeric|min:10000',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        // Generate unique order ID
        $orderId = 'ORDER-' . time() . '-' . Str::random(5);

        // Set up Midtrans transaction parameters
        $params = array(
        'transaction_details' => array(
        'order_id' => $orderId,
        'gross_amount' => (int) $request->amount,
        'nama' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
    )
);

        try {
            // Get Snap Token
            $snapToken = Snap::getSnapToken($params);

            // Create payment record SETELAH mendapat snap token
            $payment = Payment::create([
                'user_id' => Auth::check() ? Auth::id() : null, // Isi user_id jika pengguna login
                'order_id' => $orderId,
                'amount' => $request->amount,
                'snap_token' => $snapToken, // Token yang valid
                'status' => 'pending',
            ]);

            // Redirect to checkout page
            return redirect()->route('payments.checkout', ['id' => $payment->id]);
        } catch (\Exception $e) {
            \Log::error('Midtrans Error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'order_id' => $orderId,
                'amount' => $request->amount,
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
        $payment = Payment::findOrFail($id);
        $seminarRegistration = SeminarRegistration::find($id);

        // Pastikan payment milik user yang login
        if ($payment->user_id != Auth::id()) {
            abort(403);
        }

        // Pastikan status masih pending
        if ($payment->status != 'pending') {
            return redirect()->route('payments.detail', $id)
                ->with('error', 'Pembayaran ini sudah diproses sebelumnya');
        }

        // Cek apakah snap_token valid
        if (!$payment->snap_token || $payment->snap_token === '...') {
            // Regenerate snap token jika tidak valid
            $this->setupMidtransConfig();

            

            $params = [
                'transaction_details' => [
                    'order_id' => $payment->order_id,
                    'gross_amount' => (int) $payment->amount,
                ],
                'customer_details' => [
                    'user_id' => Auth::check() ? Auth::id() : null, // Isi user_id jika pengguna login
                    'first_name' => $seminarRegistration->name,
                    'email' => $seminarRegistration->email,
                    'billing_address' => [
                        'first_name' => $seminarRegistration->name,
                        'email' => $seminarRegistration->email,
                        'phone' => $seminarRegistration->phone ?? '',
                        'country_code' => 'IDN',
                    ]
                ],
            ];

            try {
                $snapToken = Snap::getSnapToken($params);
                $payment->update(['snap_token' => $snapToken]);

                \Log::info('Snap token regenerated successfully:', [
                    'payment_id' => $payment->id,
                    'order_id' => $payment->order_id,
                    'new_token' => substr($snapToken, 0, 20) . '...' // Log partial token for security
                ]);
            } catch (\Exception $e) {
                \Log::error('Error regenerating snap token:', [
                    'payment_id' => $payment->id,
                    'order_id' => $payment->order_id,
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ]);

                return redirect()->route('welcome')
                    ->with('error', 'Gagal memproses pembayaran. Silakan coba lagi.');
            }
        }

        $snapToken = $payment->snap_token;

        return view('payments.checkout', compact('payment', 'snapToken'));
    }

    public function finish(string $id)
    {
        $payment = Payment::where('order_id', $id)->first();
        
        //JIKA WEBHOOK TIDAK JALAN
        $payment->update([
            'status' => 'success'
        ]);
        if($payment->status === 'success'){
            $seminarRegistration = SeminarRegistration::first();
            $seminarRegistration->update([
                'is_paid' => 'yes'
            ]);
            Mail::to($seminarRegistration->email)->send(new SeminarRegistrationMail($seminarRegistration->seminar, $seminarRegistration));
            session()->flash('message', 'Pendaftaran berhasil! Silakan cek email Anda untuk konfirmasi.');
             return redirect()->route('welcome');
        }


        //JIKA WEBHOOK TIDAK JALAN

        if (!$payment) {
            abort(404);
        }
        return view('505');
    }


    public function notification(Request $request)
    {
        $this->setupMidtransConfig();

        $notif = new \Midtrans\Notification();

        $orderId = $notif->order_id;
        $status = $notif->transaction_status;
        $fraudStatus = $notif->fraud_status;
        $paymentType = $notif->payment_type;

        $payment = Payment::with('user')->where('order_id', $orderId)->firstOrFail();

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

        if ($payment->status == 'success') {
            event(new PaymentSuccessful($payment));
        }

        return response()->json(['status' => 'success']);
    }

    public function grandLevelAAccess($payment)
    {
        try {
            $user = User::where('id', $payment->user_id)->first();
            $user->givePermissionTo('access_level_a');
            $user->revokePermissionTo('fresh_user');
        } catch (\Exception $e) {
            \Log::error('Error Granting Access Level A:', ['message' => $e->getMessage()]);
        }
    }

    public function detail($id)
    {
        $payment = Payment::findOrFail($id);

        if ($payment->user_id != Auth::id()) {
            abort(403);
        }

        return view('payments.detail', compact('payment'));
    }
}
