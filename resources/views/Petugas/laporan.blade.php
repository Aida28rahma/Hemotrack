@extends('layouts.app')

@section('content')

@php
    $rekapMasuk = $darahMasuk->groupBy(fn($item) =>
        $item->golongan . '|' . $item->rhesus . '|' . $item->jenis_komponen
    );

    $rekapKeluar = $darahKeluar->groupBy(fn($item) =>
        $item->golongan . '|' . $item->rhesus . '|' . $item->jenis_komponen
    );

    $totalMasuk = $darahMasuk->count();
    $totalKeluar = $darahKeluar->sum('jumlah');
    $stokTersedia = \App\Models\DataDarahPendonor::where('status', 'Sudah Teruji')->count();
@endphp

<style>
    table {
    width:100%;
    border-collapse: collapse;
    margin-top:12px;
}

table th,
table td{
    border:1px solid #d1d5db;
    padding:10px;
    font-size:13px;
}

table th{
    background:#0f766e;
    color:white !important;
    font-weight:600;
}

.rekap-table{
    width:100%;
    table-layout:fixed;
}

.rekap-table th:first-child,
.rekap-table td:first-child{
    width:70%;
}

.rekap-table th:last-child,
.rekap-table td:last-child{
    width:30%;
    text-align:center;
}

.kartu-ringkasan{
    border:1px solid #d1d5db;
    border-radius:16px;
    padding:16px;
    text-align:center;
}

.kartu-ringkasan h2{
    font-size:25px;
    font-weight:600;
}

