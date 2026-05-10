<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login Hemotrack</title>
@vite('resources/css/app.css')

<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body class="h-screen flex">

<!-- KIRI -->
<div class="w-[30%] bg-[#e5e5e5] relative">

    <!-- TEXT -->
    <div class="absolute top-20 left-10">
        <h1 class="text-teal-700 text-xl" style="font-family: 'Press Start 2P'">
            WELCOME
        </h1>
        <h2 class="text-red-500 text-lg mt-2" style="font-family: 'Press Start 2P'">
            HEMOTRACK
        </h2>
    </div>

    <!-- BUTTON LOGIN (POSISI FIX) -->
    <div class="absolute top-1/2 right-0 -translate-y-1/2 translate-x-[10%]">
        <button class="bg-teal-700 text-white px-8 py-3 rounded-lg shadow-lg text-lg">
            LOGIN
        </button>
    </div>

</div>

<!-- KANAN -->
<div class="w-[70%] bg-gradient-to-br from-[#1c6b67] via-[#1f7f78] to-[#2aa89c] flex items-center justify-center">

    <div class="w-[400px] translate-x-12">

        <!-- LOGO -->
        <div class="flex justify-center mb-10">
            <div class="bg-white rounded-full p-6 shadow-xl">
                <img src="/logo.png" class="w-28 h-28">
            </div>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- EMAIL -->
        <div class="mb-6">
            <label class="text-white text-sm">Email :</label>
            <div class="flex items-center bg-gray-200 rounded-full px-4 py-3 mt-1">
                <i class="fa fa-user text-gray-500 mr-3"></i>
                <input type="email" name="email"
                    class="bg-transparent border-none outline-none w-full focus:ring-0">
            </div>
        </div>

        <!-- PASSWORD -->
        <div class="mb-6">
            <label class="text-white text-sm">Password :</label>
            <div class="flex items-center bg-gray-200 rounded-full px-4 py-2 mt-1 text-sm">
                <i class="fa fa-lock text-gray-500 mr-3"></i>
                <input type="password" name="password"
                    class="bg-transparent border-none outline-none w-full focus:ring-0">
            </div>
        </div>

        <p class="text-white text-sm mb-5">Forgot Password?</p>

        <!-- BUTTON -->
        <button class="w-full bg-[#7fd4d6] py-3 rounded-full shadow-lg">
            Get Start
        </button>

        </form>

    </div>

</div>

</body>
</html>
