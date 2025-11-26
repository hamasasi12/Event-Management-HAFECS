@extends('layouts.userDashboard')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-12 px-4 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
            <div class="absolute top-40 right-10 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-1/2 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
        </div>

        <div class="max-w-5xl mx-auto relative z-10">
            <!-- Success Icon with Confetti Effect -->
            <div class="text-center mb-8 relative">
                <div class="inline-block relative">
                    <!-- Rotating Ring -->
                    <div class="absolute inset-0 animate-spin-slow">
                        <div class="w-32 h-32 border-4 border-dashed border-blue-300 rounded-full"></div>
                    </div>

                    <!-- Main Success Circle -->
                    <div class="relative inline-flex items-center justify-center w-32 h-32 bg-gradient-to-br from-blue-500 via-indigo-600 to-blue-700 rounded-full shadow-2xl mb-6">
                        <div class="absolute inset-0 bg-white rounded-full animate-ping opacity-20"></div>
                        <svg class="w-16 h-16 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>

                <h1 class="text-5xl font-extrabold mb-3">
                    <span class="bg-gradient-to-r from-blue-700 via-indigo-500 to-blue-400 bg-clip-text text-transparent">
                        Pembayaran Berhasil!
                    </span>
                </h1>
                <p class="text-gray-600 text-xl">🎉 Transaksi telah dikonfirmasi dengan sukses</p>
            </div>

            <!-- Main Content Card with Glass Effect -->
            <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl overflow-hidden border border-white/50 mb-8">

                <!-- Decorative Header Bar -->
                <div class="h-2 bg-gradient-to-r from-blue-700 via-indigo-500 to-blue-400"></div>

                <div class="p-8 md:p-10">
                    <!-- Transaction Info Header -->
                    <div class="flex items-center justify-between mb-8 pb-6 border-b-2 border-gray-100">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                                <span class="w-3 h-3 bg-green-500 rounded-full mr-3 animate-pulse"></span>
                                Konfirmasi Transaksi
                            </h2>
                            <p class="text-gray-500 mt-1">Invoice pembayaran level Anda</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm font-semibold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                VERIFIED
                            </span>
                        </div>
                    </div>

                    <!-- Transaction Details Grid - New Layout -->
                    <div class="grid md:grid-cols-3 gap-6 mb-8">
                        <!-- Order ID Card - Vertical Style -->
                        <div class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-2xl opacity-25 group-hover:opacity-50 blur transition duration-300"></div>
                            <div class="relative bg-white p-6 rounded-2xl border-2 border-blue-100 hover:border-blue-300 transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mb-3 shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Order ID</p>
                                    <p class="text-sm font-bold text-gray-800 font-mono break-all">{{ $payment->order_id ?? 'ORD-' . time() }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Amount Card - Featured Style -->
                        <div class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-indigo-400 to-purple-400 rounded-2xl opacity-25 group-hover:opacity-50 blur transition duration-300"></div>
                            <div class="relative bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-2xl border-2 border-indigo-200 hover:border-indigo-300 transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mb-3 shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Total Bayar</p>
                                    <p class="text-2xl font-extrabold bg-gradient-to-r from-blue-600 to-indigo-700 bg-clip-text text-transparent">
                                        Rp {{ number_format($payment->amount ?? 0, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Date Card - Vertical Style -->
                        <div class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-purple-400 to-pink-400 rounded-2xl opacity-25 group-hover:opacity-50 blur transition duration-300"></div>
                            <div class="relative bg-white p-6 rounded-2xl border-2 border-purple-100 hover:border-purple-300 transition-all duration-300">
                                <div class="flex flex-col items-center text-center">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mb-3 shadow-lg">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Tanggal</p>
                                    <p class="text-sm font-bold text-gray-800">
                                        {{ \Carbon\Carbon::parse($payment->transaction_time ?? now())->format('d M Y, H:i') }}
                                    <p class="text-xs text-gray-500 mt-1">WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Payment Method Badge -->
                    <div class="flex justify-center mb-8">
                        <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-50 to-emerald-50 border-2 border-green-200 rounded-full">
                            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-bold text-gray-700 mr-2">Metode Pembayaran:</span>
                            <span class="text-sm font-extrabold text-green-700 uppercase">{{ $payment->payment_type ?? 'N/A' }}</span>
                        </div>
                    </div>

                    <!-- Success Message with CTA -->
                    <div class="bg-gradient-to-br from-blue-500 via-indigo-600 to-blue-700 rounded-3xl p-8 text-center text-white shadow-2xl relative overflow-hidden">
                        <!-- Decorative Elements -->
                        <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20"></div>
                        <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/10 rounded-full -ml-20 -mb-20"></div>

                        <div class="relative z-10">
                            <svg class="w-16 h-16 mx-auto mb-4 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <h3 class="text-3xl font-extrabold mb-3">Selamat! 🎊</h3>
                            <p class="text-blue-100 text-lg mb-6 max-w-2xl mx-auto">
                                Pembayaran Anda telah berhasil diproses. Akses premium Anda sekarang aktif dan siap digunakan!
                            </p>


                    <!-- Receipt Information -->
                    <div class="mt-8 grid md:grid-cols-2 gap-4">
                        <div class="flex items-center p-4 bg-blue-50 rounded-xl border border-blue-100">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-semibold">Receipt Status</p>
                                <p class="text-sm font-bold text-gray-800">Email Terkirim</p>
                            </div>
                        </div>

                        <div class="flex items-center p-4 bg-green-50 rounded-xl border border-green-100">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 font-semibold">Payment Status</p>
                                <p class="text-sm font-bold text-gray-800">Terverifikasi</p>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-10 flex justify-center">
                        <a href="{{ route('welcome') }}" class="inline-flex items-center px-8 py-4 bg-white text-blue-600 rounded-full font-bold text-lg shadow-lg hover:bg-blue-50 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group">
                            <svg class="w-5 h-5 mr-3 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>


    <!-- Animations & Notification Script -->
    <style>
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow {
            animation: spin-slow 8s linear infinite;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modern notification with HAFECS theme
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-6 py-4 rounded-2xl shadow-2xl z-50 transform translate-x-full transition-all duration-500 border-2 border-blue-400';
            notification.innerHTML = `
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-sm">Pembayaran Berhasil!</p>
                        <p class="text-xs text-blue-100">Transaksi telah dikonfirmasi</p>
                    </div>
                </div>
            `;
            document.body.appendChild(notification);

            setTimeout(() => notification.classList.remove('translate-x-full'), 500);
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => document.body.removeChild(notification), 500);
            }, 4000);
        });
    </script>
@endsection