@media print {
    @page {
        size: A4 portrait;
        margin: 12mm;
    }

    body * {
        visibility: hidden !important;
    }

    .print-area,
    .print-area * {
        visibility: visible !important;
    }

    .print-area {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 190mm !important;
        max-width: 190mm !important;
        margin: 0 auto !important;
        padding: 0 !important;
        border: none !important;
        box-shadow: none !important;
        background: white !important;
    }

    .hide-print {
        display: none !important;
    }

    .grid {
        display: grid !important;
    }

    .grid-cols-3 {
        grid-template-columns: 1fr 1fr 1fr !important;
    }

    .grid-cols-4 {
        grid-template-columns: repeat(4, 1fr) !important;
    }

    table th {
        background: #14b8a6 !important;
        color: white !important;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
}
</style>

<div class="mb-6 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">
    {{-- FILTER --}}
    <div class="hide-print mb-5 rounded-3xl bg-white p-5 shadow">

        <h1 class="text-3xl font-bold text-[#0f5c5c]">
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
                    <option value="">Semua Komponen</option>
                    <option value="Whole Blood" {{ request('jenis_komponen') == 'Whole Blood' ? 'selected' : '' }}>Whole Blood</option>
                    <option value="PRC" {{ request('jenis_komponen') == 'PRC' ? 'selected' : '' }}>PRC</option>
                    <option value="Trombosit" {{ request('jenis_komponen') == 'Trombosit' ? 'selected' : '' }}>Trombosit</option>
                    <option value="FFP" {{ request('jenis_komponen') == 'FFP' ? 'selected' : '' }}>FFP</option>
                    <option value="Kriopresipitasi" {{ request('jenis_komponen') == 'Kriopresipitasi' ? 'selected' : '' }}>Kriopresipitasi</option>
                </select>

            </div>

            <div class="mt-5 flex justify-end gap-3">

                <button type="submit"
                    class="rounded-xl bg-teal-700 px-5 py-2 font-semibold text-white hover:bg-[#0b4444]">
                    Tampilkan
                </button>

                <a href="{{ route('laporan') }}"
                   class="rounded-xl border bg-gray-100 px-5 py-2 font-semibold text-gray-700 hover:bg-gray-300">
                    Reset
                </a>
            </div>

        </form>

    </div>

    {{-- LAPORAN --}}
    <div class="print-area rounded-[35px] border bg-white p-8 shadow">

        {{-- HEADER LAPORAN --}}
        <div class="grid grid-cols-3 items-center border-b pb-5">

            <div class="flex items-center gap-4">

            <img
            src="{{ asset('logo.png') }}"
            class="h-[55px] w-[55px] object-contain"
            >

            <div>

            <h2 class="text-[14px] font-bold text-teal-700 leading-tight">

            UNIT BANK DARAH

            </h2>

            <p class="text-[14px] font-bold">

            RSUD Budi Rahayu

            </p>

            <p class="text-[12px] text-gray-600">

            Jl. Sudanco Supriyadi No.666

            </p>

            <p class="text-[12px] text-gray-600">

            Kabupaten Jember

            </p>

            <p class="text-[12px] text-gray-600">

            Telp.0211234567

            </p>

            </div>

        </div>



<div class="text-center">

<h1 class="print-title text-[22px] font-bold leading-snug">

LAPORAN
<br>
UNIT BANK DARAH

</h1>

<p class="print-subtitle mt-2 text-xs text-gray-600">

Periode :

{{ request('tanggal_awal') ?? '-' }}
-
{{ request('tanggal_akhir') ?? '-' }}

</p>

</div>



<div class="text-right text-[12px] text-gray-700">

<p>

Tanggal Cetak :

{{ now()->format('d/m/Y') }}

</p>

<br>

<p>

Waktu :

{{ now()->format('H:i') }}

</p>

</div>

</div>

        {{-- RINGKASAN --}}
        <div class="mt-8 grid grid-cols-4 gap-5">

            <div class="kartu-ringkasan">
                <p class="text-sm">Darah Masuk</p>
                <h2 class="text-[20px] font-bold text-teal-600">{{ $totalMasuk }}</h2>
                <p class="text-sm">Kantong</p>
            </div>

            <div class="kartu-ringkasan">
                <p class="text-sm">Darah Keluar</p>
                <h2 class="text-[20px] font-bold text-teal-600">{{ $totalKeluar }}</h2>
                <p class="text-sm">Kantong</p>
            </div>

            <div class="kartu-ringkasan">
                <p class="text-sm">Stok Tersedia</p>
                <h2 class="text-[20px] font-bold text-teal-600">{{ $stokTersedia }}</h2>
                <p class="text-sm">Kantong</p>
            </div>

           <div class="kartu-ringkasan">
                <p class="text-sm">Jumlah Distribusi</p>
                <h2 class="text-[20px] font-bold text-teal-600">{{ $darahKeluar->count() }}</h2>
                <p class="text-sm">Permintaan</p>
            </div>

        </div>
{{-- RINCIAN DARAH MASUK --}}
<div class="mt-10">

    <h2 class="mb-5 text-[20px] font-bold text-teal-600">
    1. Rincian Darah Masuk
    </h2>

    @php

    $asalMasuk = [
        'PMI' => $darahMasuk
            ->where('asal_darah','PMI')->count(),

        'Unit Bank Darah' => $darahMasuk
            ->where('asal_darah','Unit Bank Darah')->count(),
    ];

    $golMasuk = [
        'A' => $darahMasuk
            ->where('golongan','A')
            ->count(),

        'B' => $darahMasuk
            ->where('golongan','B')
            ->count(),

        'AB' => $darahMasuk
            ->where('golongan','AB')
            ->count(),

        'O' => $darahMasuk
            ->where('golongan','O')
            ->count(),
    ];

    $rhesusMasuk = [
        'Positif (+)' => $darahMasuk
            ->where('rhesus','+')
            ->count(),

        'Negatif (-)' => $darahMasuk
            ->where('rhesus','-')
            ->count(),
    ];

    $komponenMasuk = [
        'Whole Blood' => $darahMasuk
            ->where(
                'jenis_komponen',
                'Whole Blood'
            )
            ->count(),

        'PRC' => $darahMasuk
            ->where(
                'jenis_komponen',
                'PRC'
            )
            ->count(),

        'Trombosit' => $darahMasuk
            ->where(
                'jenis_komponen',
                'Trombosit'
            )
            ->count(),

        'FFP' => $darahMasuk
            ->where(
                'jenis_komponen',
                'FFP'
            )
            ->count(),

        'Kriopresipitasi' => $darahMasuk
            ->where(
                'jenis_komponen',
                'Kriopresipitasi'
            )
            ->count(),
    ];

    @endphp

    <h3 class="mt-5 mb-3 font-semibold">
    a. Berdasarkan Asal
    </h3>

    <table class="rekap-table">
        <tr>
        <th>Asal Darah</th>
        <th>Jumlah</th>
        </tr>

        @foreach($asalMasuk as $key=>$item)

        <tr>
        <td>{{ $key }}</td>
        <td>{{ $item }}</td>
        </tr>

    @endforeach

    </table>



    <h3 class="mt-5 mb-3 font-semibold">
    b. Berdasarkan Golongan
    </h3>

    <table class="rekap-table">

        <tr>
        <th>Golongan</th>
        <th>Jumlah</th>
        </tr>

        @foreach($golMasuk as $key=>$item)

        <tr>
        <td>{{ $key }}</td>
        <td>{{ $item }}</td>
        </tr>

        @endforeach

    </table>



    <h3 class="mt-5 mb-3 font-semibold">
    c. Berdasarkan Rhesus
    </h3>

    <table class="rekap-table">

        <tr>
        <th>Rhesus</th>
        <th>Jumlah</th>
        </tr>

        @foreach($rhesusMasuk as $key=>$item)

        <tr>
        <td>{{ $key }}</td>
        <td>{{ $item }}</td>
        </tr>

        @endforeach

    </table>



    <h3 class="mt-5 mb-3 font-semibold">
    d. Berdasarkan Komponen
    </h3>

    <table class="rekap-table">

        <tr>
        <th>Komponen</th>
        <th>Jumlah</th>
        </tr>

        @foreach($komponenMasuk as $key=>$item)

        <tr>
        <td>{{ $key }}</td>
        <td>{{ $item }}</td>
        </tr>

        @endforeach

    </table>

</div>



{{-- RINCIAN DARAH KELUAR --}}
<div class="mt-10">

    <h2 class="mb-5 text-[20px] font-bold text-teal-600">
    2. Rincian Darah Keluar
    </h2>

   @php

    $tujuanKeluar = [
    'Poli Bedah' =>$darahKeluar
    ->where('poli','Poli Bedah')->count(),

    'Poli Penyakit Dalam' =>$darahKeluar
    ->where('poli','Poli Penyakit Dalam')->count(),

    'Poli Anak' =>$darahKeluar
    ->where('poli','Poli Anak')->count(),

    'Poli Obgyn' =>$darahKeluar
    ->where('poli','Poli Obgyn')->count(),

    ];

    $golKeluar = [

    'A' =>$darahKeluar
    ->where('golongan','A')->sum('jumlah'),

    'B' =>$darahKeluar
    ->where('golongan','B')->sum('jumlah'),

    'AB' =>$darahKeluar
    ->where('golongan','AB')->sum('jumlah'),

    'O' =>$darahKeluar
    ->where('golongan','O')->sum('jumlah'),

    ];

    $rhesusKeluar = [

    'Positif (+)' =>$darahKeluar
    ->where('rhesus','+')->sum('jumlah'),

    'Negatif (-)' =>$darahKeluar
    ->where('rhesus','-')->sum('jumlah'),

    ];

    $komponenKeluar = [

    'Whole Blood' =>$darahKeluar
    ->where('jenis_komponen','Whole Blood')->sum('jumlah'),

    'PRC' =>$darahKeluar
    ->where('jenis_komponen','PRC')->sum('jumlah'),

    'Trombosit' =>$darahKeluar
    ->where('jenis_komponen','Trombosit')->sum('jumlah'),

    'FFP' =>$darahKeluar
    ->where('jenis_komponen','FFP')->sum('jumlah'),

    'Kriopresipitasi' =>$darahKeluar
    ->where('jenis_komponen','Kriopresipitasi')->sum('jumlah'),

    ];

    @endphp

    <h3 class="mt-5 mb-3 font-semibold">
    a. Berdasarkan Tujuan
    </h3>

    <table class="rekap-table">
        <tr>
            <th>Poli Tujuan</th>
            <th>Jumlah</th>
        </tr>

        @foreach($tujuanKeluar as $key=>$item)

        <tr>
            <td>
            {{ $key }}
            </td>
            <td>
            {{ $item }}
            </td>
        </tr>
        @endforeach
    </table>

    <h3 class="mt-8 mb-3 font-semibold">
    b. Berdasarkan Golongan
    </h3>

    <table class="rekap-table">
        <tr>
            <th>Golongan</th>
            <th>Jumlah</th>
        </tr>

        @foreach($golKeluar as $key=>$item)
        <tr>
            <td>
            {{ $key }}
            </td>
            <td>
            {{ $item }}
            </td>
        </tr>
        @endforeach
    </table>

    <h3 class="mt-8 mb-3 font-semibold">
    c. Berdasarkan Rhesus
    </h3>

    <table class="rekap-table">
        <tr>
            <th>Rhesus</th>
            <th>Jumlah</th>
        </tr>
        @foreach($rhesusKeluar as $key=>$item)
        <tr>
            <td>
            {{ $key }}
            </td>
            <td>
            {{ $item }}
            </td>
        </tr>
    @endforeach
    </table>



    <h3 class="mt-8 mb-3 font-semibold">
    d. Berdasarkan Komponen
    </h3>

    <table class="rekap-table">
        <tr>
            <th>Komponen</th>
            <th>Jumlah</th>
        </tr>

        @foreach($komponenKeluar as $key=>$item)
        <tr>
            <td>
            {{ $key }}
            </td>
            <td>
            {{ $item }}
            </td>
        </tr>
        @endforeach
    </table>

</div>
        {{-- RINGKASAN AKHIR --}}
        <div class="mt-10 border-t pt-8">

            <h2 class="mb-5 text-[20px] font-bold text-teal-600">
                3. Ringkasan Rekapitulasi
            </h2>

            <table>
                <tr>
                    <th>Total Darah Masuk</th>
                    <td>{{ $totalMasuk }} kantong</td>
                </tr>

                <tr>
                    <th>Total Darah Keluar</th>
                    <td>{{ $totalKeluar }} kantong</td>
                </tr>

                <tr>
                    <th>Stok Tersedia</th>
                    <td>{{ $stokTersedia }} kantong</td>
                </tr>
            </table>

        </div>

        {{-- VALIDASI LAPORAN --}}
<div class="mt-16 flex justify-end">

    <div class="w-[250px] text-center">

        <p>
            Jember,
            {{ now()->format('d F Y') }}
        </p>

        <p class="mt-2">
            Petugas Unit Bank Darah
        </p>

        <div class="h-24"></div>

        <p class="border-t pt-2 text-[14px] font-semibold">

            (
            {{ auth()->user()->name }}
            )

        </p>

        <p class="text-xs text-gray-500">
            Petugas Verifikasi
        </p>

    </div>

</div>


{{-- TOMBOL CETAK --}}
<div class="hide-print mt-8 flex justify-end">

    <button
        onclick="window.print()"
        class="rounded-xl border bg-gray-100 px-6 py-3 hover:bg-gray-200"
    >
        Cetak
    </button>

</div>
    </div>

</div>
</div>

@endsection