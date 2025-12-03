<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $trainer->name }} - HAFECS Profile</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-color: #FDFDFD;
        }
        .text-primary { color: #1e3a8a; }
        .text-accent { color: #f59e0b; }
    </style>
</head>

<body class="font-sans flex flex-col min-h-screen">

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
                <div class="hidden lg:flex items-center justify-center space-x-8 grow">
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

    <main class="grow">
        <!-- Trainer Profile Section -->
        <section class="py-16 sm:py-20 bg-white">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="flex flex-col md:flex-row gap-10 items-start">
                    <!-- Trainer Image -->
                    <div class="w-full md:w-1/3">
                        <div class="rounded-2xl overflow-hidden shadow-xl">
                            @if($trainer->image_url)
                                <img src="{{ $trainer->image_url }}" alt="{{ $trainer->name }}" class="w-full h-auto object-cover">
                            @else
                                <img src="{{ asset('images/admin/default_trainer.jpg') }}" alt="{{ $trainer->name }}" class="w-full h-auto object-cover">
                            @endif
                        </div>
                    </div>

                    <!-- Trainer Details -->
                    <div class="w-full md:w-2/3">
                        <h1 class="text-3xl sm:text-4xl font-bold text-[#004599] mb-2">{{ $trainer->name }}</h1>
                        <p class="text-xl text-gray-600 font-medium mb-6">{{ $trainer->position }}</p>

                        <div class="mb-8">
                            <h3 class="text-lg font-bold text-gray-800 mb-3 border-b pb-2">Tentang Trainer</h3>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $trainer->bio }}</p>
                        </div>

                        @if($trainer->skills)
                            <div class="mb-8">
                                <h3 class="text-lg font-bold text-gray-800 mb-3 border-b pb-2">Keahlian</h3>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($trainer->skills as $skill)
                                        <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full">{{ $skill }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Seminars Section -->
        <section class="py-16 sm:py-20 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center mb-10 sm:mb-12">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">Seminar oleh {{ $trainer->name }}</h2>
                    <p class="text-gray-600">Ikuti seminar yang dibawakan langsung oleh trainer ini.</p>
                </div>

                <div class="grid gap-6 sm:gap-8 justify-center sm:grid-cols-2 lg:grid-cols-3">
                    @forelse($trainer->seminars as $seminar)
                        @livewire('seminar-card', ['seminar' => $seminar])
                    @empty
                        <div class="text-center w-full p-8 col-span-full bg-white rounded-lg shadow-sm">
                            <p class="text-gray-500">Belum ada seminar aktif dari trainer ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <p class="text-xs sm:text-sm text-gray-500">
                    &copy; {{ date('Y') }} HAFECS. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile menu toggle
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
        });
    </script>
</body>
</html>
