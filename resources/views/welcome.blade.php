@extends('layouts.guest')

@section('content')
    <!-- ========== HERO SECTION ========== -->
    <section class="w-full pt-6 md:pt-10 pb-12 md:pb-20 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-b from-blue-50/50 to-white -z-10"
            aria-hidden="true"></div>

        <div class="max-w-screen-xl mx-auto px-4 md:px-6">
            <div class="flex flex-col md:flex-row items-center justify-around mb-8 md:mb-20">
                <!-- Left Text -->
                @php
                    $heroSeminar = $seminars;
                @endphp
                <div class="md:w-1/2 space-y-4 md:space-y-6 z-10 pt-4 md:pt-8 text-center md:text-left">
                    <span
                        class="inline-flex items-center gap-1.5 bg-blue-600 text-white text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full md:hidden mb-10 mt-4">
                        HAFECS MEMPERSEMBAHKAN
                    </span>
                    <div class="space-y-2 md:space-y-4" id="main-heading">
                        <h1 class="text-2xl sm:text-3xl md:text-5xl lg:text-5xl font-bold bg-gradient-to-r from-blue-800 to-blue-400 bg-clip-text text-transparent leading-[1.15]">
                            ElevateClass
                            <span
                                class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-medium text-gray-700 tracking-normal mt-1 md:mt-2 block">{{ $heroSeminar ? $heroSeminar->title : 'Webinar Terbaik dari HAFECS' }} </span>
                        </h1>

                    </div>
                    <div class="relative max-w-xl mx-auto md:mx-0">
                        <p
                            class="text-base md:text-xl text-slate-700 leading-relaxed border-l-4 border-yellow-400 pl-4 text-left">
                            {{ $heroSeminar ? Str::limit($heroSeminar->description, 120) : 'Belajar langsung dari praktisi dan mentor berpengalaman melalui webinar interaktif yang relevan dengan dunia kerja dan pendidikan masa kini.' }}
                        </p>
                    </div>
                    <div
                        class="mt-4 md:mt-8 relative z-50 flex flex-col sm:flex-row gap-3 items-center justify-center md:justify-start">
                        <a href="{{ route('seminar.show', [$seminars->slug, Hashids::encode($seminars->id)]) }}"
                            rel="noopener noreferrer"
                            class="w-full sm:w-auto inline-flex tracking-wider items-center justify-center bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-bold text-sm py-3 px-7 rounded-full shadow-md transition-colors duration-200">
                            DAFTAR SEKARANG
                        </a>
                        <a href="#info"
                            class="w-full sm:w-auto inline-flex items-center justify-center bg-transparent border-2 border-blue-600 text-blue-700 hover:bg-blue-50 font-medium text-base py-3 px-6 rounded-full transition-colors duration-200">
                            Acara lainnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right Side: Webinar Card Component -->
                <x-Home.hero-webinar-card :seminar="$heroSeminar" />
            </div>

            <!-- Info Acara (tidak berubah) -->
            {{-- <div id="info"
                class="mt-8 md:mt-20 bg-slate-50/70 rounded-md sm:rounded-sm p-5 md:p-12 border border-slate-100 scroll-mt-24 max-w-screen-xl mx-auto">
                <div class="flex flex-col lg:flex-row items-stretch justify-between gap-5 md:gap-12">
                    <!-- Info List -->
                    <div class="w-full lg:w-1/3 flex flex-col">
                        <h3 class="text-xl md:text-3xl font-bold text-slate-800 mb-4">Info Acara</h3>
                        <div
                            class="bg-white rounded-xl md:rounded-2xl p-4 md:p-8 border border-slate-100 shadow-sm flex-1">
                            <ul class="space-y-4 text-slate-700 font-medium">
                                <li class="flex items-center gap-3">
                                    <div class="bg-blue-100 text-blue-600 rounded-full p-2 shrink-0" aria-hidden="true">
                                        <span class="text-lg">📅</span></div>
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase tracking-wider font-bold mb-0.5">
                                            Hari / Tanggal</p>
                                        <p class="text-sm font-semibold">Kamis, 21 Mei 2026</p>
                                    </div>
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="bg-blue-100 text-blue-600 rounded-full p-2 shrink-0"
                                        aria-hidden="true"><span class="text-lg">🕗</span></div>
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase tracking-wider font-bold mb-0.5">
                                            Waktu</p>
                                        <p class="text-sm font-semibold">10.00 – 11.30 WITA</p>
                                    </div>
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="bg-blue-100 text-blue-600 rounded-full p-2 shrink-0"
                                        aria-hidden="true"><span class="text-lg">💻</span></div>
                                    <div>
                                        <p class="text-xs text-slate-400 uppercase tracking-wider font-bold mb-0.5">
                                            Tempat</p>
                                        <p class="text-sm font-semibold">Zoom Meeting</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Unit Kompetensi -->
                    <div class="w-full lg:w-2/3 flex flex-col">
                        <h3 class="text-xl md:text-3xl font-bold text-slate-800 mb-4">Unit Kompetensi</h3>
                        <div
                            class="bg-blue-700 rounded-xl md:rounded-2xl p-5 md:p-10 shadow-xl flex-1 flex flex-col justify-center relative overflow-hidden text-white">
                            <div class="absolute top-0 right-0 -mt-16 -mr-16 w-64 h-64 bg-blue-600 rounded-full opacity-50 pointer-events-none"
                                aria-hidden="true"></div>
                            <div class="relative z-10 space-y-4">
                                <div class="flex items-center gap-3 bg-white/10 rounded-xl p-4 border border-white/20">
                                    <div
                                        class="bg-yellow-400 text-blue-900 font-bold w-9 h-9 rounded-full flex items-center justify-center shrink-0 text-sm">
                                        1</div>
                                    <p class="text-sm md:text-lg font-semibold">Menciptakan Dokumen dan Lembar Kerja
                                        Sederhana</p>
                                </div>
                                <div class="flex items-center gap-3 bg-white/10 rounded-xl p-4 border border-white/20">
                                    <div
                                        class="bg-yellow-400 text-blue-900 font-bold w-9 h-9 rounded-full flex items-center justify-center shrink-0 text-sm">
                                        2</div>
                                    <p class="text-sm md:text-lg font-semibold">Memproduksi Dokumen</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- ========== END HERO ========== -->

    <!-- ========== WARNING HOOK ========== -->

    <!-- ========== PAIN POINTS ========== -->


    <!-- ========== COUNTDOWN ========== -->

    <!-- ========== MENTOR / TRAINER ========== -->
    <section class="py-10 mt-4" id="mentor" aria-labelledby="trainer-heading">
        <div class="max-w-5xl mx-auto px-5 text-center py-4">
            <h2 id="trainer-heading" class="text-2xl sm:text-3xl font-bold text-gray-800 leading-tight">Para Trainer Kami</h2>
        </div>

        <div class="max-w-7xl mx-auto px-5 relative">
            <div>
                <button id="next-button" aria-label="Slide sebelumnya"
                    class="right-0 top-1/2 transform -translate-y-1/2 z-10 bg-blue-800 text-white p-2 rounded-full shadow-lg opacity-70 hover:opacity-100 transition-opacity focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="prev-button" aria-label="Slide berikutnya"
                    class="left-0 top-1/2 transform -translate-y-1/2 z-10 bg-blue-800 text-white p-2 rounded-full shadow-lg opacity-70 hover:opacity-100 transition-opacity focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            {{-- TRAINER SECTION --}}
            <div class="overflow-hidden" id="mentors-carousel" role="region" aria-label="Daftar Trainer">
                <div class="flex transition-transform duration-500 ease-in-out" id="mentors-slider">
                    @forelse ($trainers as $trainer)
                        <x-Home.trainer-card :trainer="$trainer" />
                    @empty
                        <div class="w-full text-center py-10">
                            <p class="text-gray-500 text-lg">Belum ada data trainer tersedia.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="flex justify-center mt-6" id="dots-container" role="tablist"
                aria-label="Navigasi slide trainer"></div>
        </div>
    </section>

    <!-- ========== DOKUMENTASI ========== -->
    <section class="py-16 bg-slate-50" id="dokumentasi" aria-labelledby="dokumentasi-heading">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span
                    class="inline-flex items-center px-4 py-1 rounded-full text-sm font-semibold bg-blue-600 text-white mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Dokumentasi Pelatihan
                </span>
                <h2 id="dokumentasi-heading" class="text-2xl sm:text-3xl font-bold text-blue-800 mb-4">Jejak
                    Pelatihan HAFECS</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-blue-400 mx-auto rounded-full"
                    aria-hidden="true"></div>
                <p class="mt-6 text-lg text-blue-700 max-w-3xl mx-auto">Dokumentasi pelatihan kami di berbagai daerah
                    di Indonesia</p>
            </div>

            <div class="relative overflow-hidden">
                <div id="sliderTrack" class="flex transition-transform duration-500 ease-in-out">
                    @forelse($documentations as $doc)
                        <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3 px-4">
                            <div class="relative group overflow-hidden rounded-2xl shadow-lg h-full">
                                <img src="{{ $doc->image ? asset('storage/' . $doc->image) : asset('./assets/img/galeri-11.jpg') }}"
                                    alt="{{ $doc->title }}"
                                    class="w-full h-64 sm:h-80 object-cover group-hover:scale-[1.02] transition duration-500"
                                    loading="lazy" decoding="async" width="400" height="320" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-6">
                                    <h3 class="text-white text-xl font-bold">{{ $doc->title }}</h3>
                                    <p class="text-blue-200 text-sm">{{ $doc->date }}</p>
                                    <p class="text-white/90 text-sm mt-2">{{ $doc->description }}</p>
                                    @if ($doc->link)
                                        <a href="{{ $doc->link }}" target="_blank" rel="noopener noreferrer"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg mt-4 inline-block text-center focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">Lihat
                                            Detail</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-full text-center text-gray-500 py-10">Belum ada jejak pelatihan.</div>
                    @endforelse
                </div>

                <button id="prevBtn" aria-label="Dokumentasi sebelumnya"
                    class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-blue-600 p-2 rounded-full shadow-lg z-10 ml-2 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="nextBtn" aria-label="Dokumentasi berikutnya"
                    class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-blue-600 p-2 rounded-full shadow-lg z-10 mr-2 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <div id="dotsContainer" class="flex justify-center mt-6 space-x-2" role="tablist"
                aria-label="Navigasi dokumentasi"></div>
        </div>
    </section>

    <!-- ========== MODAL DOKUMENTASI ========== -->
    <div id="modal" class="fixed inset-0 bg-black/60 flex items-center justify-center z-50 hidden" role="dialog"
        aria-modal="true" aria-labelledby="modalTitle">
        <div class="bg-white w-full max-w-2xl rounded-lg shadow-lg overflow-y-auto max-h-[90vh]">
            <img id="modalImage" src="" alt=""
                class="w-full object-cover rounded-t-xl max-h-[300px]" loading="lazy" />
            <p id="modalCaption" class="text-xs italic text-gray-500 px-4 py-2 bg-gray-50 border-t border-gray-200">
            </p>
            <div class="p-6 relative">
                <button onclick="closeModal()" aria-label="Tutup modal"
                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-800 text-2xl focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-400">&times;</button>
                <h3 id="modalTitle" class="text-2xl font-bold mb-2 text-blue-700"></h3>
                <div class="flex flex-wrap items-center text-sm text-gray-500 mb-4 space-x-4">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-blue-500 mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M5.121 17.804A8.966 8.966 0 0112 15c2.21 0 4.21.804 5.879 2.137M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span id="modalAuthor"></span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-500 mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 20h9M12 4h9M4 9h16M4 15h16" />
                        </svg>
                        <span id="modalEditor"></span>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-orange-500 mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />
                        </svg>
                        <span id="modalDate"></span>
                    </div>
                </div>
                <div id="modalDesc"
                    class="text-base text-justify text-gray-700 whitespace-pre-line max-h-[400px] pr-2"></div>
            </div>
        </div>
    </div>

    <!-- ========== SERTIFIKAT ========== -->
    <section class="py-16 bg-white relative overflow-hidden" aria-labelledby="sertifikat-heading">
        <div class="absolute top-0 left-0 w-full h-full opacity-20 pointer-events-none" aria-hidden="true">
            <div class="absolute top-10 left-10 w-32 h-32 rounded-full bg-blue-200"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 rounded-full bg-blue-300"></div>
            <div class="absolute top-1/2 left-1/4 w-24 h-24 rounded-full bg-yellow-200"></div>
        </div>

        <div class="max-w-6xl mx-auto px-5 text-center py-8 relative z-10">
            <div class="mb-4">
                <span
                    class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-bold shadow-lg border-2 border-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        aria-hidden="true">
                        <circle cx="12" cy="8" r="7"></circle>
                        <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                    </svg>
                    CERTIFICATE OF EXCELLENCE
                </span>
            </div>
            <div class="flex justify-center items-center gap-3 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-600" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <h2 id="sertifikat-heading" class="text-3xl sm:text-4xl font-bold text-blue-800 leading-tight">
                    <span class="text-blue-600">Sertifikat</span> Keahlian
                </h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-600" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
            </div>
            <p class="text-blue-700 max-w-2xl mx-auto mb-2 text-lg">Bukti resmi penyelesaian dan kompetensi yang telah
                diakui secara profesional</p>
            <div class="flex items-center justify-center gap-4 max-w-md mx-auto mb-10" aria-hidden="true">
                <div class="h-px bg-blue-300 flex-grow"></div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2">
                    <polygon
                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                    </polygon>
                </svg>
                <div class="h-px bg-blue-300 flex-grow"></div>
            </div>
        </div>

        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-6 md:gap-8">
                <div class="p-6 rounded-xl bg-white shadow-xl border border-blue-100">
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('./assets/img/sertifikat_depan.webp') }}"
                            alt="Contoh Sertifikat Penyelesaian LPK HAFECS bagian depan"
                            class="w-80 md:w-96 h-auto rounded-lg shadow-md" loading="lazy" decoding="async"
                            width="384" height="272" />
                    </div>
                    <div class="mt-6 text-center">
                        <span
                            class="inline-flex items-center gap-2 px-8 py-3 rounded-lg text-white bg-blue-600 font-bold text-base shadow-md">Sertifikat
                            Penyelesaian</span>
                    </div>
                </div>
                <div class="p-6 rounded-xl bg-white shadow-xl border border-blue-100">
                    <div class="overflow-hidden rounded-lg">
                        <img src="{{ asset('./assets/img/sertifikat_belakang.webp') }}"
                            alt="Contoh Sertifikat Kompetensi LPK HAFECS bagian belakang"
                            class="w-80 md:w-96 h-auto rounded-lg shadow-md" loading="lazy" decoding="async"
                            width="384" height="272" />
                    </div>
                    <div class="mt-6 text-center">
                        <span
                            class="inline-flex items-center gap-2 px-8 py-3 rounded-lg text-white bg-blue-600 font-bold text-base shadow-md">Sertifikat
                            Kompetensi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== FASILITAS ========== -->
    <section class="py-16 px-5 bg-slate-50 relative overflow-hidden" aria-labelledby="fasilitas-benefit-heading">
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-300 rounded-full opacity-5 -mr-20 -mt-20 animate-pulse pointer-events-none"
            aria-hidden="true"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-400 rounded-full opacity-5 -ml-20 -mb-20 animate-pulse pointer-events-none"
            style="animation-delay:1s" aria-hidden="true"></div>

        <div class="max-w-5xl mx-auto px-5 text-center py-8 relative z-10">
            <div class="mb-4 flex justify-center">
                <span
                    class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-2 rounded-full text-sm font-bold shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-pulse" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.09 6.845L12 20l-6.25-2.577a12.083 12.083 0 01.09-6.845L12 14z" />
                    </svg>
                    PREMIUM BENEFITS
                </span>
            </div>
            <h2 id="fasilitas-benefit-heading"
                class="text-2xl sm:text-3xl font-bold text-blue-800 leading-tight mb-4">Fasilitas yang Kamu
                Dapatkan</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-blue-400 mx-auto rounded-full mb-6"
                aria-hidden="true"></div>
            <p class="text-blue-700 text-lg max-w-2xl mx-auto">Tingkatkan skill dan portofoliomu dengan berbagai
                fasilitas premium yang kami sediakan</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto px-4">
            <!-- Benefit cards - simplified, all same structure -->
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-400 text-center group relative overflow-hidden">
                <div
                    class="bg-blue-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mt-2 text-blue-800">Live Class 2 Sesi</h3>
                <p class="text-blue-600 text-sm mt-1 opacity-0 group-hover:opacity-100 transition-all duration-500">
                    Belajar langsung bersama Trainer</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-500 text-center group relative overflow-hidden">
                <div
                    class="bg-blue-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mt-2 text-blue-800">Konsultasi Proyek via Chat</h3>
                <p class="text-blue-600 text-sm mt-1 opacity-0 group-hover:opacity-100 transition-all duration-500">
                    Bantuan langsung setiap saat</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-600 text-center group relative overflow-hidden">
                <div
                    class="bg-blue-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mt-2 text-blue-800">LMS (Learning Management System)</h3>
                <p class="text-blue-600 text-sm mt-1 opacity-0 group-hover:opacity-100 transition-all duration-500">
                    Akses materi secara terstruktur</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-400 text-center group relative overflow-hidden">
                <div
                    class="bg-blue-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mt-2 text-blue-800">Sertifikat Penyelesaian*</h3>
                <p class="text-blue-600 text-sm mt-1 opacity-0 group-hover:opacity-100 transition-all duration-500">
                    Pengakuan atas prestasi belajar</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-500 text-center group relative overflow-hidden">
                <div
                    class="bg-blue-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mt-2 text-blue-800">Rekaman Kelas &amp; Power Point</h3>
                <p class="text-blue-600 text-sm mt-1 opacity-0 group-hover:opacity-100 transition-all duration-500">
                    Akses materi kapan saja</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-600 text-center group relative overflow-hidden">
                <div
                    class="bg-blue-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mt-2 text-blue-800">4 Proyek Portofolio</h3>
                <p class="text-blue-600 text-sm mt-1 opacity-0 group-hover:opacity-100 transition-all duration-500">
                    Bangun profil profesional</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-t-4 border-blue-400 text-center group relative overflow-hidden">
                <div
                    class="bg-blue-600 w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4 text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mt-2 text-blue-800">Sertifikat Kompetensi 20 JP*</h3>
                <p class="text-blue-600 text-sm mt-1 opacity-0 group-hover:opacity-100 transition-all duration-500">
                    Bukti resmi kemampuan</p>
            </div>
        </div>

        <div class="text-center mt-10">
            <p
                class="text-sm text-blue-600 font-medium bg-white inline-block px-6 py-2.5 rounded-full shadow-lg border border-blue-100">
                *Syarat dan Ketentuan Berlaku</p>
        </div>
    </section>

    <!-- ========== REVIEW ALUMNI ========== -->
    <section class="w-full py-20 bg-white relative overflow-hidden" aria-labelledby="review-heading">
        <div class="max-w-6xl mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <span
                    class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold bg-blue-600 text-white shadow-md mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    Reviews
                </span>
                <h2 id="review-heading" class="text-2xl md:text-3xl font-bold mt-2 text-blue-800">
                    Review Alumni</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mt-4 rounded-full" aria-hidden="true"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <article
                    class="bg-white rounded-2xl shadow-md overflow-hidden transition-shadow duration-300 hover:shadow-lg">
                    <div class="h-20 bg-blue-600 relative" aria-hidden="true"></div>
                    <div class="relative px-6 pb-6 -mt-12">
                        <div class="flex justify-center">
                            <img src="{{ asset('./assets/img/pak_sugih.jpg') }}" alt="Foto SUGIH, S.Pd.,Gr.,S.S"
                                class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg"
                                loading="lazy" decoding="async" width="96" height="96" />
                        </div>
                        <div class="text-center mt-6">
                            <h3 class="text-xl font-bold text-gray-900">SUGIH, S.Pd.,Gr.,S.S</h3>
                            <p class="text-sm text-blue-600 font-medium">Guru SMAN 1 Balai Riam, Kab. Sukamara</p>
                            <blockquote class="mt-4 text-gray-700 italic text-base px-4">Setelah mengikuti pelatihan
                                LPK HAFECS, saya mendapatkan banyak wawasan baru, khususnya dalam literasi, numerasi,
                                dan pendekatan pembelajaran berbasis teknologi. Materinya aplikatif dan sangat membantu
                                meningkatkan kualitas pengajaran saya di kelas.</blockquote>
                        </div>
                    </div>
                </article>

                <!-- Testimonial 2 -->
                <article
                    class="bg-white rounded-2xl shadow-md overflow-hidden transition-shadow duration-300 hover:shadow-lg">
                    <div class="h-20 bg-blue-600 relative" aria-hidden="true"></div>
                    <div class="relative px-6 pb-6 -mt-12">
                        <div class="flex justify-center">
                            <img src="{{ asset('./assets/img/testimoni_1.png') }}" alt="Foto Isariani, S.Pd"
                                class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg"
                                loading="lazy" decoding="async" width="96" height="96" />
                        </div>
                        <div class="text-center mt-6">
                            <h3 class="text-xl font-bold text-gray-900">Isariani, S.Pd</h3>
                            <p class="text-sm text-blue-600 font-medium">TKN Pembina Jekan Jaya</p>
                            <blockquote class="mt-4 text-gray-700 italic text-base px-4">Dari hasil mengikuti pelatihan
                                LPK HAFECS, saya mendapatkan banyak ilmu, pelajaran, dan teman-teman baru. Saya belajar
                                berbagai permainan edukatif yang memanfaatkan potensi diri. Ilmu-ilmu baru ini sangat
                                bermanfaat.</blockquote>
                        </div>
                    </div>
                </article>

                <!-- Testimonial 3 -->
                <article
                    class="bg-white rounded-2xl shadow-md overflow-hidden transition-shadow duration-300 hover:shadow-lg">
                    <div class="h-20 bg-blue-600 relative" aria-hidden="true"></div>
                    <div class="relative px-6 pb-6 -mt-12">
                        <div class="flex justify-center">
                            <img src="{{ asset('./assets/img/testimoni_2.png') }}" alt="Foto Darmawati, S.Pd"
                                class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-lg"
                                loading="lazy" decoding="async" width="96" height="96" />
                        </div>
                        <div class="text-center mt-6">
                            <h3 class="text-xl font-bold text-gray-900">Darmawati, S.Pd</h3>
                            <p class="text-sm text-blue-600 font-medium">Elementary School Teacher</p>
                            <blockquote class="mt-4 text-gray-700 italic text-base px-4">Setelah mengikuti program LPK
                                HAFECS, saya memiliki lebih banyak teknik dan strategi untuk membuat kelas saya lebih
                                interaktif. Saya juga mendapatkan jaringan profesional yang luas dari sesama pendidik di
                                seluruh Indonesia.</blockquote>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- ========== FAQ ========== -->
    <section class="w-full px-5 py-16 bg-slate-50 text-gray-900" id="faq" aria-labelledby="faq-heading">
        <div class="max-w-5xl mx-auto px-5 text-center py-12">
            <div class="mb-2">
                <span
                    class="inline-flex items-center gap-2 bg-blue-500 text-white px-4 py-1 rounded-full text-xs font-semibold shadow-sm">FAQ</span>
            </div>
            <h2 id="faq-heading" class="text-2xl sm:text-3xl font-bold text-blue-800 leading-tight">Pertanyaan
                Umum</h2>
        </div>

        <div class="max-w-5xl mx-auto space-y-6">
            <div class="grid gap-6">
                <div class="faq-items bg-white p-6 border border-gray-200 rounded-xl cursor-pointer shadow-md transition duration-300 hover:bg-blue-100"
                    role="button" tabindex="0" aria-expanded="false">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Bagaimana cara mendaftar Webinar
                            HAFECS?</h3>
                        <span class="faq-icons text-xl transform transition-transform duration-300 ml-4"
                            aria-hidden="true">▼</span>
                    </div>
                    <div class="faq-answers hidden text-sm text-gray-700 mt-3">
                        <p>Anda dapat mendaftar dengan mengeklik tautan <a href="https://www.s.id/webinarhafecs"
                                target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 underline">s.id/webinarhafecs</a>. Tautan tersebut akan langsung
                            mengarahkan Anda ke laman pendaftaran kami.</p>
                    </div>
                </div>

                <div class="faq-items bg-white p-6 border border-gray-200 rounded-xl cursor-pointer shadow-md transition duration-300 hover:bg-blue-100"
                    role="button" tabindex="0" aria-expanded="false">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Apakah boleh mengadakan pelatihan
                            secara langsung di sekolah kami?</h3>
                        <span class="faq-icons text-xl transform transition-transform duration-300 ml-4"
                            aria-hidden="true">▼</span>
                    </div>
                    <div class="faq-answers hidden text-sm text-gray-700 mt-3">
                        <p>Jika ingin mengadakan pelatihan di sekolah Anda, silahkan menghubungi kami di WhatsApp <a
                                href="https://wa.me/6285216164164" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 underline">+62 852-1616-4164</a>.</p>
                    </div>
                </div>

                <div class="faq-items bg-white p-6 border border-gray-200 rounded-xl cursor-pointer shadow-md transition duration-300 hover:bg-blue-100"
                    role="button" tabindex="0" aria-expanded="false">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Berapa JP yang kami dapatkan?</h3>
                        <span class="faq-icons text-xl transform transition-transform duration-300 ml-4"
                            aria-hidden="true">▼</span>
                    </div>
                    <div class="faq-answers hidden text-sm text-gray-700 mt-3">
                        <p>Program pelatihan LPK HAFECS akan mendapatkan 20 JP.</p>
                    </div>
                </div>

                <div class="faq-items bg-white p-6 border border-gray-200 rounded-xl cursor-pointer shadow-md transition duration-300 hover:bg-blue-100"
                    role="button" tabindex="0" aria-expanded="false">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Apakah HAFECS memiliki produk lain
                            selain program pelatihan?</h3>
                        <span class="faq-icons text-xl transform transition-transform duration-300 ml-4"
                            aria-hidden="true">▼</span>
                    </div>
                    <div class="faq-answers hidden text-sm text-gray-700 mt-3">
                        <p>Kami memiliki produk lain seperti modul, Buku, dan In House Training. Informasi lebih lanjut
                            silahkan kunjungi <a href="https://hafecs.id/" target="_blank" rel="noopener noreferrer"
                                class="text-blue-600 underline">hafecs.id</a>.</p>
                    </div>
                </div>

                <div class="faq-items bg-white p-6 border border-gray-200 rounded-xl cursor-pointer shadow-md transition duration-300 hover:bg-blue-100"
                    role="button" tabindex="0" aria-expanded="false">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-800">Contact Person HAFECS</h3>
                        <span class="faq-icons text-xl transform transition-transform duration-300 ml-4"
                            aria-hidden="true">▼</span>
                    </div>
                    <div class="faq-answers hidden text-sm text-gray-700 mt-3">
                        <p>Anda bisa menghubungi kami melalui WhatsApp <a href="https://wa.me/6282366447772"
                                target="_blank" rel="noopener noreferrer" class="text-blue-600 underline">+62
                                823-6644-7772</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========== ABOUT HAFECS ========== -->
    <section class="py-16 bg-white relative overflow-hidden" aria-labelledby="about-heading">
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-80 h-80 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none"
            aria-hidden="true"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none"
            aria-hidden="true"></div>

        <div class="container max-w-6xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative group">
                    <div class="relative rounded-2xl overflow-hidden shadow-xl aspect-video">
                        <img src="{{ asset('assets/img/about-us.webp') }}" alt="Tim HAFECS bersama para pendidik"
                            class="w-full h-full object-cover" loading="lazy" decoding="async" width="600"
                            height="338" />
                    </div>
                </div>

                <div class="space-y-6">
                    <div
                        class="inline-block px-4 py-1.5 rounded-full bg-blue-100 text-blue-700 font-semibold text-sm tracking-wide mb-2">
                        TENTANG KAMI</div>
                    <h2 id="about-heading" class="text-2xl lg:text-3xl font-bold text-gray-800 leading-tight">
                        Apa itu HAFECS</h2>
                    <div class="prose prose-lg text-gray-600 text-justify">
                        <p><strong>Highly Functioning Education Consulting Services (HAFECS)</strong> adalah lembaga
                            yang didedikasikan untuk memajukan kualitas pendidikan di Indonesia melalui pengembangan
                            kompetensi guru dan tenaga pendidik.</p>
                        <p>Kami percaya bahwa kunci transformasi pendidikan terletak pada kualitas pengajaran. Oleh
                            karena itu, HAFECS hadir dengan metode pelatihan inovatif yang menggabungkan teori pedagogi
                            modern dengan praktik terbaik di lapangan.</p>
                    </div>
                    <div class="pt-4">
                        <a href="https://hafecs.id/" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-800 transition-colors">Pelajari
                            Lebih Lanjut →</a>
                    </div>
                    <div class="grid grid-cols-3 gap-4 pt-6 mt-6 border-t border-gray-100">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">300K+</div>
                            <div class="text-xs text-gray-500 font-medium mt-1">PENDIDIK</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">450+</div>
                            <div class="text-xs text-gray-500 font-medium mt-1">KOTA</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-blue-600">87%</div>
                            <div class="text-xs text-gray-500 font-medium mt-1">KEPUASAN</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <!-- ========== SCRIPTS ========== -->

    <!-- Countdown Timer -->
    <script>
        (function() {
            var targetDate = new Date("2026-05-21T10:00:00+07:00").getTime();

            function pad(n) {
                return n < 10 ? "0" + n : "" + n;
            }

            function updateCountdown() {
                var diff = targetDate - Date.now();
                if (diff <= 0) {
                    ["cd-days", "cd-hours", "cd-minutes", "cd-seconds"].forEach(function(id) {
                        document.getElementById(id).textContent = "00";
                    });
                    return;
                }
                document.getElementById("cd-days").textContent = pad(Math.floor(diff / 86400000));
                document.getElementById("cd-hours").textContent = pad(Math.floor((diff % 86400000) / 3600000));
                document.getElementById("cd-minutes").textContent = pad(Math.floor((diff % 3600000) / 60000));
                document.getElementById("cd-seconds").textContent = pad(Math.floor((diff % 60000) / 1000));
            }
            updateCountdown();
            setInterval(updateCountdown, 1000);
        })();
    </script>

    <!-- Modal Data & Logic -->
    <script>
        var modalData = [{
            title: "Pelatihan Koding dan Kecerdasan Artifisial untuk Guru di Barito Kuala",
            date: "28 Juli - 1 Agustus 2025",
            author: "Dwipa Ranum Sekar Sari",
            editor: "Nur Kholipah, S.Pd",
            image: "./assets/img/KKABatola.png",
            caption: "Sebanyak 40 guru sekolah dasar dari berbagai sekolah di Kabupaten Barito Kuala antusias mengikuti Pelatihan KKA di GIBS, Barito Kuala, 14 Juli 2025.",
            desc: `Sesuai Keputusan Direktur Jenderal Pendidikan Anak Usia Dini, Pendidikan Dasar, dan Pendidikan Menengah nomor 4806/C/HK.03.01/2025, Yayasan Hasnur Centre melalui unit HAFECS bekerja sama dengan Dinas Pendidikan Kabupaten Barito Kuala menyelenggarakan Pelatihan Koding dan Kecerdasan Artifisial (KKA) bagi guru SD, SMP, dan SMA/K di GIBS, Barito Kuala.\n\nAcara pembukaan diawali dengan sambutan Ibu Nina Richi Tresy Putri, Sekretaris Umum Yayasan Hasnur Centre, yang menekankan pentingnya penggunaan teknologi secara bijak untuk mendukung pendidikan.\n\nPelatihan jenjang pendidikan dasar diikuti oleh 40 guru SD pada 14–18 Juli 2025, dipandu oleh Ibu Nur Kholipah, S.Pd., dan Ibu Farida Hayati, S.Pd. Sementara itu, pelatihan untuk jenjang menengah diikuti oleh 22 guru SMP dan SMA/K pada 28 Juli–1 Agustus 2025.\n\nMateri pelatihan untuk guru SD mencakup berpikir komputasional, konsep dasar kecerdasan artifisial, serta pedagogik koding. Untuk guru SMP/SMA, materi meliputi pemrograman dasar Python, berpikir komputasional, dan pemanfaatan AI untuk pembelajaran kreatif.`
        }];

        function formatDesc(desc) {
            return desc.replace(/\n/g, "<br>");
        }

        function openModal(index) {
            var data = modalData[index];
            document.getElementById("modalTitle").textContent = data.title;
            document.getElementById("modalAuthor").textContent = "Penulis: " + data.author;
            document.getElementById("modalEditor").textContent = "Editor: " + data.editor;
            document.getElementById("modalDate").textContent = data.date;
            document.getElementById("modalDesc").innerHTML = formatDesc(data.desc);
            document.getElementById("modalImage").src = data.image;
            document.getElementById("modalImage").alt = data.title;
            document.getElementById("modalCaption").textContent = data.caption || "";
            document.getElementById("modal").classList.remove("hidden");
            document.body.style.overflow = "hidden";
        }

        function closeModal() {
            document.getElementById("modal").classList.add("hidden");
            document.body.style.overflow = "";
        }

        // Close modal on backdrop click
        document.getElementById("modal").addEventListener("click", function(e) {
            if (e.target === this) closeModal();
        });

        // Close modal on Escape key
        document.addEventListener("keydown", function(e) {
            if (e.key === "Escape") closeModal();
        });
    </script>

    <!-- Documentation Slider -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var sliderTrack = document.getElementById("sliderTrack");
            var slides = sliderTrack.querySelectorAll(":scope > div");
            var prevBtn = document.getElementById("prevBtn");
            var nextBtn = document.getElementById("nextBtn");
            var dotsContainer = document.getElementById("dotsContainer");

            var currentIndex = 0;
            var slideCount = slides.length;
            var slidesToShow = 1;

            function updateSlidesToShow() {
                slidesToShow = window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1;
                createDots();
                updateSlider();
            }

            function createDots() {
                dotsContainer.innerHTML = "";
                var count = Math.ceil(slideCount / slidesToShow);
                for (var i = 0; i < count; i++) {
                    (function(idx) {
                        var dot = document.createElement("button");
                        dot.className = "w-3 h-3 rounded-full bg-blue-300 hover:bg-blue-600 transition-colors";
                        dot.setAttribute("aria-label", "Slide " + (idx + 1));
                        dot.addEventListener("click", function() {
                            currentIndex = idx * slidesToShow;
                            updateSlider();
                        });
                        dotsContainer.appendChild(dot);
                    })(i);
                }
                updateDots();
            }

            function updateDots() {
                var dots = dotsContainer.querySelectorAll("button");
                var active = Math.floor(currentIndex / slidesToShow);
                dots.forEach(function(dot, i) {
                    dot.classList.toggle("bg-blue-600", i === active);
                    dot.classList.toggle("bg-blue-300", i !== active);
                });
            }

            function updateSlider() {
                var slideWidth = slides[0].offsetWidth;
                sliderTrack.style.transform = "translateX(-" + (currentIndex * slideWidth) + "px)";
                updateDots();
            }

            nextBtn.addEventListener("click", function() {
                var max = slideCount - slidesToShow;
                currentIndex = currentIndex >= max ? 0 : currentIndex + slidesToShow;
                updateSlider();
            });

            prevBtn.addEventListener("click", function() {
                var max = slideCount - slidesToShow;
                currentIndex = currentIndex <= 0 ? max : currentIndex - slidesToShow;
                updateSlider();
            });

            updateSlidesToShow();
            window.addEventListener("resize", updateSlidesToShow);
        });
    </script>

    <!-- Navbar & FAQ & Misc -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mobile menu
            var menuToggle = document.getElementById("menu-toggle");
            var mobileMenu = document.getElementById("mobile-menu");
            menuToggle.addEventListener("click", function() {
                var expanded = mobileMenu.classList.toggle("hidden") === false;
                menuToggle.setAttribute("aria-expanded", expanded);
                this.classList.toggle("rotate-90");
            });

            // Sticky nav shadow
            window.addEventListener("scroll", function() {
                document.querySelector("nav").classList.toggle("shadow-lg", window.scrollY > 20);
            }, {
                passive: true
            });

            // FAQ accordion
            var faqItems = document.querySelectorAll(".faq-items");
            faqItems.forEach(function(item) {
                function toggle() {
                    var answer = item.querySelector(".faq-answers");
                    var icon = item.querySelector(".faq-icons");
                    var isOpen = !answer.classList.contains("hidden");

                    // Close all
                    faqItems.forEach(function(i) {
                        i.querySelector(".faq-answers").classList.add("hidden");
                        i.querySelector(".faq-icons").classList.remove("rotate-180");
                        i.setAttribute("aria-expanded", "false");
                    });

                    if (!isOpen) {
                        answer.classList.remove("hidden");
                        icon.classList.add("rotate-180");
                        item.setAttribute("aria-expanded", "true");
                    }
                }

                item.addEventListener("click", toggle);
                item.addEventListener("keydown", function(e) {
                    if (e.key === "Enter" || e.key === " ") {
                        e.preventDefault();
                        toggle();
                    }
                });
            });

            // WhatsApp copy feedback
            window.copyPromoCode = function() {
                navigator.clipboard.writeText("EARLYBIRD49%").then(function() {
                    var fb = document.createElement("div");
                    fb.textContent = "Promo Code Copied! 🎉";
                    Object.assign(fb.style, {
                        position: "fixed",
                        bottom: "20px",
                        right: "20px",
                        padding: "10px 16px",
                        backgroundColor: "#10B981",
                        color: "white",
                        borderRadius: "8px",
                        fontSize: "14px",
                        fontWeight: "bold",
                        zIndex: "9999",
                        boxShadow: "0 4px 12px rgba(0,0,0,0.15)",
                        transform: "translateY(20px)",
                        opacity: "0",
                        transition: "all 0.3s ease"
                    });
                    document.body.appendChild(fb);
                    setTimeout(function() {
                        fb.style.transform = "translateY(0)";
                        fb.style.opacity = "1";
                        setTimeout(function() {
                            fb.style.transform = "translateY(-10px)";
                            fb.style.opacity = "0";
                            setTimeout(function() {
                                document.body.removeChild(fb);
                            }, 300);
                        }, 2000);
                    }, 10);
                });
            };
        });
    </script>

    <!-- Trainer Carousel -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var slider = document.getElementById("mentors-slider");
            var prevBtn = document.getElementById("prev-button");
            var nextBtn = document.getElementById("next-button");
            var carousel = document.getElementById("mentors-carousel");
            var dotsEl = document.getElementById("dots-container");
            var slides = slider.querySelectorAll(":scope > div");
            var slideCount = slides.length;
            var currentIndex = 0,
                slidesToShow = 4,
                slideWidth = 0,
                autoplayId = null,
                isMobile = false;
            var startX, diffX, isDragging = false;

            function updateSlidesToShow() {
                var w = window.innerWidth;
                isMobile = w < 640;
                slidesToShow = w >= 1024 ? 4 : w >= 768 ? 3 : w >= 640 ? 2 : 1;
                updateSlideWidth();
                goToSlide(0);
                createDots();
                manageAutoplay();
            }

            function updateSlideWidth() {
                slideWidth = carousel.clientWidth / slidesToShow;
                slides.forEach(function(s) {
                    s.style.width = slideWidth + "px";
                });
            }

            function goToSlide(idx) {
                currentIndex = Math.max(0, Math.min(idx, slideCount - slidesToShow));
                slider.style.transform = "translateX(-" + (currentIndex * slideWidth) + "px)";
                slider.style.transition = "transform 0.3s ease";
                updateDots();
            }

            function createDots() {
                dotsEl.innerHTML = "";
                var count = Math.ceil(slideCount / slidesToShow);
                for (var i = 0; i < count; i++) {
                    (function(idx) {
                        var dot = document.createElement("button");
                        dot.className = "h-2 w-2 rounded-full bg-gray-300 mx-1 transition-colors";
                        dot.setAttribute("aria-label", "Trainer slide " + (idx + 1));
                        dot.addEventListener("click", function() {
                            goToSlide(idx * slidesToShow);
                        });
                        dotsEl.appendChild(dot);
                    })(i);
                }
                updateDots();
            }

            function updateDots() {
                var dots = dotsEl.querySelectorAll("button");
                var active = Math.floor(currentIndex / slidesToShow);
                dots.forEach(function(d, i) {
                    d.classList.toggle("bg-blue-800", i === active);
                    d.classList.toggle("bg-gray-300", i !== active);
                });
            }

            function manageAutoplay() {
                if (autoplayId) {
                    clearInterval(autoplayId);
                    autoplayId = null;
                }
                if (!isMobile) autoplayId = setInterval(function() {
                    goToSlide(currentIndex + slidesToShow >= slideCount ? 0 : currentIndex + slidesToShow);
                }, 5000);
            }

            nextBtn.addEventListener("click", function() {
                goToSlide(currentIndex + slidesToShow >= slideCount ? 0 : currentIndex + slidesToShow);
            });
            prevBtn.addEventListener("click", function() {
                goToSlide(currentIndex - slidesToShow < 0 ? slideCount - slidesToShow : currentIndex -
                    slidesToShow);
            });

            carousel.addEventListener("mouseenter", function() {
                if (autoplayId) {
                    clearInterval(autoplayId);
                    autoplayId = null;
                }
            });
            carousel.addEventListener("mouseleave", manageAutoplay);

            // Touch
            slider.addEventListener("touchstart", function(e) {
                startX = e.touches[0].clientX;
                isDragging = true;
                slider.style.transition = "";
            }, {
                passive: true
            });
            slider.addEventListener("touchmove", function(e) {
                if (!isDragging) return;
                diffX = e.touches[0].clientX - startX;
                slider.style.transform = "translateX(" + (-currentIndex * slideWidth + diffX) + "px)";
            }, {
                passive: true
            });
            slider.addEventListener("touchend", function() {
                isDragging = false;
                slider.style.transition = "transform 0.3s ease";
                if (diffX < -50) goToSlide(currentIndex + slidesToShow >= slideCount ? 0 : currentIndex +
                    slidesToShow);
                else if (diffX > 50) goToSlide(currentIndex - slidesToShow < 0 ? slideCount - slidesToShow :
                    currentIndex - slidesToShow);
                else goToSlide(currentIndex);
                diffX = 0;
            });

            updateSlidesToShow();
            window.addEventListener("resize", updateSlidesToShow);
        });
    </script>

    <!-- FontAwesome (deferred) -->
    </script> -->
@endpush