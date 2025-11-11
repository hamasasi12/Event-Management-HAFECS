{{-- resources/views/certificates/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Certificate Preview</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <style>
    @page { size: A4 landscape; margin: 0; }
    html, body { margin:0; padding:0; background:#fff; }
    .cert-page { width: 297mm; height: 210mm; overflow:hidden; background:#fff; }
    .cert-wrap { min-height: 100vh; display:flex; align-items:center; justify-content:center; background:#fff; }
    .thumb-zoom {
      width: 100%;
      aspect-ratio: 297 / 210;
      border: 0;
      display: block;
      pointer-events: none;
      background: #fff;
      transform-origin: center center;
      transform: scale(1.06);
      backface-visibility: hidden;
      will-change: transform;
    }
  </style>
</head>

@php
  // === PENTING: Satu-satunya perubahan data ===
  // Pakai sertifikat pertama sebagai sumber preview jika ada,
  // fallback ke demo preview kalau belum ada data.
  $initialPdfUrl = (isset($certificates) && $certificates->count())
      ? route('certificates.download', ['id' => $certificates->first()->id])
      : route('certificates.demo.preview.pdf');
@endphp

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
    <!-- Thumbnail PDF -->
    <div class="max-w-4xl mx-auto">
      <div class="relative rounded-2xl bg-white ring-1 ring-slate-200/70 shadow-xl hover:shadow-2xl transition-shadow">
        <div class="rounded-2xl overflow-hidden group">
          <iframe
            id="pdfThumb"
            src="{{ $initialPdfUrl }}#zoom=page-fit&toolbar=0&navpanes=0&scrollbar=0&pagemode=none"
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
    </div>
  </main>

  <!-- MODAL PREVIEW PDF -->
  <div id="pdfModal" class="fixed inset-0 z-50 hidden">
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

      // URL PDF: pakai sertifikat pertama jika ada; fallback demo.
      const pdfUrl = "{{ $initialPdfUrl }}#zoom=page-fit&navpanes=0&scrollbar=0&pagemode=none";

      function openModal() {
        frame.src = pdfUrl;
        modal.classList.remove('hidden');
        document.documentElement.style.overflow = 'hidden';
      }

      function closeModal() {
        modal.classList.add('hidden');
        frame.src = "";
        document.documentElement.style.overflow = '';
      }

      if (open1) open1.addEventListener('click', openModal);
      if (open2) open2.addEventListener('click', openModal);

      if (closeBt) closeBt.addEventListener('click', closeModal);
      modal.addEventListener('click', (e) => {
        if (e.target === modal || (e.target.classList && e.target.classList.contains('bg-black/70'))) closeModal();
      });
      document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeModal(); });
    })();
  </script>
</body>
</html>
