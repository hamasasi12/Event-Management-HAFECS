@extends('layouts.guest')

@section('content')
<div class="bg-slate-50 min-h-screen pb-32">
    <!-- Header banner background -->
    <div class="w-full h-64 bg-blue-900 absolute top-0 left-0 -z-10"></div>

    <div class="container mx-auto px-4 pt-20 lg:pt-30 max-w-6xl relative z-10">
        <div id="detail-two-col" class="flex flex-col lg:flex-row lg:items-start gap-8">

            <!-- LEFT SECTION -->
            <div class="w-full lg:w-1/2">
                <!-- Title -->
                <h1 class="text-3xl md:text-5xl font-extrabold text-white lg:text-gray-900 mb-8 drop-shadow-md lg:drop-shadow-none leading-tight">
                    {{ $seminar->title }}
                </h1>

                <!-- Trainer Card -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-5 flex items-center gap-4 mt-6 lg:mt-0">
                    @if($seminar->trainer)
                        <img src="{{ $seminar->trainer->image ? asset('storage/' . $seminar->trainer->image) : asset('images/admin/default_trainer.jpg') }}" 
                             alt="{{ $seminar->trainer->name }}"
                             class="w-14 h-14 sm:w-16 sm:h-16 rounded-full object-cover border border-gray-200">
                    @else
                        <img src="{{ asset('images/admin/default_trainer.jpg') }}" 
                             alt="Trainer"
                             class="w-14 h-14 sm:w-16 sm:h-16 rounded-full object-cover border border-gray-200">
                    @endif
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-500 font-medium">Hosted by</span>
                        <span class="text-xl sm:text-2xl font-extrabold text-gray-900">{{ $seminar->trainer ? $seminar->trainer->name : 'Nama Pemateri' }}</span>
                        <span class="text-sm text-gray-600 font-medium mt-0.5">{{ $seminar->trainer && $seminar->trainer->title ? $seminar->trainer->title : 'Trainer' }}</span>
                    </div>
                </div>

                <!-- Details Section -->
                <div class="mt-12 bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-8">
                    <div class="flex items-end justify-between gap-4">
                        <h2 class="text-2xl font-bold text-gray-900">Details</h2>
                    </div>
                    <div class="mt-3 h-1 w-14 bg-blue-600 rounded-full"></div>

                    <div class="mt-6 space-y-5 text-sm leading-relaxed text-gray-700">
                        <p class="font-bold text-gray-900">
                            📌 IMPORTANT: CHECK THE SESSION TIME IN OUR WEBSITE (the time on the website and the meetup site may not match since we change it occasionally)
                        </p>

                        <div class="space-y-4">
                            <p>
                                Hi there! My name is Chloe.<br>
                                I'm a certified English teacher from United States.<br>
                                I wanted to make an online language club where people can practice foreign languages by having real casual conversation!<br>
                                I'm looking for people who want to practice conversational English by talking about interesting topics and hanging out with people from all over the world in a small online group.
                            </p>

                            <div>
                                <p class="font-bold text-gray-900">Here are some examples of what our weekly topics might be like:</p>
                                <ul class="mt-2 list-disc pl-5 space-y-2 text-gray-600">
                                    <li class="italic">"What would you do if you come across your crush?"</li>
                                    <li class="italic">"Have you ever done the MBTI test? If so, what is your personality type?"</li>
                                    <li class="italic">"Do you believe in love at first sight? Why or why not?"</li>
                                    <li class="italic">"What are you most worried about right now?"</li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-lg font-extrabold text-gray-900">Here are some details</h3>
                                <ul class="mt-3 space-y-2 text-gray-700">
                                    <li class="flex items-start gap-2"><span class="text-blue-600 font-black">•</span> We meet via Zoom</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600 font-black">•</span> The session will last for 1 hour and consists of 3 different rounds</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600 font-black">•</span> Each round has different topics and discussion questions</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600 font-black">•</span> Each round, the groups are randomly mixed, so you will have a chance to talk to different people every time</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600 font-black">•</span> This isn't just about practicing English, but also about listening to different opinions and learning about different cultures</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600 font-black">•</span> The participation is FREE</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600 font-black">•</span> No credit card</li>
                                    <li class="flex items-start gap-2"><span class="text-blue-600 font-black">•</span> No Ads</li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-lg font-extrabold text-gray-900">How to Join</h3>
                                <ol class="mt-3 list-decimal pl-5 space-y-2 text-gray-700">
                                    <li>Click the link (here)</li>
                                    <li>Sign up</li>
                                    <li>Click 'book' in the session that you want to participate.</li>
                                    <li>
                                        Show up at the session time and click 'Join' in the session page
                                        <span class="text-xs text-gray-500 block mt-1">(The Zoom invitation will be sent to your e-mail once you apply too)</span>
                                    </li>
                                    <li>Enjoy practicing English with people from all over the world!</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Attendees Section -->
                <!-- Attendees Section -->
<div class="mt-12">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            Attendees
            <span class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full bg-gray-100 text-gray-700 text-sm font-bold">124</span>
        </h2>
        <a href="#" class="text-sm font-bold text-indigo-600 hover:text-indigo-700">See all</a>
    </div>

    <div class="flex gap-4 overflow-x-auto pb-2 -mx-1 px-1">
        @php
            $attendees = [
                ['name' => 'Sarah Johnson', 'img' => 'https://i.pravatar.cc/150?img=1',  'badge' => 'Host', 'role' => 'Assistant organizer'],
                ['name' => 'Michael Chen',  'img' => 'https://i.pravatar.cc/150?img=11', 'badge' => 'Host', 'role' => 'Co-organizer'],
                ['name' => 'Emma Wilson',   'img' => 'https://i.pravatar.cc/150?img=5',  'badge' => 'Host', 'role' => 'Assistant organizer'],
            ];
            $moreAttendees = [
                'https://i.pravatar.cc/150?img=12',
                'https://i.pravatar.cc/150?img=20',
            ];
            $moreCount = 2;
        @endphp

        @foreach($attendees as $attendee)
        <div class="shrink-0 w-44 bg-white rounded-2xl shadow-sm border border-gray-100 px-4 pt-6 pb-5 text-center transition duration-300 hover:shadow-md">
            <div class="relative w-fit mx-auto">
                <img src="{{ $attendee['img'] }}" alt="{{ $attendee['name'] }}"
                     class="w-20 h-20 rounded-full object-cover shadow-sm mx-auto">
                @if(!empty($attendee['badge']))
                    <span class="absolute left-1/2 -translate-x-1/2 -bottom-3 px-3 py-0.5 rounded-full bg-white border border-gray-200 text-xs font-bold text-blue-600 shadow-sm whitespace-nowrap">
                        {{ $attendee['badge'] }}
                    </span>
                @endif
            </div>
            <p class="mt-7 font-bold text-gray-900 text-sm leading-snug">{{ $attendee['name'] }}</p>
            <p class="mt-1 text-xs text-gray-500 font-medium">{{ $attendee['role'] }}</p>
        </div>
        @endforeach

        <!-- +More card -->
        <div class="shrink-0 w-44 bg-white rounded-2xl shadow-sm border border-gray-100 px-4 pt-6 pb-5 text-center transition duration-300 hover:shadow-md flex flex-col items-center justify-center">
            <div class="flex items-center justify-center -space-x-3 mb-3">
                @foreach($moreAttendees as $avatar)
                    <img src="{{ $avatar }}" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm">
                @endforeach
            </div>
            <p class="text-sm font-bold text-gray-700">+{{ $moreCount }} more</p>
        </div>
    </div>
