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
            <h2 class="text-2xl font-bold text-primary text-center mb-6">Absensi Seminar</h2>

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
            </div>

            @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
            @endif

            <form method="POST" action="{{ route('attend.mark', ['seminar' => $seminar->id, 'token' => $token]) }}" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-coral focus:ring focus:ring-coral focus:ring-opacity-50">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-coral focus:ring focus:ring-coral focus:ring-opacity-50">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">No. Telp</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-coral focus:ring focus:ring-coral focus:ring-opacity-50">
                    @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                
                <button type="submit" class="bg-gradient-to-r from-coral to-red-500 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300 w-full">
                    <span>Absen Sekarang</span>
                </button>
            </form>
        </div>
    </div>

</div>
</div>
</div>
</div>