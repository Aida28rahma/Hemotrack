@extends('layouts.app')

@section('content')

<div class="p-6">

    <!-- Header -->
    <div class="mb-6">

        <h1 class="text-3xl font-bold text-gray-800">
            Cetak Laporan
        </h1>

        <p class="text-sm text-teal-700 mt-1">
            Pilih periode dan kriteria laporan yang ingin dicetak
        </p>

    </div>

    <!-- Filter -->
    <div class="bg-white rounded-3xl shadow-md border border-gray-200 p-5 mb-6">

        <h2 class="text-2xl font-bold text-teal-700 mb-5">
            Filter Laporan
        </h2>

        <!-- Form Filter -->
        <div class="grid grid-cols-7 gap-4 mb-6">

            <!-- Tanggal Awal -->
            <div>
                <label class="text-sm text-gray-600 block mb-1">
                    Tanggal Awal
                </label>

                <input type="date"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">
            </div>

            <!-- Tanggal Akhir -->
            <div>
                <label class="text-sm text-gray-600 block mb-1">
                    Tanggal Akhir
                </label>

                <input type="date"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">
            </div>

            <!-- Golongan Darah -->
            <div>
                <label class="text-sm text-gray-600 block mb-1">
                    Golongan Darah
                </label>

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
                <label class="text-sm text-gray-600 block mb-1">
                    Komponen Darah
                </label>

                <select
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">

                    <option>PRC</option>
                    <option>Whole Blood</option>
                    <option>Trombosit</option>

                </select>
            </div>

            <!-- Rhesus -->
            <div>
                <label class="text-sm text-gray-600 block mb-1">
                    Rhesus
                </label>

                <select
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">

                    <option>Negatif (-)</option>
                    <option>Positif (+)</option>

                </select>
            </div>

            <!-- Asal Darah -->
            <div>
                <label class="text-sm text-gray-600 block mb-1">
                    Asal Darah
                </label>

                <select
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">

                    <option>PMI</option>
                    <option>Donor Internal</option>

                </select>
            </div>

            <!-- Poli -->
            <div>
                <label class="text-sm text-gray-600 block mb-1">
                    Poli
                </label>

                <select
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-teal-500 outline-none">

                    <option>Bedah</option>
                    <option>IGD</option>
                    <option>Obgyn</option>

                </select>
            </div>

        </div>

        <!-- Button -->
        <div class="flex justify-end gap-3">

            <button
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2 rounded-xl transition">

                ↺ Reset

            </button>

            <button
                class="bg-teal-500 hover:bg-teal-600 text-white px-5 py-2 rounded-xl transition">

                🔍 Tampilkan

            </button>

        </div>

    </div>

    <!-- Preview -->
    <div class="bg-white rounded-3xl shadow-md border border-gray-200 p-6">

        <h2 class="text-2xl font-bold text-teal-700 mb-6">
            Preview Laporan
        </h2>

        <!-- Kop Surat -->
        <div class="flex justify-between items-start border-b pb-5 mb-5">

            <!-- Kiri -->
            <div class="flex gap-4">

                <!-- Logo -->
                <div class="w-20 h-20 bg-gray-100 rounded-xl flex items-center justify-center text-3xl">
                    🩸
                </div>

                <!-- Identitas -->
                <div>

                    <h3 class="font-bold text-teal-700">
                        UNIT BANK DARAH
                    </h3>

                    <p class="font-semibold text-gray-700">
                        RSUD KELOMPOK 4 KKPMT
                    </p>

                    <p class="text-sm text-gray-600">
                        Jl. Regu Tulip no 666, Kabupaten Jember
                    </p>

                    <p class="text-sm text-gray-600">
                        Telp. (021) 1234567
                    </p>

                </div>

            </div>

            <!-- Tengah -->
            <div class="text-center">

                <h1 class="text-3xl font-bold text-gray-800">
                    LAPORAN UNIT BANK DARAH
                </h1>

                <p class="text-gray-600 mt-2">
                    Periode : 1 Januari 2026 s/d 31 Januari 2026
                </p>

            </div>

            <!-- Kanan -->
            <div class="text-sm text-gray-600 text-right">

                <p>
                    Tanggal Cetak : 20/02/2026
                </p>

                <p>
                    Waktu Cetak : 10:30
                </p>

            </div>

        </div>

        <!-- Tabel Masuk -->
        <div class="mb-8">

            <h3 class="text-xl font-bold text-teal-700 mb-4">
                1. Rincian Kantung Darah Masuk
            </h3>

            <div class="overflow-x-auto">

                <table class="w-full text-center border border-gray-200">

                    <thead class="bg-teal-500 text-white">

                        <tr>

                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Golongan</th>
                            <th class="px-4 py-3">Rhesus</th>
                            <th class="px-4 py-3">Jenis Komponen</th>
                            <th class="px-4 py-3">Asal Darah</th>
                            <th class="px-4 py-3">Jumlah</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @foreach ([1,2,3,4] as $i)

                        <tr>

                            <td class="px-4 py-3">{{ $i }}</td>
                            <td class="px-4 py-3">A</td>
                            <td class="px-4 py-3">Negatif (-)</td>
                            <td class="px-4 py-3">PRC</td>
                            <td class="px-4 py-3">PMI</td>
                            <td class="px-4 py-3 font-bold">20</td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Tabel Keluar -->
        <div>

            <h3 class="text-xl font-bold text-teal-700 mb-4">
                2. Rincian Kantung Darah Keluar
            </h3>

            <div class="overflow-x-auto">

                <table class="w-full text-center border border-gray-200">

                    <thead class="bg-teal-500 text-white">

                        <tr>

                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Golongan</th>
                            <th class="px-4 py-3">Rhesus</th>
                            <th class="px-4 py-3">Jenis Komponen</th>
                            <th class="px-4 py-3">Poli Tujuan</th>
                            <th class="px-4 py-3">Jumlah</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @foreach ([1,2,3,4] as $i)

                        <tr>

                            <td class="px-4 py-3">{{ $i }}</td>
                            <td class="px-4 py-3">A</td>
                            <td class="px-4 py-3">Negatif (-)</td>
                            <td class="px-4 py-3">PRC</td>
                            <td class="px-4 py-3">Bedah</td>
                            <td class="px-4 py-3 font-bold">13</td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Button Print -->
        <div class="flex justify-end mt-8">

            <button
                onclick="window.print()"
                class="bg-gray-100 hover:bg-gray-200 border border-gray-300 px-6 py-3 rounded-xl shadow flex items-center gap-2 transition">

                🖨 Cetak

            </button>

        </div>

    </div>

</div>

@endsection