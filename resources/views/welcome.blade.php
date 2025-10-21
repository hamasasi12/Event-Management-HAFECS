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
    <header class="bg-white shadow-md">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-gray-800">
                    <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-10">
                </div>
              <div class="hidden md:flex items-center justify-center space-x-8 w-full">
                   <a href="#webinar" class="font-semibold text-black-900 hover:text-blue-700 transition">Webinar</a>
                    <a href="#trainer" class="font-semibold text-black-900 hover:text-blue-700 transition">Trainer</a>
                    <a href="#dokumentasi" class="font-semibold text-black-700 hover:text-blue-700 transition">Dokumentasi</a>
                </div>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="mobile-menu md:hidden mt-4">
                <a href="#webinar" class="block py-2 text-gray-600 hover:text-blue-700">Webinar</a>
                <a href="#trainer" class="block py-2 text-gray-600 hover:text-blue-700">Trainer</a>
                <a href="#dokumentasi" class="block py-2 text-gray-600 hover:text-blue-700">Dokumentasi</a>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section py-20 text-white">
            <div class="container mx-auto px-6">
                <div class="bg-white text-gray-800 rounded-lg shadow-lg p-8 md:flex items-center gap-8">
                    <div class="md:w-1/2 space-y-4">
                        <h1 class="text-3xl md:text-4xl font-bold">Seminar Nasional 2025</h1>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2 text-xl">⚡️</span>
                                <div>
                                    <span class="font-bold">Tema Utama:</span> Pendidikan Digital, Inovasi Teknologi,
                                    Future Skills, Sustainability
                                </div>
                            </li>
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2 text-xl">👥</span>
                                <div>
                                    <span class="font-bold">Peserta:</span> Mahasiswa, Akademisi, Praktisi, & Umum
                                </div>
                            </li>
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2 text-xl">📍</span>
                                <div>
                                    <span class="font-bold">Format:</span> Hybrid (Offline Banjarmasin + Online
                                    Platform)
                                </div>
                            </li>
                            <li class="flex items-start">
                                <span class="text-yellow-500 mr-2 text-xl">🌐</span>
                                <div>
                                    <span class="font-bold">Bahasa:</span> Indonesia & English (Real-time Translation)
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="md:w-1/2 mt-8 md:mt-0">
                        <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="Seminar" class="rounded-lg shadow-lg w-full">
                    </div>
                </div>
            </div>
        </section>
