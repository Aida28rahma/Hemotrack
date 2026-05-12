

@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-100">



            @foreach ([
                ['title' => 'Total Pendonor', 'value' => 110, 'color' => 'border-teal-600'],
                ['title' => 'Distribusi Hari Ini', 'value' => 20, 'color' => 'border-blue-500'],
                ['title' => 'Stok darah', 'value' => 80, 'color' => 'border-green-500'],
                ['title' => 'Permintaan Darah', 'value' => 14, 'color' => 'border-orange-500'],
            ] as $card)

                <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow flex justify-between items-center border-l-4 {{ $card['color'] }}">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $card['title'] }}</p>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ $card['value'] }}</h2>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-red-50 dark:bg-red-900/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>

            @endforeach

        </div>

        <!-- Notifikasi -->
        <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <div class="flex items-center space-x-2">
                    <svg class="w-5 h-5 text-yellow-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                    <span class="font-semibold text-gray-700 dark:text-gray-200">Notifikasi Stok</span>
                </div>
                <span class="text-red-500 font-bold text-sm sm:text-base">*Stok O hampir habis</span>
            </div>
        </div>

        <!-- Grafik + List -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- Grafik -->
            <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-xl shadow">
                <h2 class="font-bold text-gray-800 dark:text-gray-100 mb-4">Grafik Stok Darah</h2>

                <!-- Bar Chart -->
                <div class="flex items-end justify-center space-x-6 h-44">
                    @foreach ([
                        ['label' => 'A', 'height' => 'h-24', 'bg' => 'bg-red-600'],
                        ['label' => 'B', 'height' => 'h-36', 'bg' => 'bg-red-700'],
                        ['label' => 'AB', 'height' => 'h-28', 'bg' => 'bg-red-500'],
                        ['label' => 'O', 'height' => 'h-16', 'bg' => 'bg-red-400'],
                    ] as $bar)
                        <div class="flex flex-col items-center">
                            <div class="{{ $bar['bg'] }} w-10 sm:w-12 {{ $bar['height'] }} rounded-t-md transition-all duration-300"></div>
                            <span class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-400">{{ $bar['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Permintaan & Distribusi -->
            <div class="space-y-4">

                <!-- Permintaan -->
                <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-xl shadow">
                    <h2 class="font-bold text-gray-800 dark:text-gray-100 mb-3">Permintaan</h2>
                    <div class="space-y-3">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                            <p class="text-sm text-gray-700 dark:text-gray-300">dr. Bayu Bimasena - A+ - 2 Kantong</p>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400 w-fit">Diproses</span>
                        </div>
                        <hr class="border-gray-200 dark:border-gray-700">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                            <p class="text-sm text-gray-700 dark:text-gray-300">dr. Budi Utomo - O- - 1 Kantong</p>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 w-fit">Diterima</span>
                        </div>
                    </div>
                </div>

                <!-- Distribusi -->
                <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-xl shadow">
                    <h2 class="font-bold text-gray-800 dark:text-gray-100 mb-3">Distribusi</h2>
                    <div class="space-y-3">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                            <p class="text-sm text-gray-700 dark:text-gray-300">dr. Fajri Alfahri - B+ - 3 Kantong</p>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400 w-fit">Diterima</span>
                        </div>
                        <hr class="border-gray-200 dark:border-gray-700">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                            <p class="text-sm text-gray-700 dark:text-gray-300">dr. Diska Fatiha - AB+ - 1 Kantong</p>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 w-fit">Ditolak</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection

