<div>
    <header class="relative z-10 p-6">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-3xl font-bold gradient-text">HAFECS</div>
            <a href="{{ url('/') }}" class=" hover:text-teal transition-colors px-4 py-2 rounded-full hover:bg-white hover:bg-opacity-10">
                ← Kembali ke Home
            </a>
        </div>
    </header>

    <div class="max-w-2xl mx-auto mt-10">
        <div class="bg-white rounded-3xl p-8 shadow-xl border-t-4 border-coral">
            <h2 class="text-2xl font-bold text-primary text-center mb-6">Pendaftaran Seminar</h2>

            <div class="bg-gray-50 rounded-xl p-4 mb-6">
                <h3 class="text-xl font-bold text-primary">{{ $seminar->title }}</h3>
                <p class="text-gray-600 mt-2">{{ $seminar->description }}</p>
                <div class="flex justify-between mt-4">
                    <span class="font-semibold">Tanggal:</span>
                    <span>{{ $seminar->start_time->format('d M Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Waktu:</span>
                    <span>{{ $seminar->start_time->format('H:i') }} - {{ $seminar->end_time->format('H:i') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold">Harga:</span>
                    <span>Rp {{ number_format($seminar->price, 0, ',', '.') }}</span>
                </div>
            </div>

            @auth
            <div class="bg-blue-50 rounded-xl p-4 mb-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="h-10 w-10 rounded-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.997A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-base font-medium text-primary">Anda telah login sebagai:</div>
                        <div class="text-base font-medium text-white bg-primary px-3 py-1 rounded-full">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-600">{{ Auth::user()->email }}</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="ml-auto">
                        @csrf
                        <button type="submit" class="border-2 border-teal text-teal px-4 py-2 rounded-full font-semibold text-sm hover:bg-teal hover:text-primary transition-all duration-300 text-center">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
            @endauth

            @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
            @endif

            @guest
            <div class="bg-yellow-50 rounded-xl p-4 mb-6 text-center">
                <p class="text-gray-700 mb-3">Untuk pengalaman yang lebih baik, silakan login terlebih dahulu:</p>
                <a href="{{ route('google.login') }}" class="bg-gradient-to-r from-coral to-red-500 text-white px-8 py-3 rounded-full font-semibold hover:shadow-2xl hover:scale-105 transition-all duration-300 text-center inline-block">
                    Login with Google
                </a>
            </div>
            @endguest

            <form wire:submit.prevent="register" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input wire:model="name" type="text" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-coral focus:ring focus:ring-coral focus:ring-opacity-50">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input wire:model="email" type="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-coral focus:ring focus:ring-coral focus:ring-opacity-50">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">No. Telp</label>
                    <input wire:model="phone" type="text" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-coral focus:ring focus:ring-coral focus:ring-opacity-50">
                    @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <!--  -->
                <button type="submit" class="bg-gradient-to-r from-coral to-red-500 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 w-full">
                    Daftar
                </button>
            </form>
        </div>
    </div>
</div>
