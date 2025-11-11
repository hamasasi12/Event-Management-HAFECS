<!DOCTYPE html>
<html lang="en" class="scroll-pt-24 scroll-smooth focus:scroll-auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Seminar Hafecs')</title>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="icon" href="{{ asset('assets/img/tlc.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    @stack('scripts')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .rotate-180 {
        transform: rotate(180deg);
    }
</style>

<body>
    {{-- HEADER REVISI (dengan tombol Login/Daftar dan Hamburger Menu) --}}
<header class="bg-white shadow-lg z-20 sticky top-0">
    <nav class="container mx-auto px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2 flex-shrink-0">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-11">
                </a>
            </div>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center justify-center space-x-8 flex-grow">
                <a href="{{ url('/') }}" class="font-semibold text-black-700 hover:text-primary transition px-3 py-1 rounded-md">Home</a>
                <a href="{{ url('/#seminars') }}" class="font-semibold text-black-700 hover:text-primary transition px-3 py-1 rounded-md">Webinar</a>
                <a href="{{ url('/#trainer') }}" class="font-semibold text-black-700 hover:text-primary transition px-3 py-1 rounded-md">Trainer</a>
                <a href="{{ url('/#dokumentasi') }}" class="font-semibold text-black-700 hover:text-primary transition px-3 py-1 rounded-md">Dokumentasi</a>
            </div>

            {{-- Hamburger Button (Mobile Only) --}}
            <button id="mobile-menu-button" class="lg:hidden text-gray-700 hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 rounded-md p-2">
                <svg id="hamburger-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="mobile-menu lg:hidden mt-4 hidden border-t pt-4">
            <a href="{{ url('/') }}" class="block py-2 px-3 rounded-md text-black-700 hover:bg-gray-100 font-medium">Home</a>
            <a href="{{ url('/#seminars') }}" class="block py-2 px-3 rounded-md text-black-700 hover:bg-gray-100 font-medium">Webinar</a>
            <a href="{{ url('/#trainer') }}" class="block py-2 px-3 rounded-md text-black-700 hover:bg-gray-100 font-medium">Trainer</a>
            <a href="{{ url('/#dokumentasi') }}" class="block py-2 px-3 rounded-md text-black-700 hover:bg-gray-100 font-medium">Dokumentasi</a>
        </div>
    </nav>
</header>
    {{-- END HEADER REVISI --}}

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-gray-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12 md:py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-10 border-b border-gray-700 pb-10 mb-8">

                <div class="md:col-span-2 lg:col-span-2">
                    <a href="{{ url('/') }}" class="inline-flex items-center mb-4">
                        <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-10 filter brightness-0 invert mr-2">
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
                    </ul>
                </div>

                <div class="md:col-span-1 lg:col-span-2">
                    <h3 class="text-lg font-bold text-white mb-4 border-b-2 border-accent inline-block pb-1">
                        Hubungi Kami
                    </h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-accent flex-shrink-0 mt-1 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span class="text-gray-400">Jl. Sungai Lumbah, Kec. Alalak, Kabupaten Barito Kuala, Kalimantan Selatan 70582</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-accent flex-shrink-0 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="text-gray-400">info@hafecs.id</span>
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
                    di HAFECS
                </p>
            </div>
        </div>
    </footer>

    @livewireScripts

    {{-- Mobile Menu Toggle Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                // Toggle menu visibility
                mobileMenu.classList.toggle('hidden');

                // Toggle icons
                hamburgerIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });

            // Close menu when clicking on menu items
            const menuItems = mobileMenu.querySelectorAll('a');
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    hamburgerIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                });
            });
        }
    });
</script>
</body>

</html>