</div>
            </div>

            <!-- RIGHT SECTION (Sidebar) -->
            <div id="detail-right-col" class="w-full lg:w-1/2 mt-8 lg:mt-0">
                <div class="flex flex-col gap-4">
                    <!-- Image stays sticky on top -->
                    <div id="detail-right-image"">
                        <div class="bg-white rounded-3xl p-4 shadow-sm border border-gray-100">
                            <div class="relative w-full aspect-video rounded-2xl overflow-hidden bg-gray-100">
                                @if($seminar->image_url)
                                    <img src="{{ $seminar->image_url }}" alt="{{ $seminar->title }}" class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('images/admin/default_seminar.jpg') }}" alt="{{ $seminar->title }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Event Details (this part follows scroll + stops before recommendations) -->
                    <div id="detail-right-details" class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-5 flex items-start gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-extrabold text-gray-900">{{ $seminar->start_time->format('l, d F') }} · {{ $seminar->start_time->format('H:i') }} - {{ $seminar->end_time->format('H:i') }} WIB</p>
                                <p class="text-sm text-gray-600 font-medium mt-0.5">Every week on every day until July 9, 2027</p>
                            </div>
                        </div>

                        <div class="h-px bg-gray-100"></div>

                        <div class="p-5 flex items-start gap-4">
                            <div class="w-11 h-11 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            </div>
                            <div class="min-w-0">
                                <p class="text-sm font-extrabold text-gray-900">Online event</p>
                                <p class="text-sm text-gray-600 font-medium mt-0.5">Link visible for attendees</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- You may also like Section (Full width below the two-column layout) -->
        <div class="mt-16 mb-8">
            <div class="flex items-center justify-between gap-4 mb-6">
                <h2 class="text-2xl font-bold text-gray-900">You may also like</h2>
                <a href="#" class="text-sm font-bold text-indigo-600 hover:text-indigo-700">See all</a>
            </div>

            @php
                $recommendations = [
                    [
                        'title' => "Let's Practice English Together Online!",
                        'date' => 'Sat, May 9',
                        'time' => '10:00 PM ICT',
                        'by' => 'Friends and Fun ESL: English Conversation Practice Online',
                        'location' => 'Online',
                        'image' => asset('images/admin/default_seminar.jpg'),
                        'tag' => 'Online',
                    ],
                    [
                        'title' => '🌏 (Online/Free) Free English Conversation Club with global people',
                        'date' => 'Sun, May 10',
                        'time' => '9:00 AM ICT',
                        'by' => 'Free English Speaking Practice BKK',
                        'location' => 'Online',
                        'image' => asset('images/admin/default_seminar.jpg'),
                        'tag' => 'Online',
                    ],
                    [
                        'title' => 'Public Speaking Mastery untuk Pemula',
                        'date' => 'Tue, Jun 2',
                        'time' => '7:00 PM WIB',
                        'by' => 'HAFECS Webinar',
                        'location' => 'Online',
                        'image' => asset('images/admin/default_seminar.jpg'),
                        'tag' => 'Online',
                    ],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($recommendations as $item)
                    <a href="#" class="group block">
                        <div class="rounded-3xl overflow-hidden bg-white border border-gray-100 shadow-sm group-hover:shadow-md transition h-full">
                            <div class="relative w-full aspect-[16/9] bg-gray-100">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-contain">
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg sm:text-xl font-extrabold text-gray-900 leading-snug line-clamp-2">{{ $item['title'] }}</h3>
                                <div class="mt-2 text-gray-600 text-sm font-medium flex flex-wrap items-center gap-x-2 gap-y-1">
                                    <span>{{ $item['date'] }}</span>
                                    <span class="text-gray-300">·</span>
                                    <span>{{ $item['time'] }}</span>
                                    <span class="px-2.5 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-bold">{{ $item['tag'] }}</span>
                                </div>
                                <p class="mt-2 text-sm text-gray-500 line-clamp-1">by {{ $item['by'] }}</p>
                                <p class="mt-1 text-sm text-gray-500">{{ $item['location'] }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
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


