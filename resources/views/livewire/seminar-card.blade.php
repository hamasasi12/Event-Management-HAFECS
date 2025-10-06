<div class="bg-white rounded-3xl p-8 shadow-xl card-hover border-t-4 border-coral ">
    <img class="rounded-lg mb-4" src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}">
    <div class="text-center space-y-4">
        <h3 class="text-2xl font-bold text-primary">{{ $seminar->title }}</h3>
        <h3 class="text-2xl font-bold text-primary">{{ $seminar->status }}</h3>
        <p class="text-gray-600 leading-relaxed">{{ $seminar->description }}</p>
        @if($seminar->status === 'upcoming')
            <a href="{{ route('seminar.register', \Vinkla\Hashids\Facades\Hashids::encode($seminar->id)) }}" class="bg-gradient-to-r from-coral to-red-500 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                Daftar Sekarang
            </a>
        @else
            <button class="bg-gray-400 text-white px-6 py-3 rounded-full font-semibold cursor-not-allowed" disabled>
                Seminar Telah Berakhir
            </button>
        @endif
    </div>
</div>