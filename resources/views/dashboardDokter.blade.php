@extends('layouts.app')

@section('content')

<div class="p-6 space-y-6">

    <!-- HEADER -->
    <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center">
        <div class="flex items-center gap-3">
            <img src="/logo.png" class="w-10">
            <h2 class="text-lg font-semibold text-gray-800">dr. Bayu Bimasena</h2>
        </div>
        <span class="text-sm text-gray-500">👋 Halo Dokter</span>
    </div>

    <!-- STATUS -->
    <div class="bg-white p-5 rounded-xl shadow">
        <h3 class="font-semibold text-gray-700 mb-4">Status Permintaan Terakhir</h3>

        <div class="grid grid-cols-3 gap-4 text-center">

            <div class="bg-yellow-100 rounded-lg py-3">
                <p class="text-lg font-bold text-yellow-600">1</p>
                <p class="text-sm text-yellow-700">Diproses</p>
            </div>

            <div class="bg-green-100 rounded-lg py-3">
                <p class="text-lg font-bold text-green-600">2</p>
                <p class="text-sm text-green-700">Diterima</p>
            </div>

            <div class="bg-red-100 rounded-lg py-3">
                <p class="text-lg font-bold text-red-600">1</p>
                <p class="text-sm text-red-700">Ditolak</p>
            </div>

        </div>
    </div>

    <!-- GRID -->
    <div class="bg-white p-6 rounded-xl shadow">

        <!-- PERMINTAAN -->
        <div class="bg-gradient-to-br from-teal-600 to-teal-500 p-6 rounded-xl shadow text-teal flex flex-col justify-between">

            <div>
                <h2 class="text-lg font-bold mb-2 flex items-center gap-2 text-teal">
                    🩸 Permintaan Darah
                </h2>

                <p class="text-sm text-teal/90">
                    Ajukan permintaan darah untuk pasien
                </p>
            </div>

           <a href="{{ route('permintaanDokter') }}"
   class="mt-6 bg-white text-teal-700 px-5 py-2 rounded-lg font-semibold shadow text-center">
    + Ajukan Permintaan
</a>

        </div>

        <!-- STOK DARAH (FIXED) -->
        <div class="bg-white p-6 rounded-xl shadow">

            <h2 class="text-lg font-bold text-gray-700 mb-4 flex items-center gap-2">
                🩸 Stok Darah
            </h2>

            <div class="grid grid-cols-2 gap-4">

                @foreach([
                    ['A', 20],
                    ['B', 15],
                    ['AB', 10],
                    ['O', 3],
                ] as $item)

                <div class="border rounded-xl p-4 flex justify-between items-center shadow-sm hover:shadow transition">

                    <div class="flex items-center gap-2">
                        <span class="text-red-500 text-lg">🩸</span>
                        <span class="font-semibold text-gray-700">Gol. {{ $item[0] }}</span>
                    </div>

                    <span class="text-lg font-bold 
                        {{ $item[1] < 5 ? 'text-red-500' : 'text-gray-800' }}">
                        {{ $item[1] }}
                    </span>

                </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection