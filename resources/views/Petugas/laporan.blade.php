@extends('layouts.app')

@section('content')

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 14px;
        font-size: 15px;
    }

    table th {
        background: #16b5aa;
        color: white;
        font-size: 15px;
        font-weight: 600;
    }

    @media print {
        aside,
        nav,
        header,
        footer,
        .sidebar,
        .hide-print,
        button {
            display: none !important;
        }

        body * {
            visibility: hidden;
        }

        .print-area,
        .print-area * {
            visibility: visible;
        }

        .print-area {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background: white;
            zoom: 75%;
        }

        .print-area h1 {
            font-size: 24px !important;
        }

        .print-area h2 {
            font-size: 18px !important;
        }

        .print-area p,
        .print-area td,
        .print-area th {
            font-size: 11px !important;
        }

        .print-area img {
            width: 50px !important;
            height: 50px !important;
        }

        .print-area table th,
        .print-area table td {
            padding: 8px !important;
        }
    }
</style>

<div class="p-6">

    {{-- FILTER --}}
    <div class="hide-print mb-5 rounded-3xl bg-white p-5 shadow">

        <h1 class="text-3xl font-bold text-teal-700">
            Cetak Laporan
        </h1>

        <p class="text-gray-500">
            Pilih periode laporan
        </p>

        <form method="GET" action="{{ route('laporan') }}">

            <div class="mt-5 grid grid-cols-4 gap-4">

                <input
                    type="date"
                    name="tanggal_awal"
                    value="{{ request('tanggal_awal') }}"
                    class="rounded border p-2"
                >

                <input
                    type="date"
                    name="tanggal_akhir"
                    value="{{ request('tanggal_akhir') }}"
                    class="rounded border p-2"
                >

                <select name="golongan" class="rounded border p-2">
                    <option value="">Semua Golongan</option>
                    <option value="A" {{ request('golongan') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ request('golongan') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ request('golongan') == 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ request('golongan') == 'O' ? 'selected' : '' }}>O</option>
                </select>

                <select name="jenis_komponen" class="rounded border p-2">
                    <option value="">Semua jenis_komponen</option>
                    <option value="PRC" {{ request('jenis_komponen') == 'PRC' ? 'selected' : '' }}>PRC</option>
                    <option value="Whole Blood" {{ request('jenis_komponen') == 'Whole Blood' ? 'selected' : '' }}>Whole Blood</option>
                    <option value="TC" {{ request('jenis_komponen') == 'TC' ? 'selected' : '' }}>TC</option>
                    <option value="FFP" {{ request('jenis_komponen') == 'FFP' ? 'selected' : '' }}>FFP</option>
                </select>

            </div>

            <div class="mt-5 flex justify-end gap-3">

                <button
                    type="submit"
                    class="rounded-xl bg-teal-600 px-5 py-2 font-bold text-white">
                    Tampilkan
                </button>

                <button
                    type="button"
                    onclick="window.print()"
                    class="rounded-xl bg-teal-700 px-5 py-2 font-bold text-white">
                    Cetak
                </button>

            </div>

        </form>

    </div>

    {{-- LAPORAN --}}
    <div class="print-area rounded-[35px] border bg-white p-8 shadow">

        <h2 class="hide-print mb-6 text-2xl font-bold text-teal-700">
            Preview Laporan
        </h2>

        {{-- HEADER LAPORAN --}}
        <div class="grid grid-cols-3 border-b pb-6">

            <div class="flex gap-4">

                <img
                    src="{{ asset('logo.png') }}"
                    style="width:70px; height:70px; object-fit:contain;"
                >

                <div>
                    <h2 class="text-[22px] font-bold text-teal-700">
                        UNIT BANK DARAH
                    </h2>

                    <p class="text-[16px] font-bold">
                        RSUD Budi Rahayu
                    </p>

                    <p class="text-[14px]">Jl.Regu Tulip no 666</p>
                    <p class="text-[14px]">Kabupaten Jember</p>
                    <p class="text-[14px]">Telp.0211234567</p>
                </div>

            </div>

            <div class="text-center">

                <h1 class="text-[34px] font-bold leading-tight">
                    LAPORAN UNIT
                    <br>
                    BANK DARAH
                </h1>

                <p class="mt-3 text-[15px]">
                    Periode :
                    {{ request('tanggal_awal') ?? '-' }}
                    —
                    {{ request('tanggal_akhir') ?? '-' }}
                </p>

            </div>

            <div class="text-right text-[14px]">
                Tanggal Cetak:
                {{ now()->format('d/m/Y') }}

                <br><br>

                Waktu:
                {{ now()->format('H:i') }}
            </div>

        </div>

        {{-- TABEL DARAH MASUK --}}
        <div class="mt-10">

            <h2 class="mb-5 text-[28px] font-bold text-teal-700">
                1. Rincian Kantung Darah Masuk
            </h2>

            <table class="text-center">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Golongan</th>
                        <th>Rhesus</th>
                        <th>Jenis jenis_komponen</th>
                        <th>Asal Darah</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($darahMasuk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td>{{ $item->rhesus }}</td>
                            <td>{{ $item->jenis_komponen }}</td>
                            <td>{{ $item->asal_darah ?? '-' }}</td>
                            <td>1</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Tidak ada data darah masuk</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

        {{-- TABEL DARAH KELUAR --}}
        <div class="mt-10">

            <h2 class="mb-5 text-[28px] font-bold text-teal-700">
                2. Rincian Kantung Darah Keluar
            </h2>

            <table class="text-center">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Golongan</th>
                        <th>Rhesus</th>
                        <th>Jenis jenis_komponen</th>
                        <th>Poli</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($darahKeluar as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td>{{ $item->rhesus }}</td>
                            <td>{{ $item->jenis_komponen }}</td>
                            <td>{{ $item->poli ?? '-' }}</td>
                            <td>{{ $item->jumlah }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Tidak ada data darah keluar</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

        <div class="hide-print mt-8 flex justify-end">
            <button
                onclick="window.print()"
                class="rounded-xl border bg-gray-100 px-6 py-3">
                Cetak
            </button>
        </div>

    </div>

</div>

@endsection