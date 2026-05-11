
@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <main class="flex-1 p-6">

        <!-- Judul -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Ringkasan Stok Darah
        </h1>

        <!-- Card Golongan Darah -->
        <div class="flex flex-wrap gap-5 mb-8">

            @foreach ([
                ['golongan' => 'A', 'plus' => 20, 'minus' => 11],
                ['golongan' => 'B', 'plus' => 20, 'minus' => 11],
                ['golongan' => 'AB', 'plus' => 20, 'minus' => 11],
                ['golongan' => 'O', 'plus' => 20, 'minus' => 11],
            ] as $darah)

                <div class="w-64 bg-white border-4 border-teal-700 shadow-md p-4"
                    style="border-radius: 30px;">

                    <!-- Header -->
                    <div class="flex items-center gap-3 mb-3">

                        <!-- Icon -->
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                            <span class="text-red-700 text-xl">🩸</span>
                        </div>

                        <!-- Golongan -->
                        <h2 class="text-2xl font-bold text-red-800">
                            {{ $darah['golongan'] }}
                        </h2>
                    </div>

                    <!-- Isi -->
                    <div class="flex justify-around text-center mb-4">

                        <div>
                            <p class="font-bold text-gray-800">
                                {{ $darah['golongan'] }}+
                            </p>
                            <p class="text-lg font-semibold">
                                {{ $darah['plus'] }}
                            </p>
                        </div>

                        <div>
                            <p class="font-bold text-gray-800">
                                {{ $darah['golongan'] }}-
                            </p>
                            <p class="text-lg font-semibold">
                                {{ $darah['minus'] }}
                            </p>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="border-t pt-2 flex justify-between text-sm">
                        <span class="text-gray-500">Total</span>

                        <span class="font-bold text-red-700">
                            {{ $darah['plus'] + $darah['minus'] }} Kantong
                        </span>
                    </div>

                </div>

            @endforeach

        </div>

        <!-- Detail Stok -->
        <div class="bg-white rounded-2xl shadow-md p-6">

            <!-- Judul -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">
                    Detail Stok Darah
                </h2>
            </div>

            <!-- Filter -->
            <div class="flex flex-wrap gap-3 mb-5">

                <select
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-teal-500 outline-none">
                    <option>Golongan Darah</option>
                    <option>A</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>O</option>
                </select>

                <select
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-teal-500 outline-none">
                    <option>Komponen Darah</option>
                    <option>Whole Blood</option>
                    <option>Plasma</option>
                    <option>Trombosit</option>
                </select>

                <select
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-teal-500 outline-none">
                    <option>Rhesus Darah</option>
                    <option>Positif (+)</option>
                    <option>Negatif (-)</option>
                </select>

            </div>

            <!-- Table -->
            <div class="overflow-x-auto">

                <table class="w-full border-collapse overflow-hidden rounded-xl">

                    <!-- Head -->
                    <thead class="bg-teal-700 text-white">

                        <tr class="text-sm">
                            <th class="px-4 py-3 border">No</th>
                            <th class="px-4 py-3 border">Golongan</th>
                            <th class="px-4 py-3 border">Rhesus</th>
                            <th class="px-4 py-3 border">Jenis Komponen</th>
                            <th class="px-4 py-3 border">Tanggal Kadaluarsa</th>
                            <th class="px-4 py-3 border">Asal Darah</th>
                            <th class="px-4 py-3 border">Status</th>
                        </tr>

                    </thead>

                    <!-- Body -->
                    <tbody class="bg-white text-center text-sm">

                        @for ($i = 1; $i <= 9; $i++)

                            <tr class="hover:bg-gray-100 transition">

                                <td class="border px-4 py-2">{{ $i }}</td>

                                <td class="border px-4 py-2 font-semibold">
                                    A
                                </td>

                                <td class="border px-4 py-2">
                                    Negatif (-)
                                </td>

                                <td class="border px-4 py-2">
                                    Whole Blood
                                </td>

                                <td class="border px-4 py-2">
                                    10/10/2026
                                </td>

                                <td class="border px-4 py-2">
                                    Unit Bank Darah
                                </td>

                                <td class="border px-4 py-2">
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Telah diuji
                                    </span>
                                </td>

                            </tr>

                        @endfor

                    </tbody>

                </table>

            </div>

            <!-- Pagination Dummy -->
            <div class="flex justify-end items-center gap-2 mt-4">

                <button class="px-3 py-1 bg-gray-200 rounded">
                    ‹
                </button>

                <button class="px-3 py-1 bg-teal-600 text-white rounded">
                    1
                </button>

                <button class="px-3 py-1 bg-gray-200 rounded">
                    ›
                </button>

            </div>

        </div>

    </main>
@endsection