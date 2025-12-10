@extends('layouts.userDashboard')

@section('title', 'Ulasan Peserta - HAFECS')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-4 py-12 sm:py-16">
        <!-- Header Section -->
        <div class="text-center mb-12 sm:mb-16">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-gray-900 mb-4 animate__animated animate__fadeInDown">
                <span class="text-blue-600">✨</span> Ulasan Peserta
            </h1>
            <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto animate__animated animate__fadeInUp">
                Apa kata mereka tentang pengalaman belajar bersama HAFECS
            </p>
        </div>

        @if($ulasans->count() > 0)
            <!-- Ulasan Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12">
                @foreach($ulasans as $ulasan)
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 flex flex-col h-full">
                    
                    <!-- Header: Avatar & Info -->
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <!-- Foto Profil (Sementara pakai default karena belum ada fitur upload foto user) -->
                            <img src="{{ asset('images/admin/blankProfile.png') }}"
                                    alt="Profile"
                                    class="w-12 h-12 rounded-full object-cover border-2 border-gray-100 shadow-sm">
                            
                            <div>
                                <h3 class="font-bold text-gray-900 text-base leading-tight">{{ $ulasan->name }}</h3>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $ulasan->asal_sekolah ?? $ulasan->jabatan ?? 'Peserta' }}</p>
                            </div>
                        </div>  
                
                        <!-- Rating -->
                        <div class="flex text-yellow-400 text-sm">
                            @php $rating = $ulasan->rating ?? 5; @endphp
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $rating)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-200 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                @endif
                            @endfor
                        </div>
                    </div>

                    <!-- Body: Review Content -->
                    <div class="relative mb-6 grow">
                        <div class="relative z-10 pl-4">
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-4">
                                {{ $ulasan->ulasan }}
                            </p>
                            @if(strlen($ulasan->ulasan) > 150)
                                <button onclick="showFullReview(`{{ addslashes($ulasan->ulasan) }}`, '{{ addslashes($ulasan->name) }}')"
                                        class="text-blue-600 hover:text-blue-800 text-xs font-semibold mt-2 inline-flex items-center transition-colors">
                                    Baca Selengkapnya
                                </button>
                            @endif
                        </div>
                    </div>

                    <!-- Footer: Seminar & Time -->
                    <div class="pt-4 border-t border-gray-50 flex items-center justify-between mt-auto">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 truncate max-w-[70%]">
                            {{ $ulasan->seminar->judul ?? 'Seminar Umum' }}
                        </span>
                        <span class="text-xs text-gray-400">
                            {{ $ulasan->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $ulasans->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="inline-block p-6 bg-white rounded-full mb-6 shadow-sm">
                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Ulasan</h3>
                <p class="text-gray-500 mb-8">Jadilah yang pertama memberikan ulasan!</p>
                <a href="{{ route('welcome') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-md hover:shadow-lg">
                    Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
</div>
@push('scripts')
@endpush
@endsection
