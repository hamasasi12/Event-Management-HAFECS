<div class="bg-white rounded-3xl p-8 shadow-xl card-hover border-t-4 border-coral relative">
    <!-- Label Harga -->
    @php
        $isPaid = $seminar->price && $seminar->price > 0;
    @endphp
    <div class="absolute top-4 right-4 px-3 py-1 rounded-full text-sm font-semibold shadow-md
        {{ $isPaid ? 'bg-yellow-400 text-gray-900' : 'bg-green-500 text-white' }}">
        {{ $isPaid ? 'Rp ' . number_format($seminar->price, 0, ',', '.') : 'Gratis' }}
    </div>
    <!-- Gambar -->
    <img class="rounded-lg mb-4 w-full h-48 object-cover" src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}">
    <div class="text-center space-y-4">
        <h3 class="text-2xl font-bold text-primary">{{ $seminar->title }}</h3>
        <h3 class="text-xl font-semibold text-gray-600">{{ ucfirst($seminar->status) }}</h3>
        <p class="text-gray-600 leading-relaxed">{{ $seminar->description }}</p>
        @if($seminar->status === 'upcoming')
            <a href="{{ route('seminar.show', $seminar->id) }}"
               class="bg-gradient-to-r from-coral to-red-500 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                Lihat Detail & Daftar
            </a>
        @else
            <button class="bg-gray-400 text-white px-6 py-3 rounded-full font-semibold cursor-not-allowed" disabled>
                Seminar Telah Berakhir
            </button>
        @endif
    </div>
</div>
