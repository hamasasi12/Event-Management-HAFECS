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
                    <a href="#dokumentasi" class="font-semibold text-gray-700 hover:text-blue-700 transition">Dokumentasi</a>
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



            <!-- Swiper Wrapper -->
            <div class="swiper trainer-swiper">
                <div class="swiper-wrapper">

                    <!-- Trainer Card -->
                    <div class="swiper-slide">
                        <div class="bg-[#F9FAFB] rounded-2xl shadow-lg p-6 text-center relative hover:shadow-xl transition transform hover:-translate-y-1 duration-300">
                          <span class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-[#F9D423] text-xs font-semibold px-3 py-1 rounded-full text-[#0b2341] shadow-md">
                            Trainer
                        </span>
                            <img src="{{ asset('images/admin/pa yudhis.png') }}" alt="Trainer"
                                class="rounded-lg mx-auto mb-4 object-cover w-full h-64">
                            <h3 class="text-lg font-bold text-[#184883]">Danang Bagus Yudistira</h3>
                            <p class="text-sm text-gray-600 mb-3">Deputy Director and Senior Trainer HAFECS</p>
                            <p class="text-sm text-gray-600 mb-5">
                                Pengalaman luas di bidang pelatihan pendidikan dan kurikulum. Aktif memberikan workshop di bidang metodologi pengajaran dan pengembangan kurikulum.
                            </p>
                            <div class="flex justify-center gap-3">
                                <span class="bg-[#E8F0FE] text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Pengembangan Kurikulum</span>
                                <span class="bg-[#E8F0FE] text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Metode Pengajaran</span>
                            </div>
                        </div>
                    </div>
                       <!-- Trainer Card 2 -->
                    <div class="swiper-slide">
                        <div class="bg-[#F9FAFB] rounded-2xl shadow-lg p-6 text-center relative hover:shadow-xl transition transform hover:-translate-y-1 duration-300">
                          <span class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-[#F9D423] text-xs font-semibold px-3 py-1 rounded-full text-[#0b2341] shadow-md">
                            Trainer
                        </span>
                            <img src="{{ asset('images/admin/pa yudhis.png') }}" alt="Trainer"
                                class="rounded-lg mx-auto mb-4 object-cover w-full h-64">
                            <h3 class="text-lg font-bold text-[#184883]">Danang Bagus Yudistira</h3>
                            <p class="text-sm text-gray-600 mb-3">Deputy Director and Senior Trainer HAFECS</p>
                            <p class="text-sm text-gray-600 mb-5">
                                Pengalaman luas di bidang pelatihan pendidikan dan kurikulum. Aktif memberikan workshop di bidang metodologi pengajaran dan pengembangan kurikulum.
                            </p>
                            <div class="flex justify-center gap-3">
                                <span class="bg-[#E8F0FE] text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Pengembangan Kurikulum</span>
                                <span class="bg-[#E8F0FE] text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Metode Pengajaran</span>
                            </div>
                        </div>
                    </div>
                             <!-- Trainer Card 3 -->
                    <div class="swiper-slide">
                        <div class="bg-[#F9FAFB] rounded-2xl shadow-lg p-6 text-center relative hover:shadow-xl transition transform hover:-translate-y-1 duration-300">
                          <span class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-[#F9D423] text-xs font-semibold px-3 py-1 rounded-full text-[#0b2341] shadow-md">
                            Trainer
                        </span>
                            <img src="{{ asset('images/admin/pa yudhis.png') }}" alt="Trainer"
                                class="rounded-lg mx-auto mb-4 object-cover w-full h-64">
                            <h3 class="text-lg font-bold text-[#184883]">Danang Bagus Yudistira</h3>
                            <p class="text-sm text-gray-600 mb-3">Deputy Director and Senior Trainer HAFECS</p>
                            <p class="text-sm text-gray-600 mb-5">
                                Pengalaman luas di bidang pelatihan pendidikan dan kurikulum. Aktif memberikan workshop di bidang metodologi pengajaran dan pengembangan kurikulum.
                            </p>
                            <div class="flex justify-center gap-3">
                                <span class="bg-[#E8F0FE] text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Pengembangan Kurikulum</span>
                                <span class="bg-[#E8F0FE] text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Metode Pengajaran</span>
                            </div>
                        </div>
                    </div>
                       <!-- Trainer Card  -->
                    <div class="swiper-slide">
                        <div class="bg-[#F9FAFB] rounded-2xl shadow-lg p-6 text-center relative hover:shadow-xl transition transform hover:-translate-y-1 duration-300">
                          <span class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-[#F9D423] text-xs font-semibold px-3 py-1 rounded-full text-[#0b2341] shadow-md">
                            Trainer
                        </span>
                            <img src="{{ asset('images/admin/pa yudhis.png') }}" alt="Trainer"
                                class="rounded-lg mx-auto mb-4 object-cover w-full h-64">
                            <h3 class="text-lg font-bold text-[#184883]">Danang Bagus Yudistira</h3>
                            <p class="text-sm text-gray-600 mb-3">Deputy Director and Senior Trainer HAFECS</p>
                            <p class="text-sm text-gray-600 mb-5">
                                Pengalaman luas di bidang pelatihan pendidikan dan kurikulum. Aktif memberikan workshop di bidang metodologi pengajaran dan pengembangan kurikulum.
                            </p>
                            <div class="flex justify-center gap-3">
                                <span class="bg-[#E8F0FE] text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Pengembangan Kurikulum</span>
                                <span class="bg-[#E8F0FE] text-blue-700 text-xs font-semibold px-3 py-1 rounded-full">Metode Pengajaran</span>
                            </div>
                        </div>
                    </div>
                    </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination mt-8"></div>
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
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
            @forelse(\App\Models\Seminar::orderBy('start_time', 'asc')->get() as $seminar)
                <div class="bg-[#F9FAFB] rounded-2xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 duration-300 w-[300px]">
                    @if($seminar->image_url)
                        <img src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}" class="rounded-t-2xl h-48 w-full object-cover">
                    @endif
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-semibold text-[#1E2A39]">{{ $seminar->title }}</h3>
                        <p class="text-sm text-[#F9D423] font-medium mt-1">Seminar</p>
                        <p class="text-gray-600 mt-3 text-sm">{{ Str::limit($seminar->description, 120) }}</p>
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
            @endforelse
        </div>
    </div>
</section>

        <!-- Fasilitas Section -->
        <section id="dokumentasi" class="facility-section py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">Fasilitas Umum Yang Didapatkan
                </h2>
                <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
                    <ul class="space-y-6">
                        <li class="flex items-center text-lg">
                            <div class="h-10 w-10 mr-4 flex items-center justify-center bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span>E-Certificate</span>
                        </li>
                        <li class="flex items-center text-lg">
                            <div class="h-10 w-10 mr-4 flex items-center justify-center bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                </svg>
                            </div>
                            <span>Q&A Session</span>
                        </li>
                        <li class="flex items-center text-lg">
                            <div class="h-10 w-10 mr-4 flex items-center justify-center bg-yellow-100 rounded-lg">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <span>E-Book Premium</span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        </main>

    <!-- Trainers Section -->
    <section id="trainers" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Para Trainer HAFECS</h2>
                <p class="text-xl text-gray-600">Bertemu dengan para ahli dan praktisi terdepan di bidang transformasi digital</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Trainer 1 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover border-t-4 border-coral">
                    <div class="w-32 h-32 bg-gradient-to-r from-coral to-teal rounded-full mx-auto mb-6 flex items-center justify-center text-white text-4xl font-bold">
                        DR
                    </div>
                    <div class="text-center space-y-4">
                        <h3 class="text-2xl font-bold text-primary">Dr. Rina Wijaya</h3>

                        <p class="text-teal font-semibold">Chief Digital Officer - TechCorp Asia</p>
                        <p class="text-gray-600 leading-relaxed">15+ tahun pengalaman memimpin transformasi digital di perusahaan multinasional. Spesialis AI implementation dan digital strategy.</p>
                    </div>
                </div>

                <!-- Trainer 2 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover border-t-4 border-teal">
                    <div class="w-32 h-32 bg-gradient-to-r from-teal to-blue-500 rounded-full mx-auto mb-6 flex items-center justify-center text-white text-4xl font-bold">
                        AH
                    </div>
                    <div class="text-center space-y-4">
                        <h3 class="text-2xl font-bold text-primary">Ahmad Hidayat, M.Sc</h3>
                        <p class="text-teal font-semibold">Senior Data Scientist - GoTech Indonesia</p>
                        <p class="text-gray-600 leading-relaxed">Expert dalam machine learning dan big data analytics. Pernah membantu 100+ perusahaan dalam implementasi data-driven decision making.</p>
                    </div>
                </div>

                <!-- Trainer 3 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover border-t-4 border-purple-500">
                    <div class="w-32 h-32 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto mb-6 flex items-center justify-center text-white text-4xl font-bold">
                        SP
                    </div>
                    <div class="text-center space-y-4">
                        <h3 class="text-2xl font-bold text-primary">Sarah Permata</h3>
                        <p class="text-teal font-semibold">Digital Transformation Consultant</p>
                        <p class="text-gray-600 leading-relaxed">Konsultan senior dengan track record memimpin proyek digital transformation untuk BUMN dan perusahaan swasta terkemuka.</p>
                    </div>
                </div>

                <!-- Trainer 4 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover border-t-4 border-coral">
                    <div class="w-32 h-32 bg-gradient-to-r from-coral to-orange-500 rounded-full mx-auto mb-6 flex items-center justify-center text-white text-4xl font-bold">
                        MF
                    </div>
                    <div class="text-center space-y-4">
                        <h3 class="text-2xl font-bold text-primary">Michael Fernando</h3>
                        <p class="text-teal font-semibold">Cybersecurity Expert - SecureNet</p>
                        <p class="text-gray-600 leading-relaxed">Certified security professional dengan keahlian khusus dalam digital security dan risk management untuk enterprise solutions.</p>
                    </div>
                </div>

                <!-- Trainer 5 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover border-t-4 border-green-500">
                    <div class="w-32 h-32 bg-gradient-to-r from-green-500 to-teal rounded-full mx-auto mb-6 flex items-center justify-center text-white text-4xl font-bold">
                        LK
                    </div>
                    <div class="text-center space-y-4">
                        <h3 class="text-2xl font-bold text-primary">Lisa Kartika</h3>
                        <p class="text-teal font-semibold">Innovation Manager - StartupHub</p>
                        <p class="text-gray-600 leading-relaxed">Pemimpin inovasi dengan pengalaman membangun ekosistem startup dan mengintegrasikan teknologi emerging dalam bisnis.</p>
                    </div>
                </div>

                <!-- Trainer 6 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover border-t-4 border-blue-500">
                    <div class="w-32 h-32 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mx-auto mb-6 flex items-center justify-center text-white text-4xl font-bold">
                        DP
                    </div>
                    <div class="text-center space-y-4">
                        <h3 class="text-2xl font-bold text-primary">David Prasetyo</h3>
                        <p class="text-teal font-semibold">Cloud Architecture Specialist</p>
                        <p class="text-gray-600 leading-relaxed">Architect berpengalaman dalam merancang dan implementasi cloud infrastructure untuk digital transformation skala enterprise.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Benefits Section -->
    <section class="py-20 hero-bg text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Highlight Benefits</h2>
                <p class="text-xl text-gray-300">Keuntungan eksklusif yang akan Anda dapatkan</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="glass rounded-2xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-3xl mb-6">🎯</div>
                    <h3 class="text-2xl font-bold mb-4">Strategic Insights</h3>
                    <p class="text-gray-300 leading-relaxed">Dapatkan strategi digital transformation terpercaya dari para ahli dengan pengalaman puluhan tahun di industri teknologi.</p>
                </div>

                <div class="glass rounded-2xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-3xl mb-6">🚀</div>
                    <h3 class="text-2xl font-bold mb-4">Latest Technology Trends</h3>
                    <p class="text-gray-300 leading-relaxed">Update terkini tentang AI, IoT, Blockchain, dan teknologi emerging yang akan membentuk masa depan bisnis Anda.</p>
                </div>

                <div class="glass rounded-2xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-3xl mb-6">🤝</div>
                    <h3 class="text-2xl font-bold mb-4">Premium Networking</h3>
                    <p class="text-gray-300 leading-relaxed">Berinteraksi langsung dengan 1000+ C-level executives, tech leaders, dan decision makers dari berbagai industri.</p>
                </div>

                <div class="glass rounded-2xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-3xl mb-6">📊</div>
                    <h3 class="text-2xl font-bold mb-4">Practical Case Studies</h3>
                    <p class="text-gray-300 leading-relaxed">Analisis mendalam success stories dan failure lessons dari implementasi digital transformation di perusahaan ternama.</p>
                </div>

                <div class="glass rounded-2xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-3xl mb-6">🏆</div>
                    <h3 class="text-2xl font-bold mb-4">Industry Recognition</h3>
                    <p class="text-gray-300 leading-relaxed">Sertifikat kehadiran dari HAFECS yang diakui industri untuk mendukung pengembangan karir profesional Anda.</p>
                </div>

                <div class="glass rounded-2xl p-8 card-hover">
                    <div class="w-16 h-16 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-3xl mb-6">💡</div>
                    <h3 class="text-2xl font-bold mb-4">Innovation Workshop</h3>
                    <p class="text-gray-300 leading-relaxed">Hands-on workshop untuk mengimplementasikan strategi digital langsung pada bisnis atau project Anda.</p>
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

    <!-- Reviews Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Ulasan Peserta</h2>
                <p class="text-xl text-gray-600">Testimoni dari peserta HAFECS event sebelumnya</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover relative">
                    <div class="absolute -top-4 left-8 text-6xl text-teal opacity-20">"</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6 relative z-10">
                        HAFECS 2024 benar-benar mengubah perspektif saya tentang digital transformation. Insights dari para trainer sangat actionable dan langsung bisa diimplementasikan di perusahaan. ROI dari mengikuti event ini luar biasa!
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-gradient-to-r from-coral to-teal rounded-full flex items-center justify-center text-white font-bold text-lg">BW</div>
                        <div>
                            <h4 class="font-bold text-primary">Budi Wicaksono</h4>
                            <p class="text-gray-500 text-sm">CTO - TechSolution Indonesia</p>
                            <div class="text-yellow-400 mt-1">★★★★★</div>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover relative">
                    <div class="absolute -top-4 left-8 text-6xl text-teal opacity-20">"</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6 relative z-10">
                        Networking opportunities di HAFECS luar biasa. Saya bertemu dengan banyak decision makers yang akhirnya menjadi business partners. Event ini worth every penny dan waktu yang diinvestasikan.
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-lg">SP</div>
                        <div>
                            <h4 class="font-bold text-primary">Sari Pertiwi</h4>
                            <p class="text-gray-500 text-sm">Digital Marketing Director - RetailCorp</p>
                            <div class="text-yellow-400 mt-1">★★★★★</div>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover relative">
                    <div class="absolute -top-4 left-8 text-6xl text-teal opacity-20">"</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6 relative z-10">
                        Sebagai startup founder, HAFECS memberi saya blueprint yang jelas untuk scaling up dengan technology. Workshop-nya sangat hands-on dan materinya up-to-date dengan trend terbaru.
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg">RM</div>
                        <div>
                            <h4 class="font-bold text-primary">Rico Mahendra</h4>
                            <p class="text-gray-500 text-sm">Founder & CEO - InnovateNow</p>
                            <div class="text-yellow-400 mt-1">★★★★★</div>
                        </div>
                    </div>
                </div>

                <!-- Review 4 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover relative">
                    <div class="absolute -top-4 left-8 text-6xl text-teal opacity-20">"</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6 relative z-10">
                        Platform virtual HAFECS sangat impressive! Meskipun join secara online, experience-nya tetap engaging. Interactive features-nya memungkinkan networking yang efektif bahkan dari jarak jauh.
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-gradient-to-r from-green-500 to-teal rounded-full flex items-center justify-center text-white font-bold text-lg">AN</div>
                        <div>
                            <h4 class="font-bold text-primary">Andini Nur</h4>
                            <p class="text-gray-500 text-sm">Data Science Manager - FinTechPlus</p>
                            <div class="text-yellow-400 mt-1">★★★★★</div>
                        </div>
                    </div>
                </div>

                <!-- Review 5 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover relative">
                    <div class="absolute -top-4 left-8 text-6xl text-teal opacity-20">"</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6 relative z-10">
                        Content quality HAFECS selalu excellent. Para trainer bukan hanya theoretical experts tapi juga practitioners yang punya real experience. Saya selalu dapat actionable insights yang bisa langsung diterapkan.
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-gradient-to-r from-orange-500 to-red-500 rounded-full flex items-center justify-center text-white font-bold text-lg">DL</div>
                        <div>
                            <h4 class="font-bold text-primary">Diana Larasati</h4>
                            <p class="text-gray-500 text-sm">VP Technology - BankMaju</p>
                            <div class="text-yellow-400 mt-1">★★★★★</div>
                        </div>
                    </div>
                </div>

                <!-- Review 6 -->
                <div class="bg-white rounded-3xl p-8 shadow-xl card-hover relative">
                    <div class="absolute -top-4 left-8 text-6xl text-teal opacity-20">"</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6 relative z-10">
                        HAFECS bukan sekedar event, tapi learning ecosystem. Post-event support dengan community access dan recording materials sangat membantu untuk continuous learning dan implementation.
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 bg-gradient-to-r from-teal to-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg">FA</div>
                        <div>
                            <h4 class="font-bold text-primary">Farid Alzamzami</h4>
                            <p class="text-gray-500 text-sm">IT Director - ManufacturingPro</p>
                            <div class="text-yellow-400 mt-1">★★★★★</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="register" class="py-20 hero-bg text-white text-center">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto space-y-8">
                <h2 class="text-4xl md:text-5xl font-bold">Ready to Transform Your Digital Future?</h2>
                <p class="text-xl text-gray-300">Jangan lewatkan kesempatan emas untuk bergabung dengan para leaders dalam Digital Transformation Summit 2025</p>
                <div class="flex flex-col sm:flex-row justify-center gap-6 pt-8">
                    <a href="#" class="bg-gradient-to-r from-coral to-red-500 text-white px-10 py-4 rounded-full font-bold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-300">
                        Daftar Sekarang - Early Bird
                    </a>
                    <a href="#" class="border-2 border-teal text-teal px-10 py-4 rounded-full font-bold text-lg hover:bg-teal hover:text-primary transition-all duration-300">
                        Download Brochure
                    </a>
                </div>

                <div class="glass rounded-3xl p-8 mt-12 max-w-2xl mx-auto">
                    <h3 class="text-2xl font-bold text-coral mb-4">⏰ Limited Time Offer</h3>
                    <div class="space-y-2">
                        <p class="text-2xl font-bold">
                            Early Bird: <span class="text-green-400">Rp 2.500.000</span>
                            <span class="text-lg text-gray-400 line-through ml-2">Rp 3.500.000</span>
                        </p>
                        <p class="text-gray-300">*Berlaku hingga 30 September 2025 atau 500 pendaftar pertama</p>

                        <div class="flex justify-center items-center space-x-8 pt-4">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-coral">30%</div>
                                <div class="text-sm text-gray-300">Discount</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-teal">2</div>
                                <div class="text-sm text-gray-300">Hari</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-bold text-yellow-400">1000+</div>
                                <div class="text-sm text-gray-300">Peserta</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-section py-10">
        <div class="container mx-auto px-6">
            <div class="md:flex justify-between items-start">
                <div class="mb-6 md:mb-0">
                    <h3 class="text-2xl font-bold mb-4">Quick Link</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:underline hover:text-blue-700 transition">&gt; Tentang Kami</a></li>
                        <li><a href="#" class="hover:underline hover:text-blue-700 transition">&gt; Syarat & Ketentuan</a></li>
                        <li><a href="#" class="hover:underline hover:text-blue-700 transition">&gt; FAQ</a></li>
                        <li><a href="#" class="hover:underline hover:text-blue-700 transition">&gt; Kebijakan Privasi</a></li>
                    </ul>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="#" class="text-blue-600 hover:underline font-semibold">View More &gt;</a>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-400 text-center">
                <p class="text-gray-600">&copy; {{ date('Y') }} HAFECS. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
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
