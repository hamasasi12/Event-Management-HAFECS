<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Certificate</title>
  <style>
    @page { margin: 0; size: A4 landscape; }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html, body { width: 100%; height: 100%; font-family: DejaVu Sans, Arial, sans-serif; }
    .page { position: relative; width: 297mm; height: 210mm; overflow: hidden; }
    .bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; }
    .layer { position: absolute; inset: 0; }

    /* ukuran font */
    .fs-140 { font-size: 80px; }
    .fs-130 { font-size: 60px; }
    .fs-120 { font-size: 40px; }
    .fs-110 { font-size: 34px; } /* tambahan untuk lebih kecil */

    /* ===== POSISI KOMPONEN ===== */
    .name {
      position: absolute;
      top: 40%;
      left: 0; width: 100%;
      text-align: center;
      color: #0b214b;
      font-weight: 700;
      line-height: 1.1;
      white-space: nowrap;
      font-family: "calibri", cursive;
    }
    .webinar {
      position: absolute;
      top: 127mm;
      left: 25mm;
      right: 25mm;
      text-align: center;
      font-size: 12pt;
      color: #2c3e50;
      line-height: 1.5;
    }
    .given {
      position: absolute;
      top: 146mm;
      left: 0;
      width: 100%;
      text-align: center;
      font-size: 13pt;
      letter-spacing: 2px;
      color: #0b214b;
    }

    .qr {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: 48mm;
      width: 35mm;
      height: 35mm;
    }
    .qr svg { width: 100%; height: 100%; display: block; }

    .number {
      position: absolute;
      bottom: 30mm;
      left: 0;
      width: 100%;
      text-align: center;
      font-size: 11pt;
      color: #2c3e50;
      font-weight: 700;
      letter-spacing: 1px;
    }
  </style>
</head>

@php
  use Illuminate\Support\Carbon;

  // Nama peserta
  $name = $name ?? ($registration->name ?? 'Peserta');

  // KECILKAN font nama: turunkan satu tingkat dari logika lama
  if (!isset($fontSize)) {
      $len = mb_strlen($name ?? '', 'UTF-8');
      $orig = $len <= 20 ? 140 : ($len <= 28 ? 130 : 120);
      $fontSize = $orig === 140 ? 130 : ($orig === 130 ? 120 : 110);
  }

  // Normalisasi background
  $backgroundType = $backgroundType ?? 'png';
  $bgSrc = null;
  if (!empty($backgroundImage)) {
      if (is_string($backgroundImage) && (str_starts_with($backgroundImage, 'data:') || str_starts_with($backgroundImage, 'http'))) {
          $bgSrc = $backgroundImage;
      } else {
          $bgSrc = "data:image/{$backgroundType};base64,{$backgroundImage}";
      }
  }

  // Tanggal webinar dari start_time (fallback: today)
  $dt = !empty($seminar?->start_time) ? Carbon::parse($seminar->start_time) : Carbon::now();

  // Kalimat atas: "in the Webinar entitled “{title}” organized on {2 November 2025}."
  $seminarTitle = $seminar->title ?? 'Seminar';
  $seminarDateHuman = $dt->translatedFormat('j F Y'); // 2 November 2025
  $webinarSentence = "in the Webinar entitled “{$seminarTitle}” organized on {$seminarDateHuman}.";

  // Kalimat bawah: "GIVEN ON THIS {2} DAY OF {NOVEMBER} {2025} IN {BANJARMASIN}"
  $dayNum  = $dt->format('j');
  $monthUp = strtoupper($dt->format('F'));
  $yearNum = $dt->format('Y');
  $cityUp  = strtoupper($seminar->city ?? 'BANJARMASIN'); // pakai field city jika ada
  $givenOn = "GIVEN ON THIS {$dayNum} DAY OF {$monthUp} {$yearNum} IN {$cityUp}";

  // Nomor sertifikat
  $certificateNumber = $certificateNumber ?? ($certificate->certificate_number ?? '—');

  // QR opsional
  $qrSvg = $qrSvg ?? null;
@endphp

<body>
  <div class="page">
    @if(!empty($bgSrc))
      <img class="bg" src="{{ $bgSrc }}" alt="bg">
    @endif

    <div class="layer">
      {{-- Nama peserta --}}
      <div class="name fs-{{ $fontSize }}">{{ $name }}</div>

      {{-- Kalimat webinar --}}
      <div class="webinar">{{ $webinarSentence }}</div>

      {{-- GIVEN ON ... --}}
      <div class="given">{{ $givenOn }}</div>

      {{-- QR di atas nomor sertifikat (opsional) --}}
      @if(!empty($qrSvg))
        <div class="qr">{!! $qrSvg !!}</div>
      @endif

      {{-- Nomor sertifikat --}}
      <div class="number">{{ $certificateNumber }}</div>
    </div>
  </div>
</body>
</html>
