@extends('layouts.userDashboard')

@section('content')
    <style>
        /* Mengganti primary color agar lebih konsisten */
        :root {
            --color-primary: #f97316; /* Orange-500 */
            --color-secondary: #1e3a8a; /* Blue-800 */
            --color-accent: #fb923c; /* Amber-400 */
        }

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

        .glass-effect {
            backdrop-filter: blur(10px);
            /* Background yang lebih clean dan ringan */
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(249, 115, 22, 0.1); /* Border tipis warna oranye */
        }

        .gradient-text {
            /* Menggunakan gradien yang lebih tegas untuk highlight */
            background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Hover lift yang lebih halus */
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-5px); /* Lift sedikit lebih tinggi */
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.15); /* Shadow lebih menonjol */
        }

        .smooth-transition {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Card untuk modul yang lebih modern */
        .module-card {
            background: white;
            border: 1px solid #fef3c7; /* Kuning muda/Orange-50 */
            transition: all 0.3s ease-in-out;
        }

        .module-card:hover {
            border-color: var(--color-accent);
            box-shadow: 0 5px 15px rgba(251, 146, 60, 0.1);
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background-color: #f7f7f7; /* Background lebih netral */
        }

        /* Arrow rotation animation */
        .arrow-rotate {
            transform: rotate(180deg);
        }

        /* Expandable content animation */
        .expanding {
            max-height: 1500px !important; /* Ditingkatkan */
            padding-top: 2rem;
        }

        /* Tombol CTA di sidebar agar lebih menonjol */
        .cta-button {
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(30, 58, 138, 0.3); /* Shadow dari warna biru */
        }
    </style>



    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 space-y-10">

                <div class="relative overflow-hidden bg-white rounded-3xl p-8 shadow-xl border border-gray-100">
                    <div class="flex flex-col md:flex-row items-start md:items-center">
                        <div class="flex-1 mb-6 md:mb-0 md:pr-8">
                            <span class="text-sm font-bold uppercase tracking-widest text-orange-500 mb-2 block">
                                Certification Program
                            </span>
                            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 leading-snug">
                                {{ $seminar->title }}
                            </h1>
                            <p class="text-lg text-gray-500 mt-3">
                                Dapatkan sertifikasi dan gelar non-formal untuk meningkatkan kompetensi mengajar Anda.
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="w-32 h-32 md:w-40 md:h-40 bg-orange-50 rounded-2xl flex items-center justify-center border border-orange-200 shadow-md">
                                <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-20 w-auto">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-10 shadow-xl hover-lift module-card">

                    <div class="mb-8 border-b pb-6 border-gray-100">
                        <h2 class="text-4xl lg:text-5xl font-extrabold gradient-text mb-2">
                            Rp. {{ number_format($seminar->price, 0, ',', '.') }}
                        </h2>
                        <div class="flex items-center space-x-4">
                            <span class="text-xl font-bold text-gray-900">
                                Paket Seminar {{ $seminar->title }}
                            </span>
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold uppercase tracking-wider">
                                Terbatas
                            </span>
                        </div>
                    </div>

                    <div class="mb-10">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 border-l-4 border-orange-500 pl-3">Tentang Program</h3>
                        <p class="text-gray-600 leading-relaxed text-base">
                            {{ $seminar->description }}
                        </p>
                    </div>

                    <div class="border-t border-gray-100 pt-8">
                        <button id="readMoreBtn" class="flex items-center justify-between w-full text-left group">
                            <span class="text-xl font-bold text-gray-800 group-hover:text-orange-600 smooth-transition">
                                Detail Program Level A & Modul Pembelajaran
                            </span>
                            <svg id="arrow" class="w-6 h-6 text-orange-500 smooth-transition group-hover:text-orange-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>

                        <div id="expandableContent" class="overflow-hidden smooth-transition" style="max-height: 0;">
                            <div class="py-8 space-y-10">
                                <p class="text-gray-600 text-center text-lg">
                                    Program Level A terdiri dari **3 Tahap/Modul** komprehensif untuk penguasaan TMF (Teaching Mastery Framework):
                                </p>

                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                                    {{-- Module 1: Penugasan Online --}}
                                    <div class="module-card rounded-2xl p-6 smooth-transition hover-lift shadow-sm">
                                        <div class="flex items-center mb-4">
                                            <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-amber-500 rounded-lg flex items-center justify-center text-white font-bold text-lg mr-4 flex-shrink-0">
                                                1
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold text-gray-800">Diadakan</h4>
                                                <p class="text-sm text-orange-600 font-semibold">Penugasan Online</p>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 text-sm">
                                            Penugasan di LMS Elevate untuk pendalaman konsep Teaching Mastery Framework.
                                        </p>
                                    </div>

                                    {{-- Module 2: Training --}}
                                    <div class="module-card rounded-2xl p-6 smooth-transition hover-lift shadow-sm">
                                        <div class="flex items-center mb-4">
                                            <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-cyan-500 rounded-lg flex items-center justify-center text-white font-bold text-lg mr-4 flex-shrink-0">
                                                2
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold text-gray-800">Training</h4>
                                                <p class="text-sm text-blue-600 font-semibold">12 Kali Pertemuan</p>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 text-sm">
                                            Sesi pelatihan intensif untuk mengasah kemampuan praktis dalam mengajar.
                                        </p>
                                    </div>

                                    {{-- Module 3: Uji Sertifikasi --}}
                                    <div class="module-card rounded-2xl p-6 smooth-transition hover-lift shadow-sm">
                                        <div class="flex items-center mb-4">
                                            <div class="w-10 h-10 bg-gradient-to-r from-yellow-500 to-amber-500 rounded-lg flex items-center justify-center text-white font-bold text-lg mr-4 flex-shrink-0">
                                                3
                                            </div>
                                            <div>
                                                <h4 class="text-lg font-bold text-gray-800">Uji Sertifikasi</h4>
                                                <p class="text-sm text-yellow-600 font-semibold">Level A Assessment</p>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 text-sm">
                                            Ujian teori berbasis TMF dan Literasi Numerasi untuk validasi kompetensi.
                                        </p>
                                    </div>
                                </div>

                                <div class="bg-gray-50 rounded-2xl p-6 border-l-4 border-blue-600">
                                    <h4 class="text-xl font-bold text-gray-800 mb-4 flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 8a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1zm1 3a1 1 0 100 2h4a1 1 0 100-2H8z" clip-rule="evenodd"></path></svg>
                                        Fokus Ujian Teori
                                    </h4>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        {{-- Fokus 1 --}}
                                        <div class="flex items-center space-x-3 text-gray-700">
                                            <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 2a1 1 0 000 2h2a1 1 0 100-2H7z" clip-rule="evenodd"/></svg>
                                            <span class="font-medium">Teaching Mastery Framework</span>
                                        </div>
                                        {{-- Fokus 2 --}}
                                        <div class="flex items-center space-x-3 text-gray-700">
                                            <svg class="w-5 h-5 text-amber-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/></svg>
                                            <span class="font-medium">Literasi & Numerasi</span>
                                        </div>
                                        {{-- Fokus 3 --}}
                                        <div class="flex items-center space-x-3 text-gray-700">
                                            <svg class="w-5 h-5 text-orange-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/></svg>
                                            <span class="font-medium">Pengajaran Berdiferensiasi</span>
                                        </div>
                                        {{-- Fokus 4 --}}
                                        <div class="flex items-center space-x-3 text-gray-700">
                                            <svg class="w-5 h-5 text-cyan-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                            <span class="font-medium">Penilaian Efektif</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 pt-8 border-t border-gray-100">
                        <h3 class="text-2xl font-bold text-gray-800 mb-6 border-l-4 border-blue-600 pl-3">Benefit Yang Akan Anda Dapatkan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                            {{-- Benefit 1 --}}
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <span class="text-gray-700 font-medium">Sertifikat Kompetensi ber-NPSN</span>
                            </div>
                            {{-- Benefit 2 --}}
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                                <span class="text-gray-700 font-medium">Mendapatkan Gelar Non-Formal Profesional</span>
                            </div>
                            {{-- Benefit 3 --}}
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/></svg>
                                <span class="text-gray-700 font-medium">Rapor Detail Hasil Ujian & Penilaian</span>
                            </div>
                            {{-- Benefit 4 --}}
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                                <span class="text-gray-700 font-medium">Akses ke Worksheet dan Modul Pembelajaran Digital</span>
                            </div>
                            {{-- Benefit 5 --}}
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                                <span class="text-gray-700 font-medium">Akses ke Webinar dan Diskusi Eksklusif HAFECS</span>
                            </div>
                            {{-- Benefit 6 --}}
                            <div class="flex items-start space-x-3">
                                <svg class="w-6 h-6 text-orange-500 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" /></svg>
                                <span class="text-gray-700 font-medium">Koneksi dengan Jaringan Guru Profesional</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24">
                    <div class="glass-effect rounded-3xl p-8 shadow-2xl border-2 border-orange-300/50">

                        <div class="mb-8 border-b pb-6 border-gray-200">
                            <h3 class="text-sm font-bold text-gray-700 uppercase tracking-widest mb-4">
                                Ringkasan Pembelian
                            </h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-start">
                                    <span class="text-gray-800 font-bold text-lg">Paket Seminar {{ $seminar->title }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal</span>
                                <span class="font-semibold">
                                    Rp. {{ number_format($seminar->price, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between text-xl font-extrabold pt-2 border-t border-gray-200">
                                <span>TOTAL</span>
                                <span class="gradient-text">
                                    Rp. {{ number_format($seminar->price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <form action="{{ route('payments.store') }}" method="POST" id="payment-form">
                            @csrf
                            <input type="hidden" name="amount" value="{{ (int) $seminar->price }}">
                            <input type="hidden" name="seminar_id" value="{{ $seminar->id }}">
                            <input type="hidden" name="name" value="{{ $seminarRegistration->name }}">
                            <input type="hidden" name="email" value="{{ $seminarRegistration->email }}">
                            <input type="hidden" name="phone" value="{{ $seminarRegistration->phone }}">

                            {{-- Tombol CTA dengan warna yang kontras (Blue-800) --}}
                            <button class="cta-button w-full bg-blue-800 text-white py-4 rounded-xl font-bold text-lg shadow-xl hover:bg-orange-500">
                                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Lanjutkan Pembayaran
                            </button>
                        </form>

                        <div class="mt-8 pt-4 border-t border-gray-100 flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium">Pembayaran Aman (SSL Secure)</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium">Garansi Kepuasan 30 Hari</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const readMoreBtn = document.getElementById('readMoreBtn');
            const expandableContent = document.getElementById('expandableContent');
            const arrow = document.getElementById('arrow');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            let isExpanded = false;

            if (readMoreBtn) {
                readMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    if (!isExpanded) {
                        // Expand content
                        // Mengatur maxHeight lebih besar agar konten cukup
                        expandableContent.style.maxHeight = expandableContent.scrollHeight + 50 + 'px';
                        expandableContent.classList.add('expanding');
                        arrow.classList.add('arrow-rotate');
                        isExpanded = true;
                    } else {
                        // Collapse content
                        expandableContent.style.maxHeight = '0';
                        expandableContent.classList.remove('expanding');
                        arrow.classList.remove('arrow-rotate');
                        isExpanded = false;
                    }
                });
            }

            // Logika Toggle Menu Mobile (Sangat Penting)
            if (mobileMenuButton) {
                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>

@endsection
