<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Hemotrack</title>

    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="min-h-screen flex overflow-hidden bg-gray-200">

    <!-- KIRI -->
    <div class="w-[35%] bg-gray-200 relative flex flex-col justify-center px-10">

        <!-- TEXT -->
        <div class="mb-20">

            <h1 class="text-teal-700 text-2xl leading-relaxed"
                style="font-family: 'Press Start 2P'">

                WELCOME

            </h1>

            <h2 class="text-red-600 text-xl mt-5 leading-relaxed"
                style="font-family: 'Press Start 2P'">

                HEMOTRACK

            </h2>

        </div>

        <!-- BUTTON -->
        <div>

            <button class="bg-teal-700 text-white px-10 py-3 rounded-full shadow-xl text-lg">

                Login

            </button>

        </div>

    </div>

    <!-- KANAN -->
    <div class="w-[65%] bg-gradient-to-br from-[#0f5c5f] via-[#167373] to-[#39a6a6] flex justify-center items-center">

        <!-- CARD -->
        <div class="w-[420px]">

            <!-- LOGO -->
            <div class="flex justify-center mb-10">

                <div class="bg-white rounded-full p-6 shadow-2xl">

                    <img src="/logo.png"
                         class="w-28 h-28 object-contain">

                </div>

            </div>

            <!-- FORM -->
            <div class="bg-white/10 backdrop-blur-md p-8 rounded-3xl shadow-2xl border border-white/20">

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <!-- EMAIL -->
                    <div class="mb-6">

                        <label class="text-white text-sm">
                            Email
                        </label>

                        <div class="flex items-center bg-white rounded-full px-4 py-3 mt-2 shadow-md">

                            <i class="fa fa-user text-gray-500 mr-3"></i>

                            <input type="email"
                                   name="email"
                                   placeholder="Masukkan email"
                                   class="w-full bg-transparent border-none outline-none focus:ring-0">

                        </div>

                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-6">

                        <label class="text-white text-sm">
                            Password
                        </label>

                        <div class="flex items-center bg-white rounded-full px-4 py-3 mt-2 shadow-md">

                            <i class="fa fa-lock text-gray-500 mr-3"></i>

                            <input type="password"
                                   name="password"
                                   placeholder="Masukkan password"
                                   class="w-full bg-transparent border-none outline-none focus:ring-0">

                        </div>

                    </div>

                    <!-- FORGOT -->
                    <div class="text-right mb-6">

                        <a href="#"
                           class="text-white text-sm hover:underline">

                            Forgot Password?

                        </a>

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                            class="w-full bg-[#7fd4d6] hover:bg-[#69c4c6] text-black font-semibold py-3 rounded-full shadow-lg transition duration-300">

                        Get Start

                    </button>

                </form>

            </div>

        </div>

    </div>

</body>
</html>