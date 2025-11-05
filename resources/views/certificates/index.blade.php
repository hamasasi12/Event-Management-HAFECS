<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Certificate Preview</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <style>
    @page { size: A4 landscape; margin: 0; }
    html, body { margin:0; padding:0; background:#fff; }

    /* kanvas A4 landscape (untuk view HTML sertifikat, jika dipakai) */
    .cert-page { width: 297mm; height: 210mm; overflow:hidden; background:#fff; }

    /* center helper (kalau buka HTML langsung) */
    .cert-wrap { min-height: 100vh; display:flex; align-items:center; justify-content:center; background:#fff; }

    /* === Thumbnail zoom tweak (hapus sisi hitam PDF viewer) === */
    .thumb-zoom {
      width: 100%;
      aspect-ratio: 297 / 210;
      border: 0;
      display: block;
      pointer-events: none;
      background: #fff;
      /* Zoom sedikit agar halaman PDF memenuhi kotak dan sisi gelap terpotong */
      transform-origin: center center;
      transform: scale(1.06); /* sesuaikan 1.04–1.10 sesuai kebutuhan */
      /* Bantu rendering lebih halus */
      backface-visibility: hidden;
      will-change: transform;
    }
  </style>
</head>

<body class="bg-slate-100 text-slate-800">
  <header class="bg-white shadow-md">
    <nav class="container mx-auto px-6 py-4">
      <div class="flex justify-between items-center">
        <div class="text-2xl font-bold text-gray-800">
          <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-10">
        </div>
        <div class="hidden md:flex items-center justify-center space-x-8 w-full">
          <a href="#webinar" class="font-semibold hover:text-blue-700">Webinar</a>
          <a href="#trainer" class="font-semibold hover:text-blue-700">Trainer</a>
          <a href="#dokumentasi" class="font-semibold hover:text-blue-700">Dokumentasi</a>
        </div>
      </div>
    </nav>
  </header>

  <main class="max-w-6xl mx-auto px-4 py-10">
    <!-- Thumbnail PDF (tidak bisa discroll), klik => modal PDF -->
    <div class="max-w-4xl mx-auto">
      <!-- CARD WRAPPER: shadow & ring di sini agar tampak timbul -->
      <div class="relative rounded-2xl bg-white ring-1 ring-slate-200/70 shadow-xl hover:shadow-2xl transition-shadow">
        <!-- Pastikan overflow-hidden di inner supaya hasil zoom ter-crop rapi -->
        <div class="rounded-2xl overflow-hidden group">
          <iframe
            id="pdfThumb"
            src="{{ route('certificates.demo.preview.pdf') }}#zoom=page-fit&toolbar=0&navpanes=0&scrollbar=0&pagemode=none"
            title="Certificate PDF"
            scrolling="no"
            class="thumb-zoom"
          ></iframe>

          <!-- Tombol overlay -->
          <button id="btnOpenPdf"
                  type="button"
                  aria-label="Buka preview ukuran penuh"
                  class="absolute inset-0 flex items-center justify-center
                         bg-slate-900/40 opacity-0 group-hover:opacity-100 transition
                         text-white text-center font-semibold w-full">
            <span class="px-4 py-2 rounded-lg backdrop-blur-sm">
              Klik untuk Melihat Ukuran Penuh
            </span>
          </button>
        </div>
      </div>

      <div class="flex flex-wrap gap-3 justify-center mt-6">
        <button id="btnOpenPdf2" type="button"
                class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
          Preview PDF (Di Halaman Ini)
        </button>
        {{-- Jika mau tombol unduh tertentu, aktifkan contoh ini:
        <a href="{{ route('certificates.download', ['id' => 1]) }}"
           class="px-4 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700">
          Download PDF
        </a> --}}
      </div>
    </div>
  </main>

  <!-- =================== MODAL PREVIEW PDF =================== -->
  <div id="pdfModal" class="fixed inset-0 z-50 hidden">
    <!-- backdrop -->
    <div class="absolute inset-0 bg-black/70"></div>

    <div class="relative mx-auto mt-6 w-[96vw] max-w-[1280px]">
      <div class="flex items-center justify-between mb-2">
        <div class="text-white/80 text-sm">Tekan ESC untuk menutup</div>
        <div class="flex items-center gap-2">
          <button id="btnClose" type="button"
                  class="px-3 py-1 rounded-md bg-white/10 hover:bg-white/20 text-white">
            ✕
          </button>
        </div>
      </div>

      <div class="rounded-xl overflow-hidden shadow-2xl bg-white">
        <!-- IFRAME PDF VIEWER (basic, tetap di halaman) -->
        <iframe id="pdfFrameFull"
                title="Certificate PDF Preview"
                scrolling="no"
                style="width:100%; height:85vh; border:0; display:block;"
                src="">
        </iframe>
      </div>
    </div>
  </div>

  <script>
    (function () {
      const modal   = document.getElementById('pdfModal');
      const open1   = document.getElementById('btnOpenPdf');
      const open2   = document.getElementById('btnOpenPdf2');
      const closeBt = document.getElementById('btnClose');
      const frame   = document.getElementById('pdfFrameFull');

      // URL PDF + parameter untuk "fit ke halaman"
      const pdfUrl = "{{ route('certificates.demo.preview.pdf') }}" + "#zoom=page-fit&navpanes=0&scrollbar=0&pagemode=none";

      function openModal() {
        frame.src = pdfUrl;                 // muat pdf
        modal.classList.remove('hidden');   // tampilkan modal
        document.documentElement.style.overflow = 'hidden'; // kunci scroll body
      }

      function closeModal() {
        modal.classList.add('hidden');
        frame.src = "";                     // kosongkan agar resource dilepas
        document.documentElement.style.overflow = '';
      }

      open1.addEventListener('click', openModal);
      open2.addEventListener('click', openModal);

      closeBt.addEventListener('click', closeModal);
      modal.addEventListener('click', (e) => {
        // klik backdrop untuk close
        if (e.target === modal || e.target.classList.contains('bg-black/70')) closeModal();
      });
      document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeModal(); });
    })();
  </script>
</body>
</html>