<!-- Trainer Section -->
<section id="trainer" class="py-20 bg-[#FFF5F5]">
    <div class="container mx-auto px-6">
        <!-- Judul -->
        <div class="text-center mb-12">
        <h2 class="text-4xl md:text-5xl font-extrabold text-[#004599] border-b-4 border-[#034ba3] inline-block pb-2">Trainer</h2>
        </div>

        @if($trainers->count() > 0)
            <!-- Swiper Wrapper -->
            <div class="swiper trainer-swiper">
                <div class="swiper-wrapper">
                    @foreach($trainers as $trainer)
                    <!-- Trainer Card -->
                    <div class="swiper-slide">
                        <div class="bg-[#F9FAFB] rounded-2xl shadow-lg p-6 text-center relative hover:shadow-xl transition transform hover:-translate-y-1 duration-300">
                          <span class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-[#F9D423] text-xs font-semibold px-3 py-1 rounded-full text-[#0b2341] shadow-md">
                            Trainer
                        </span>
                            @if($trainer->image_url)
                                <img src="{{ $trainer->image_url }}" alt="{{ $trainer->name }}"
                                    class="rounded-lg mx-auto mb-4 object-cover w-full h-64">
                            @else
                                <img src="{{ asset('images/admin/default_trainer.jpg') }}" alt="{{ $trainer->name }}"
                                    class="rounded-lg mx-auto mb-4 object-cover w-full h-64">
                            @endif
                            <h3 class="text-lg font-bold text-[#184883]">{{ $trainer->name }}</h3>
                            <p class="text-sm text-gray-600 mb-3">{{ $trainer->position }}</p>
                            <p class="text-sm text-gray-600 mb-5">
                                {{ Str::limit($trainer->bio, 100) }}
                            </p>
                            @if($trainer->skills)
                                <div class="flex flex-wrap justify-center gap-2">
                                    @foreach($trainer->skills as $skill)
                                        <span class="bg-[#E8F0FE] text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">{{ $skill }}</span>
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
                <p class="text-gray-600 text-lg">Belum ada data trainer yang tersedia.</p>
            </div>
        @endif
        </section>

  <!-- Seminars Section -->
<section id="seminars" class="py-20 bg-gradient-to-b from-[#0a3a72] to-[#0759ac]">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-[#ffffff] mb-4">Upcoming Seminars</h2>
            <p class="text-lg text-gray-200">Join our upcoming seminars to stay ahead in the digital age.</p>
        </div>


        <!-- Grid: center alignment -->
        <div class="grid gap-8 justify-center md:grid-cols-2 lg:grid-cols-3">
            {{-- @forelse(\App\Models\Seminar::orderBy('start_time', 'asc')->get() as $seminar)
                <div class="bg-[#F9FAFB] rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 duration-300 w-[300px]">
                    @if($seminar->image_url)
                        <img src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}" class="rounded-t-2xl h-48 w-full object-cover">
                    @endif
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold text-[#1E2A39]">{{ $seminar->title }}</h3>
                        <p class="text-sm text-[#F9D423] font-medium mt-1">Seminar</p>
                        <p class="text-gray-600 mt-3 text-sm">{{ Str::limit($seminar->description, 120) }}</p>
                      <a href="{{ route('seminar.show', $seminar->id) }}" class="mt-5 inline-block bg-[#F9D423] text-[#1E2A39] px-5 py-2 rounded-full font-medium hover:bg-[#F8C200] transition">
                           Lihat detail <i class="fas fa-arrow-right ml-1"></i>
                        <a  href="{{ route('seminar.register', \Vinkla\Hashids\Facades\Hashids::encode($seminar->id)) }}" class="mt-5 inline-block bg-[#F9D423] text-[#1E2A39] px-5 py-2 rounded-full font-medium hover:bg-[#F8C200] transition">
                            Join Webinar <i class="fas fa-arrow-right ml-1">
                            </i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-center w-full p-8">
                    <p class="text-gray-600">Belum ada seminar yang tersedia</p>
                </div>
            @endforelse --}}
              @forelse($seminars as $seminar)
                @livewire('seminar-card', ['seminar' => $seminar])
              @empty
                <div class="text-center w-full p-8">
                    <p class="text-gray-600">Belum ada seminar yang tersedia</p>
                </div>
              @endforelse
        </div>
    </div>
</section>

        </main>
    <!-- Benefits Section -->
    <section class="py-20 bg-gradient-to-b from-[#f2f2f2] to-[#f2f2f2] text-black">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Highlight Benefits</h2>
                <p class="text-xl text-black-300">Keuntungan eksklusif yang akan Anda dapatkan</p>
            </div>
           <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="glass rounded-2xl p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                <div class="w-16 h-16 bg-gradient-to-r from-sky-500 to-orange-200 rounded-full flex items-center justify-center text-3xl mb-6 shadow-lg">🎯</div>
                <h3 class="text-2xl font-bold mb-4">Strategic Insights</h3>
                <p class="text-black-300 leading-relaxed">
                    Dapatkan strategi digital transformation terpercaya dari para ahli dengan pengalaman puluhan tahun di industri teknologi.
                </p>
            </div>
                <div class="glass rounded-2xl p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-amber-300 rounded-full flex items-center justify-center text-3xl mb-6 shadow-lg">🚀</div>
                    <h3 class="text-2xl font-bold mb-4">Latest Technology Trends</h3>
                    <p class="text-black-700 leading-relaxed">
                        Update terkini tentang AI, IoT, Blockchain, dan teknologi emerging yang akan membentuk masa depan bisnis Anda.
                    </p>
                </div>

                  <div class="glass rounded-2xl p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-amber-300 rounded-full flex items-center justify-center text-3xl mb-6 shadow-lg">🤝</div>
                    <h3 class="text-2xl font-bold mb-4">Premium Networking</h3>
                    <p class="text-black-300 leading-relaxed">Berinteraksi langsung dengan 1000+ C-level executives, tech leaders, dan decision makers dari berbagai industri.</p>
                </div>

               <div class="glass rounded-2xl p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-amber-300 rounded-full flex items-center justify-center text-3xl mb-6 shadow-lg">📊</div>
                    <h3 class="text-2xl font-bold mb-4">Practical Case Studies</h3>
                    <p class="text-black-300 leading-relaxed">Analisis mendalam success stories dan failure lessons dari implementasi digital transformation di perusahaan ternama.</p>
                </div>

                <div class="glass rounded-2xl p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-amber-300 rounded-full flex items-center justify-center text-3xl mb-6 shadow-lg">🏆</div>
                    <h3 class="text-2xl font-bold mb-4">Industry Recognition</h3>
                    <p class="text-black-300 leading-relaxed">Sertifikat kehadiran dari HAFECS yang diakui industri untuk mendukung pengembangan karir profesional Anda.</p>
                </div>

                <div class="glass rounded-2xl p-8 card-hover border border-blue-400/40 hover:border-blue-500 transition duration-300 shadow-md">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-amber-300 rounded-full flex items-center justify-center text-3xl mb-6 shadow-lg">💡</div>
                    <h3 class="text-2xl font-bold mb-4">Innovation Workshop</h3>
                    <p class="text-black-300 leading-relaxed">Hands-on workshop untuk mengimplementasikan strategi digital langsung pada bisnis atau project Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="facilities" class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Fasilitas Yang Didapatkan</h2>
                <p class="text-xl text-gray-600">Paket lengkap untuk pengalaman learning yang optimal</p>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-14 h-14 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-white text-xl font-bold">📚</div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">Digital Toolkit</h4>
                        <p class="text-gray-600">Akses ke 50+ tools dan template digital transformation yang dapat langsung digunakan</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-14 h-14 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-white text-xl font-bold">🎥</div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">Recording Access</h4>
                        <p class="text-gray-600">Akses recording semua session selama 6 bulan untuk review dan sharing dengan tim</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-14 h-14 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-white text-xl font-bold">📖</div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">E-Book Premium</h4>
                        <p class="text-gray-600">Collection 10 e-book eksklusif tentang digital transformation dan best practices industry</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-14 h-14 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-white text-xl font-bold">🍽️</div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">Premium Catering</h4>
                        <p class="text-gray-600">Lunch berkualitas tinggi dan coffee break premium sepanjang acara</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-14 h-14 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-white text-xl font-bold">🎁</div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">Exclusive Merchandise</h4>
                        <p class="text-gray-600">Goodie bag berisi merchandise eksklusif HAFECS dan hadiah menarik dari sponsor</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-14 h-14 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-white text-xl font-bold">💬</div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">VIP Community Access</h4>
                        <p class="text-gray-600">Join grup eksklusif peserta untuk networking berkelanjutan dan diskusi lanjutan</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-14 h-14 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-white text-xl font-bold">🏅</div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">Professional Certificate</h4>
                        <p class="text-gray-600">Sertifikat digital dan hard copy yang diakui industri untuk pengembangan karir</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg card-hover flex items-center space-x-4">
                    <div class="w-14 h-14 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-white text-xl font-bold">📱</div>
                    <div>
                        <h4 class="text-xl font-bold text-primary mb-2">Mobile App Access</h4>
                        <p class="text-gray-600">Aplikasi khusus event dengan fitur networking, agenda, dan interactive features</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Pertanyaan Umum (FAQ)</h2>
                <p class="text-xl text-gray-600">Jawaban untuk pertanyaan yang sering ditanyakan</p>
            </div>

            <div class="max-w-4xl mx-auto space-y-4">
                <div class="bg-gray-50 rounded-2xl overflow-hidden faq-item">
                    <button class="w-full px-8 py-6 text-left hover:bg-gray-100 transition-colors faq-question flex justify-between items-center">
                        <span class="text-lg font-semibold text-primary">Apa saja yang termasuk dalam tiket event ini?</span>
                        <span class="text-2xl text-coral font-bold">+</span>
                    </button>
                    <div class="faq-answer px-8 max-h-0 overflow-hidden transition-all duration-300">
                        <p class="pb-6 text-gray-600 leading-relaxed">Tiket termasuk akses ke semua session, workshop, networking break, lunch premium, goodie bag, sertifikat, akses recording 6 bulan, e-book collection, dan mobile app.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl overflow-hidden faq-item">
                    <button class="w-full px-8 py-6 text-left hover:bg-gray-100 transition-colors faq-question flex justify-between items-center">
                        <span class="text-lg font-semibold text-primary">Apakah ada opsi virtual untuk yang tidak bisa hadir offline?</span>
                        <span class="text-2xl text-coral font-bold">+</span>
                    </button>
                    <div class="faq-answer px-8 max-h-0 overflow-hidden transition-all duration-300">
                        <p class="pb-6 text-gray-600 leading-relaxed">Ya, kami menyediakan akses virtual full dengan interactive features, Q&A real-time, dan networking virtual. Virtual ticket mendapat semua benefit kecuali catering dan merchandise fisik.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl overflow-hidden faq-item">
                    <button class="w-full px-8 py-6 text-left hover:bg-gray-100 transition-colors faq-question flex justify-between items-center">
                        <span class="text-lg font-semibold text-primary">Bagaimana sistem pembayaran dan refund policy?</span>
                        <span class="text-2xl text-coral font-bold">+</span>
                    </button>
                    <div class="faq-answer px-8 max-h-0 overflow-hidden transition-all duration-300">
                        <p class="pb-6 text-gray-600 leading-relaxed">Pembayaran dapat dilakukan via transfer bank, e-wallet, atau credit card. Refund 100% jika cancel 30 hari sebelum event, 50% jika 14-30 hari, tidak ada refund kurang dari 14 hari kecuali force majeure.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl overflow-hidden faq-item">
                    <button class="w-full px-8 py-6 text-left hover:bg-gray-100 transition-colors faq-question flex justify-between items-center">
                        <span class="text-lg font-semibold text-primary">Apakah ada early bird discount atau group discount?</span>
                        <span class="text-2xl text-coral font-bold">+</span>
                    </button>
                    <div class="faq-answer px-8 max-h-0 overflow-hidden transition-all duration-300">
                        <p class="pb-6 text-gray-600 leading-relaxed">Early bird 30% off berlaku hingga 30 September. Group discount 20% untuk minimal 5 orang, 25% untuk minimal 10 orang dari perusahaan yang sama. Discount tidak dapat dikombinasi.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl overflow-hidden faq-item">
                    <button class="w-full px-8 py-6 text-left hover:bg-gray-100 transition-colors faq-question flex justify-between items-center">
                        <span class="text-lg font-semibold text-primary">Siapa target audience yang paling cocok untuk event ini?</span>
                        <span class="text-2xl text-coral font-bold">+</span>
                    </button>
                    <div class="faq-answer px-8 max-h-0 overflow-hidden transition-all duration-300">
                        <p class="pb-6 text-gray-600 leading-relaxed">C-Level executives, IT Directors, Digital Transformation Leaders, Data Scientists, Product Managers, Tech Entrepreneurs, dan professionals yang terlibat dalam strategic technology decisions.</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-2xl overflow-hidden faq-item">
                    <button class="w-full px-8 py-6 text-left hover:bg-gray-100 transition-colors faq-question flex justify-between items-center">
                        <span class="text-lg font-semibold text-primary">Bagaimana dress code dan apa yang perlu dibawa?</span>
                        <span class="text-2xl text-coral font-bold">+</span>
                    </button>
                    <div class="faq-answer px-8 max-h-0 overflow-hidden transition-all duration-300">
                        <p class="pb-6 text-gray-600 leading-relaxed">Business casual untuk offline attendees. Bawa laptop/tablet untuk workshop, business card untuk networking, dan notebook. Semua materi digital akan diakses via mobile app.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="max-w-7xl mx-auto px-6 lg:px-8 py-10">
    <div class="max-w-4xl mx-auto bg-white p-6 md:p-8 rounded-2xl shadow-xl">
        <h2 class="text-2xl md:text-3xl font-extrabold text-primary mb-5">
            Masukkan Ulasan Anda
        </h2>

        <form action="#" method="POST" class="space-y-4">
            <div class="relative">
                <textarea
                    name="review_message"
                    id="review_message"
                    rows="5"
                    class="block w-full rounded-xl border-gray-300 shadow-inner p-4 text-gray-800 placeholder-gray-500 focus:ring-accent focus:border-accent border-2 transition duration-200 resize-none text-base"
                    placeholder="Tulis ulasan, saran, atau testimoni Anda di sini..."
                    required
                ></textarea>
            </div>

            <div class="flex flex-col sm:flex-row-reverse sm:justify-between items-center pt-2">
                <button type="submit"
                    class="gradient-button text-white px-8 py-3 rounded-xl font-bold text-lg hover:gradient-button focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300 w-full sm:w-auto shadow-lg hover:shadow-xl transform hover:scale-[1.01]">
                    <span class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Kirimi
                    </span>
                </button>

                <a href="#" class="text-sm text-gray-600 hover:text-primary font-semibold transition duration-150 mt-4 sm:mt-0 sm:mr-4 flex items-center">
                    <svg class="w-4 h-4 mr-1 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Lihat Semua Ulasan
                </a>
            </div>
        </form>
    </div>
</section>

<style>
    /* Asumsi warna kustom Anda sudah ada */
    .text-primary { color: #1e3a8a; /* Biru Tua */ }
    .bg-accent { background-color: #f59e0b; /* Kuning/Amber */ }
    .focus\:ring-accent:focus { --tw-ring-color: #f59e0b; }
    .focus\:border-accent:focus { border-color: #f59e0b; }

    /* Gunakan gradient-button yang sudah Anda definisikan di kode awal */
    .gradient-button {
        background-image: linear-gradient(to right, #1e3a8a, #3b82f6); /* Gradient Biru */
    }

    .hover\:gradient-button:hover {
        background-image: linear-gradient(to right, #1d4ed8, #2563eb);
    }
</style>

   <footer class="bg-gray-800 text-gray-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12 md:py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-10 border-b border-gray-700 pb-10 mb-8">

            <div class="md:col-span-2 lg:col-span-2">
                <a href="{{ url('/') }}" class="inline-flex items-center mb-4">
                    <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-10 filter brightness-0 invert mr-2">
                    <span class="text-xl font-extrabold text-white">HAFECS</span>
                </a>
                <p class="text-sm text-gray-400 mt-2 pr-8">
                    Pusat pengembangan profesional dan edukasi terdepan di Indonesia.
                </p>
                </div>

            <div>
                <h3 class="text-lg font-bold text-white mb-4 border-b-2 border-accent inline-block pb-1">
                    Quick Link
                </h3>
                <ul class="space-y-3">
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

            <div class="md:col-span-1 lg:col-span-2">
                <h3 class="text-lg font-bold text-white mb-4 border-b-2 border-accent inline-block pb-1">
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
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} HAFECS. All rights reserved. Dibuat dengan ❤️ di Indonesia.
            </p>
        </div>
    </div>
</footer>    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('active');
                });
            }

            // Trainer Swiper
            const trainerSwiper = new Swiper('.trainer-swiper', {
                slidesPerView: 1,
                spaceBetween: 30,
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
                        spaceBetween: 40,
                    },
                }
            });

            // Seminar Swiper
            const seminarSwiper = new Swiper('.seminar-swiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                pagination: {
                    el: '.seminar-swiper .swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                }
            });
        });

    </script>
    <!-- Include SweetAlert2 for Livewire component -->

    <!-- Include SweetAlert2 CDN -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <script>
        // Check for payment success parameter in URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('payment_success') === 'true') {
            Swal.fire({
                title: 'Pendaftaran Berhasil!'
                , text: 'Anda telah berhasil melakukan pendaftaran! Silakan cek email Anda untuk konfirmasi.'
                , icon: 'success'
                , confirmButtonText: 'OK'
            }).then(() => {
                // Remove the parameter from URL to prevent repeated alerts
                history.replaceState({}, document.title, window.location.pathname);
            });
        }

    </script>
</body>

</html>
