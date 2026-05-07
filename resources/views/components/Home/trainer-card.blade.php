<div class="shrink-0 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-3">
    <article
        class="bg-white shadow-lg rounded-xl overflow-hidden text-left relative p-6 transform transition duration-300 hover:shadow-xl cursor-pointer active:scale-95 h-full">
        <span
            class="absolute top-3 right-3 bg-blue-800 text-white px-2 py-1 text-xs font-semibold rounded-full">{{ $trainer->title }}</span>
        <img src="{{ asset('./assets/storage/' . $trainer->image) }}" alt="{{ $trainer->name }}, {{ $trainer->position }}"
            class="w-full h-60 object-cover rounded-md" loading="lazy" decoding="async" width="300" height="240" />
        <h3 class="font-bold text-lg mt-3 text-blue-900">{{ $trainer->name }}</h3>
        <p class="text-yellow-600 text-sm">{{ $trainer->position }}</p>
        <p class="text-gray-600 text-sm mt-2 text-justify">{{ $trainer->bio }}</p>
        <div class="mt-3 flex flex-wrap gap-2">
            @foreach ($trainer->skills as $skill)
                <span class="bg-blue-100 text-blue-700 px-2 py-1 text-xs rounded-md">{{ $skill }}</span>
            @endforeach
        </div>
    </article>
</div>
