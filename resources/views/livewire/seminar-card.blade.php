<div class="bg-white rounded-3xl p-8 shadow-xl card-hover border-t-4 border-coral">
    <img class="rounded-lg mb-4" src="{{ $imageUrl }}" alt="{{ $title }}">
    <div class="text-center space-y-4">
        <h3 class="text-2xl font-bold text-primary">{{ $title }}</h3>
        <p class="text-gray-600 leading-relaxed">{{ $description }}</p>
        <a href="#" class="bg-gradient-to-r from-coral to-red-500 text-white px-6 py-3 rounded-full font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
            Learn More
        </a>
    </div>
</div>