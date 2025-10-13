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
            /* Reset body centering for full-width header */
            display: block;
            padding: 0;
        }
        /* Ensure the main card is centered with padding */
        .main-card-container {
            padding: 2rem 1rem;
            margin: 0 auto; /* Center the card horizontally */
            max-width: 1024px;
        }
    </style>
</head>
<body>

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
                    <a href="#dokumentasi" class="font-semibold text-black-900 hover:text-blue-700 transition">Dokumentasi</a>
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
    <!-- End Header -->

    <!-- Main Card Content Wrapper -->
    <div class="main-card-container">
        <div class="w-full max-w-4xl bg-accent-light text-primary-dark p-6 sm:p-8 lg:p-10 rounded-3xl shadow-2xl mx-auto">

              <!-- Main Card: Added 'relative' here to position the back button absolutely -->
        <div class="bg-accent-light text-primary-dark p-6 sm:p-8 lg:p-10 rounded-3xl shadow-2xl mx-auto relative">

            <!-- Back to Home Button (Absolute Position: Top Left) -->
            <a href="/" class="absolute top-7 left-4 sm:top-6 sm:left-6
                flex items-center space-x-1 p-2 pr-3 bg-white text-primary-dark font-medium text-sm rounded-full
                shadow-lg transition duration-200 back-button-hover">
                <!-- Chevron Left Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                <span>Beranda</span>
            </a>

            <!-- Header / Main Content Area (Responsive Layout) -->
            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8">


                <!-- Image Area (Stacks on Mobile, fixed width on Desktop) -->
                <div class="lg:w-1/3 flex-shrink-0">
                    <!-- Using a professional placeholder image for the trainer -->
                            <img src="{{ asset('images/admin/pa yudhis.png') }}" alt="Trainer"
                                class="rounded-lg mx-auto mb-4 object-cover w-full h-64">
                </div>

                <!-- Text Content Area -->
                <div class="lg:w-2/3 flex flex-col justify-center">
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-primary-dark leading-snug">
                        Work Life Balance
                    </h1>
                    <h2 class="text-lg sm:text-xl font-medium mt-1 text-gray-700">
                        Oleh: Hamas Akif Sanie, A.Md.Kom
                    </h2>

                    <!-- Info Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5 text-gray-800">

                        <!-- Date -->
                        <div class="flex items-center space-x-2">
                            <!-- Calendar Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="font-semibold">17 September 2024</span>
                        </div>

                        <!-- Platform -->
                        <div class="flex items-center space-x-2">
                            <!-- Video Camera Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span>Online Via</span>
                            <span class="bg-white px-3 py-1 text-sm font-bold rounded-full shadow-md">Zoom</span>
                        </div>

                        <!-- Organizer -->
                        <div class="flex items-center space-x-2">
                            <!-- User Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span>By: Admin</span>
                            <a href="#" class="text-sm font-medium underline hover:text-primary-dark/80 transition duration-150">Contact Us</a>
                        </div>

                        <!-- Time (Added for completeness) -->
                        <div class="flex items-center space-x-2">
                            <!-- Clock Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="font-semibold">09:00 - 11:00 WIB</span>
                        </div>

                    </div>
                </div>
            </div>

            <!-- About Event Section -->
            <div class="mt-8 pt-4 border-t-2 border-primary-dark/20">
                <h2 class="text-xl font-bold mb-3 pb-1 text-primary-dark">
                    Tentang Acara
                </h2>
                <p class="text-base text-gray-700 leading-relaxed">
                    Webinar **"Work-Life Balance"** akan membahas cara menjaga keseimbangan antara pekerjaan dan kehidupan pribadi. Dapatkan tips dan strategi sederhana untuk tetap produktif, sehat, dan bahagia tanpa harus mengorbankan waktu berharga bersama diri sendiri maupun orang terdekat. Fokus pada penerapan praktis dan langkah-langkah yang dapat segera Anda mulai hari ini!
                </p>

                <!-- NEW: Topics Section -->
                <div class="mt-8">
                    <h3 class="text-lg font-bold mb-4 text-primary-dark border-b pb-1 border-primary-dark/10">
                        Materi yang Akan Dibahas
                    </h3>
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex items-start space-x-3">
                            <!-- Checkmark Icon in Yellow -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-button-yellow flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.618a1.5 1.5 0 010 2.121L10.707 15.657a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414l3.293 3.293 3.293-3.293a1 1 0 011.414 1.414z" />
                            </svg>
                            <p class="font-medium">Mengenali Batasan Diri (Self-Limitation Awareness)</p>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-button-yellow flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.618a1.5 1.5 0 010 2.121L10.707 15.657a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414l3.293 3.293 3.293-3.293a1 1 0 011.414 1.414z" />
                            </svg>
                            <p class="font-medium">Teknik *Time Blocking* untuk Produktivitas Maksimal</p>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-button-yellow flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.618a1.5 1.5 0 010 2.121L10.707 15.657a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414l3.293 3.293 3.293-3.293a1 1 0 011.414 1.414z" />
                            </svg>
                            <p class="font-medium">Pentingnya *'Me Time'* dan Dampaknya pada Kesejahteraan Emosional</p>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-button-yellow flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.618a1.5 1.5 0 010 2.121L10.707 15.657a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414l3.293 3.293 3.293-3.293a1 1 0 011.414 1.414z" />
                            </svg>
                            <p class="font-medium">Studi Kasus dan Sesi Tanya Jawab Interaktif</p>
                        </li>
                    </ul>
                </div>
                <!-- END NEW: Topics Section -->

                <!-- Join Button (Moved to center and separated) -->
                <div class="flex justify-center mt-10 pt-6 border-t border-primary-dark/20">
                    <a href="{{ route('seminar.register', \Vinkla\Hashids\Facades\Hashids::encode($seminar->id)) }}" class="bg-button-yellow text-primary-dark font-bold py-3 px-8 rounded-full shadow-xl hover:bg-[#F8C200] transition duration-300 transform hover:scale-105 inline-flex items-center space-x-2 text-lg">
                        <span>Gabung Webinar Sekarang</span>
                        <!-- Right Arrow Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- End Main Card Content Wrapper -->

    <script>
        // JavaScript for mobile menu toggle
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
