<x-layouts.app title="Past Webinar - LPK HAFECS">
    <x-Home.header />

    <!-- Hero Section -->
    <div class="relative bg-blue-800 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                alt="Webinar Background" class="w-full h-full object-cover opacity-40">
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl font-semibold tracking-tight text-white sm:text-4xl lg:text-5xl mb-4">
                Past Webinar
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-base text-gray-200 sm:text-lg">
                Ketinggalan webinar? Jangan khawatir! Tonton kembali sesi-sesi inspiratif dari para ahli di bidangnya
                dan dapatkan insight berharga kapan saja.
            </p>

            <!-- Search Bar -->
            <div class="mt-8 max-w-xl mx-auto sm:flex justify-center">
                <form action="{{ route('past-webinar') }}" method="GET" class="w-full relative">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari judul webinar..."
                        class="w-full bg-white rounded-xl py-2.5 pl-5 pr-12 text-gray-900 shadow-sm ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-base">
                    <button type="submit"
                        class="absolute inset-y-0 right-0 px-4 flex items-center justify-center bg-blue-600/70 text-white rounded-r-xl hover:bg-blue-700 transition-colors">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Webinar List Section -->
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        @if (request()->filled('search'))
            <h2 class="text-2xl font-semibold text-gray-800 mb-8">Hasil pencarian untuk: "<span
                    class="text-blue-600/80">{{ request('search') }}</span>"</h2>
        @else
            <h2 class="text-2xl font-semibold text-gray-800 mb-8">List Webinar</h2>
        @endif

        @if ($seminars->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($seminars as $seminar)
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden transition-shadow duration-300 flex flex-col h-full group">
                        <div class="relative h-56 overflow-hidden">
                            @if ($seminar->image_url)
                                <img src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}"
                                    class="w-full h-full object-cover transition-transform duration-500">
                            @else
                                <div
                                    class="w-full h-full bg-blue-100 flex items-center justify-center text-blue-500 group-hover:scale-105 transition-transform duration-500">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">{{ $seminar->title }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-3 text-sm flex-grow">
                                {{ Str::limit(strip_tags($seminar->description), 120) }}
                            </p>

                            <div class="mt-auto border-gray-100">
                                <a href="{{ route('seminar.show', [$seminar->slug, Vinkla\Hashids\Facades\Hashids::encode($seminar->id)]) }}"
                                    class="inline-flex items-center text-xl font-medium text-gray-600 hover:text-gray-800 transition-colors duration-200">
                                    Selengkapnya >>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $seminars->appends(['search' => request('search')])->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-1">Tidak ada webinar ditemukan</h3>
                <p class="text-gray-500">Coba gunakan kata kunci pencarian yang lain.</p>
                @if (request()->filled('search'))
                    <a href="{{ route('past-webinar') }}"
                        class="mt-6 inline-block text-blue-600 hover:text-blue-800 font-medium">Clear Search</a>
                @endif
            </div>
        @endif
    </div>

    @php
        $settings = \App\Models\Setting::pluck('value', 'key')->toArray();
    @endphp
    <x-Home.footer :settings="$settings" />
</x-layouts.app>
