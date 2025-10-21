<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        
        $pembayaran = Payment::where('user_id', $userId)->orderBy('payment_time', 'desc')->get();

        $paymentCount = Payment::where('user_id', $userId)->count();

        $paymentSuccessCount = Payment::where('user_id', $userId)
            ->where('status', 'success')
            ->count();

        $paymentPendingCount = Payment::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();

        return view('dashboard.asesi.transaksi', [
            'paymentCount' => $paymentCount,
            'paymentSuccessCount' => $paymentSuccessCount,
            'paymentPendingCount' => $paymentPendingCount,
            'pembayaran' => $pembayaran
        ]);
    }
}
