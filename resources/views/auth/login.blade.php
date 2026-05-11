<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hemotrack</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .login-bg {
            background: linear-gradient(135deg, #0f766e 0%, #115e59 40%, #134e4a 70%, #1a3a3a 100%);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .input-focus:focus-within {
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }
        .btn-primary {
            background: linear-gradient(135deg, #0f766e 0%, #0d9488 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #115e59 0%, #0f766e 100%);
            transform: translateY(-1px);
            box-shadow: 0 10px 25px -5px rgba(15, 118, 110, 0.4);
        }
        .pulse-dot {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>

<body class="min-h-screen login-bg flex items-center justify-center p-4 sm:p-6 lg:p-8">

    <!-- Background decorative elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-teal-400/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-teal-300/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-teal-500/5 rounded-full blur-3xl"></div>
    </div>

    <!-- Main Container -->
    <div class="relative w-full max-w-lg mx-auto">

        <!-- Login Card -->
        <div class="glass-card rounded-2xl sm:rounded-3xl shadow-2xl p-6 sm:p-8 lg:p-10">

            <!-- Header / Branding -->
            <div class="text-center mb-8">
                <!-- Logo -->
                <div class="inline-flex items-center justify-center w-20 h-20 sm:w-24 sm:h-24 bg-gradient-to-br from-teal-50 to-teal-100 rounded-full shadow-lg mb-5 float-animation">
                    <img src="/logo.png" alt="Hemotrack Logo" class="w-12 h-12 sm:w-14 sm:h-14 object-contain"
                         onerror="this.style.display='none'; this.parentElement.innerHTML='<svg class=\'w-10 h-10 sm:w-12 sm:h-12 text-teal-700\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z\'></path></svg>'">
                </div>

                <!-- App Name -->
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 tracking-tight">
                    HEMO<span class="text-teal-700">TRACK</span>
                </h1>
                <p class="text-gray-500 text-sm sm:text-base mt-2">Sistem Manajemen Bank Darah</p>

                <!-- Health indicator -->
                <div class="flex items-center justify-center gap-2 mt-3">
                    <span class="pulse-dot w-2 h-2 bg-red-500 rounded-full"></span>
                    <span class="text-xs text-gray-400 uppercase tracking-wider font-medium">Blood Management System</span>
                </div>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center gap-2 mb-1">
                        <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm text-red-700 font-medium">Login gagal</span>
                    </div>
                    @foreach ($errors->all() as $error)
                        <p class="text-sm text-red-600 ml-6">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <p class="text-sm text-green-700">{{ session('status') }}</p>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Email Address
                    </label>
                    <div class="relative input-focus rounded-xl border border-gray-200 transition-all duration-200">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="nama@email.com"
                            class="w-full pl-12 pr-4 py-3.5 bg-transparent border-none rounded-xl text-gray-800 placeholder-gray-400 focus:ring-0 text-sm sm:text-base"
                        >
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Password
                    </label>
                    <div class="relative input-focus rounded-xl border border-gray-200 transition-all duration-200">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                            class="w-full pl-12 pr-4 py-3.5 bg-transparent border-none rounded-xl text-gray-800 placeholder-gray-400 focus:ring-0 text-sm sm:text-base"
                        >
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-teal-600 focus:ring-teal-500 focus:ring-offset-0">
                        <span class="text-sm text-gray-600">Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-teal-600 hover:text-teal-700 font-medium transition-colors">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-primary w-full py-3.5 sm:py-4 rounded-xl text-white font-semibold text-sm sm:text-base shadow-lg">
                    Masuk
                </button>
            </form>

            <!-- Footer -->
            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <p class="text-xs sm:text-sm text-gray-400">
                    &copy; {{ date('Y') }} Hemotrack &mdash; Sistem Manajemen Bank Darah
                </p>
            </div>
        </div>

        <!-- Security Badge -->
        <div class="mt-4 flex items-center justify-center gap-2 text-teal-200/60">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            <span class="text-xs">Koneksi aman & terenkripsi</span>
        </div>
    </div>

</body>
</html>
