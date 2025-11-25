<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Seminar: Work Life Balance</title>
    <!-- Load Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom configuration for the color palette -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-dark': '#0A2463', // Dark Blue
                        'accent-light': '#F2E3B3', // Cream/Yellowish Card BG
                        'button-yellow': '#F9D423', // Vibrant Yellow
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        /* Apply Inter font and dark background */
        body {
            background-color: #0A2463;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: block;
            padding: 0;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="bg-white shadow-lg z-20 sticky top-0">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2 flex-shrink-0">
                    <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-11">
                </div>

                <div class="hidden md:flex items-center justify-center space-x-8 flex-grow">
                    <a href="{{ url('/') }}" class="font-semibold text-gray-700 hover:text-primary transition px-3 py-1 rounded-md">Home</a>
                    <a href="#webinar" class="font-semibold text-gray-700 hover:text-primary transition px-3 py-1 rounded-md">Webinar</a>
                    <a href="#trainer" class="font-semibold text-gray-700 hover:text-primary transition px-3 py-1 rounded-md">Trainer</a>
                    <a href="#dokumentasi" class="font-semibold text-gray-700 hover:text-primary transition px-3 py-1 rounded-md">Dokumentasi</a>
                </div>

                <div class="md:hidden flex-shrink-0">
                    <button id="mobile-menu-button" class="text-gray-600 focus:outline-none p-2 rounded-md hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div id="mobile-menu" class="mobile-menu md:hidden mt-4 hidden border-t pt-4">
                <a href="{{ url('/') }}" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Home</a>
                <a href="#webinar" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Webinar</a>
                <a href="#trainer" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Trainer</a>
                <a href="#dokumentasi" class="block py-2 px-3 rounded-md text-gray-700 hover:bg-gray-100 font-medium">Dokumentasi</a>
                <a href="#" class="block py-2 px-3 rounded-md mt-2 text-center text-white bg-accent hover:bg-yellow-600 font-bold">Bantuan/Hubungi Kami</a>
            </div>
        </nav>
    </header>

    <!-- Main Card Content - HANYA SATU CARD -->
    <div class="container mx-auto px-2 sm:px-4 py-4 sm:py-8 max-w-5xl">
        <div class="bg-accent-light text-primary-dark p-4 sm:p-6 lg:p-10 rounded-3xl shadow-2xl relative">

            <!-- Back to Home Button -->
            <a href="/" class="absolute top-4 left-4 sm:top-6 sm:left-6 flex items-center space-x-1 p-2 pr-3 bg-white text-primary-dark font-medium text-xs sm:text-sm rounded-full shadow-lg hover:shadow-xl transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span>Beranda</span>
            </a>

            <!-- Header / Main Content Area -->
            <div class="flex flex-col lg:flex-row gap-4 sm:gap-6 lg:gap-8 mt-12 sm:mt-8">

                <!-- Image Area -->
                <div class="lg:w-1/3 flex-shrink-0">
                    @if($seminar->image_url)
                        <img src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}"
                            class="rounded-lg mx-auto mb-4 object-cover w-full h-64 shadow-md">
                    @else
                        <img src="{{ asset('images/admin/default_seminar.jpg') }}" alt="{{ $seminar->title }}"
                            class="rounded-lg mx-auto mb-4 object-cover w-full h-64 shadow-md">
                    @endif
                </div>

                <!-- Text Content Area -->
                <div class="lg:w-2/3 flex flex-col justify-center">
                    <h1 class="text-xl sm:text-2xl lg:text-3xl font-extrabold text-primary-dark leading-snug break-words">
                        {{ $seminar->title }}
                    </h1>
                    @if($seminar->trainer)
                    <h2 class="text-lg sm:text-xl font-medium mt-1 text-gray-700">
                        Oleh: {{ $seminar->trainer->name }}
                    </h2>
                    @else
                    <h2 class="text-lg sm:text-xl font-medium mt-1 text-gray-700">
                        Oleh: Trainer Belum Ditentukan
                    </h2>
                    @endif

                    <!-- Info Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5 text-gray-800">

                        <!-- Date -->
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="font-semibold">{{ $seminar->start_time->format('d F Y') }}</span>
                        </div>

                        <!-- Platform -->
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span>Online Via</span>
                            <span class="bg-white px-3 py-1 text-sm font-bold rounded-full shadow-md">{{ parse_url($seminar->link)['host'] ?? 'Platform' }}</span>
                        </div>

                        <!-- Organizer -->
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>By: Admin</span>
                            <a href="#" class="text-sm font-medium underline hover:text-primary-dark/80 transition duration-150">Contact Us</a>
                        </div>

                        <!-- Time -->
                        <div class="flex items-center space-x-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-semibold">{{ $seminar->start_time->format('H:i') }} - {{ $seminar->end_time->format('H:i') }} WIB</span>
                        </div>

                    </div>
                </div>
            </div>

            <!-- About Event Section -->
            <div class="mt-8 pt-6 border-t-2 border-primary-dark/20">
                <h2 class="text-xl font-bold mb-3 text-primary-dark">
                    Tentang Acara
                </h2>
                <p class="text-base text-gray-700 leading-relaxed">
                    {{ $seminar->description }}
                </p>

                <!-- Topics Section -->
                <div class="mt-8">
                    <h3 class="text-lg font-bold mb-4 text-primary-dark border-b pb-2 border-primary-dark/10">
                        Materi yang Akan Dibahas
                    </h3>
                    @if($seminar->materi)
                    <div class="text-gray-700">
                        @php
                            $topics = explode("\n", $seminar->materi);
                            foreach($topics as $topic) {
                                $cleanTopic = trim($topic);
                                if(!empty($cleanTopic)) {
                                    $cleanTopic = preg_replace('/^[\-\*]\s*/', '', $cleanTopic);
                                    if(!empty($cleanTopic)) {
                                        echo '<div class="flex items-start space-x-3 mb-3">';
                                        echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-button-yellow flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                                        echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />';
                                        echo '</svg>';
                                        echo '<p class="font-medium">' . e($cleanTopic) . '</p>';
                                        echo '</div>';
                                    }
                                }
                            }
                        @endphp
                    </div>
                    @else
                    <p class="text-gray-700 italic">Belum ada materi yang ditentukan untuk seminar ini.</p>
                    @endif
                </div>

                <!-- Join Button - RESPONSIVE -->
                <div class="flex justify-center mt-10 pt-6 border-t border-primary-dark/20">
                    <a href="{{ route('seminar.register', \Vinkla\Hashids\Facades\Hashids::encode($seminar->id)) }}"
                       class="w-full sm:w-auto bg-button-yellow text-primary-dark font-bold py-3 px-6 sm:px-8 rounded-full shadow-xl hover:bg-[#F8C200] hover:shadow-2xl transition duration-300 transform hover:scale-105 inline-flex items-center justify-center space-x-2 text-base sm:text-lg">
                        <span>Gabung Webinar Sekarang</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
