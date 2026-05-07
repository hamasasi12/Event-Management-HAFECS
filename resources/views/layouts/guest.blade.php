<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Tingkatkan kompetensi administrasi perkantoran Anda bersama praktisi berpengalaman dari HAFECS." />
    <meta name="keywords"
        content="Pelatihan Administrasi Perkantoran, HAFECS, Sertifikasi Administrasi, Fresh Graduate, Pelatihan Kerja" />
    <meta name="author" content="HAFECS Team" />
    <title>Elevate Class | Administrasi Perkantoran</title>

    <!-- Preconnect CDN -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin />
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('./assets/icon/cropped-favicon.png') }}" type="image/png" />
    <!-- Consolidated Styles -->
    <style>
        /* Nav underline effect */
        .nav-link {
            position: relative;
            overflow: hidden;
        }

        .nav-underline {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #2563eb;
            transition: width 0.3s ease;
            box-shadow: 0 0 8px 1px rgba(37, 99, 235, 0.4);
        }

        .nav-link:hover .nav-underline {
            width: 100%;
        }

        .nav-link:hover {
            text-shadow: 0 0 5px rgba(37, 99, 235, 0.2);
        }

        .promo-container:hover {
            box-shadow: 0 0 15px rgba(251, 191, 36, 0.7);
        }

        @keyframes pulse-slow {
            0%, 100% { opacity: .3; }
            50% { opacity: .7; }
        }

        .animate-pulse-slow {
            animation: pulse-slow 3s infinite;
        }

        /* Modal blockquote */
        #modalDesc blockquote {
            border-left: 4px solid #3b82f6;
            padding-left: 1rem;
            margin: 1rem 0;
            color: #374151;
            font-style: italic;
            background-color: #f0f4ff;
            border-radius: .375rem;
        }

        /* Popup */
        .popup-hidden {
            display: none;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .popup-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .copy-animation {
            animation: pulse 0.5s ease-in-out;
        }
    </style>
    @stack('styles')
</head>

<body class="font-sans antialiased text-gray-900">
    <x-Home.header />
    <main class="bg-blue-50/50">
        @yield('content')
    </main>
    <x-Home.footer :settings="$settings ?? []" />
    @stack('scripts')
</body>

</html>
