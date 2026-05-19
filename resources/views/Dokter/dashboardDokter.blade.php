@extends('layouts.app')

@section('content')

<div class="p-6 space-y-6">

    {{-- HEADER --}}
    <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="/logo.png" class="w-10">
            <h2 class="text-lg font-bold text-gray-800">dr. Bayu Bimasena</h2>
        </div>

        <div class="flex items-center gap-2 text-sm text-gray-500 font-semibold">
            <svg class="w-5 h-5 text-[#075b55]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v3h20v-3c0-3.33-6.67-5-10-5z"/>
            </svg>
            <span>Halo Dokter</span>
        </div>
    </div>

    {{-- STATUS --}}
    <div class="bg-white p-5 rounded-xl shadow">
        <h3 class="font-bold text-gray-700 mb-4">Status Permintaan Terakhir</h3>

        <div class="grid grid-cols-3 gap-4 text-center">
            <div class="bg-yellow-100 rounded-lg py-3">
                <p class="text-lg font-bold text-yellow-600">{{ $menunggu }}</p>
                <p class="text-sm text-yellow-700">Menunggu</p>
            </div>

            <div class="bg-green-100 rounded-lg py-3">
                <p class="text-lg font-bold text-green-600">{{ $diterima }}</p>
                <p class="text-sm text-green-700">Diterima</p>
            </div>

            <div class="bg-red-100 rounded-lg py-3">
                <p class="text-lg font-bold text-red-600">{{ $ditolak }}</p>
                <p class="text-sm text-red-700">Ditolak</p>
            </div>
        </div>
    </div>

    {{-- KONTEN UTAMA --}}
    <div class="bg-white p-6 rounded-xl shadow space-y-6">

        {{-- PERMINTAAN DARAH --}}
        <div class="bg-gradient-to-br from-teal-600 to-teal-500 p-6 rounded-xl shadow text-white">
            <div>
                <h2 class="text-xl font-bold mb-2 flex items-center gap-3 text-white">
                    <span class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C12 2 6 9.3 6 14.2C6 18.1 8.7 21 12 21C15.3 21 18 18.1 18 14.2C18 9.3 12 2 12 2Z"/>
                        </svg>
                    </span>

                    <span>Permintaan Darah</span>
                </h2>

                <p class="text-sm text-white/90">
                    Ajukan permintaan darah untuk pasien
                </p>
            </div>

            <a href="{{ route('permintaanDokter') }}"
               class="mt-6 block bg-white text-teal-700 px-5 py-3 rounded-lg font-bold shadow text-center hover:bg-gray-100 transition">
                + Ajukan Permintaan
            </a>
        </div>

        {{-- STOK DARAH --}}
<div class="bg-white p-6 rounded-2xl shadow-md">

    <div class="flex items-center gap-3 mb-6">

        <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
            <span class="text-red-600 text-lg">🩸</span>
        </div>

        <h3 class="font-bold text-2xl text-[#0F5B57]">
            Stok Darah
        </h3>

    </div>

    <div class="grid grid-cols-2 gap-5">

        @foreach($stok as $gol => $jumlah)

        <div class="
            bg-[#F5FBFA]
            border-2
            border-[#D7ECE9]
            rounded-2xl
            px-5
            py-5
            flex
            justify-between
            items-center
            hover:shadow-md
            transition
        ">

            <div class="flex items-center gap-4">

                <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                    <span class="text-red-600">🩸</span>
                </div>

                <span class="font-bold text-[#154B4B] text-lg">
                    Gol. {{ $gol }}
                </span>

            </div>

            <div class="
                px-4 py-2 rounded-xl font-bold text-lg
                {{ $jumlah <= 3
                    ? 'bg-red-100 text-red-600'
                    : 'bg-teal-100 text-teal-700'
                }}
            ">
                {{ $jumlah }}
            </div>

        </div>

        @endforeach

    </div>

</div>
        

    </div>

</div>

@endsection