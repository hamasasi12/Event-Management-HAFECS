<header class="mb-2">
    <nav class="fixed w-full z-20 top-0 start-0 bg-blue-50/95 transition-all duration-300"
        aria-label="Main navigation">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-1 sm:py-2 px-4">
            <a href="{{ route('welcome') }}"
                class="flex items-center space-x-3 transition-transform duration-300 hover:scale-105 group ml-8 md:ml-12"
                aria-label="HAFECS Home">
                <div class="overflow-hidden rounded-lg">
                    <img src="{{ asset('./assets/icon/logo_hafecs.png') }}" class="transition-all duration-500"
                        alt="Logo HAFECS" width="150" height="40" />
                </div>
            </a>

            <button id="menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false"
                aria-controls="mobile-menu"
                class="lg:hidden text-blue-700 hover:text-blue-500 focus:outline-none transition-all duration-300 transform hover:rotate-180">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <div class="hidden lg:flex lg:absolute lg:left-1/2 lg:transform lg:-translate-x-1/2 lg:items-center lg:space-x-10 text-sm font-medium"
                id="menu" role="menubar">
                <a href="https://hafecs.id/"
                    class="text-gray-800 hover:text-blue-600 transition-all duration-200 px-2 py-1"
                    target="_blank" rel="noopener noreferrer">Website HAFECS</a>
                <!-- <a href="https://elevate.hafecs.id/" class="text-gray-800 hover:text-blue-600 transition-all duration-200 px-2 py-1" target="_blank" rel="noopener noreferrer">Elevate</a> -->
                <a href="{{ route('welcome') }}#mentor"
                    class="text-gray-800 hover:text-blue-600 transition-all duration-200 px-2 py-1">Trainer</a>
                <a href="{{ route('welcome') }}#timeline"
                    class="text-gray-800 hover:text-blue-600 transition-all duration-200 px-2 py-1">Timeline</a>
                <a href="{{ route('welcome') }}#dokumentasi"
                    class="text-gray-800 hover:text-blue-600 transition-all duration-200 px-2 py-1">Dokumentasi</a>
                <a href="{{ route('past-webinar') }}"
                    class="text-gray-800 hover:text-blue-600 transition-all duration-200 px-2 py-1">Past Webinar</a>
            </div>

            <!-- Login & Register Buttons -->
            <div class="hidden lg:flex items-center space-x-4" x-data>
                <button @click="$dispatch('open-login-modal')" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition-colors focus:outline-none">Log in</button>
                <button @click="$dispatch('open-register-modal')" class="text-sm font-semibold bg-slate-800 text-white px-5 py-2 rounded-full hover:bg-gray-700 transition-colors shadow-sm focus:outline-none">Register</button>
            </div>
        </div>

        <div id="mobile-menu"
            class="hidden lg:hidden flex flex-col items-center space-y-2 py-3 bg-blue-600 border-t border-blue-200 text-xs font-medium"
            aria-label="Mobile navigation">
            <a href="https://hafecs.id/" class="text-white hover:text-yellow-300 transition-all duration-200 py-1"
                target="_blank" rel="noopener noreferrer">Website HAFECS</a>
            <!-- <a href="https://elevate.hafecs.id/" class="text-white hover:text-yellow-300 transition-all duration-200 py-1" target="_blank" rel="noopener noreferrer">Elevate</a> -->
            <a href="{{ route('welcome') }}#mentor" class="text-white hover:text-yellow-300 transition-all duration-200 py-1">Mentor</a>
            <a href="{{ route('welcome') }}#timeline"
                class="text-white hover:text-yellow-300 transition-all duration-200 py-1">Timeline</a>
            <a href="{{ route('welcome') }}#dokumentasi"
                class="text-white hover:text-yellow-300 transition-all duration-200 py-1">Dokumentasi</a>
            <a href="{{ route('past-webinar') }}"
                class="text-white hover:text-yellow-300 transition-all duration-200 py-1">Past Webinar</a>
            
            <div class="flex items-center justify-center gap-4 w-full pt-3 mt-2 border-t border-blue-500/50" x-data>
                <button @click="$dispatch('open-login-modal')" class="text-white hover:text-yellow-300 transition-all duration-200 py-1 font-semibold focus:outline-none">Log in</button>
                <button @click="$dispatch('open-register-modal')" class="bg-gray-900 text-white px-5 py-1.5 rounded-full hover:bg-yellow-300 transition-all duration-200 font-bold focus:outline-none">Register</button>
            </div>
        </div>
    </nav>
</header>

<livewire:login-modal />
<livewire:register-modal />
