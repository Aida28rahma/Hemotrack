@extends('layouts.app')

@section('content')

<div class="mb-6 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">

        {{-- NOTIFIKASI --}}
        <div class="bg-white rounded-3xl shadow-[0_6px_15px_rgba(0,0,0,0.2)] p-6 mt-6 mb-8">

            <h2 class="text-2xl font-bold text-[#0f5c5c] mb-5">
                Notifikasi
            </h2>
            @forelse($notif as $item)
                <div class="bg-yellow-50 border-l-4 border-yellow-400 px-4 py-3 mb-3 rounded">
                    {{ $item }}
                </div>
            @empty
                <div class="text-gray-400">
                    Tidak ada notifikasi
                </div>
            @endforelse
        </div>
        {{-- CARD RINGKASAN --}}
        <div class="mb-5 grid grid-cols-4 gap-4">
            @foreach([
                [
                    'title' => 'Total Pendonor',
                    'value' => $totalPendonor
                ],
                [
                    'title' => 'Distribusi Hari Ini',
                    'value' => $distribusiHariIni
                ],
                [
                    'title' => 'Stok Darah',
                    'value' => $totalStok
                ],
                [
                    'title' => 'Permintaan',
                    'value' => $totalPermintaan
                ],
            ] as $card)
                <div class="flex items-center justify-between rounded-2xl bg-white p-4 shadow-[0_6px_15px_rgba(0,0,0,0.2)]">
                    <div>
                        <div class="mb-2 flex h-8 w-8 items-center justify-center rounded-full bg-red-100">
                            <svg class="h-5 w-5 text-red-700" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2S6 9.1 6 14a6 6 0 0012 0c0-4.9-6-12-6-12z"/>
                            </svg>
                        </div>
                        <p class="text-sm font-bold text-red-800">
                            {{ $card['title'] }}
                        </p>
                    </div>
                    <div class="rounded bg-teal-800 px-3 py-1 font-bold text-white">
                        {{ $card['value'] }}
                    </div>
                </div>
            @endforeach
        </div>

                        {{-- BAGIAN TENGAH --}}
                <div class="grid grid-cols-2 gap-5 mt-6">

                  {{-- GRAFIK --}}
                    <div class="bg-white rounded-3xl shadow-[0_6px_15px_rgba(0,0,0,0.2)] p-6">
                        <h2 class="text-2xl font-bold text-[#0f5c5c] mb-5">
                            Grafik Stok Darah
                        </h2>
                        <div class="flex items-end justify-center gap-10 h-[420px]">
                            {{-- A --}}
                            <div class="flex flex-col items-center">
                                <div
                                    style="height: {{ max($grafik['A'] * 30, 20) }}px"
                                    class="w-14 bg-red-700 rounded-sm transition-all">
                                </div>
                                <span class="mt-2 text-sm font-bold">
                                    {{ $grafik['A'] }}
                                </span>
                                <span class="mt-2 text-2xl">
                                    A
                                </span>
                            </div>


                            {{-- B --}}
                            <div class="flex flex-col items-center">
                                <div
                                    style="height: {{ max($grafik['B'] * 30, 20) }}px"
                                    class="w-14 bg-red-700 rounded-sm transition-all">

                                </div>
                                <span class="mt-2 text-sm font-bold">
                                    {{ $grafik['B'] }}
                                </span>

                                <span class="mt-2 text-2xl">
                                    B
                                </span>
                            </div>

                            {{-- AB --}}
                            <div class="flex flex-col items-center">
                                <div
                                    style="height: {{ max($grafik['AB'] * 30, 20) }}px"
                                    class="w-14 bg-red-700 rounded-sm transition-all">
                                </div>
                                <span class="mt-2 text-sm font-bold">
                                    {{ $grafik['AB'] }}
                                </span>
                                <span class="mt-2 text-2xl">
                                    AB
                                </span>
                            </div>

                            {{-- O --}}
                            <div class="flex flex-col items-center">
                                <div
                                    style="height: {{ max($grafik['O'] * 30, 20) }}px"
                                    class="w-14 bg-red-700 rounded-sm transition-all">
                                </div>
                                <span class="mt-2 text-sm font-bold">
                                    {{ $grafik['O'] }}
                                </span>
                                <span class="mt-2 text-2xl">
                                    O
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- PERMINTAAN TERBARU --}}
                <div class="bg-white rounded-3xl shadow-[0_6px_15px_rgba(0,0,0,0.2)] p-6">
                    <h2 class="text-2xl font-bold text-[#0f5c5c] mb-5">
                        Permintaan Terbaru
                    </h2>

                    @forelse($permintaanTerbaru as $item)
                    <div class="flex justify-between items-center py-5 border-b">
                        <div>
                            <p class="font-semibold text-lg">
                                {{ $item->nama }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ $item->golongan }}
                                {{ $item->rhesus }}
                                •
                                {{ $item->jumlah }}
                                Kantong
                            </p>
                        </div>
                        <span class="
                            px-3 py-1 rounded-full text-xs font-bold
                            @if($item->status=='disetujui')
                                bg-green-100 text-green-700
                            @elseif($item->status=='ditolak')
                                bg-red-100 text-red-700
                            @else
                                bg-yellow-100 text-yellow-700
                            @endif
                        ">
                            {{ ucfirst($item->status) }}

                        </span>
                    </div>
                    @empty
                        <div class="h-[250px] flex items-center justify-center text-gray-400">
                            Belum ada permintaan darah
                        </div>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection