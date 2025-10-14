<div class="min-h-screen bg-gray-50 font-sans">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        /* Custom Colors & Gradients */
        .text-primary {
            color: #1e3a8a; /* Biru Tua */
        }

        .bg-primary {
            background-color: #1e3a8a; /* Biru Tua */
        }

        .border-accent {
            border-color: #f59e0b; /* Kuning/Amber */
        }

        .bg-accent {
            background-color: #f59e0b; /* Kuning/Amber */
        }

        .text-accent {
            color: #f59e0b; /* Kuning/Amber */
        }

        .gradient-button {
            background-image: linear-gradient(to right, #1e3a8a, #3b82f6); /* Gradient Biru */
        }

        .hover\:gradient-button:hover {
            background-image: linear-gradient(to right, #1d4ed8, #2563eb);
        }
    </style>

    <header class="bg-white shadow-lg z-20 sticky top-0">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 flex-shrink-0">
                    <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-11">
                    </div>

                <div class="hidden md:flex items-center justify-center space-x-8 flex-grow">
                    <a href="{{ url('/') }}" class="font-semibold text-gray-700 hover:text-primary transition px-3 py-1 rounded-md">Home</a>
                    <a href="#webinar" class="font-semibold text-gray-700 hover:text-primary transition px-3 py-1 rounded-md">Webinar</a>
                    <a href="#trainer" class="font-semibold text-gray-700 hover:text-primary transition px-3 py-1 rounded-md">Trainer</a>
                    <a href="#dokumentasi" class="font-semibold text-gray-700 hover:text-primary transition px-3 py-1 rounded-md">Dokumentasi</a>
                </div>

                <div class="md:hidden flex-shrink-0">
                    <button id="mobile-menu-button" class="text-gray-600 focus:outline-none p-2 rounded-md hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="mobile-menu md:hidden mt-4 hidden border-t pt-4">
                <a href="{{ url('/') }}" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Home</a>
                <a href="#webinar" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Webinar</a>
                <a href="#trainer" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Trainer</a>
                <a href="#dokumentasi" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Dokumentasi</a>
                <a href="#" class="block py-2 px-3 rounded-md mt-2 text-center text-white bg-accent hover:bg-yellow-600 font-bold">Bantuan/Hubungi Kami</a>
            </div>
        </nav>
    </header>
    <div class="max-w-2xl mx-auto mt-10 py-12 px-4 sm:px-6 lg:px-8">
        @if ($seminar)
            <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-2xl border-t-8 border-accent">

                <div class="text-center mb-8">
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Form Pendaftaran</h1>
                    <p class="text-gray-600">Lengkapi data Anda untuk mengikuti seminar.</p>
                </div>


                <div class="bg-yellow-50 rounded-xl p-5 mb-8 border-l-4 border-accent">
                    <h3 class="text-xl font-bold text-primary mb-3 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        {{ $seminar->title }}
                    </h3>
                    <p class="text-gray-700 text-sm italic">{{ $seminar->description }}</p>
                    <div class="grid grid-cols-2 gap-2 mt-4 text-sm">
                        <div class="font-medium text-primary">Tanggal:</div>

                        <div class="text-right font-semibold">{{ $seminar->start_time->format('d M Y') }}</div>

                        <div class="font-medium text-primary">Waktu:</div>
                        <div class="text-right">{{ $seminar->start_time->format('H:i') }} - {{ $seminar->end_time->format('H:i') }}</div>

                        <div class="font-medium text-primary text-lg">Biaya Investasi:</div>
                        <div class="text-right text-xl font-extrabold text-accent">Rp {{ number_format($seminar->price, 0, ',', '.') }}</div>
                    </div>
                </div>

                @auth
                <div class="bg-blue-50 rounded-xl p-4 mb-6 border border-blue-200">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="h-10 w-10 text-primary" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.997A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <div class="text-base font-medium text-primary">Anda login sebagai:</div>
                            <div class="text-lg font-bold text-primary">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-600">{{ Auth::user()->email }}</div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                            @csrf
                            <button type="submit"
                                class="border border-red-400 text-red-500 px-3 py-1 rounded-lg font-semibold text-sm hover:bg-red-50 transition-all duration-300">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
                @endauth

                {{-- Message dan Error Boxes --}}
                @if (session()->has('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
                @endif

                @if (session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
                @endif

                @guest
                <div class="bg-blue-50 rounded-xl p-6 mb-8 text-center border-2 border-dashed border-accent">
                    <p class="text-primary font-semibold mb-4 text-lg">PENTING: Masuk untuk data otomatis</p>
                    <a href="{{ route('google.login') }}" class="inline-flex items-center justify-center bg-accent text-primary px-8 py-3 rounded-full font-bold shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-300 text-center group">
                        <svg class="w-5 h-5 mr-3 text-primary group-hover:animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.98 5.98 0 0010 16a5.979 5.979 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                        </svg>
                        Lanjutkan dengan Akun Google
                    </a>
                </div>
                @endguest

                <form wire:submit.prevent="register" class="space-y-6">

                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                        <input wire:model="name" type="text" id="name"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-md p-3 focus:ring-accent focus:border-accent border-2 transition duration-150 @error('name') border-red-500 @enderror"
                            placeholder="Masukkan nama lengkap Anda">
                        @error('name') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        @auth
                            <p class="text-xs text-gray-500 mt-1">Anda dapat mengedit nama Anda di sini.</p>
                        @endauth
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email Aktif</label>
                        <input wire:model="email" type="email" id="email"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-md p-3 focus:ring-accent focus:border-accent border-2 transition duration-150 @error('email') border-red-500 @enderror"
                            placeholder="Contoh: nama@email.com">
                        @error('email') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        @auth
                            <p class="text-xs text-gray-500 mt-1">Anda dapat mengedit email Anda di sini.</p>
                        @endauth
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1">Nomor WhatsApp Aktif</label>
                        <input wire:model="phone" type="text" id="phone"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-md p-3 focus:ring-accent focus:border-accent border-2 transition duration-150 @error('phone') border-red-500 @enderror"
                            placeholder="Contoh: 0812XXXXXXXX (Wajib WhatsApp)">
                        @error('phone') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        <p class="text-xs text-gray-500 mt-1">Kami akan mengirimkan link dan informasi ke nomor WhatsApp ini.</p>
                    </div>

                    <button type="submit" wire:loading.attr="disabled" wire:target="register"
                        class="gradient-button text-white px-6 py-3 rounded-xl font-bold text-lg hover:gradient-button focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 w-full shadow-lg hover:shadow-xl transform hover:scale-[1.01]">
                        <span wire:loading.remove wire:target="register" class="flex items-center justify-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Daftar & Lanjutkan ke Pembayaran
                        </span>
                        <span wire:loading wire:target="register" class="flex items-center justify-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            Memproses Pendaftaran...
                        </span>
                    </button>
                </form>
            </div>
        @else
            <div class="bg-white rounded-3xl p-8 shadow-xl border-t-4 border-accent text-center text-red-600 font-medium">
                Seminar tidak ditemukan.
            </div>
        @endif
    </div>

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</div>
