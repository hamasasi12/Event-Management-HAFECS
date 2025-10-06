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
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#webinar" class="text-gray-600 hover:text-blue-700 transition">Webinar</a>
                    <a href="#trainer" class="text-gray-600 hover:text-blue-700 transition">Trainer</a>
                    <a href="#dokumentasi" class="text-gray-600 hover:text-blue-700 transition">Dokumentasi</a>
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
        <section id="trainer" class="trainer-section py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-white mb-12">Trainer</h2>
                <div class="swiper trainer-swiper">
                    <div class="swiper-wrapper">
                        <!-- Trainer Card 1 -->
                        <div class="swiper-slide">
                            <div class="trainer-card text-center">
                                <img src="https://placehold.co/128x128/CCCCCC/FFFFFF?text=Trainer+1" alt="Trainer"
                                    class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                <h3 class="text-xl font-bold">Danang Bagus Yudistira</h3>
                                <p class="text-gray-600">Pengembangan Kurikulum</p>
                            </div>
                        </div>
                        <!-- Trainer Card 2 -->
                        <div class="swiper-slide">
                            <div class="trainer-card text-center">
                                <img src="https://placehold.co/128x128/CCCCCC/FFFFFF?text=Trainer+2" alt="Trainer"
                                    class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                <h3 class="text-xl font-bold">Siti Nurhaliza</h3>
                                <p class="text-gray-600">Metode Pengajaran</p>
                            </div>
                        </div>
                        <!-- Trainer Card 3 -->
                        <div class="swiper-slide">
                            <div class="trainer-card text-center">
                                <img src="https://placehold.co/128x128/CCCCCC/FFFFFF?text=Trainer+3" alt="Trainer"
                                    class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                <h3 class="text-xl font-bold">Ahmad Fauzi</h3>
                                <p class="text-gray-600">Teknologi Pendidikan</p>
                            </div>
                        </div>
                        <!-- Trainer Card 4 -->
                        <div class="swiper-slide">
                            <div class="trainer-card text-center">
                                <img src="https://placehold.co/128x128/CCCCCC/FFFFFF?text=Trainer+4" alt="Trainer"
                                    class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                <h3 class="text-xl font-bold">Rina Kusuma</h3>
                                <p class="text-gray-600">Inovasi Digital</p>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination mt-8"></div>
                </div>
            </div>
        </section>

        <!-- Upcoming Seminars Section -->
        <section id="webinar" class="seminar-section py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-white mb-12">Upcoming Seminars</h2>
                <div class="swiper seminar-swiper">
                    <div class="swiper-wrapper">
                        @forelse(\App\Models\Seminar::orderBy('start_time', 'asc')->get() as $seminar)
                            <div class="swiper-slide">
                                @livewire('seminar-card', ['seminar' => $seminar], key($seminar->id))
                            </div>
                        @empty
                            <div class="swiper-slide">
                                <div class="seminar-card text-center p-8">
                                    <p class="text-gray-600">Belum ada seminar yang tersedia</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination mt-8"></div>
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

        <!-- Ulasan Section -->
        <section class="review-section py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-12">Masukkan Ulasan</h2>
                <div class="max-w-2xl mx-auto">
                    <form >
                        @csrf
                        <div class="bg-white rounded-lg shadow-lg p-6">
                            <textarea
                                name="message"
                                class="w-full h-32 p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Masukkan Pesan"
                                required></textarea>
                            <div class="flex justify-end mt-4">
                                <button type="submit"
                                    class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition duration-200">
                                    Kirim
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

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
</body>

</html>
