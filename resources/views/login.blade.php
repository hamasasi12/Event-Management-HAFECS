<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAFECS - Login & Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#1a1a2e',
                        'secondary': '#16213e',
                        'accent': '#0f3460',
                        'coral': '#ff6b6b',
                        'teal': '#4ecdc4'
                    },
                    fontFamily: {
                        'sans': ['Segoe UI', 'Tahoma', 'Geneva', 'Verdana', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-text {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-bg {
            background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .form-input {
            transition: all 0.3s ease;
        }

        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(78, 205, 196, 0.2);
        }

        .btn-hover {
            transition: all 0.3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            bottom: 20%;
            left: 30%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .slide-in {
            animation: slideIn 0.5s ease-out forwards;
        }

        .slide-out {
            animation: slideOut 0.5s ease-out forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideOut {
            from {
                opacity: 1;
                transform: translateX(0);
            }
            to {
                opacity: 0;
                transform: translateX(-100px);
            }
        }

        .error-message {
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .success-message {
            animation: bounce 0.6s ease-in-out;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
    </style>
</head>
<body class="font-sans">
    <!-- Background -->
    <div class="min-h-screen hero-bg relative overflow-hidden">
        <!-- Floating Shapes -->
        <div class="floating-shapes">
            <div class="shape w-32 h-32 bg-gradient-to-r from-coral to-teal rounded-full"></div>
            <div class="shape w-24 h-24 bg-gradient-to-r from-teal to-blue-500 rounded-full"></div>
            <div class="shape w-28 h-28 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full"></div>
        </div>

        <!-- Header -->
        <header class="relative z-10 p-6">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-3xl font-bold gradient-text">HAFECS</div>
                <a href="index.html" class="text-white hover:text-teal transition-colors px-4 py-2 rounded-full hover:bg-white hover:bg-opacity-10">
                    ← Kembali ke Home
                </a>
            </div>
        </header>

        <!-- Main Content -->
        <div class="relative z-10 flex items-center justify-center min-h-screen pt-20 pb-20">
            <div class="container mx-auto px-6">
                <div class="max-w-md mx-auto">
                    
                    <!-- Login Form -->
                    <div id="loginForm" class="auth-card rounded-3xl p-8 shadow-2xl slide-in">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-primary mb-2">Welcome Back</h2>
                            <p class="text-gray-600">Masuk ke akun HAFECS Anda</p>
                        </div>

                        <!-- Google SSO Button -->
                        <button onclick="handleGoogleLogin()" class="w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 rounded-xl font-semibold mb-6 btn-hover flex items-center justify-center space-x-3">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span>Masuk dengan Google</span>
                        </button>

                        <div class="relative mb-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Atau</span>
                            </div>
                        </div>

                        <form id="loginFormElement" onsubmit="handleLogin(event)">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Username</label>
                                    <input type="text" id="loginUsername" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal focus:border-transparent">
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Password</label>
                                    <div class="relative">
                                        <input type="password" id="loginPassword" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal focus:border-transparent pr-12">
                                        <button type="button" onclick="togglePassword('loginPassword', 'loginPasswordToggle')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <svg id="loginPasswordToggle" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mt-6">
                                <label class="flex items-center">
                                    <input type="checkbox" class="h-4 w-4 text-teal border-gray-300 rounded focus:ring-teal">
                                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                                </label>
                                <a href="#" class="text-sm text-teal hover:text-coral transition-colors">Lupa password?</a>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-coral to-red-500 text-white py-3 px-4 rounded-xl font-semibold mt-6 btn-hover">
                                Masuk
                            </button>
                        </form>

                        <p class="text-center text-gray-600 mt-6">
                            Belum punya akun? 
                            <button onclick="showRegister()" class="text-teal font-semibold hover:text-coral transition-colors">Daftar di sini</button>
                        </p>
                    </div>

                    <!-- Register Form -->
                    <div id="registerForm" class="auth-card rounded-3xl p-8 shadow-2xl hidden">
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-primary mb-2">Create Account</h2>
                            <p class="text-gray-600">Bergabung dengan HAFECS Digital Summit</p>
                        </div>

                        <!-- Google SSO Button -->
                        <button onclick="handleGoogleRegister()" class="w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 rounded-xl font-semibold mb-6 btn-hover flex items-center justify-center space-x-3">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span>Daftar dengan Google</span>
                        </button>

                        <div class="relative mb-6">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-300"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-2 bg-white text-gray-500">Atau</span>
                            </div>
                        </div>

                        <form id="registerFormElement" onsubmit="handleRegister(event)">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Username</label>
                                    <input type="text" id="registerUsername" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal focus:border-transparent">
                                    <p class="text-xs text-gray-500 mt-1">Username akan digunakan untuk login</p>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Email</label>
                                    <input type="email" id="registerEmail" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal focus:border-transparent">
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Password</label>
                                    <div class="relative">
                                        <input type="password" id="registerPassword" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal focus:border-transparent pr-12">
                                        <button type="button" onclick="togglePassword('registerPassword', 'registerPasswordToggle')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <svg id="registerPasswordToggle" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mt-2 text-xs text-gray-500">
                                        <div id="passwordStrength" class="flex space-x-1 mb-2">
                                            <div class="h-1 bg-gray-200 rounded flex-1"></div>
                                            <div class="h-1 bg-gray-200 rounded flex-1"></div>
                                            <div class="h-1 bg-gray-200 rounded flex-1"></div>
                                            <div class="h-1 bg-gray-200 rounded flex-1"></div>
                                        </div>
                                        <p>Minimal 8 karakter dengan kombinasi huruf, angka, dan simbol</p>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-gray-700 font-semibold mb-2">Konfirmasi Password</label>
                                    <div class="relative">
                                        <input type="password" id="confirmPassword" required class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal focus:border-transparent pr-12">
                                        <button type="button" onclick="togglePassword('confirmPassword', 'confirmPasswordToggle')" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <svg id="confirmPasswordToggle" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <label class="flex items-center">
                                    <input type="checkbox" required class="h-4 w-4 text-teal border-gray-300 rounded focus:ring-teal">
                                    <span class="ml-2 text-sm text-gray-600">
                                        Saya setuju dengan <a href="#" class="text-teal hover:text-coral transition-colors">Terms of Service</a> dan 
                                        <a href="#" class="text-teal hover:text-coral transition-colors">Privacy Policy</a>
                                    </span>
                                </label>
                            </div>

                            <div class="mt-4">
                                <label class="flex items-center">
                                    <input type="checkbox" class="h-4 w-4 text-teal border-gray-300 rounded focus:ring-teal">
                                    <span class="ml-2 text-sm text-gray-600">Saya ingin menerima newsletter dan update terbaru dari HAFECS</span>
                                </label>
                            </div>

                            <button type="submit" class="w-full bg-gradient-to-r from-teal to-blue-500 text-white py-3 px-4 rounded-xl font-semibold mt-6 btn-hover">
                                Daftar Sekarang
                            </button>
                        </form>

                        <p class="text-center text-gray-600 mt-6">
                            Sudah punya akun? 
                            <button onclick="showLogin()" class="text-teal font-semibold hover:text-coral transition-colors">Masuk di sini</button>
                        </p>
                    </div>

                    <!-- Success Message -->
                    <div id="successMessage" class="auth-card rounded-3xl p-8 shadow-2xl hidden success-message">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-primary mb-2">Berhasil!</h3>
                            <p class="text-gray-600 mb-6" id="successText">Akun Anda berhasil dibuat. Silakan check email untuk verifikasi.</p>
                            <button onclick="showLogin()" class="bg-gradient-to-r from-coral to-red-500 text-white py-2 px-6 rounded-xl font-semibold btn-hover">
                                Lanjut ke Login
                            </button>
                        </div>
                    </div>

                    <!-- Error Message -->
                    <div id="errorMessage" class="hidden">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4 error-message">
                            <span id="errorText">Terjadi kesalahan. Silakan coba lagi.</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        // Mock user database (in real app, this would be server-side)
        let users = JSON.parse(localStorage.getItem('hafecs_users') || '[]');

        // Show/Hide Forms
        function showRegister() {
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('registerForm').classList.remove('hidden');
            document.getElementById('successMessage').classList.add('hidden');
            document.getElementById('errorMessage').classList.add('hidden');
        }

        function showLogin() {
            document.getElementById('registerForm').classList.add('hidden');
            document.getElementById('loginForm').classList.remove('hidden');
            document.getElementById('successMessage').classList.add('hidden');
            document.getElementById('errorMessage').classList.add('hidden');
        }

        // Toggle Password Visibility
        function togglePassword(inputId, toggleId) {
            const input = document.getElementById(inputId);
            const toggle = document.getElementById(toggleId);
            
            if (input.type === 'password') {
                input.type = 'text';
                toggle.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                `;
            } else {
                input.type = 'password';
                toggle.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                `;
            }
        }

        // Password Strength Checker
        document.getElementById('registerPassword').addEventListener('input', function(e) {
            const password = e.target.value;
            const strength = checkPasswordStrength(password);
            updatePasswordStrengthIndicator(strength);
        });

        function checkPasswordStrength(password) {
            let score = 0;
            if (password.length >= 8) score++;
            if (/[A-Z]/.test(password)) score++;
            if (/[0-9]/.test(password)) score++;
            if (/[^A-Za-z0-9]/.test(password)) score++;
            return score;
        }

        function updatePasswordStrengthIndicator(strength) {
            const bars = document.querySelectorAll('#passwordStrength div');
            const colors = ['bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500'];
            
            bars.forEach((bar, index) => {
                bar.className = 'h-1 rounded flex-1 ' + (index < strength ? colors[strength - 1] : 'bg-gray-200');
            });
        }

        // Show Error Message
        function showError(message) {
            document.getElementById('errorText').textContent = message;
            document.getElementById('errorMessage').classList.remove('hidden');
            setTimeout(() => {
                document.getElementById('errorMessage').classList.add('hidden');
            }, 5000);
        }

        // Show Success Message
        function showSuccess(message) {
            document.getElementById('successText').textContent = message;
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('registerForm').classList.add('hidden');
            document.getElementById('successMessage').classList.remove('hidden');
        }

        // Handle Registration
        function handleRegister(event) {
            event.preventDefault();
            
            const username = document.getElementById('registerUsername').value;
            const email = document.getElementById('registerEmail').value;
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            // Validation
            if (password !== confirmPassword) {
                showError('Password dan konfirmasi password tidak sama.');
                return;
            }

            if (password.length < 8) {
                showError('Password minimal 8 karakter.');
                return;
            }

            // Check if user already exists
            if (users.find(user => user.username === username)) {
                showError('Username sudah digunakan. Pilih username lain.');
                return;
            }

            if (users.find(user => user.email === email)) {
                showError('Email sudah terdaftar. Gunakan email lain atau login.');
                return;
            }

            // Create new user
            const newUser = {
                id: Date.now(),
                username: username,
                email: email,
                password: password, // In real app, this should be hashed
                registeredAt: new Date().toISOString(),
                loginMethod: 'email'
            };

            users.push(newUser);
            localStorage.setItem('hafecs_users', JSON.stringify(users));

            showSuccess('Pendaftaran berhasil! Akun Anda telah dibuat.');
        }

        // Handle Login
        function handleLogin(event) {
            event.preventDefault();
            
            const username = document.getElementById('loginUsername').value;
            const password = document.getElementById('loginPassword').value;

            // Find user
            const user = users.find(u => u.username === username && u.password === password);

            if (user) {
                // Store login session
                localStorage.setItem('hafecs_current_user', JSON.stringify({
                    id: user.id,
                    username: user.username,
                    email: user.email,
                    loginTime: new Date().toISOString()
                }));

                showSuccess(`Selamat datang kembali, ${user.username}! Anda akan diarahkan ke dashboard.`);
                
                // Redirect to dashboard or home page after 2 seconds
                setTimeout(() => {
                    window.location.href = 'index.html'; // Or dashboard.html
                }, 2000);
            } else {
                showError('Username atau password salah. Periksa kembali data Anda.');
            }
        }

        // Handle Google Login (Mock implementation)
        function handleGoogleLogin() {
            // In real implementation, this would integrate with Google OAuth
            // This is a mock implementation for demonstration
            showLoadingState('Menghubungkan dengan Google...');
            
            setTimeout(() => {
                const mockGoogleUser = {
                    id: 'google_' + Date.now(),
                    username: 'john.doe',
                    email: 'john.doe@gmail.com',
                    name: 'John Doe',
                    loginMethod: 'google',
                    registeredAt: new Date().toISOString()
                };

                // Store user if not exists
                const existingUser = users.find(u => u.email === mockGoogleUser.email);
                if (!existingUser) {
                    users.push(mockGoogleUser);
                    localStorage.setItem('hafecs_users', JSON.stringify(users));
                }

                // Store login session
                localStorage.setItem('hafecs_current_user', JSON.stringify({
                    id: mockGoogleUser.id,
                    username: mockGoogleUser.username,
                    email: mockGoogleUser.email,
                    name: mockGoogleUser.name,
                    loginTime: new Date().toISOString(),
                    loginMethod: 'google'
                }));

                hideLoadingState();
                showSuccess(`Selamat datang, ${mockGoogleUser.name}! Login dengan Google berhasil.`);
                
                setTimeout(() => {
                    window.location.href = 'index.html';
                }, 2000);
            }, 2000);
        }

        // Handle Google Register (Mock implementation)
        function handleGoogleRegister() {
            // In real implementation, this would integrate with Google OAuth
            showLoadingState('Menghubungkan dengan Google...');
            
            setTimeout(() => {
                const mockGoogleUser = {
                    id: 'google_' + Date.now(),
                    username: 'new.user',
                    email: 'new.user@gmail.com',
                    name: 'New User',
                    loginMethod: 'google',
                    registeredAt: new Date().toISOString()
                };

                // Check if user already exists
                const existingUser = users.find(u => u.email === mockGoogleUser.email);
                if (existingUser) {
                    hideLoadingState();
                    showError('Email ini sudah terdaftar. Silakan gunakan login.');
                    return;
                }

                // Create new user
                users.push(mockGoogleUser);
                localStorage.setItem('hafecs_users', JSON.stringify(users));

                hideLoadingState();
                showSuccess('Pendaftaran dengan Google berhasil! Akun Anda telah dibuat.');
            }, 2000);
        }

        // Loading state functions
        function showLoadingState(message) {
            const loadingDiv = document.createElement('div');
            loadingDiv.id = 'loadingState';
            loadingDiv.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
            loadingDiv.innerHTML = `
                <div class="auth-card rounded-3xl p-8 text-center">
                    <div class="animate-spin w-12 h-12 border-4 border-teal border-t-transparent rounded-full mx-auto mb-4"></div>
                    <p class="text-gray-600">${message}</p>
                </div>
            `;
            document.body.appendChild(loadingDiv);
        }

        function hideLoadingState() {
            const loadingDiv = document.getElementById('loadingState');
            if (loadingDiv) {
                loadingDiv.remove();
            }
        }

        // Form validation helpers
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validateUsername(username) {
            const re = /^[a-zA-Z0-9._-]+$/;
            return re.test(username) && username.length >= 3 && username.length <= 20;
        }

        // Real-time validation
        document.getElementById('registerUsername').addEventListener('input', function(e) {
            const username = e.target.value;
            const isValid = validateUsername(username);
            
            if (username.length > 0 && !isValid) {
                e.target.classList.add('border-red-500');
                e.target.classList.remove('border-gray-300');
            } else {
                e.target.classList.remove('border-red-500');
                e.target.classList.add('border-gray-300');
            }
        });

        document.getElementById('registerEmail').addEventListener('input', function(e) {
            const email = e.target.value;
            const isValid = validateEmail(email);
            
            if (email.length > 0 && !isValid) {
                e.target.classList.add('border-red-500');
                e.target.classList.remove('border-gray-300');
            } else {
                e.target.classList.remove('border-red-500');
                e.target.classList.add('border-gray-300');
            }
        });

        document.getElementById('confirmPassword').addEventListener('input', function(e) {
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = e.target.value;
            
            if (confirmPassword.length > 0 && password !== confirmPassword) {
                e.target.classList.add('border-red-500');
                e.target.classList.remove('border-gray-300');
            } else {
                e.target.classList.remove('border-red-500');
                e.target.classList.add('border-gray-300');
            }
        });

        // Check if user is already logged in
        document.addEventListener('DOMContentLoaded', function() {
            const currentUser = localStorage.getItem('hafecs_current_user');
            if (currentUser) {
                const user = JSON.parse(currentUser);
                showSuccess(`Anda sudah login sebagai ${user.username}. Redirecting...`);
                setTimeout(() => {
                    window.location.href = 'index.html';
                }, 2000);
            }
        });

        // Logout function (for testing purposes)
        function logout() {
            localStorage.removeItem('hafecs_current_user');
            showLogin();
        }

        // Password strength requirements
        function getPasswordRequirements(password) {
            const requirements = [
                { test: password.length >= 8, text: "Minimal 8 karakter" },
                { test: /[A-Z]/.test(password), text: "Mengandung huruf besar" },
                { test: /[a-z]/.test(password), text: "Mengandung huruf kecil" },
                { test: /[0-9]/.test(password), text: "Mengandung angka" },
                { test: /[^A-Za-z0-9]/.test(password), text: "Mengandung simbol" }
            ];
            return requirements;
        }

        // Enhanced registration with better validation
        function enhancedRegister(event) {
            event.preventDefault();
            
            const username = document.getElementById('registerUsername').value.trim();
            const email = document.getElementById('registerEmail').value.trim();
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            // Enhanced validation
            if (!validateUsername(username)) {
                showError('Username harus 3-20 karakter dan hanya boleh mengandung huruf, angka, titik, underscore, dan dash.');
                return;
            }

            if (!validateEmail(email)) {
                showError('Format email tidak valid.');
                return;
            }

            if (password !== confirmPassword) {
                showError('Password dan konfirmasi password tidak sama.');
                return;
            }

            const passwordStrength = checkPasswordStrength(password);
            if (passwordStrength < 2) {
                showError('Password terlalu lemah. Minimal harus mengandung 8 karakter dengan kombinasi huruf dan angka.');
                return;
            }

            // Check if user already exists
            if (users.find(user => user.username === username)) {
                showError('Username sudah digunakan. Pilih username lain.');
                return;
            }

            if (users.find(user => user.email === email)) {
                showError('Email sudah terdaftar. Gunakan email lain atau login.');
                return;
            }

            // Create new user with enhanced data
            const newUser = {
                id: Date.now(),
                username: username,
                email: email,
                password: password, // In production, hash this password
                registeredAt: new Date().toISOString(),
                loginMethod: 'email',
                isVerified: false,
                lastLogin: null
            };

            users.push(newUser);
            localStorage.setItem('hafecs_users', JSON.stringify(users));

            showSuccess('Pendaftaran berhasil! Silakan login dengan akun yang baru dibuat.');
        }

        // Replace default register handler with enhanced version
        document.getElementById('registerFormElement').onsubmit = enhancedRegister;