<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Diri</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-dark': '#0A2463', // Dark Blue
                        'accent-light': '#F2E3B3', // Beige/Yellow background
                        'button-yellow': '#F9D423', // Vibrant Yellow
                        'nav-link': '#1E2A39', // Dark Grey/Black for links
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        /* Mengatur body agar konten mengalir normal */
        body {
            background-color: #F2E3B3;
            font-family: 'Inter', sans-serif;
            margin: 0; /* Pastikan tidak ada margin default */
        }
        /* Style untuk kontainer form */
        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 1.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #D1D5DB;
            border-radius: 0.5rem;
            transition: border-color 0.2s;
        }
        .form-input:focus {
            outline: none;
            border-color: #0A2463;
        }
        /* Style untuk tombol Google */
        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1rem;
            border: 1px solid #D1D5DB;
            border-radius: 0.5rem;
            background-color: white;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .google-btn:hover {
            background-color: #F3F4F6;
        }
        .google-btn img {
            width: 1.5rem;
            height: 1.5rem;
            margin-right: 0.75rem;
        }
        /* Mengatur mobile menu agar tersembunyi secara default */
        .mobile-menu {
            display: none;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                 <div class="text-2xl font-bold text-gray-800">
                    <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-10">
                </div>
              <div class="hidden md:flex items-center justify-center space-x-8 w-full">
                   <a href="#webinar" class="font-semibold text-black-900 hover:text-blue-700 transition">Webinar</a>
                    <a href="#trainer" class="font-semibold text-black-900 hover:text-blue-700 transition">Trainer</a>
                    <a href="#dokumentasi" class="font-semibold text-black-900 hover:text-blue-700 transition">Dokumentasi</a>
                </div>
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-600 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu Dropdown -->
            <div id="mobile-menu" class="mobile-menu md:hidden mt-4 border-t pt-4">
                <a href="#webinar" class="block py-2 text-gray-600 hover:text-primary-dark">Webinar</a>
                <a href="#trainer" class="block py-2 text-gray-600 hover:text-primary-dark">Trainer</a>
                <a href="#dokumentasi" class="block py-2 text-gray-600 hover:text-primary-dark">Dokumentasi</a>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <!-- Main Content Wrapper: Ensures content is centered vertically and horizontally below the header -->
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <div class="form-container">
            <div class="text-center mb-6">
            <img src="{{ asset('images/admin/LOGO HAFECS.png') }}" alt="HAFECS Logo" class="h-12 mx-auto mb-4">
        <h1 class="text-2xl font-bold text-primary-dark">Daftar Webinar</h1>
                <p class="text-gray-600">Isi data diri Anda untuk bergabung.</p>
            </div>
            <form action="#" method="POST">
                <!-- @csrf is a Laravel directive, replaced with a comment -->
                <!-- @csrf -->
                <div class="mb-4">
                    <label for="nama" class="block text-lg font-bold text-gray-700 mb-2">Nama</label>
                    <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="form-input">
                </div>
                <div class="mb-4">
                    <label for="handphone" class="block text-lg font-bold text-gray-700 mb-2">No. Handphone</label>
                    <input type="text" id="handphone" name="handphone" placeholder="No Whatsapp" class="form-input">
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-lg font-bold text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email Aktif" class="form-input">
                </div>

                <!-- Submit Button -->
                 <button type="submit" class="w-full bg-button-yellow text-primary-dark font-bold py-3 rounded-lg shadow-md hover:bg-[#FFC000] transition duration-200 mb-4">
                    Lanjutkan Pendaftaran
                </button>

                <!-- Divider -->
                <div class="flex items-center my-4">
                    <div class="flex-grow border-t border-gray-300"></div>
                    <span class="flex-shrink mx-4 text-gray-500 text-sm">ATAU</span>
                    <div class="flex-grow border-t border-gray-300"></div>
                </div>

                <div class="flex items-center justify-center">
                    <!-- URL changed to # for a standalone HTML file -->
                      @guest
                <a href="{{ route('google.login') }}" class="bg-gradient-to-r from-coral to-red-500 text-white px-8 py-4 rounded-full font-semibold text-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 text-center">
                    Login with Google
                </a>
                @endguest
                @auth
                </div>
            </form>
        </div>
    </div>

    <script>
        // JavaScript untuk fungsionalitas menu mobile
        document.addEventListener('DOMContentLoaded', () => {
            const button = document.getElementById('mobile-menu-button');
            const menu = document.getElementById('mobile-menu');

            button.addEventListener('click', () => {
                // Menggunakan class 'hidden' untuk toggle display
                menu.classList.toggle('hidden');
            });
        });
    </>
</body>
</html>
