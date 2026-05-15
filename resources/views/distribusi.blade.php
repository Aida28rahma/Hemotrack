@extends('layouts.app')

@section('content')

<div class="p-6">

    <!-- Judul -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            Riwayat Distribusi
        </h1>

        <p class="text-sm text-gray-500">
            Pilih periode dan kriteria laporan yang ingin dicetak
        </p>
    </div>

    <!-- Filter -->
    <div class="bg-white rounded-3xl shadow-md border border-gray-200 p-5 mb-6">

        <h2 class="text-xl font-bold text-teal-700 mb-4">
            Filter Riwayat Distribusi
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-7 gap-3">

            <!-- Tanggal Awal -->
            <div>
                <label class="text-sm text-gray-600">Tanggal Awal</label>

                <input type="date"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">
            </div>

            <!-- Tanggal Akhir -->
            <div>
                <label class="text-sm text-gray-600">Tanggal Akhir</label>

                <input type="date"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">
            </div>

            <!-- Golongan -->
            <div>
                <label class="text-sm text-gray-600">Golongan Darah</label>

                <select
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">
                    <option>Semua</option>
                    <option>A</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>O</option>
                </select>
            </div>

            <!-- Komponen -->
            <div>
                <label class="text-sm text-gray-600">Komponen Darah</label>

                <select
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">
                    <option>PRC</option>
                    <option>Whole Blood</option>
                    <option>Plasma</option>
                </select>
            </div>

            <!-- Rhesus -->
            <div>
                <label class="text-sm text-gray-600">Rhesus</label>

                <select
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">
                    <option>Negatif (-)</option>
                    <option>Positif (+)</option>
                </select>
            </div>

            <!-- Poli -->
            <div>
                <label class="text-sm text-gray-600">Poli</label>

                <select
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">
                    <option>Bedah</option>
                    <option>ICU</option>
                    <option>Anak</option>
                </select>
            </div>

            <!-- Status -->
            <div>
                <label class="text-sm text-gray-600">Status</label>

                <select
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">

                    <option>Semua</option>
                    <option>Menunggu</option>
                    <option>Diproses</option>
                    <option>Selesai</option>
                    <option>Ditolak</option>

                </select>
            </div>
        </div>

        <!-- Button -->
        <div class="flex justify-end gap-3 mt-6">

            <button
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm transition">
                ↻ Reset
            </button>

            <button
                class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded-lg text-sm transition">
                🔍 Tampilkan
            </button>

        </div>

    </div>

    <!-- Data Riwayat -->
    <div class="bg-white rounded-3xl shadow-md border border-gray-200 p-5">

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-teal-700 mb-5">
            Data Riwayat Distribusi
        </h2>

       <!-- Statistik + Search -->
<div class="flex justify-between items-end mb-6 flex-wrap gap-4">

    <!-- Cards -->
    <div class="flex flex-wrap gap-5">

        <!-- Card 1 -->
        <div class="w-52 bg-white border border-gray-200 shadow rounded-2xl p-4 flex items-center gap-4">

            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-2xl">
                🚚
            </div>

            <div>
                <p class="text-sm text-gray-500">Total Distribusi</p>

                <h3 class="text-2xl font-bold text-teal-700">
                    60
                </h3>

                <p class="text-sm text-gray-500">Distribusi</p>
            </div>

        </div>

        <!-- Card 2 -->
        <div class="w-52 bg-white border border-gray-200 shadow rounded-2xl p-4 flex items-center gap-4">

            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-2xl">
                ➕
            </div>

            <div>
                <p class="text-sm text-gray-500">Distribusi Kantong</p>

                <h3 class="text-2xl font-bold text-teal-700">
                    121
                </h3>

                <p class="text-sm text-gray-500">Kantong</p>
            </div>

        </div>

        <!-- Card 3 -->
        <div class="w-52 bg-white border border-gray-200 shadow rounded-2xl p-4 flex items-center gap-4">

            <div class="w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-2xl">
                🏥
            </div>

            <div>
                <p class="text-sm text-gray-500">Poli Tujuan</p>

                <h3 class="text-2xl font-bold text-teal-700">
                    7
                </h3>

                <p class="text-sm text-gray-500">Poli</p>
            </div>

        </div>

    </div>

    <!-- Search -->
    <div>

        <input type="text"
            placeholder="Cari Data"
            class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-64 focus:ring-2 focus:ring-teal-500 outline-none">

    </div>

</div>
        <!-- Table -->
        <div class="overflow-x-auto">

            <table class="w-full overflow-hidden rounded-2xl">

                <!-- Head -->
                <thead class="bg-teal-600 text-white">

                    <tr class="text-sm">

                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Tanggal Distribusi</th>
                        <th class="px-4 py-3">Nama Dokter</th>
                        <th class="px-4 py-3">Golongan Darah</th>
                        <th class="px-4 py-3">Rhesus</th>
                        <th class="px-4 py-3">Jenis Komponen</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Poli Tujuan</th>
                        <th class="px-4 py-3">Status</th>

                    </tr>

                </thead>

                <!-- Body -->
                <tbody class="divide-y divide-gray-200 bg-white text-center">

                    @for ($i = 1; $i <= 8; $i++)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-4 py-3">{{ $i }}</td>
                            <td class="px-4 py-3">01/01/2026</td>
                            <td class="px-4 py-3">dr. Tirta</td>
                            <td class="px-4 py-3 font-semibold">A</td>
                            <td class="px-4 py-3">Negatif (-)</td>
                            <td class="px-4 py-3">Whole Blood</td>
                            <td class="px-4 py-3">3</td>
                            <td class="px-4 py-3">Bedah</td>

                            <td class="px-4 py-3">

                            @php
                                $statusList = ['Menunggu', 'Diproses', 'Selesai', 'Ditolak'];
                                $status = $statusList[array_rand($statusList)];
                            @endphp

                            @if ($status == 'Diproses')

                                <span
                                    class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">

                                    Diproses

                                </span>

                            @elseif ($status == 'Selesai')

                                <span
                                    class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">

                                    Selesai

                                </span>

                            @elseif ($status == 'Ditolak')

                                <span
                                    class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">

                                    Ditolak

                                </span>

                            @else

                                <span
                                    class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">

                                    Menunggu

                                </span>

                            @endif

                             </td>

                        </tr>

                    @endfor

                </tbody>

            </table>

        </div>

        <!-- Pagination -->
        <div class="flex justify-end items-center gap-2 mt-5">

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

</div>

@endsection