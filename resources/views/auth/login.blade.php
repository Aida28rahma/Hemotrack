<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Hemotrack</title>
    @vite('resources/css/app.css')
</head>

<body class="h-screen flex">

    <!-- KIRI -->
    <div class="w-1/3 bg-gray-200 p-10 flex flex-col justify-center">
        <h1 class="text-3xl font-bold text-teal-700">WELCOME</h1>
        <h2 class="text-2xl font-bold text-red-500">HEMOTRACK</h2>

        <button class="mt-10 bg-teal-700 text-white px-6 py-2 rounded w-32">
            Login
        </button>
    </div>

    <!-- KANAN -->
    <div class="w-2/3 bg-teal-700 flex items-center justify-center">

        <form method="POST" action="{{ route('login') }}" class="w-1/2">
            @csrf

            <div class="text-center mb-6">
                <img src="/logo.png" class="mx-auto w-24">
            </div>

            <div class="mb-4">
                <label class="text-white">Email :</label>
                <input type="email" name="email"
                    class="w-full p-3 rounded bg-gray-200">
            </div>

            <div class="mb-4">
                <label class="text-white">Password :</label>
                <input type="password" name="password"
                    class="w-full p-3 rounded bg-gray-200">
            </div>

            <p class="text-white text-sm mb-4">
                Forgot Password?
            </p>

            <button class="w-full bg-cyan-300 p-3 rounded">
                Get Start
            </button>

        </form>
    </div>

</body>
</html>