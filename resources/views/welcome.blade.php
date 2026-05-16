<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hemotrack</title>
    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="font-[Poppins] bg-white overflow-hidden">

<div x-data="{ open: false }" class="relative min-h-screen flex flex-col items-center justify-center">

    {{-- BACKGROUND DEKORASI --}}
    <div class="absolute -left-32 bottom-[-120px] w-[520px] h-[520px] bg-red-100 rounded-full opacity-70"></div>
    <div class="absolute -right-28 top-[-110px] w-[420px] h-[420px] bg-red-100 rounded-full opacity-70"></div>

    {{-- TITIK DARAH KIRI --}}
    <div class="absolute left-[120px] top-[150px] space-y-4 opacity-40">
        <div class="flex gap-5">
            <div class="w-8 h-10 bg-red-200 rounded-full"></div>
            <div class="w-10 h-12 bg-red-200 rounded-full"></div>
        </div>
        <div class="flex gap-5 ml-4">
            <div class="w-9 h-11 bg-red-200 rounded-full"></div>
            <div class="w-8 h-10 bg-red-200 rounded-full"></div>
        </div>
    </div>

    {{-- TITIK DARAH KANAN --}}
    <div class="absolute right-[110px] top-[280px] space-y-4 opacity-40">
        <div class="flex gap-4">
            <div class="w-8 h-10 bg-red-200 rounded-full"></div>
            <div class="w-9 h-12 bg-red-200 rounded-full"></div>
        </div>
        <div class="flex gap-4 ml-5">
            <div class="w-6 h-8 bg-red-200 rounded-full"></div>
            <div class="w-10 h-12 bg-red-200 rounded-full"></div>
        </div>
    </div>

    {{-- TITLE --}}
    <div class="text-center z-10 mb-12">
        <p class="text-2xl font-bold text-[#0f5c5c] mb-2">
            Selamat Datang di
            <span class="bg-[#0f5c5c] text-white px-3 py-1 rounded-md">
                Hemotrack!
            </span>
        </p>

        <h1 class="text-3xl font-extrabold text-[#0f4d4d] mb-3">
            Sistem Informasi Pengelolaan
        </h1>

        <div class="inline-block bg-red-600 text-white text-3xl font-extrabold px-6 py-2 rounded-md shadow">
            Stok Darah Rumah Sakit
        </div>
    </div>

    {{-- MENU --}}
    <div class="relative flex items-center justify-center z-10">

        {{-- DOKTER --}}
        <a x-show="open"
           x-transition
           href="{{ route('login') }}"
           class="absolute right-[230px] w-44 h-44 rounded-full bg-[#006c66] text-white flex flex-col items-center justify-center shadow-xl hover:scale-105 transition">

            <svg class="w-16 h-16 mb-3 fill-current" viewBox="0 0 24 24">
                <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z"/>
            </svg>

            <span class="text-lg font-bold">
                Dokter
            </span>
        </a>

        {{-- LOGO HEMOTRACK --}}
        <button @click="open = !open"
                class="w-64 h-64 bg-white rounded-full flex flex-col items-center justify-center shadow-2xl border border-gray-200 hover:scale-105 transition">

            <img src="/logo.png" class="w-36 mb-3">

            <span class="text-red-600 font-extrabold text-xl">
                HEMOTRACK
            </span>
        </button>

        {{-- PETUGAS --}}
        <a x-show="open"
           x-transition
           href="{{ route('login') }}"
           class="absolute left-[230px] w-44 h-44 rounded-full bg-[#006c66] text-white flex flex-col items-center justify-center shadow-xl hover:scale-105 transition">

            <svg class="w-16 h-16 mb-3 fill-current" viewBox="0 0 24 24">
                <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm-8 3a3 3 0 110 6 3 3 0 010-6zm6 10H6c.45-2.3 2.9-4 6-4s5.55 1.7 6 4z"/>
            </svg>

            <span class="text-lg font-bold">
                Petugas
            </span>
        </a>

    </div>

</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>