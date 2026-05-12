<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hemotrack</title>
@vite('resources/css/app.css')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body class="bg-gray-100 font-[Poppins]">

<div class="flex h-screen">

    {{-- SIDEBAR --}}
    @include('partials.sidebar')

    <div class="flex-1 flex flex-col">

        {{-- NAVBAR --}}
        @include('partials.navbar')

        {{-- CONTENT --}}
        <main class="p-6 overflow-y-auto">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>