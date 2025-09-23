@extends('layouts.userDashboard')

@push('scripts')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key=" {{ config('midtrans.client_key') }}">
    </script>
@endpush

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-8 px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                        </path>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Pembayaran Secure</h1>
                <p class="text-gray-600">Selesaikan transaksi Anda dengan aman dan mudah</p>
            </div>

            <!-- Main Payment Card -->
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
                <!-- Card Header with Gradient -->
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-8 py-6">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Detail Transaksi
                    </h2>
                    <p class="text-blue-100 mt-1">Informasi lengkap pembayaran Anda</p>
                </div>

                <!-- Card Body -->
                <div class="p-8">
                    <!-- Transaction Details Grid -->
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <!-- Order ID Card -->
                        <div
                            class="bg-gradient-to-br from-gray-50 to-gray-100 p-6 rounded-xl border border-gray-200 hover:shadow-md transition-all duration-300">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-600">Order ID</p>
                            </div>
                            <p class="text-lg font-bold text-gray-800 font-mono">{{ $payment->order_id }}</p>
                        </div>

                        <!-- Date Card -->
                        <div
                            class="bg-gradient-to-br from-green-50 to-emerald-100 p-6 rounded-xl border border-green-200 hover:shadow-md transition-all duration-300">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-600">Tanggal Transaksi</p>
                            </div>
                            <p class="text-lg font-bold text-gray-800">{{ $payment->created_at->format('d M Y H:i') }}</p>
                        </div>

                        <!-- Amount Card -->
                        <div
                            class="bg-gradient-to-br from-purple-50 to-violet-100 p-6 rounded-xl border border-purple-200 hover:shadow-md transition-all duration-300">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                        </path>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-600">Jumlah Pembayaran</p>
                            </div>
                            <p class="text-2xl font-bold text-purple-700">Rp
                                {{ number_format($payment->amount, 0, ',', '.') }}</p>
                        </div>

                        <!-- Status Card -->
                        <div
                            class="bg-gradient-to-br from-orange-50 to-amber-100 p-6 rounded-xl border border-orange-200 hover:shadow-md transition-all duration-300">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-600">Status Pembayaran</p>
                            </div>
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-orange-100 text-orange-800">
                                    <span class="w-2 h-2 bg-orange-400 rounded-full mr-2 animate-pulse"></span>
                                    Menunggu Pembayaran
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Button Section -->
                    <div class="text-center">
                        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-8 mb-6">
                            <div class="mb-6">
                                <div
                                    class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full shadow-lg mb-4">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Siap untuk Pembayaran?</h3>
                                <p class="text-gray-600">Klik tombol di bawah untuk melanjutkan ke gateway pembayaran yang
                                    aman</p>
                            </div>

                            <button id="pay-button"
                                class="group relative px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold text-lg rounded-xl hover:from-blue-600 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                                <span class="flex items-center justify-center">
                                    <svg class="w-6 h-6 mr-3 group-hover:animate-pulse" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                        </path>
                                    </svg>
                                    Bayar Sekarang
                                    <svg class="w-5 h-5 ml-3 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Security Info -->
                    <div class="bg-gray-50 rounded-xl p-6 mt-6">
                        <div class="flex items-center justify-center mb-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-gray-700">SSL Encrypted</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-gray-700">Verified Secure</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <p class="text-gray-600 text-sm mb-2">
                                <span class="font-medium">🔒 Pembayaran Aman:</span> Anda akan diarahkan ke halaman
                                pembayaran Midtrans yang telah tersertifikasi.
                            </p>
                            <p class="text-gray-600 text-sm">
                                <span class="font-medium">↩️ Auto Return:</span> Setelah pembayaran selesai, Anda akan
                                otomatis dikembalikan ke situs ini.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Info Cards -->
            <div class="grid md:grid-cols-3 gap-4 mt-8">
                <div
                    class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 text-center hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-1">100% Aman</h4>
                    <p class="text-sm text-gray-600">Transaksi dilindungi enkripsi SSL</p>
                </div>

                <div
                    class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 text-center hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-1">Proses Cepat</h4>
                    <p class="text-sm text-gray-600">Pembayaran diproses dalam hitungan detik</p>
                </div>

                <div
                    class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 text-center hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="font-semibold text-gray-800 mb-1">24/7 Support</h4>
                    <p class="text-sm text-gray-600">Bantuan tersedia kapan saja</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Midtrans JS SDK -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        const snapToken = {!! json_encode($snapToken) !!};
        const fallbackFinishUrl = "{{ route('payments.finish', ['id' => 'dummy']) }}".replace('dummy', '');
        const orderId = {!! json_encode($payment->order_id ?? '') !!};
        const finishUrlWithOrder = "{{ route('payments.finish', ['id' => 'REPLACE_ORDER_ID']) }}";

        document.getElementById('pay-button').onclick = function() {
            const button = this;
            const originalContent = button.innerHTML;

            button.innerHTML = `<span class="flex items-center justify-center">
                                    <svg class="w-6 h-6 mr-3 group-hover:animate-pulse" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                        </path>
                                    </svg>
                                    Bayar Sekarang
                                    <svg class="w-5 h-5 ml-3 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>`;
            button.disabled = true;

            const finishUrl = orderId ?
                finishUrlWithOrder.replace('REPLACE_ORDER_ID', orderId) :
                fallbackFinishUrl;

            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    window.location.href = finishUrl;
                },
                onPending: function(result) {
                    window.location.href = fallbackFinishUrl;
                },
                onError: function(result) {
                    window.location.href = fallbackFinishUrl;
                },
                onClose: function() {
                    // Restore button state...
                }
            });
        };
    </script>
@endsection