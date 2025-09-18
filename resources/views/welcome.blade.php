<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAFECS 2025 - Digital Transformation Summit</title>
    @vite('resources/css/app.css')

</head>
<body class="font-sans text-gray-900">
    <!-- Header -->
    <header class="fixed w-full top-0 z-50 hero-bg text-white transition-all duration-300" id="header">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="text-3xl font-bold gradient-text">HAFECS</div>

                <!-- Desktop Menu -->
                <ul class="hidden md:flex space-x-8">
                    <li><a href="#seminars" class="hover:text-teal transition-colors px-4 py-2 rounded-full hover:bg-white hover:bg-opacity-10">Seminar</a></li>
                    <li><a href="#trainers" class="hover:text-teal transition-colors px-4 py-2 rounded-full hover:bg-white hover:bg-opacity-10">Trainers</a></li>
                    <li><a href="#facilities" class="hover:text-teal transition-colors px-4 py-2 rounded-full hover:bg-white hover:bg-opacity-10">Facilities</a></li>
                    <li><a href="#faq" class="hover:text-teal transition-colors px-4 py-2 rounded-full hover:bg-white hover:bg-opacity-10">FAQ</a></li>
                </ul>

                @guest
                <a href="{{ route('google.login') }}" class="bg-gradient-to-r from-coral to-red-500 text-white px-8 py-4 rounded-full font-semibold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 text-center">
                    Login with Google
                </a>
                @endguest
                @auth
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <svg class="h-10 w-10 rounded-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.997A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="border-2 border-teal text-teal px-4 py-2 rounded-full font-semibold text-sm hover:bg-teal hover:text-primary transition-all duration-300 text-center">
                            Keluar
                        </button>
                    </form>
                </div>
                @endauth
                <!-- Mobile Menu Button -->
                <button class="md:hidden" id="mobileMenuBtn">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden mt-4 hidden" id="mobileMenu">
                <ul class="space-y-2">
                    <li><a href="#home" class="block px-4 py-2 hover:bg-white hover:bg-opacity-10 rounded">Home</a></li>
                    <li><a href="#about" class="block px-4 py-2 hover:bg-white hover:bg-opacity-10 rounded">About</a></li>
                    <li><a href="#trainers" class="block px-4 py-2 hover:bg-white hover:bg-opacity-10 rounded">Trainers</a></li>
                    <li><a href="#facilities" class="block px-4 py-2 hover:bg-white hover:bg-opacity-10 rounded">Facilities</a></li>
                    <li><a href="#faq" class="block px-4 py-2 hover:bg-white hover:bg-opacity-10 rounded">FAQ</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero-bg text-white pt-24 pb-20 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-20">
            <svg class="w-full h-full" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <radialGradient id="grad1" cx="50%" cy="50%" r="50%">
                        <stop offset="0%" stop-color="#ff6b6b" stop-opacity="0.3" />
                        <stop offset="100%" stop-color="#4ecdc4" stop-opacity="0.1" />
                    </radialGradient>
                </defs>
                <circle cx="200" cy="200" r="150" fill="url(#grad1)" />
                <circle cx="800" cy="300" r="200" fill="url(#grad1)" />
                <circle cx="600" cy="700" r="180" fill="url(#grad1)" />
            </svg>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Hero Text -->
                <div class="space-y-6">
                    <h1 class="text-5xl md:text-6xl font-extrabold leading-tight">
                        Digital Transformation Summit 2025
                    </h1>
                    <p class="text-xl md:text-2xl text-teal font-semibold">Powered by HAFECS</p>
                    <p class="text-lg md:text-xl text-gray-200 leading-relaxed">
                        Bergabunglah dengan 1000+ profesional dalam acara transformasi digital terbesar tahun ini.
                        Dapatkan insights terdepan, networking berkualitas, dan strategi bisnis masa depan.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        @guest
                        <a href="{{ route('google.login') }}" class="bg-gradient-to-r from-coral to-red-500 text-white px-8 py-4 rounded-full font-semibold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 text-center">
                            Login with Google
                        </a>
                        @endguest
                        @auth
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <svg class="h-10 w-10 rounded-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 20.993V24H0v-2.997A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div>
                                <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                                <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="border-2 border-teal text-teal px-4 py-2 rounded-full font-semibold text-sm hover:bg-teal hover:text-primary transition-all duration-300 text-center">
                                    Keluar
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>

                <!-- Event Info Card -->
                <div class="glass rounded-3xl p-8 space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-r from-coral to-teal w-12 h-12 rounded-full flex items-center justify-center text-2xl">📅</div>
                        <div>
                            <p class="text-xl font-bold">25-26 Oktober 2025</p>
                            <p class="text-gray-300">Weekend Special Event</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-r from-coral to-teal w-12 h-12 rounded-full flex items-center justify-center text-2xl">🕒</div>
                        <div>
                            <p class="text-xl font-bold">09:00 - 17:00 WIB</p>
                            <p class="text-gray-300">Full Day Experience</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-r from-coral to-teal w-12 h-12 rounded-full flex items-center justify-center text-2xl">📍</div>
                        <div>
                            <p class="text-xl font-bold">Jakarta Convention Center</p>
                            <p class="text-gray-300">& Virtual Platform</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="bg-gradient-to-r from-coral to-teal w-12 h-12 rounded-full flex items-center justify-center text-2xl">👥</div>
                        <div>
                            <p class="text-xl font-bold">1000+ Participants</p>
                            <p class="text-gray-300">Limited Seats</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Poster Section -->
    <section id="poster" class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Event Poster</h2>
                <p class="text-xl text-gray-600">Visual overview acara Digital Transformation Summit 2025</p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="hero-bg text-white p-12 rounded-3xl shadow-2xl relative overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 bg-gradient-to-br from-coral via-purple-500 to-teal opacity-20"></div>

                    <div class="relative z-10 text-center space-y-8">
                        <h2 class="text-5xl md:text-6xl font-extrabold gradient-text">HAFECS 2025</h2>
                        <p class="text-2xl md:text-3xl text-teal font-semibold">
                            "Accelerating Digital Excellence Through Innovation"
                        </p>

                        <div class="grid md:grid-cols-2 gap-8 mt-12">
                            <div class="glass rounded-2xl p-6">
                                <h4 class="text-coral font-bold text-lg mb-3">Tema Utama</h4>
                                <p>Digital Transformation, AI Integration, Future of Work, Sustainable Technology</p>
                            </div>
                            <div class="glass rounded-2xl p-6">
                                <h4 class="text-coral font-bold text-lg mb-3">Target Audience</h4>
                                <p>C-Level Executives, IT Leaders, Digital Professionals, Entrepreneurs</p>
                            </div>
                            <div class="glass rounded-2xl p-6">
                                <h4 class="text-coral font-bold text-lg mb-3">Format Event</h4>
                                <p>Hybrid: Offline (Jakarta) + Online Platform dengan Interactive Features</p>
                            </div>
                            <div class="glass rounded-2xl p-6">
                                <h4 class="text-coral font-bold text-lg mb-3">Bahasa</h4>
                                <p>Bilingual: Bahasa Indonesia & English dengan Real-time Translation</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Seminars Section -->
    <section id="seminars" class="py-20 bg-gray-100">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Upcoming Seminars</h2>
                <p class="text-xl text-gray-600">Join our upcoming seminars to stay ahead in the digital age.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach(App\Models\Seminar::all() as $seminar)
                @livewire('seminar-card', ['seminar' => $seminar])
                @endforeach
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
    <footer class="bg-primary text-white py-12">
        <div class="container mx-auto px-6 text-center space-y-4">
            <div class="text-2xl font-bold gradient-text">HAFECS</div>
            <p class="text-gray-400">High-Performance Academy for Executive & Corporate Success</p>
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-2 sm:space-y-0 sm:space-x-8 text-gray-400">
                <div class="flex items-center space-x-2">
                    <span>📧</span>
                    <span>info@hafecs.com</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span>📱</span>
                    <span>+62-21-5555-0123</span>
                </div>
                <div class="flex items-center space-x-2">
                    <span>🌐</span>
                    <span>www.hafecs.com</span>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-8 mt-8">
                <p class="text-gray-400">&copy; 2025 HAFECS. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // FAQ Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');
                const icon = question.querySelector('span');

                question.addEventListener('click', () => {
                    const isActive = answer.style.maxHeight && answer.style.maxHeight !== '0px';

                    // Close all other items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item) {
                            const otherAnswer = otherItem.querySelector('.faq-answer');
                            const otherIcon = otherItem.querySelector('.faq-question span');
                            otherAnswer.style.maxHeight = '0px';
                            otherIcon.textContent = '+';
                            otherItem.querySelector('.faq-question').classList.remove('bg-gray-100');
                        }
                    });

                    // Toggle current item
                    if (isActive) {
                        answer.style.maxHeight = '0px';
                        icon.textContent = '+';
                        question.classList.remove('bg-gray-100');
                    } else {
                        answer.style.maxHeight = answer.scrollHeight + 'px';
                        icon.textContent = '-';
                        question.classList.add('bg-gray-100');
                    }
                });
            });
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                        , block: 'start'
                    });
                }
            });
        });

        // Header background change on scroll
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(26, 26, 46, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'linear-gradient(135deg, #1a1a2e, #16213e, #0f3460)';
                header.style.backdropFilter = 'none';
            }
        });

        // Animate elements on scroll
        const observerOptions = {
            threshold: 0.1
            , rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        // Observe all cards and sections for animation
        document.querySelectorAll('.card-hover').forEach(el => {
            observer.observe(el);
        });

        // Close mobile menu when clicking on links
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');
            });
        });

    </script>
</body>
</html>
