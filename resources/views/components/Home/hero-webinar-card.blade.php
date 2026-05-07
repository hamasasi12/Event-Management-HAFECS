<div class="md:w-2/5 w-full mt-10 md:mt-16 relative">
    <!-- Decorative background elements -->
    <div class="absolute -top-6 -right-6 w-32 h-32 bg-yellow-400 rounded-full mix-blend-multiply filter blur-2xl opacity-40 animate-pulse"></div>
    <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-blue-400 rounded-full mix-blend-multiply filter blur-2xl opacity-40 animate-pulse" style="animation-delay: 2s;"></div>
    
    <div class="relative w-full bg-white rounded-3xl shadow-[0_20px_50px_rgba(8,_112,_184,_0.07)] overflow-hidden border border-slate-100 transition-all duration-300 hover:shadow-[0_20px_50px_rgba(8,_112,_184,_0.12)]">
        <!-- Poster Image -->
        <div class="relative h-64 sm:h-64 w-full bg-slate-100">
            <img src="{{ asset('./assets/img/galeri-11.jpg') }}" alt="Webinar Poster" class="w-full h-full object-cover" />
            
            <!-- Platform Badge -->
            <div class="absolute top-4 right-4 bg-white/60 backdrop-blur-md text-blue-800 text-xs font-bold px-3 py-2 rounded-full shadow-lg flex items-center gap-1.5 ">
                <div class="bg-blue-100 p-1 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
                Zoom Meeting
            </div>

            <!-- Status Badge -->
            {{-- <div class="absolute top-4 left-4 bg-red-500/90 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1.5 animate-pulse">
                <span class="w-2 h-2 bg-white rounded-full"></span>
                Daftar Segera
            </div> --}}
        </div>

        <!-- Content -->
        <div class="p-6 md:p-4 space-y-6 bg-white relative">
            <!-- Info Grid -->
            <div class="grid grid-cols-2 gap-4">
                <!-- Date -->
                <div class="flex items-center gap-3 sm:gap-4 p-3 rounded-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    <div>
                        <p class="text-[10px] sm:text-[11px] text-slate-500 font-bold uppercase tracking-wider">Tanggal</p>
                        <p class="text-xs sm:text-sm font-extrabold text-slate-800 mt-0.5">21 Mei 2026</p>
                    </div>
                </div>

                <!-- Time -->
                <div class="flex items-center gap-3 sm:gap-4 p-3 rounded-2xl ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    <div>
                        <p class="text-[10px] sm:text-[11px] text-slate-500 font-bold uppercase tracking-wider">Waktu</p>
                        <p class="text-xs sm:text-sm font-extrabold text-slate-800 mt-0.5">10:00 WITA</p>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            {{-- <div class="h-px bg-linear-to-r from-transparent via-slate-200 to-transparent"></div> --}}

            <!-- Registered Users -->
            <div class="flex flex-col sm:flex-row items-center justify-between bg-blue-50 p-4 rounded-2xl gap-4 sm:gap-0">
                <div class="flex flex-col items-center sm:items-start w-full sm:w-auto">
                    <p class="text-xs text-slate-500 font-medium mb-1.5">Telah mendaftar</p>
                    <div class="flex items-center -space-x-3">
                        <img src="https://i.pravatar.cc/150?u=1" alt="User" class="w-8 h-8 sm:w-9 sm:h-9 rounded-full border-2 border-white shadow-sm object-cover" />
                        <img src="https://i.pravatar.cc/150?u=2" alt="User" class="w-8 h-8 sm:w-9 sm:h-9 rounded-full border-2 border-white shadow-sm object-cover" />
                        <img src="https://i.pravatar.cc/150?u=3" alt="User" class="w-8 h-8 sm:w-9 sm:h-9 rounded-full border-2 border-white shadow-sm object-cover" />
                        <img src="https://i.pravatar.cc/150?u=4" alt="User" class="w-8 h-8 sm:w-9 sm:h-9 rounded-full border-2 border-white shadow-sm object-cover" />
                        <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full border-2 border-white bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center text-[10px] font-bold text-white shadow-sm z-10">
                            +1k
                        </div>
                    </div>
                </div>
                <div class="text-right w-full sm:w-auto flex justify-center sm:block">
                    <div class="inline-flex items-center justify-center px-4 py-2 bg-white rounded-xl shadow-sm border border-slate-100">
                        <span class="text-lg font-black text-blue-600">1,245</span>
                        <span class="text-xs font-semibold text-slate-500 ml-1.5 mt-0.5 sm:mt-1">Orang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
