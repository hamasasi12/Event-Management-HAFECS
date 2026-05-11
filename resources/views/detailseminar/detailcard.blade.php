@extends('layouts.guest')

@section('content')
    <div x-data="{ showShareModal: false }">
        <div class="bg-blue-50 min-h-screen pb-32">
        <!-- Header banner background -->
        <div class="w-full h-64 bg-blue-900 absolute top-0 left-0 -z-10"></div>

        <div class="container mx-auto px-4 pt-20 lg:pt-30 max-w-6xl relative z-10">
            <div id="detail-two-col" class="flex flex-col lg:flex-row lg:items-start gap-8">

                <!-- LEFT SECTION -->
                <div class="w-full lg:w-1/2">
                    <!-- Title -->
                    <h1
                        class="text-3xl md:text-4xl font-extrabold text-white lg:text-gray-800 mb-8 drop-shadow-md lg:drop-shadow-none leading-tight">
                        {{ $seminar->title }}
                    </h1>

                    <!-- Trainer Card -->
                    <div class="p-5 pt-0 flex items-center gap-4 mt-6 lg:mt-0">
                        @if ($seminar->trainer)
                            <img src="{{ $seminar->trainer->image ? asset('storage/' . $seminar->trainer->image) : asset('images/icons/blankProfile.png') }}"
                                alt="{{ $seminar->trainer->name }}"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover border border-gray-200">
                        @else
                            <img src="{{ asset('images/icons/blankProfile.png') }}" alt="Trainer"
                                class="w-10 h-10 sm:w-12 sm:h-12 rounded-full object-cover border border-gray-200">
                        @endif
                        <div class="flex flex-col">
                            {{-- <span class="text-md text-gray-900 font-medium">Pemateri</span> --}}
                            <span class="text-md text-gray-900">
                                @if ($seminar->trainer)
                                    {{ $seminar->trainer->name }}
                                @elseif ($seminar->custom_trainer_name)
                                    {{ $seminar->custom_trainer_name }}
                                @else
                                    No Data
                                @endif
                            </span>
                            <span class="text-sm text-gray-600 font-medium">
                                {{ $seminar->trainer && $seminar->trainer->title ? $seminar->trainer->title : 'Trainer' }}
                            </span>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div class="p-6 sm:p-8 sm:pt-2">
                        <div class="flex items-end justify-between gap-4">
                            <h2 class="text-2xl font-bold text-gray-900">Details</h2>
                        </div>
                        <div class="h-0.5 w-20 bg-blue-600 rounded-full"></div>

                        <div class="mt-6 space-y-5 text-sm leading-relaxed text-gray-700">
                            <p class="font-normal text-gray-700">
                                {!! $seminar->details !!}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SECTION (Sidebar) -->
                <div id="detail-right-col" class="w-full lg:w-1/2 mt-8 lg:mt-0">
                    <div class="flex flex-col gap-4">
                        <!-- Image stays sticky on top -->
                        <div id="detail-right-image p-4"">
                            <div class="relative w-full aspect-video rounded-2xl overflow-hidden bg-gray-100">
                                @if ($seminar->image_url)
                                    <img src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('images/admin/default_seminar.jpg') }}" alt="{{ $seminar->title }}"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                        </div>

                        <!-- Event Details (this part follows scroll + stops before recommendations) -->
                        <div id="detail-right-details"
                            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                            <div class="p-4 flex items-start gap-4">
                                <div class="w-11 h-11 text-blue-600 flex items-center justify-center shrink-0">
                                    <img src="{{ asset('images/icons/calendar.webp') }}" alt="Calendar Icon"
                                        class="w-8 h-8">
                                </div>
                                <div class="min-w-0">
                                    <p class="text-sm font-medium text-gray-700">
                                        {{ $seminar->start_time->translatedFormat('l, d F') }} ·
                                        {{ $seminar->start_time->format('H:i') }} -
                                        {{ $seminar->end_time->format('H:i') }} WIB</p>
                                    <p class="text-sm text-gray-600 mt-0.5">🔥 Amankan kursi Anda sekarang! Sisa kuota
                                        terbatas.</p>
                                </div>
                            </div>

                            <div class="h-px bg-gray-100"></div>

                            <div class="p-4 flex items-start gap-4">
                                <div class="w-11 h-11 text-indigo-600 flex items-center justify-center shrink-0">
                                    <img src="{{ asset('images/icons/video.webp') }}" alt="Location Icon" class="w-8 h-8">
                                </div>
                                <div class="min-w-0">
                                    <p class="text-sm font-medium text-gray-700">Acara online</p>
                                    <p class="text-sm text-gray-600  mt-0.5">Link tersedia untuk peserta</p>
                                </div>
                            </div>
                        </div>

                        <!-- Attendees Section -->
                        <div class="mt-6 p-5">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                                    {{-- <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg> --}}
                                    <img src="{{ asset('images/icons/people-1-2.webp') }}" alt="People Icon"
                                        class="w-7 h-7">
                                    Peserta
                                    <span
                                        class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full bg-gray-100 text-gray-700 text-sm font-bold">124</span>
                                </h2>
                                <a href="#" class="text-sm font-bold text-indigo-600 hover:text-indigo-700">View
                                    all</a>
                            </div>

                            <div class="flex gap-4 overflow-x-auto pb-2 -mx-1 px-1">
                                @php
                                    $attendees = [
                                        [
                                            'name' => 'Sarah Johnson',
                                            'img' => 'https://i.pravatar.cc/150?img=1',
                                            'badge' => 'Host',
                                            'role' => 'Assistant organizer',
                                        ],
                                        [
                                            'name' => 'Michael Chen',
                                            'img' => 'https://i.pravatar.cc/150?img=11',
                                            'badge' => 'Host',
                                            'role' => 'Co-organizer',
                                        ],
                                        [
                                            'name' => 'Emma Wilson',
                                            'img' => 'https://i.pravatar.cc/150?img=5',
                                            'badge' => 'Host',
                                            'role' => 'Assistant organizer',
                                        ],
                                    ];
                                    $moreAttendees = [
                                        'https://i.pravatar.cc/150?img=12',
                                        'https://i.pravatar.cc/150?img=20',
                                    ];
                                    $moreCount = 2;
                                @endphp

                                @foreach ($attendees as $attendee)
                                    <div
                                        class="shrink-0 w-30 bg-white rounded-2xl border border-gray-100 px-3 py-4 text-center transition duration-300 shadow-sm hover:shadow-md">
                                        <div class="relative w-fit mx-auto">
                                            <img src="{{ $attendee['img'] }}" alt="{{ $attendee['name'] }}"
                                                class="w-16 h-16 rounded-full object-cover shadow-sm mx-auto">
                                        </div>
                                        <p class="mt-2 font-medium text-gray-900 text-xs leading-snug">
                                            {{ $attendee['name'] }}</p>
                                        {{-- <p class="mt-1 text-xs text-gray-500 font-medium">{{ $attendee['role'] }}</p> --}}
                                    </div>
                                @endforeach

                                <!-- +More card -->
                                <div
                                    class="shrink-0 w-30 bg-gray-50/90 rounded-2xl border border-gray-100 px-3 py-2 text-center transition duration-300 shadow-sm hover:shadow-md flex flex-col items-center justify-center">
                                    <div class="flex items-center justify-center -space-x-3 mb-3">
                                        @foreach ($moreAttendees as $avatar)
                                            <img src="{{ $avatar }}"
                                                class="w-9 h-9 rounded-full object-cover border-2 border-white shadow-sm">
                                        @endforeach
                                    </div>
                                    <p class="text-sm font-bold text-gray-700">+{{ $moreCount }} more</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- You may also like Section (Full width below the two-column layout) -->
            <div class="mt-16 mb-8">
                <div class="flex items-center justify-between gap-4 mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Kamu mungkin juga suka</h2>
                    <a href="{{ route('welcome') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-700">View all</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($recommendations as $item)
                        <a href="{{ route('seminar.show', ['slug' => $item->slug, 'hashid' => $item->hashid]) }}" class="group block h-full">
                            <div
                                class="rounded-3xl overflow-hidden bg-white border border-gray-100 shadow-sm group-hover:shadow-md transition h-full flex flex-col">
                                <div class="relative w-full aspect-[16/9] bg-gray-100 shrink-0">
                                    @if ($item->image_url)
                                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                    @else
                                        <img src="{{ asset('images/admin/default_seminar.jpg') }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="p-6 flex flex-col grow">
                                    <h3 class="text-lg sm:text-xl font-extrabold text-gray-900 leading-snug line-clamp-2">
                                        {{ $item->title }}</h3>
                                    <div
                                        class="mt-2 text-gray-600 text-sm font-medium flex flex-wrap items-center gap-x-2 gap-y-1">
                                        <span>{{ $item->start_time ? $item->start_time->translatedFormat('D, j M') : '-' }}</span>
                                        <span class="text-gray-300">·</span>
                                        <span>{{ $item->start_time ? $item->start_time->format('H:i') . ' WIB' : '-' }}</span>
                                        <span
                                            class="px-2.5 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-bold">{{ $item->platform ?? 'Online' }}</span>
                                    </div>
                                    <div class="mt-auto pt-4">
                                        <p class="text-sm text-gray-500 line-clamp-1">by {{ $item->trainer ? $item->trainer->name : ($item->custom_trainer_name ?: 'HAFECS') }}</p>
                                        <p class="mt-1 text-sm text-gray-500">{{ $item->location ?? 'Online' }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-gray-500 col-span-full text-center py-8">Belum ada rekomendasi seminar lainnya saat ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Action Bar (Mobile & Desktop) -->
    <div
        class="fixed bottom-5 left-1/2 -translate-x-1/2 w-3/4 bg-white backdrop-blur-md border-t shadow-xl border-gray-200 p-2 sm:p-4 z-50 rounded-full">
        <div class="container mx-auto max-w-6xl flex items-center justify-between gap-4">
            <div class="hidden sm:block ml-4">
                <p class="text-sm text-gray-500 font-medium uppercase tracking-wider">
                    {{ $seminar->start_time->translatedFormat('l, d F') }} ·
                    {{ $seminar->start_time->format('H:i') }} -
                    {{ $seminar->end_time->format('H:i') }} WIB
                </p>
                <p class="text-2xl font-black text-gray-800 tracking-tight">
                    {{ Str::limit($seminar->title, 60) }}
                </p>
            </div>

            <div class="flex items-center gap-2 grow sm:grow-0 sm:min-w-[200px]">
                <button @click="showShareModal = true" title="Bagikan Seminar" class="flex-shrink-0 flex items-center justify-center w-14 h-14 bg-white border border-gray-200 text-gray-700 rounded-full shadow-sm hover:bg-gray-50 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                    </svg>
                </button>
                <button @click="$dispatch('open-pendaftaran-modal')"
                    class="w-full flex items-center justify-center gap-2 bg-gray-800 shadow-md text-white font-bold py-4 px-8 rounded-full transition-all hover:bg-gray-700">
                    Daftar Sekarang
                </button>
            </div>
        </div>
    </div>

        <!-- Share Modal -->
        <div x-show="showShareModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[100] flex items-center justify-center bg-black/40 backdrop-blur-sm" style="display: none;"
            aria-labelledby="modal-title" role="dialog" aria-modal="true">
            
            <!-- Backdrop -->
            <div class="fixed inset-0" @click="showShareModal = false"></div>

            <div x-show="showShareModal"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 overflow-hidden transform">
                
                <!-- Close button -->
                <button @click="showShareModal = false"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none transition-colors z-20">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="px-8 py-10 relative z-10 bg-white">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-extrabold text-gray-700" id="modal-title">Bagikan Seminar</h2>
                    </div>

                    <div class="space-y-4">
                        <!-- Copy Link -->
                        <button x-data="{ copied: false }" @click="navigator.clipboard.writeText(window.location.href); copied = true; setTimeout(() => copied = false, 2000)"
                            class="flex items-center justify-center w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-bold text-gray-700 hover:bg-gray-50 transition-colors">
                            <svg x-show="!copied" class="h-5 w-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                            </svg>
                            <svg x-show="copied" style="display: none;" class="h-5 w-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <span x-text="copied ? 'Link Tersalin!' : 'Copy Link'"></span>
                        </button>

                        <!-- Facebook -->
                        <a :href="'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href)" target="_blank"
                            class="flex items-center justify-center w-full px-4 py-3 border border-transparent rounded-xl shadow-sm bg-[#1877F2] text-sm font-bold text-white hover:bg-[#166FE5] transition-colors">
                            <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                            Bagikan ke Facebook
                        </a>

                        <!-- LinkedIn -->
                        <a :href="'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(window.location.href)" target="_blank"
                            class="flex items-center justify-center w-full px-4 py-3 border border-transparent rounded-xl shadow-sm bg-[#0A66C2] text-sm font-bold text-white hover:bg-[#004182] transition-colors">
                            <svg class="h-5 w-5 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            Bagikan ke LinkedIn
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Render Pendaftaran Seminar Modal Component -->
        @livewire('pendaftaran-seminar', ['hashid' => \Vinkla\Hashids\Facades\Hashids::encode($seminar->id)])
    </div>
@endsection