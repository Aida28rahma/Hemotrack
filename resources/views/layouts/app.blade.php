<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased" x-data="{ sidebarOpen: false }">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">

            <!-- Mobile Overlay -->
            <div
                x-show="sidebarOpen"
                x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-40 bg-black/50 lg:hidden"
                @click="sidebarOpen = false"
            ></div>

            <!-- Sidebar -->
            @include('layouts.navigation')

            <!-- Main Content -->
            <div class="flex-1 flex flex-col min-w-0 lg:ml-64">

                <!-- Top Bar (Mobile) -->
                <header class="sticky top-0 z-30 bg-white dark:bg-gray-800 shadow lg:hidden">
                    <div class="flex items-center justify-between px-4 py-3">
                        <button @click="sidebarOpen = true" class="text-gray-600 dark:text-gray-300 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                        </button>
                        <h1 class="text-lg font-bold text-teal-700 dark:text-teal-400">HEMOTRACK</h1>
                        <div class="w-6"></div>
                    </div>
                </header>

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow hidden lg:block">
                        <div class="py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-1">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
