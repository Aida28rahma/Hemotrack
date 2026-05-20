@extends('layouts.app')

@section('content')

<main class="flex-1 p-6">

    <h1 class="mb-6 text-2xl font-bold text-gray-800">
        Ringkasan Stok Darah
    </h1>

    {{-- RINGKASAN STOK --}}
    <div class="mb-8 grid grid-cols-1 gap-5 md:grid-cols-2 xl:grid-cols-4">

        @foreach (['A', 'B', 'AB', 'O'] as $gol)

            @php
                $plus = $ringkasan[$gol]->plus ?? 0;
                $minus = $ringkasan[$gol]->minus ?? 0;
                $total = $plus + $minus;
            @endphp

            <div class="rounded-[30px] border-4 border-teal-700 bg-white p-5 shadow-md">

                <div class="mb-5 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100">
                        <svg class="h-5 w-5 text-red-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2S6 9.1 6 14a6 6 0 0012 0c0-4.9-6-12-6-12z"/>
                        </svg>
                    </div>

                    <h2 class="text-2xl font-bold text-red-800">
                        {{ $gol }}
                    </h2>
                </div>

                <div class="mb-5 flex justify-around text-center">
                    <div>
                        <p class="font-bold text-gray-800">{{ $gol }}+</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $plus }}</p>
                    </div>

                    <div>
                        <p class="font-bold text-gray-800">{{ $gol }}-</p>
                        <p class="text-lg font-semibold text-gray-900">{{ $minus }}</p>
                    </div>
                </div>

                <div class="flex justify-between border-t pt-3 text-sm">
                    <span class="text-gray-500">Total</span>

                    <span class="font-bold text-red-700">
                        {{ $total }} Kantong
                    </span>
                </div>

            </div>

        @endforeach

    </div>


    {{-- DETAIL STOK --}}
    <div class="rounded-2xl bg-white p-6 shadow-md">

        <h2 class="mb-5 text-xl font-bold text-gray-800">
            Detail Stok Darah
        </h2>

        {{-- FILTER --}}
        <form method="GET" action="{{ route('stok') }}" class="mb-6">

            <div class="flex flex-wrap items-center gap-4">

                {{-- GOLONGAN --}}
                <select
                    name="golongan"
                    class="w-52 rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-700 outline-none focus:ring-2 focus:ring-teal-500"
                >
                    <option value="">Golongan Darah</option>
                    <option value="A" {{ request('golongan') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ request('golongan') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ request('golongan') == 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ request('golongan') == 'O' ? 'selected' : '' }}>O</option>
                </select>


                {{-- KOMPONEN --}}
                <select
                    name="jenis_komponen"
                    class="w-56 rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-700 outline-none focus:ring-2 focus:ring-teal-500"
                >
                    <option value="">Komponen Darah</option>
                    <option value="Whole Blood" {{ request('jenis_komponen') == 'Whole Blood' ? 'selected' : '' }}>Whole Blood</option>
                    <option value="PRC" {{ request('jenis_komponen') == 'PRC' ? 'selected' : '' }}>PRC</option>
                    <option value="Trombosit" {{ request('jenis_komponen') == 'Trombosit' ? 'selected' : '' }}>Trombosit</option>
                    <option value="FFP" {{ request('jenis_komponen') == 'FFP' ? 'selected' : '' }}>FFP</option>
                    <option value="Kriopresipitasi" {{ request('jenis_komponen') == 'Kriopresipitasi' ? 'selected' : '' }}>Kriopresipitasi</option>
                </select>


                {{-- RHESUS --}}
                <select
                    name="rhesus"
                    class="w-52 rounded-xl border border-gray-300 bg-white px-4 py-3 text-sm text-gray-700 outline-none focus:ring-2 focus:ring-teal-500"
                >
                    <option value="">Rhesus Darah</option>
                    <option value="+" {{ request('rhesus') == '+' ? 'selected' : '' }}>Positif (+)</option>
                    <option value="-" {{ request('rhesus') == '-' ? 'selected' : '' }}>Negatif (-)</option>
                </select>


                <button
                    type="submit"
                    class="rounded-xl bg-[#0f5c5c] px-7 py-3 text-sm font-bold text-white transition hover:bg-[#0b4444]"
                >
                    Filter
                </button>


                <a
                    href="{{ route('stok') }}"
                    class="rounded-xl bg-gray-200 px-7 py-3 text-sm font-bold text-gray-700 transition hover:bg-gray-300"
                >
                    Reset
                </a>

            </div>

        </form>


        {{-- TABEL --}}
        <div class="overflow-x-auto">

            <table class="w-full border-collapse overflow-hidden rounded-xl">

                <thead class="bg-teal-700 text-white">
                    <tr class="text-sm">
                        <th class="border px-4 py-3">No</th>
                        <th class="border px-4 py-3">Golongan</th>
                        <th class="border px-4 py-3">Rhesus</th>
                        <th class="border px-4 py-3">Komponen</th>
                        <th class="border px-4 py-3">Tanggal Kadaluarsa</th>
                        <th class="border px-4 py-3">Asal Darah</th>
                        <th class="border px-4 py-3">Status</th>

                        @if(auth()->user()->role == 'petugas')
                            <th class="border px-4 py-3">Aksi</th>
                        @endif
                    </tr>
                </thead>

                <tbody class="bg-white text-center text-sm">

                    @forelse ($data as $index => $item)

                        <tr class="transition hover:bg-gray-100">

                            <td class="border px-4 py-2">
                                {{ $index + 1 }}
                            </td>

                            <td class="border px-4 py-2 font-semibold">
                                {{ $item->golongan }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $item->rhesus == '+' || $item->rhesus == 'Positif (+)' ? 'Positif (+)' : 'Negatif (-)' }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $item->jenis_komponen }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $item->tanggal_kedaluwarsa ?? $item->tanggal_kadaluarsa }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $item->asal_darah }}
                            </td>

                            <td class="border px-4 py-2 text-center">

                                @if($item->status == 'Belum diuji')

                                    @if(auth()->user()->role == 'petugas')

                                        <form action="{{ route('darah.uji', $item->id) }}" method="POST">
                                            @csrf

                                            <button
                                                type="submit"
                                                class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700 transition hover:bg-yellow-200"
                                            >
                                                Belum Teruji
                                            </button>
                                        </form>

                                    @else

                                        <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                            Belum Teruji
                                        </span>

                                    @endif

                                @elseif($item->status == 'Sudah Teruji')

                                    <div class="flex flex-col items-center gap-2">
                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Sudah Teruji
                                        </span>

                                        <a href="{{ route('darah.label', $item->id) }}"
                                           class="text-xs font-semibold text-teal-700 underline">
                                            Cetak QR
                                        </a>
                                    </div>

                                @else

                                    <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
                                        {{ $item->status ?? 'Tersedia' }}
                                    </span>

                                @endif

                            </td>

                            @if(auth()->user()->role == 'petugas')
                                <td class="border px-4 py-2">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('stok.edit', $item->id) }}"
                                           class="rounded bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700 hover:bg-blue-200">
                                            Edit
                                        </a>

                                        <form action="{{ route('stok.delete', $item->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin mau hapus data darah ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded bg-red-100 px-3 py-1 text-xs font-semibold text-red-700 hover:bg-red-200">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>

                                </td>
                            @endif

                        </tr>

                    @empty

                        <tr>
                            <td colspan="{{ auth()->user()->role == 'petugas' ? 8 : 7 }}"
                                class="border px-4 py-5 text-gray-500">
                                Data stok darah belum tersedia.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</main>

@endsection