<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAFECS - Seminar Nasional 2025</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <style>
        body {
            background-color: #FDFDFD;
        }

        .hero-section {
            background-color: #0A2463;
        }

        .trainer-section,
        .seminar-section {
            background-color: #0A2463;
        }

        .facility-section,
        .review-section,
        .footer-section {
            background-color: #F2E3B3;
        }

        .trainer-card,
        .seminar-card {
            background-color: #FFFFFF;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #FFD700;
        }

        .swiper-pagination-bullet-active {
            background-color: #FFD700;
        }

        /* Mobile menu */
        .mobile-menu {
            display: none;
        }

        .mobile-menu.active {
            display: block;
        }
    </style>
</head>

<body class="font-sans">

    <!-- Header -->
<header class="bg-white shadow-md sticky top-0 z-50">
    <nav class="container mx-auto px-4 sm:px-6 py-4">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-10">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center justify-center space-x-8 flex-grow">
                <a href="{{ url('/#seminars') }}" class="font-semibold text-gray-700 hover:text-blue-600 transition px-3 py-1 rounded-md">Webinar</a>
                <a href="{{ url('/#trainer') }}" class="font-semibold text-gray-700 hover:text-blue-600 transition px-3 py-1 rounded-md">Trainer</a>
                <a href="{{ url('/#dokumentasi') }}" class="font-semibold text-gray-700 hover:text-blue-600 transition px-3 py-1 rounded-md">Dokumentasi</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 rounded-md p-2">
                    <svg id="hamburger-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
     <!-- Mobile Menu -->
             <div id="mobile-menu" class="lg:hidden mt-4 hidden border-t pt-4">
                     <a href="{{ url('/#seminars') }}" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Webinar</a>
                     <a href="{{ url('/#trainer') }}" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Trainer</a>
                     <a href="{{ url('/#dokumentasi') }}" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Dokumentasi</a>
                    </div>
                </nav>
            </header>
            <main>
     <!-- Hero Section -->
          <section class="hero-section py-16 sm:py-20 text-white">
              <div class="container mx-auto px-4 sm:px-6">
              <div class="bg-white text-gray-800 rounded-lg shadow-lg p-6 sm:p-8">
             <div class="flex flex-col md:flex-row items-center gap-6 sm:gap-8">
     <!-- Poster Image - Kiri di desktop, Atas di mobile -->
                <div class="w-full md:w-1/2 order-1">
                    <!-- Swiper Container -->
                 <div class="swiper mySwiper rounded-lg shadow-lg">
                 <div class="swiper-wrapper">
                 <!-- Slide 1 -->
                 <div class="swiper-slide">
                 <img src="{{ asset('images/poster/poster1.jpg') }}"
                     alt="Poster 1"
                     class="w-full h-auto object-cover rounded-lg">
                 </div>
                <!-- Slide 2 -->
                 <div class="swiper-slide">
                <img src="{{ asset('images/poster/poster2.jpg') }}"
                     alt="Poster 2"
                     class="w-full h-auto object-cover rounded-lg">
                 </div>
                <!-- Slide 3 -->
                 <div class="swiper-slide">
                    <img src="{{ asset('images/poster/poster3.jpg') }}"
                    alt="Poster 3"
                    class="w-full h-auto object-cover rounded-lg">
                </div>
                </div>
                 <!-- Pagination (titik bawah) -->
                        <div class="swiper-pagination"></div>
                       <!-- Tombol Next & Prev -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                    <!-- Content - Kanan di desktop, Bawah di mobile -->
                    <div class="w-full md:w-1/2 space-y-4 order-2">
                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold">Seminar Nasional 2025</h1>
                        <ul class="space-y-3 text-sm sm:text-base">
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2 text-lg sm:text-xl">⚡</span>
                                <div>
                                    <span class="font-bold">Tema Utama:</span> Pendidikan Digital, Inovasi Teknologi,
                                    Future Skills, Sustainability
                                </div>
                            </li>
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2 text-lg sm:text-xl">👥</span>
                                <div>
                                    <span class="font-bold">Peserta:</span> Mahasiswa, Akademisi, Praktisi, & Umum
                                </div>
                            </li>
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2 text-lg sm:text-xl">📍</span>
                                <div>
                                    <span class="font-bold">Format:</span> Hybrid (Offline Banjarmasin + Online
                                    Platform)
                                </div>
                            </li>
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2 text-lg sm:text-xl">🌐</span>
                                <div>
                                    <span class="font-bold">Bahasa:</span> Indonesia & English (Real-time Translation)
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </section>
<!-- Trainer Section -->
<section id="trainer" class="py-16 sm:py-20 bg-[#FFF5F5]">
    <div class="container mx-auto px-4 sm:px-6">
        <!-- Judul -->
        <div class="text-center mb-10 sm:mb-12">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#004599] border-b-4 border-[#034ba3] inline-block pb-2">Trainer</h2>
        </div>

        @if($trainers->count() > 0)
            <!-- Swiper Wrapper -->
            <div class="swiper trainer-swiper">
                <div class="swiper-wrapper">
                    @foreach($trainers as $trainer)
                    <!-- Trainer Card -->
                    <div class="swiper-slide p-2">
                        <div class="bg-[#F9FAFB] rounded-2xl shadow-lg p-6 text-center relative hover:shadow-xl transition transform hover:-translate-y-1 duration-300 h-full flex flex-col">
                          <span class="absolute left-10 left-1/2 transform -translate-x-1/2 bg-[#F9D423] text-xs font-semibold px-3 py-1 rounded-full text-[#0b2341] shadow-md">
                            Trainer
                        </span>
                            @if($trainer->image_url)
                                <img src="{{ $trainer->image_url }}" alt="{{ $trainer->name }}"
                                    class="rounded-lg mx-auto mb-4 object-cover w-full h-56 sm:h-64">
                            @else
                                <img src="{{ asset('images/admin/default_trainer.jpg') }}" alt="{{ $trainer->name }}"
                                    class="rounded-lg mx-auto mb-4 object-cover w-full h-56 sm:h-64">
                            @endif
                            <div class="flex-grow">
                                <h3 class="text-base sm:text-lg font-bold text-[#184883]">{{ $trainer->name }}</h3>
                                <p class="text-xs sm:text-sm text-gray-600 mb-3">{{ $trainer->position }}</p>
                                <p class="text-xs sm:text-sm text-gray-600 mb-5">
                                    {{ Str::limit($trainer->bio, 100) }}
                                </p>
                            </div>
                            @if($trainer->skills)
                                <div class="flex flex-wrap justify-center gap-1 sm:gap-2 mt-auto">
                                    @foreach($trainer->skills as $skill)
                                        <span class="bg-[#E8F0FE] text-blue-700 text-xs font-semibold px-2 py-1 rounded-full">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination mt-8"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-600 text-base sm:text-lg">Belum ada data trainer yang tersedia.</p>
            </div>
        @endif
        </section>

  <!-- Seminars Section -->
