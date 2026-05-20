@extends('layouts.app')

@section('content')

<div class="w-full px-8 py-6">

    {{-- STATUS PERMINTAAN --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-5 mb-6 flex items-center justify-between">

        <div class="flex items-center gap-3">
            <svg class="w-6 h-6 text-[#0f5c5c]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2a7 7 0 00-7 7v4.5L3 16v1h18v-1l-2-2.5V9a7 7 0 00-7-7zm0 20a3 3 0 003-3H9a3 3 0 003 3z"/>
            </svg>

            <h2 class="text-xl font-bold text-[#0f5c5c]">
                Status Permintaan
            </h2>
        </div>

        <a href="{{ route('statusDokter') }}"
           class="bg-[#0f5c5c] text-white px-6 py-2 rounded-md font-bold hover:bg-[#0b4444] transition">
            Lihat
        </a>

    </div>


    {{-- PERMINTAAN DARAH --}}
    <div class="bg-gradient-to-r from-[#0f8f86] to-[#13b7aa] rounded-xl shadow-md px-5 py-4 mb-5 flex items-center justify-between">

        <div class="flex items-center gap-3">
            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
            </svg>

            <h2 class="text-2xl font-bold text-white">
                Permintaan Darah
            </h2>
        </div>

        <a href="{{ route('permintaanDokter') }}"
           class="bg-white text-[#0f5c5c] px-6 py-2 rounded-lg font-bold text-sm shadow hover:bg-gray-100 transition">
            Isi Form Permintaan Darah
        </a>

    </div>


    {{-- STOK DARAH --}}
    <h2 class="text-xl font-bold text-[#0f5c5c] mb-3">
        Stok Darah
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">

        @foreach([
    ['title' => 'Total Pendonor', 'value' => \App\Models\Pendonor::count()],
    ['title' => 'Distribusi Hari Ini', 'value' => \App\Models\PermintaanDokter::where('status','disetujui')->whereDate('updated_at', today())->sum('jumlah')],
    ['title' => 'Stok Darah', 'value' => \App\Models\DataDarahPendonor::count()],
    ['title' => 'Permintaan', 'value' => \App\Models\PermintaanDokter::count()],
] as $card)

            <div class="bg-white rounded-2xl shadow-md px-5 py-4 flex items-center justify-between">

                <div>
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100 mb-3">
                        <svg class="h-5 w-5 text-red-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2S6 9.1 6 14a6 6 0 0012 0c0-4.9-6-12-6-12z"/>
                        </svg>
                    </div>

                    <p class="text-[#8b1118] font-bold text-sm">
                        {{ $card['title'] }}
                    </p>
                </div>

                <span class="bg-[#0f5c5c] text-white font-bold px-3 py-2 rounded-md">
                    {{ $card['value'] }}
                </span>

            </div>

        @endforeach

    </div>


    {{-- DETAIL STOK DARAH --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-6">

        <h2 class="text-xl font-bold text-[#0f5c5c] mb-4">
            Detail Stok Darah
        </h2>

        {{-- FILTER --}}
        <div class="flex flex-wrap gap-3 mb-5">

            <select class="w-48 border border-gray-300 rounded-lg px-3 py-2 text-sm">
                <option>Golongan Darah</option>
                <option>A</option>
                <option>B</option>
                <option>AB</option>
                <option>O</option>
            </select>

            <select class="w-52 border border-gray-300 rounded-lg px-3 py-2 text-sm">
                <option>Komponen Darah</option>
                <option>Whole Blood</option>
                <option>PRC</option>
                <option>Trombosit</option>
                <option>FFP</option>
            </select>

            <select class="w-48 border border-gray-300 rounded-lg px-3 py-2 text-sm">
                <option>Rhesus Darah</option>
                <option>Positif (+)</option>
                <option>Negatif (-)</option>
            </select>

        </div>


        {{-- TABEL --}}
        <div class="overflow-x-auto">

            <table class="w-full border-collapse text-center">

                <thead class="bg-[#19b5aa] text-white">
                    <tr>
                        <th class="border px-4 py-3">No</th>
                        <th class="border px-4 py-3">Golongan</th>
                        <th class="border px-4 py-3">Rhesus</th>
                        <th class="border px-4 py-3">Jenis Komponen</th>
                        <th class="border px-4 py-3">Tanggal Kadaluarsa</th>
                        <th class="border px-4 py-3">Asal Darah</th>
                        <th class="border px-4 py-3">Status</th>
                    </tr>
                </thead>

                <tbody>

@foreach(\App\Models\DataDarahPendonor::latest()->take(10)->get() as $item)

<tr>

    <td class="border px-4 py-3">
        {{ $loop->iteration }}
    </td>

    <td class="border px-4 py-3">
        {{ $item->golongan }}
    </td>

    <td class="border px-4 py-3">
        {{ $item->rhesus }}
    </td>

    <td class="border px-4 py-3">
        {{ $item->jenis_komponen }}
    </td>

    <td class="border px-4 py-3">
        {{ \Carbon\Carbon::parse($item->tanggal_kedaluwarsa)->format('d/m/Y') }}
    </td>

    <td class="border px-4 py-3">
        {{ $item->asal_darah }}
    </td>

    <td class="border px-4 py-3">

        <span class="
            px-3 py-1 rounded-full text-sm font-bold
            {{ $item->status == 'Sudah Teruji'
                ? 'bg-green-100 text-green-700'
                : 'bg-yellow-100 text-yellow-700'
            }}
        ">

            {{ $item->status }}

        </span>

    </td>

</tr>

@endforeach

</tbody>
            </table>

        </div>


        <div class="flex justify-end mt-5">
            <a href="{{ route('stok') }}"
               class="border border-gray-300 px-6 py-2 rounded-lg text-sm font-bold text-[#0f5c5c] hover:bg-gray-100 transition">
                Lihat Detail Stok
            </a>
        </div>

    </div>

</div>

@endsection