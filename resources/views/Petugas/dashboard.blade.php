@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 p-5">

    <div class="w-full rounded-[25px] bg-[#f4f4f4] p-5 shadow-[0_8px_25px_rgba(0,0,0,0.18)]">

        {{-- NOTIFIKASI STOK --}}
        <div class="mb-5 flex items-center justify-between rounded-xl bg-white px-5 py-3 shadow-[0_4px_12px_rgba(0,0,0,0.18)]">

            <div class="flex items-center gap-2 font-bold">
                <svg class="h-5 w-5 text-[#0f5c5c]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2a2 2 0 01-.6 1.4L4 17h5"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a3 3 0 006 0"/>
                </svg>

                <span>Notifikasi Stok</span>
            </div>

            <span class="font-semibold text-red-500">
                *Stok O hampir habis
            </span>

        </div>

        {{-- CARD RINGKASAN --}}
        <div class="mb-5 grid grid-cols-4 gap-4">

            @foreach([
                ['title' => 'Total Pendonor', 'value' => 80],
                ['title' => 'Distribusi Hari Ini', 'value' => 20],
                ['title' => 'Stok Darah', 'value' => 80],
                ['title' => 'Permintaan', 'value' => 10],
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

        {{-- GRAFIK DAN DATA --}}
        <div class="grid grid-cols-5 items-stretch gap-5">

            {{-- GRAFIK STOK DARAH --}}
            <div class="col-span-2 rounded-2xl bg-white p-5 shadow-[0_8px_20px_rgba(0,0,0,0.18)]">

                <h2 class="mb-8 text-2xl font-bold">
                    Grafik Stok Darah
                </h2>

                <div class="flex h-[420px] items-end justify-evenly">

                    <div class="h-[220px] w-12 rounded-sm bg-red-800"></div>
                    <div class="h-[330px] w-12 rounded-sm bg-red-800"></div>
                    <div class="h-[260px] w-12 rounded-sm bg-red-800"></div>
                    <div class="h-[150px] w-12 rounded-sm bg-red-800"></div>

                </div>

                <div class="mt-5 flex justify-evenly">
                    <span>A</span>
                    <span>B</span>
                    <span>AB</span>
                    <span>O</span>
                </div>

            </div>

            {{-- DISTRIBUSI DAN PERMINTAAN --}}
            <div class="col-span-3 flex flex-col gap-5">

                {{-- DISTRIBUSI --}}
                <div class="flex-1 rounded-2xl bg-white p-5 shadow-[0_8px_20px_rgba(0,0,0,0.18)]">

                    <h2 class="mb-5 text-2xl font-bold">
                        Distribusi
                    </h2>

                    <div class="space-y-4">

                        <div class="flex items-center justify-between border-b pb-4">
                            <p>dr. Fajri Alfahri - B+ - 3 Kantong</p>
                            <span class="font-bold text-green-500">Diterima</span>
                        </div>

                        <div class="flex items-center justify-between border-b pb-4">
                            <p>dr. Diska Fatiha - AB+ - 1 Kantong</p>
                            <span class="font-bold text-red-500">Ditolak</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <p>dr. Rizky Saputra - O+ - 2 Kantong</p>
                            <span class="font-bold text-yellow-500">Diproses</span>
                        </div>

                    </div>

                </div>

                {{-- PERMINTAAN --}}
                <div class="flex-1 rounded-2xl bg-white p-5 shadow-[0_8px_20px_rgba(0,0,0,0.18)]">

                    <h2 class="mb-5 text-2xl font-bold">
                        Permintaan
                    </h2>

                    <div class="space-y-4">

                        <div class="flex items-center justify-between border-b pb-4">
                            <p>dr. Bayu Bimasena - A+ - 2 Kantong</p>
                            <span class="font-bold text-yellow-500">Diproses</span>
                        </div>

                        <div class="flex items-center justify-between border-b pb-4">
                            <p>dr. Budi Utomo - O− - 1 Kantong</p>
                            <span class="font-bold text-green-500">Diterima</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <p>dr. Andini Putri - AB+ - 4 Kantong</p>
                            <span class="font-bold text-red-500">Ditolak</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection