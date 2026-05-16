@extends('layouts.app')

@section('content')

<div class="w-full min-h-screen bg-[#eefaf8] px-10 py-8">

    {{-- TITLE --}}
    <h1 class="text-2xl font-bold text-[#0f5c5c] mb-5">
        Status Permintaan Darah
    </h1>

    {{-- FILTER BAR --}}
    <div class="bg-white rounded-2xl shadow-md px-5 py-3 mb-10 flex items-center justify-between gap-4">

        <div class="relative w-[420px]">

            <input type="text"
                   placeholder="Cari nomor RM atau nama pasien"
                   class="w-full h-10 border border-gray-300 rounded-xl pl-11 pr-4 text-sm outline-none">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-4 h-4 text-gray-400 absolute left-4 top-3"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="m21 21-4.35-4.35m1.85-5.15a7 7 0 1 1-14 0
                         7 7 0 0 1 14 0Z"/>
            </svg>

        </div>

        <div class="flex items-center gap-3">

            <select class="w-[220px] h-10 border border-gray-300 rounded-xl px-4 text-sm text-gray-500 outline-none">
                <option>Semua Status</option>
                <option>Menunggu</option>
                <option>Disetujui</option>
            </select>

            <button class="w-[110px] h-10 border border-gray-300 rounded-xl text-sm text-gray-500 hover:bg-gray-100 transition">
                Reset
            </button>

        </div>

    </div>

    {{-- CARDS --}}
    <div class="grid grid-cols-3 gap-x-12 gap-y-10">

        @foreach($requests as $item)

            <div class="bg-white rounded-xl shadow-md w-full min-h-[260px] px-7 py-6 relative">

                {{-- BADGE --}}
                <div class="absolute top-5 right-5 px-3 py-1 rounded-md text-xs font-bold
                    {{ strtolower($item->status) == 'Menunggu'
                        ? 'bg-orange-200 text-orange-700'
                        : 'bg-teal-200 text-teal-700'
                    }}">
                    {{ ucfirst($item->status) }}
                </div>

                <div class="mt-10 space-y-2 text-xs">

                    <div class="grid grid-cols-[110px_1fr] gap-2 items-center">
                        <div class="flex items-center gap-2 text-gray-500 font-semibold">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M4 4h12l4 4v12H4z"/>
                            </svg>
                            No RM
                        </div>
                        <div class="font-bold text-black text-right">{{ $item['no_rm'] }}</div>
                    </div>

                    <div class="grid grid-cols-[110px_1fr] gap-2 items-center">
                        <div class="flex items-center gap-2 text-gray-500 font-semibold">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                            </svg>
                            Nama Pasien
                        </div>
                        <div class="font-bold text-black text-right">{{ $item['nama'] }}</div>
                    </div>

                    <div class="grid grid-cols-[110px_1fr] gap-2 items-center">
                        <div class="flex items-center gap-2 text-gray-500 font-semibold">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M12 2S5 10 5 15a7 7 0 0014 0c0-5-7-13-7-13z"/>
                            </svg>
                            Gol. Darah
                        </div>
                        <div class="text-right">
                            <span class="bg-red-100 text-red-500 px-2 py-1 rounded-md font-bold">
                                {{ $item['golongan'] }}
                            </span>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="grid grid-cols-[110px_1fr] gap-2">
                        <span class="text-gray-500 font-semibold">Komponen</span>
                        <span class="font-bold text-black text-right">{{ $item['komponen'] }}</span>
                    </div>

                    <div class="grid grid-cols-[110px_1fr] gap-2">
                        <span class="text-gray-500 font-semibold">Rhesus</span>
                        <span class="font-bold text-black text-right">{{ $item['rhesus'] }}</span>
                    </div>

                    <div class="grid grid-cols-[110px_1fr] gap-2">
                        <span class="text-gray-500 font-semibold">Jumlah</span>
                        <span class="font-bold text-black text-right">{{ $item['jumlah'] }}</span>
                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection