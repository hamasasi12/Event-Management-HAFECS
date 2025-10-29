@extends('layouts.userDashboard')

@section('content')
<style>
    /* HAFECS Color Palette */
    :root {
        --hafecs-blue: #0A2463;
        --hafecs-yellow: #F9D423;
        --hafecs-orange: #F28C28;
    }

    .page-container {
        background: linear-gradient(135deg, var(--hafecs-blue) 0%, #1e3a8a 100%);
        min-height: calc(100vh - 80px);
    }

    .card-hover {
        transition: all 0.3s ease-in-out;
    }

    .card-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .animate-float {
        animation: float 4s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }

    .gradient-text-yellow {
        background: linear-gradient(135deg, var(--hafecs-yellow) 0%, var(--hafecs-orange) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<div class="page-container">
    <!-- Header with Back Button -->
    <div class="container mx-auto px-4 sm:px-6 pt-6 pb-4">
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 sm:px-6 py-8 sm:py-12">

        <!-- Hero Section -->
        <div class="text-center mb-12 sm:mb-16">
            <div class="inline-flex items-center justify-center w-20 h-20 sm:w-24 sm:h-24 bg-yellow-400 bg-opacity-10 rounded-full mb-6 animate-float">
                <svg class="w-10 h-10 sm:w-12 sm:h-12 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white mb-4">
                Tim Web Developer
            </h1>
            <p class="text-lg sm:text-xl text-blue-200 max-w-3xl mx-auto leading-relaxed">
                Orang-orang hebat di balik sistem HAFECS yang modern, efisien, dan user-friendly
            </p>
        </div>

        <!-- Team Stats -->
        <div class="max-w-2xl mx-auto grid grid-cols-2 gap-4 sm:gap-6 mb-12 sm:mb-16">
            <div class="bg-blue-900 bg-opacity-30 backdrop-blur-lg rounded-2xl p-4 sm:p-6 text-center border border-blue-400 border-opacity-20">
                <div class="text-3xl sm:text-4xl font-bold text-white mb-2">3</div>
                <div class="text-xs sm:text-sm text-blue-200 font-medium uppercase tracking-wider">Team Members</div>
            </div>
            <div class="bg-blue-900 bg-opacity-30 backdrop-blur-lg rounded-2xl p-4 sm:p-6 text-center border border-blue-400 border-opacity-20">
                <div class="text-3xl sm:text-4xl font-bold text-white mb-2">3+</div>
                <div class="text-xs sm:text-sm text-blue-200 font-medium uppercase tracking-wider">Years Experience</div>
            </div>
        </div>

        <!-- Team Members Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12">

                        <!-- Developer : Muhammad saidi -->
                    <div class="bg-white rounded-3xl p-6 sm:p-8 text-center shadow-2xl card-hover">
                <!-- Foto di tengah -->
                <div class="mb-6 flex justify-center">
                   <img src="{{ asset('images/team/saidi.png') }}"
                        alt="team"
                        class="rounded-lg shadow-lg w-48 h-auto object-cover">
                </div>
                <!-- Nama -->
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">
                    Muhammad saidi
                </h3>
                <!-- Posisi / Role -->
                <div class="inline-block bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-4 py-1.5 rounded-full text-xs sm:text-sm font-semibold mb-4 shadow-md">
                    Backend Developer
                </div>
                <p class="text-sm sm:text-base text-gray-600 mb-5 leading-relaxed">
                   Expert dalam membangun sistem backend yang robust dan scalable menggunakan Laravel, Node.js, dan database management.
                </p>
                <div class="mb-6">
                    <h4 class="text-xs font-semibold text-gray-500 uppercase mb-3 tracking-wider">Keahlian</h4>
                    <div class="flex flex-wrap justify-center gap-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">Laravel</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">Node.js</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">MySQL</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">REST API</span>
                    </div>
                </div>
                <div class="flex justify-center space-x-4 pt-4 border-t border-gray-100">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-200 transform hover:scale-110" title="GitHub">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-200 transform hover:scale-110" title="LinkedIn">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Developer 2: Ferigunawan -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 text-center shadow-2xl card-hover">
                <div class="mb-6 flex justify-center">
                    <img src="{{ asset('images/team/ferigunawan.jpg') }}"
                        alt="team"
                        class="rounded-lg shadow-lg w-48 h-auto object-cover">
                </div>
                <!-- Nama -->
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">
                Feri Gunawan
                </h3>
                <!-- Posisi / Role -->
                <div class="inline-block bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-4 py-1.5 rounded-full text-xs sm:text-sm font-semibold mb-4 shadow-md">
                    Backend Developer
                </div>
                <p class="text-sm sm:text-base text-gray-600 mb-5 leading-relaxed">
                   Expert dalam membangun sistem backend yang robust dan scalable menggunakan Laravel, Node.js, dan database management.
                </p>
                <div class="mb-6">
                    <h4 class="text-xs font-semibold text-gray-500 uppercase mb-3 tracking-wider">Keahlian</h4>
                    <div class="flex flex-wrap justify-center gap-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">Laravel</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">Node.js</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">MySQL</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">REST API</span>
                    </div>
                </div>
                <div class="flex justify-center space-x-4 pt-4 border-t border-gray-100">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-200 transform hover:scale-110" title="GitHub">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-200 transform hover:scale-110" title="LinkedIn">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Developer 3: Diyah Ayu mawarni -->
             <div class="bg-white rounded-3xl p-6 sm:p-8 text-center shadow-2xl card-hover">
                <!-- Foto di tengah -->
                <div class="mb-6 flex justify-center">
                   <img src="{{ asset('images/team/ayu.jpg') }}"
                        alt="team"
                        class="rounded-lg shadow-lg w-48 h-auto object-cover">
                </div>
                <!-- Nama -->
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">
                    Diyah Ayu Mawarni
                </h3>
                <!-- Posisi / Role -->
                <div class="inline-block bg-gradient-to-r from-blue-500 to-blue-400 text-white px-4 py-1.5 rounded-full text-xs sm:text-sm font-semibold mb-4 shadow-md">
                    Frontend Developer
                </div>
                <p class="text-sm sm:text-base text-gray-600 mb-5 leading-relaxed">
                  Spesialis dalam menciptakan antarmuka pengguna yang menarik dan responsif menggunakan teknologi frontend modern seperti React.js dan Tailwind CSS.
                </p>
                <div class="mb-6">
                    <h4 class="text-xs font-semibold text-gray-500 uppercase mb-3 tracking-wider">Keahlian</h4>
                    <div class="flex flex-wrap justify-center gap-2">
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">React.js</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">Vue.js</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">Tailwind CSS</span>
                        <span class="bg-blue-100 text-blue-800 text-xs px-3 py-1.5 rounded-full font-medium">JavaScrip</span>
                    </div>
                </div>
                <div class="flex justify-center space-x-4 pt-4 border-t border-gray-100">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-200 transform hover:scale-110" title="GitHub">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition duration-200 transform hover:scale-110" title="LinkedIn">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="bg-blue-900 bg-opacity-30 backdrop-blur-lg rounded-3xl p-8 sm:p-12 text-center border border-blue-400 border-opacity-20 shadow-2xl">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-yellow-400 bg-opacity-10 rounded-full mb-6">
                <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
            </div>
            <h3 class="text-2xl sm:text-3xl font-bold text-white mb-4">Terima Kasih!</h3>
            <p class="text-base sm:text-lg text-blue-200 max-w-2xl mx-auto leading-relaxed mb-8">
                Kami sangat senang dapat berkontribusi dalam membangun sistem HAFECS.
                Jika Anda memiliki pertanyaan atau ingin berkolaborasi, jangan ragu untuk menghubungi kami!
            </p>
        </div>

    </div>
</div>
@endsection
