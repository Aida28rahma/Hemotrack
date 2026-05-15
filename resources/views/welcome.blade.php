<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hemotrack</title>
@vite('resources/css/app.css')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body class="bg-[#f4f4f4] font-[Poppins] h-screen flex items-center justify-center relative overflow-hidden">

    <!-- BACKGROUND KIRI -->
    <div class="absolute left-0 bottom-0 w-[300px] h-[400px] bg-red-200 opacity-30 rounded-tr-full"></div>

    <!-- BACKGROUND KANAN -->
    <div class="absolute right-0 top-0 w-[300px] h-[400px] bg-red-200 opacity-30 rounded-bl-full"></div>

    <!-- CONTENT -->
    <div class="text-center z-10">

        <!-- TEXT -->
        <h1 class="text-teal-800 text-lg font-semibold mb-2">
            Selamat Datang di 
            <span class="bg-teal-800 text-white px-2 py-1 rounded">
                Hemotrack!
            </span>
        </h1>

        <h2 class="text-2xl font-bold text-teal-900 mb-4">
            Sistem Informasi Pengelolaan
        </h2>

        <div class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg font-semibold mb-10">
            Stok Darah Rumah Sakit
        </div>

        <!-- AREA LOGO + ANIMASI -->
        <div class="relative flex justify-center items-center mt-10">

    <!-- CHECKBOX -->
    <input type="checkbox" id="toggle" class="peer hidden">

    <!-- DOKTER -->
    <a href="{{ route('login') }}"
       class="absolute 
              scale-0 opacity-0 
              peer-checked:scale-100 peer-checked:-translate-x-40 peer-checked:opacity-100
              transition-all duration-500
              bg-teal-700 text-white w-32 h-32 rounded-full 
              flex flex-col items-center justify-center shadow-lg">
        👨‍⚕️
        <span class="text-sm mt-1">Dokter</span>
    </a>

    <!-- LOGO -->
    <label for="toggle"
           class="z-10 bg-white p-8 rounded-full shadow-xl cursor-pointer hover:scale-105 transition">
        <img src="/logo.png" class="w-32 h-32">
    </label>

    <!-- PETUGAS -->
    <a href="{{ route('login') }}"
       class="absolute 
              scale-0 opacity-0 
              peer-checked:scale-100 peer-checked:translate-x-40 peer-checked:opacity-100
              transition-all duration-500
              bg-teal-700 text-white w-32 h-32 rounded-full 
              flex flex-col items-center justify-center shadow-lg">
        🧑‍💼
        <span class="text-sm mt-1">Petugas</span>
    </a>



            </div>

        </div>

    </div>

</body>
</html>