@extends('layouts.userdashboard')

@section('title', 'Ulasan Peserta - HAFECS')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50">
    <div class="container mx-auto px-4 py-12 sm:py-16">
        <!-- Header Section -->
        <div class="text-center mb-12 sm:mb-16">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-gray-900 mb-4 animate__animated animate__fadeInDown">
                <span class="text-blue-600">✨</span> Ulasan Peserta
            </h1>
            <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto animate__animated animate__fadeInUp">
                Dengar langsung dari peserta kami tentang pengalaman mereka mengikuti seminar HAFECS
            </p>
        </div>

        @if($ulasans->count() > 0)
            <!-- Ulasan Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-12">
                @foreach($ulasans as $ulasan)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden border border-blue-100">
                    <!-- Card Header -->
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-6 text-white">
                        <div class="flex items-center mb-3">
                            @if(isset($ulasan->foto_profil) && $ulasan->foto_profil && file_exists(public_path('storage/' . $ulasan->foto_profil)))
                                <img src="{{ asset('storage/' . $ulasan->foto_profil) }}"
                                     alt="{{ $ulasan->nama }}"
                                     class="w-14 h-14 rounded-full object-cover mr-3 flex-shrink-0 shadow-lg border-2 border-white">
                            @else
                                <img src="{{ asset('images/admin/blankProfile.png') }}"
                                     alt="Profile"
                                     class="w-14 h-14 rounded-full object-cover mr-3 flex-shrink-0 shadow-lg border-2 border-white">
                            @endif
                            <div class="flex-1 min-w-0">
                                <h3 class="font-semibold text-lg truncate">{{ $ulasan->nama }}</h3>
                                <p class="text-blue-100 text-sm truncate">{{ $ulasan->institusi }}</p>
                            </div>
                        </div>

                        <!-- Rating Stars -->
                        <div class="flex items-center">
                            @if(isset($ulasan->rating) && $ulasan->rating)
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $ulasan->rating)
                                        <svg class="w-5 h-5 text-yellow-300 fill-current" viewBox="0 0 20 20">
                                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 20 20">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                        </svg>
                                    @endif
                                @endfor
                                <span class="ml-2 text-sm">{{ $ulasan->rating }}/5</span>
                            @else
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-5 h-5 text-yellow-300 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                    </svg>
                                @endfor
                            @endif
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        <!-- Seminar Info -->
                        <div class="mb-4">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-3 py-1 rounded-full font-semibold">
                                <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $ulasan->seminar->judul }}
                            </span>
                        </div>

                        <!-- Ulasan Text -->
                        <div class="text-gray-700 leading-relaxed">
                            <svg class="w-6 h-6 text-gray-300 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/>
                            </svg>
                            <p class="italic mt-2 line-clamp-4">
                                {{ $ulasan->ulasan }}
                            </p>
                            @if(strlen($ulasan->ulasan) > 200)
                                <button onclick="showFullReview(`{{ addslashes($ulasan->ulasan) }}`, '{{ addslashes($ulasan->nama) }}')"
                                        class="text-blue-600 hover:text-blue-800 text-sm font-semibold mt-2 inline-flex items-center">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </button>
                            @endif
                        </div>

                        <!-- Footer -->
                        <div class="mt-4 pt-4 border-t border-gray-200 text-sm text-gray-500 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $ulasan->updated_at->diffForHumans() }}
                        </div>
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
            <div class="text-center py-16">
                <div class="inline-block p-8 bg-white rounded-full mb-6 shadow-lg">
                    <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-semibold text-gray-700 mb-3">Belum Ada Ulasan</h3>
                <p class="text-gray-500 mb-8">Jadilah yang pertama memberikan ulasan setelah mengikuti seminar kami!</p>
                <a href="{{ route('welcome') }}" class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-full hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Modal for Full Review -->
<div id="reviewModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[80vh] overflow-y-auto shadow-2xl animate__animated animate__zoomIn animate__faster">
        <div class="p-6 border-b border-gray-200 flex justify-between items-center sticky top-0 bg-white rounded-t-2xl z-10">
            <h3 class="text-xl font-bold text-gray-800" id="modalName"></h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 transition p-2 rounded-full hover:bg-gray-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="p-6">
            <div class="text-gray-700 leading-relaxed text-base" id="modalContent"></div>
        </div>
    </div>
</div>

<style>
    /* Line clamp for text truncation */
    .line-clamp-4 {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Custom Pagination Styles */
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .pagination li a,
    .pagination li span {
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.75rem;
        color: #374151;
        text-decoration: none;
        transition: all 0.3s;
        font-weight: 600;
        display: inline-block;
        min-width: 45px;
        text-align: center;
    }

    .pagination li a:hover {
        background-color: #3b82f6;
        color: white;
        border-color: #3b82f6;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(59, 130, 246, 0.3);
    }

    .pagination li.active span {
        background-color: #3b82f6;
        color: white;
        border-color: #3b82f6;
    }

    .pagination li.disabled span {
        color: #9ca3af;
        cursor: not-allowed;
        opacity: 0.5;
    }

    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
    }
</style>

@push('scripts')
<script>
    function showFullReview(content, name) {
        document.getElementById('modalName').textContent = name;
        document.getElementById('modalContent').textContent = content;
        document.getElementById('reviewModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('reviewModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside
    document.getElementById('reviewModal')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeModal();
        }
    });

    // Close modal with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>
@endpush
@endsection
