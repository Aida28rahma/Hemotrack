<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hemotrack</title>

    @vite('resources/css/app.css')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-gray-100 font-[Poppins]">

    <div class="min-h-screen bg-gray-100 relative">

        {{-- NAVBAR FULL ATAS --}}
        @include('partials.navbar')

        <div class="flex min-h-[calc(100vh-86px)]">

            {{-- SIDEBAR --}}
            @include('partials.sidebar')

            {{-- CONTENT --}}
            <main class="flex-1 p-6 overflow-y-auto bg-gray-100">
                @yield('content')
            </main>

        </div>

    </div>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</body>
</html>