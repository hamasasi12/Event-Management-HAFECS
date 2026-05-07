@extends('layouts.guest')

@section('content')
<div class="bg-slate-50 min-h-screen pb-32">
    <!-- Header banner background -->
    <div class="w-full h-64 bg-blue-900 absolute top-0 left-0 -z-10"></div>

    <div class="container mx-auto px-4 pt-10 lg:pt-20 max-w-6xl relative z-10">
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">

            <!-- LEFT SECTION -->
            <div class="w-full lg:w-2/3">
                <!-- Title -->
                <h1 class="text-3xl md:text-5xl font-extrabold text-white lg:text-gray-900 mb-8 drop-shadow-md lg:drop-shadow-none leading-tight">
                    {{ $seminar->title }}
                </h1>

                <!-- Trainer Card -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-5 flex items-center gap-5 mt-6 lg:mt-0 transition hover:shadow-xl">
                    @if($seminar->trainer)
                        <img src="{{ $seminar->trainer->image ? asset('storage/' . $seminar->trainer->image) : asset('images/admin/default_trainer.jpg') }}" 
                             alt="{{ $seminar->trainer->name }}"
                             class="w-20 h-20 sm:w-24 sm:h-24 rounded-full object-cover border-4 border-blue-50 shadow-sm">
                    @else
                        <img src="{{ asset('images/admin/default_trainer.jpg') }}" 
                             alt="Trainer"
                             class="w-20 h-20 sm:w-24 sm:h-24 rounded-full object-cover border-4 border-blue-50 shadow-sm">
                    @endif
                    <div class="flex flex-col">
                        <span class="text-xs sm:text-sm text-blue-600 uppercase tracking-widest font-extrabold mb-1">--Pemateri Webinar--</span>
                        <span class="text-xl sm:text-2xl font-bold text-gray-900">-- {{ $seminar->trainer ? $seminar->trainer->name : 'Nama Pemateri' }} --</span>
                        @if($seminar->trainer && $seminar->trainer->title)
                            <span class="text-gray-500 text-sm mt-1">{{ $seminar->trainer->title }}</span>
                        @endif
                    </div>
                </div>

                <!-- Details Section -->
                <div class="mt-12 bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sm:p-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Detail Webinar
                    </h2>
                    
                    <div class="prose prose-blue max-w-none text-gray-700">
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-r-lg">
                            <p class="font-bold text-blue-900 m-0 flex items-start gap-2">
                                <span class="text-xl">📢</span>
                                <span>IMPORTANT : CHECK THE SESSION TIME IN OUR WEBSITE(The time on the website and the meetup site may not match since we change it ocasionally)</span>
                            </p>
                        </div>

                        <p>Hi there! My name is Chloe.<br>
                        I'm a certified English teacher from United States.<br>
                        I wanted to make an online language club where people can practice foreign languages by having real casual conversation!<br>
                        I'm looking for people who want to practice conversational English by talking about interesting topics and hanging out with people from all over the world in a small online group.</p>
                        
                        <p class="mt-4">Here are some examples of what our weekly topics might be like:</p>
                        <ul class="list-disc pl-5 space-y-1 text-gray-600 font-medium">
                            <li class="italic">"What would you do if you come across your crush?"</li>
                            <li class="italic">"Have you ever done the MBTI test? If so, what is your personality type?"</li>
                            <li class="italic">"Do you believe in love at first sight? Why or why not?"</li>
                            <li class="italic">"What are you most worried about right now?"</li>
                        </ul>

                        <h3 class="text-xl font-bold text-gray-900 mt-10 mb-4 flex items-center gap-2">
                            <span class="text-2xl">💎</span> Here are some details 💎
                        </h3>
                        <ul class="space-y-3 font-medium text-gray-700">
                            <li class="flex items-start gap-3"><span class="text-green-500 text-lg mt-0.5">✔️</span> We meet via Zoom</li>
                            <li class="flex items-start gap-3"><span class="text-green-500 text-lg mt-0.5">✔️</span> The session will last for 1 hour and consists of 3 different rounds</li>
                            <li class="flex items-start gap-3"><span class="text-green-500 text-lg mt-0.5">✔️</span> Each round has different topics and discussion questions</li>
                            <li class="flex items-start gap-3"><span class="text-green-500 text-lg mt-0.5">✔️</span> Each round, the groups are randomly mixed, so you will have a chance to talk to different people every time</li>
                            <li class="flex items-start gap-3"><span class="text-green-500 text-lg mt-0.5">✔️</span> This isn't just about practicing English, but also about listening to different opinions and learning about different cultures</li>
                            <li class="flex items-start gap-3"><span class="text-green-500 text-lg mt-0.5">✔️</span> The participation is FREE</li>
                            <li class="flex items-start gap-3"><span class="text-red-500 text-lg mt-0.5">❌</span> No credit card</li>
                            <li class="flex items-start gap-3"><span class="text-red-500 text-lg mt-0.5">❌</span> No Ads</li>
                        </ul>

                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 my-8 rounded-r-lg">
                            <p class="font-bold text-blue-900 m-0 flex items-start gap-2">
                                <span class="text-xl">📢</span>
                                <span>IMPORTANT : CHECK THE SESSION TIME IN OUR WEBSITE(The time on the website and the meetup site may not match since we change it ocasionally)</span>
                            </p>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4 flex items-center gap-2">
                            <span class="text-2xl">💎</span> How to Join 💎
                        </h3>
                        <ol class="list-decimal pl-5 space-y-3 text-gray-700 font-medium">
                            <li>Click the link (here)</li>
                            <li>Sign up</li>
                            <li>Click 'book' in the session that you want to participate.</li>
                            <li>Show up at the session time and click 'Join' in the session page<br>
                                <span class="text-sm font-normal text-gray-500 block mt-1">(The Zoom invitation will be sent to your e-mail once you apply too)</span>
                            </li>
                            <li>Enjoy practicing English with people from all over the world!</li>
                        </ol>
                    </div>
                </div>

                <!-- Attendees Section -->
                <div class="mt-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Attendees (124)
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                        @php
                            $attendees = [
                                ['name' => 'Sarah Johnson', 'img' => 'https://i.pravatar.cc/150?img=1'],
                                ['name' => 'Michael Chen', 'img' => 'https://i.pravatar.cc/150?img=11'],
                                ['name' => 'Emma Wilson', 'img' => 'https://i.pravatar.cc/150?img=5'],
                                ['name' => 'David Miller', 'img' => 'https://i.pravatar.cc/150?img=12'],
                            ];
                        @endphp
                        @foreach($attendees as $attendee)
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 text-center transition duration-300 hover:shadow-lg hover:-translate-y-1">
                            <img src="{{ $attendee['img'] }}" alt="{{ $attendee['name'] }}" class="w-full aspect-square object-cover rounded-xl mb-3 shadow-sm">
                            <p class="font-bold text-gray-800 text-sm">{{ $attendee['name'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- You may also like Section -->
                <div class="mt-16 mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        You may also like
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Dummy Card 1 -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group cursor-pointer hover:shadow-xl transition duration-300">
                            <div class="h-44 bg-gray-200 overflow-hidden relative">
                                <img src="{{ asset('images/admin/default_seminar.jpg') }}" alt="Seminar" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600">WEBINAR</div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-blue-600 transition">Strategi Manajemen Waktu untuk Profesional</h3>
                                <p class="text-sm text-gray-500 flex items-center gap-2 font-medium">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 
                                    24 May 2026
                                </p>
                            </div>
                        </div>
                        <!-- Dummy Card 2 -->
                        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group cursor-pointer hover:shadow-xl transition duration-300">
                            <div class="h-44 bg-gray-200 overflow-hidden relative">
                                <img src="{{ asset('images/admin/default_seminar.jpg') }}" alt="Seminar" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-blue-600">WORKSHOP</div>
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-blue-600 transition">Public Speaking Mastery untuk Pemula</h3>
                                <p class="text-sm text-gray-500 flex items-center gap-2 font-medium">
                                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg> 
                                    02 June 2026
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT SECTION (Sidebar) -->
            <div class="w-full lg:w-1/3 mt-8 lg:mt-0 lg:-mt-24 relative">
                <div class="sticky top-28 bg-white rounded-[2rem] p-6 sm:p-8 shadow-2xl border border-gray-100">
                    <!-- Image with thick border -->
                    <div class="relative w-full aspect-[4/5] mb-8 rounded-2xl overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.12)]">
                        @if($seminar->image_url)
                            <img src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}"
                                 class="w-full h-full object-cover rounded-2xl border-[12px] border-white box-border">
                        @else
                            <img src="{{ asset('images/admin/default_seminar.jpg') }}" alt="{{ $seminar->title }}"
                                 class="w-full h-full object-cover rounded-2xl border-[12px] border-white box-border">
                        @endif
                    </div>

                    <!-- Event Details -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 shadow-inner">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-bold tracking-wide uppercase mb-0.5">Tanggal</p>
                                <p class="text-xl font-extrabold text-gray-900">{{ $seminar->start_time->format('d F Y') }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0 shadow-inner">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-bold tracking-wide uppercase mb-0.5">Platform</p>
                                <p class="text-xl font-extrabold text-gray-900">via {{ $seminar->platform ?? 'Zoom Meeting' }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center flex-shrink-0 shadow-inner">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 font-bold tracking-wide uppercase mb-0.5">Waktu</p>
                                <p class="text-xl font-extrabold text-gray-900">{{ $seminar->start_time->format('H:i') }} - {{ $seminar->end_time->format('H:i') }} WIB</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Floating Action Bar (Mobile & Desktop) -->
<div class="fixed bottom-0 left-0 w-full bg-white/90 backdrop-blur-md border-t border-gray-200 shadow-[0_-10px_40px_rgba(0,0,0,0.1)] p-4 sm:p-5 z-50">
    <div class="container mx-auto max-w-6xl flex items-center justify-between gap-4">
        <div class="hidden sm:block">
            <p class="text-sm text-gray-500 font-bold uppercase tracking-wider">Harga Tiket</p>
            <p class="text-2xl font-black text-green-600 tracking-tight">FREE</p>
        </div>
        <div class="flex-grow sm:flex-grow-0 sm:min-w-[400px]">
            <a href="{{ route('seminar.register', \Vinkla\Hashids\Facades\Hashids::encode($seminar->id)) }}"
               class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold py-4 px-8 rounded-full shadow-[0_8px_20px_rgba(37,99,235,0.3)] hover:shadow-[0_12px_25px_rgba(37,99,235,0.4)] transition-all duration-300 text-lg hover:-translate-y-1">
                Daftar Sekarang
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>
    </div>
</div>
@endsection
