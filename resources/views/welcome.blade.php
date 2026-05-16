<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hemotrack</title>
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-[Poppins] bg-[#f7f7f7] overflow-hidden">

<div class="relative min-h-screen flex flex-col items-center justify-center">

    {{-- BACKGROUND CIRCLE --}}
    <div class="absolute -top-40 -right-40 w-[520px] h-[520px] bg-red-100 rounded-full opacity-60"></div>
    <div class="absolute -bottom-40 -left-40 w-[520px] h-[520px] bg-red-100 rounded-full opacity-60"></div>

    {{-- TITLE --}}
    <div class="text-center mb-24 z-10">
        <p class="text-2xl font-bold text-[#0f5c5c] mb-4">
            Selamat Datang di
            <span class="bg-[#0f5c5c] text-white px-4 py-2 rounded-lg">
                Hemotrack!
            </span>
        </p>

        <h1 class="text-4xl font-extrabold text-[#0f4d4d] mb-8">
            Sistem Informasi Pengelolaan
        </h1>

        <div class="inline-block bg-red-600 text-white text-2xl font-bold px-8 py-4 rounded-xl shadow-md">
            Stok Darah Rumah Sakit
        </div>
    </div>

    {{-- MENU AREA --}}
    <div x-data="{ open: false }" class="relative flex items-center justify-center z-10">

        {{-- DOKTER --}}
        <a x-show="open"
           x-transition
           href="{{ route('login') }}"
           class="absolute right-[220px] w-44 h-44 rounded-full bg-[#0f8378] text-white flex flex-col items-center justify-center shadow-2xl hover:scale-105 transition">

            <svg class="w-14 h-14 mb-3 fill-current" viewBox="0 0 24 24">
                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
            </svg>

            <span class="text-xl font-bold">
                Dokter
            </span>
        </a>

        {{-- LOGO BUTTON --}}
        <button @click="open = !open"
                class="w-64 h-64 bg-white rounded-full flex flex-col items-center justify-center shadow-2xl hover:scale-105 transition">

            <img src="/logo.png" class="w-32 mb-4">

            <span class="text-red-600 font-extrabold text-xl tracking-wide">
                HEMOTRACK
            </span>
        </button>

        {{-- PETUGAS --}}
        <a x-show="open"
           x-transition
           href="{{ route('login') }}"
           class="absolute left-[220px] w-44 h-44 rounded-full bg-[#0f8378] text-white flex flex-col items-center justify-center shadow-2xl hover:scale-105 transition">

            <svg class="w-14 h-14 mb-3 fill-current" viewBox="0 0 24 24">
                <path d="M19 3H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2zm-7 3a3 3 0 110 6 3 3 0 010-6zm6 12H6c.4-2.3 2.9-4 6-4s5.6 1.7 6 4z"/>
            </svg>

            <span class="text-xl font-bold">
                Petugas
            </span>
        </a>

    </div>

</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>