<section id="seminars" class="py-16 sm:py-20 bg-gradient-to-b from-[#0a3a72] to-[#0759ac]">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="text-center mb-10 sm:mb-12">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4">Upcoming Seminars</h2>
            <p class="text-base sm:text-lg text-gray-200">Join our upcoming seminars to stay ahead in the digital age.</p>
        </div>

        <!-- Grid: responsive columns -->
        <div class="grid gap-6 sm:gap-8 justify-center sm:grid-cols-2 lg:grid-cols-3">
              @forelse($seminars as $seminar)
                @livewire('seminar-card', ['seminar' => $seminar])
              @empty
                <div class="text-center w-full p-8 col-span-full">
                    <p class="text-gray-300">Belum ada seminar yang tersedia</p>
                </div>
              @endforelse
        </div>
    </div>
</section>

        </main>
    <!-- Benefits Section -->
    <section class="py-16 sm:py-20 bg-gradient-to-b from-[#f2f2f2] to-[#f2f2f2] text-black">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">Highlight Benefits</h2>
                <p class="text-lg sm:text-xl text-gray-700">Keuntungan eksklusif yang akan Anda dapatkan</p>
            </div>
           <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            <div class="glass rounded-2xl p-6 sm:p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-r from-sky-500 to-orange-200 rounded-full flex items-center justify-center text-2xl sm:text-3xl mb-5 sm:mb-6 shadow-lg">🎯</div>
                <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Strategic Insights</h3>
                <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                    Dapatkan strategi digital transformation terpercaya dari para ahli dengan pengalaman puluhan tahun di industri teknologi.
                </p>
            </div>
                <div class="glass rounded-2xl p-6 sm:p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-r from-blue-500 to-amber-300 rounded-full flex items-center justify-center text-2xl sm:text-3xl mb-5 sm:mb-6 shadow-lg">🚀</div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Latest Technology Trends</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">
                        Update terkini tentang AI, IoT, Blockchain, dan teknologi emerging yang akan membentuk masa depan bisnis Anda.
                    </p>
                </div>

                  <div class="glass rounded-2xl p-6 sm:p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-r from-blue-500 to-amber-300 rounded-full flex items-center justify-center text-2xl sm:text-3xl mb-5 sm:mb-6 shadow-lg">🤝</div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Premium Networking</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">Berinteraksi langsung dengan 1000+ C-level executives, tech leaders, dan decision makers dari berbagai industri.</p>
                </div>

               <div class="glass rounded-2xl p-6 sm:p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-r from-blue-500 to-amber-300 rounded-full flex items-center justify-center text-2xl sm:text-3xl mb-5 sm:mb-6 shadow-lg">📊</div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Practical Case Studies</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">Analisis mendalam success stories dan failure lessons dari implementasi digital transformation di perusahaan ternama.</p>
                </div>

                <div class="glass rounded-2xl p-6 sm:p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-r from-blue-500 to-amber-300 rounded-full flex items-center justify-center text-2xl sm:text-3xl mb-5 sm:mb-6 shadow-lg">🏆</div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Industry Recognition</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">Sertifikat kehadiran dari HAFECS yang diakui industri untuk mendukung pengembangan karir profesional Anda.</p>
                </div>

                <div class="glass rounded-2xl p-6 sm:p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-r from-blue-500 to-amber-300 rounded-full flex items-center justify-center text-2xl sm:text-3xl mb-5 sm:mb-6 shadow-lg">💡</div>
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Innovation Workshop</h3>
                    <p class="text-gray-700 leading-relaxed text-sm sm:text-base">Hands-on workshop untuk mengimplementasikan strategi digital langsung pada bisnis atau project Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="facilities" class="py-16 sm:py-20 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4">Fasilitas Yang Didapatkan</h2>
                <p class="text-lg sm:text-xl text-gray-600">Paket lengkap untuk pengalaman learning yang optimal</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-r from-blue-500 to-teal-300 rounded-full flex items-center justify-center text-white text-xl font-bold flex-shrink-0">📚</div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-primary mb-1 sm:mb-2">Digital Toolkit</h4>
                        <p class="text-gray-600 text-sm sm:text-base">Akses ke 50+ tools dan template digital transformation yang dapat langsung digunakan</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-r from-blue-500 to-teal-300 rounded-full flex items-center justify-center text-white text-xl font-bold flex-shrink-0">🎥</div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-primary mb-1 sm:mb-2">Recording Access</h4>
                        <p class="text-gray-600 text-sm sm:text-base">Akses recording semua session selama 6 bulan untuk review dan sharing dengan tim</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-r from-blue-500 to-teal-300 rounded-full flex items-center justify-center text-white text-xl font-bold flex-shrink-0">📖</div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-primary mb-1 sm:mb-2">E-Book Premium</h4>
                        <p class="text-gray-600 text-sm sm:text-base">Collection 10 e-book eksklusif tentang digital transformation dan best practices industry</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-r from-blue-500 to-teal-300 rounded-full flex items-center justify-center text-white text-xl font-bold flex-shrink-0">🍽</div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-primary mb-1 sm:mb-2">Premium Catering</h4>
                        <p class="text-gray-600 text-sm sm:text-base">Lunch berkualitas tinggi dan coffee break premium sepanjang acara</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-r from-blue-500 to-teal-300 rounded-full flex items-center justify-center text-white text-xl font-bold flex-shrink-0">🎁</div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-primary mb-1 sm:mb-2">Exclusive Merchandise</h4>
                        <p class="text-gray-600 text-sm sm:text-base">Goodie bag berisi merchandise eksklusif HAFECS dan hadiah menarik dari sponsor</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-r from-blue-500 to-teal-300 rounded-full flex items-center justify-center text-white text-xl font-bold flex-shrink-0">💬</div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-primary mb-1 sm:mb-2">VIP Community Access</h4>
                        <p class="text-gray-600 text-sm sm:text-base">Join grup eksklusif peserta untuk networking berkelanjutan dan diskusi lanjutan</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-r from-blue-500 to-teal-300 rounded-full flex items-center justify-center text-white text-xl font-bold flex-shrink-0">🏅</div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-primary mb-1 sm:mb-2">Professional Certificate</h4>
                        <p class="text-gray-600 text-sm sm:text-base">Sertifikat digital dan hard copy yang diakui industri untuk pengembangan karir</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-gradient-to-r from-blue-500 to-teal-300 rounded-full flex items-center justify-center text-white text-xl font-bold flex-shrink-0">📱</div>
                    <div>
                        <h4 class="text-lg sm:text-xl font-bold text-primary mb-1 sm:mb-2">Mobile App Access</h4>
                        <p class="text-gray-600 text-sm sm:text-base">Aplikasi khusus event dengan fitur networking, agenda, dan interactive features</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16 sm:py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-12 sm:mb-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4">Pertanyaan Umum (FAQ)</h2>
                <p class="text-lg sm:text-xl text-gray-600">Jawaban untuk pertanyaan yang sering ditanyakan</p>
            </div>

            <div class="max-w-4xl mx-auto space-y-4">
                <div class="bg-gray-50 rounded-2xl overflow-hidden faq-item">
                    <button class="w-full px-6 sm:px-8 py-5 sm:py-6 text-left hover:bg-gray-100 transition-colors faq-question flex justify-between items-center">
                        <span class="text-base sm:text-lg font-semibold text-primary">Apa saja yang termasuk dalam tiket event ini?</span>
                        <span class="text-xl sm:text-2xl text-blue-500 font-bold transform transition-transform duration-300">+</span>
                    </button>
                    <div class="faq-answer px-6 sm:px-8 max-h-0 overflow-hidden transition-all duration-300">
                        <p class="pb-6 text-gray-600 leading-relaxed text-sm sm:text-base">Tiket termasuk akses ke semua session, workshop, networking break, lunch premium, goodie bag, sertifikat, akses recording 6 bulan, e-book collection, dan mobile app.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl overflow-hidden faq-item">
                    <button class="w-full px-6 sm:px-8 py-5 sm:py-6 text-left hover:bg-gray-100 transition-colors faq-question flex justify-between items-center">
                        <span class="text-base sm:text-lg font-semibold text-primary">Apakah ada opsi virtual untuk yang tidak bisa hadir offline?</span>
                        <span class="text-xl sm:text-2xl text-blue-500 font-bold transform transition-transform duration-300">+</span>
                    </button>
                    <div class="faq-answer px-6 sm:px-8 max-h-0 overflow-hidden transition-all duration-300">
                        <p class="pb-6 text-gray-600 leading-relaxed text-sm sm:text-base">Ya, kami menyediakan akses virtual full dengan interactive features, Q&A real-time, dan networking virtual. Virtual ticket mendapat semua benefit kecuali catering dan merchandise fisik.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl overflow-hidden faq-item">
                    <button class="w-full px-6 sm:px-8 py-5 sm:py-6 text-left hover:bg-gray-100 transition-colors faq-question flex justify-between items-center">
                        <span class="text-base sm:text-lg font-semibold text-primary">Bagaimana sistem pembayaran dan refund policy?</span>
                        <span class="text-xl sm:text-2xl text-blue-500 font-bold transform transition-transform duration-300">+</span>
                    </button>
                    <div class="faq-answer px-6 sm:px-8 max-h-0 overflow-hidden transition-all duration-300">
                        <p class="pb-6 text-gray-600 leading-relaxed text-sm sm:text-base">Pembayaran dapat dilakukan via transfer bank, e-wallet, atau credit card. Refund 100% jika cancel 30 hari sebelum event, 50% jika 14-30 hari, tidak ada refund kurang dari 14 hari kecuali force majeure.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl overflow-hidden faq-item">
                    <button class="w-full px-6 sm:px-8 py-5 sm:py-6 text-left hover:bg-gray-100 transition-colors faq-question flex justify-between items-center">
                        <span class="text-base sm:text-lg font-semibold text-primary">Apakah ada early bird discount atau group discount?</span>
                        <span class="text-xl sm:text-2xl text-blue-500 font-bold transform transition-transform duration-300">+</span>
                    </button>
                    <div class="faq-answer px-6 sm:px-8 max-h-0 overflow-hidden transition-all duration-300">
                        <p class="pb-6 text-gray-600 leading-relaxed text-sm sm:text-base">Early bird 30% off berlaku hingga 30 September. Group discount 20% untuk minimal 5 orang, 25% untuk minimal 10 orang dari perusahaan yang sama. Discount tidak dapat dikombinasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


<style>
    .text-primary { color: #1e3a8a; }
    .text-accent { color: #f59e0b; }
    .bg-accent { background-color: #f59e0b; }
    .focus\:ring-accent:focus { --tw-ring-color: #f59e0b; }
    .focus\:border-accent:focus { border-color: #f59e0b; }
    .gradient-button {
        background-image: linear-gradient(to right, #1e3a8a, #3b82f6);
    }
    .hover\:gradient-button:hover {
        background-image: linear-gradient(to right, #1d4ed8, #2563eb);
    }
    .faq-item .faq-answer {
        transition: max-height 0.5s ease-in-out;
    }
    .faq-item.active .faq-answer {
        max-height: 200px; /* Adjust as needed */
    }
    .faq-item.active .faq-question span:last-child {
        transform: rotate(45deg);
    }
</style>

  <footer class="bg-gray-800 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-10 border-b border-gray-700 pb-10 mb-8">

            <div class="md:col-span-4 lg:col-span-2">
                <a href="{{ url('/') }}" class="inline-flex items-center mb-4">
                    <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-10 filter brightness-0 invert mr-2">

                </a>
                <p class="text-sm text-gray-400 mt-2 pr-8">
                    Pusat pengembangan profesional dan edukasi terdepan di Indonesia.
                </p>
            </div>

            <div>
                <h3 class="text-base sm:text-lg font-bold text-white mb-4 border-b-2 border-accent inline-block pb-1">
                    Quick Link
                </h3>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="#" class="flex items-center text-gray-400 hover:text-accent transition duration-200">
                            <svg class="w-4 h-4 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-400 hover:text-accent transition duration-200">
                            <svg class="w-4 h-4 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            Syarat & Ketentuan
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-400 hover:text-accent transition duration-200">
                            <svg class="w-4 h-4 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center text-gray-400 hover:text-accent transition duration-200">
                            <svg class="w-4 h-4 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            Kebijakan Privasi
                        </a>
                    </li>
                </ul>
            </div>

            <div class="md:col-span-3 lg:col-span-2">
                <h3 class="text-base sm:text-lg font-bold text-white mb-4 border-b-2 border-accent inline-block pb-1">
                    Hubungi Kami
                </h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-accent flex-shrink-0 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="text-gray-400">Jl. Contoh Alamat Gedung No. 123, Kota Banjarmasin 70123</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-accent flex-shrink-0 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span class="text-gray-400">info@hafecs.com</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-accent flex-shrink-0 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span class="text-gray-400">+62 812-3456-7890 (WA Only)</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="text-center">
    <p class="text-xs sm:text-sm text-gray-500">
        &copy; {{ date('Y') }} HAFECS. All rights reserved. Dibuat dengan ❤️ oleh
        <a href="{{ route('webdev.team') }}" class="text-amber-500 hover:text-amber-400 font-semibold underline transition duration-200">
            Web Dev Team
        </a>
        di Indonesia.
    </p>
</div>
</footer>
 <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Mobile menu toggle (revisi)
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                hamburgerIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }

        //  Hero Poster Swiper
        const heroSwiper = new Swiper('.mySwiper', {
            direction: 'horizontal',
            loop: true,
            grabCursor: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.mySwiper .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.mySwiper .swiper-button-next',
                prevEl: '.mySwiper .swiper-button-prev',
            },
        });

        //  Trainer Swiper
        const trainerSwiper = new Swiper('.trainer-swiper', {
            slidesPerView: 1,
            spaceBetween: 16,
            pagination: {
                el: '.trainer-swiper .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.trainer-swiper .swiper-button-next',
                prevEl: '.trainer-swiper .swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
            }
        });

        // FAQ Accordion
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            question.addEventListener('click', () => {
                const wasActive = item.classList.contains('active');
                faqItems.forEach(i => i.classList.remove('active'));
                if (!wasActive) {
                    item.classList.add('active');
                }
            });
        });
    });
</script>

<!-- Include SweetAlert2 CDN -->
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<script>
    // Check for payment success parameter in URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('payment_success') === 'true') {
        Swal.fire({
            title: 'Pendaftaran Berhasil!',
            text: 'Anda telah berhasil melakukan pendaftaran! Silakan cek email Anda untuk konfirmasi.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            // Remove the parameter from URL to prevent repeated alerts
            const url = new URL(window.location);
            url.searchParams.delete('payment_success');
            history.replaceState({}, document.title, url);
        });
    }
</script>

</body>

</html>
