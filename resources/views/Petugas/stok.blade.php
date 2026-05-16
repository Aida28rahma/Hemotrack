@extends('layouts.app')

@section('content')

<main class="flex-1 p-6">

    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        Ringkasan Stok Darah
    </h1>

    <div class="flex flex-wrap gap-5 mb-8">

        @foreach (['A', 'B', 'AB', 'O'] as $gol)
            @php
                $plus = $ringkasan[$gol]->plus ?? 0;
                $minus = $ringkasan[$gol]->minus ?? 0;
            @endphp

            <div class="w-64 bg-white border-4 border-teal-700 shadow-md p-4" style="border-radius: 30px;">

                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                        <span class="text-red-700 text-xl">🩸</span>
                    </div>

                    <h2 class="text-2xl font-bold text-red-800">
                        {{ $gol }}
                    </h2>
                </div>

                <div class="flex justify-around text-center mb-4">
                    <div>
                        <p class="font-bold text-gray-800">{{ $gol }}+</p>
                        <p class="text-lg font-semibold">{{ $plus }}</p>
                    </div>

                    <div>
                        <p class="font-bold text-gray-800">{{ $gol }}-</p>
                        <p class="text-lg font-semibold">{{ $minus }}</p>
                    </div>
                </div>

                <div class="border-t pt-2 flex justify-between text-sm">
                    <span class="text-gray-500">Total</span>
                    <span class="font-bold text-red-700">
                        {{ $plus + $minus }} Kantong
                    </span>
                </div>

            </div>
        @endforeach

    </div>

    <div class="bg-white rounded-2xl shadow-md p-6">

        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Detail Stok Darah
        </h2>

        <form method="GET" action="{{ route('stok') }}" class="flex flex-wrap gap-3 mb-5">

            <select name="golongan" onchange="this.form.submit()"
                class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-teal-500 outline-none">
                <option value="">Golongan Darah</option>
                <option value="A" {{ request('golongan') == 'A' ? 'selected' : '' }}>A</option>
                <option value="B" {{ request('golongan') == 'B' ? 'selected' : '' }}>B</option>
                <option value="AB" {{ request('golongan') == 'AB' ? 'selected' : '' }}>AB</option>
                <option value="O" {{ request('golongan') == 'O' ? 'selected' : '' }}>O</option>
            </select>

            <select name="jenis_komponen" onchange="this.form.submit()"
                class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-teal-500 outline-none">
                <option value="">Komponen Darah</option>
                <option value="Whole Blood" {{ request('jenis_komponen') == 'Whole Blood' ? 'selected' : '' }}>Whole Blood</option>
                <option value="PRC" {{ request('jenis_komponen') == 'PRC' ? 'selected' : '' }}>PRC</option>
                <option value="Trombosit" {{ request('jenis_komponen') == 'Trombosit' ? 'selected' : '' }}>Trombosit</option>
                <option value="FFP" {{ request('jenis_komponen') == 'FFP' ? 'selected' : '' }}>FFP</option>
                <option value="Kriopresipitasi" {{ request('jenis_komponen') == 'Kriopresipitasi' ? 'selected' : '' }}>Kriopresipitasi</option>
            </select>

            <select name="rhesus" onchange="this.form.submit()"
                class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-teal-500 outline-none">
                <option value="">Rhesus Darah</option>
                <option value="+" {{ request('rhesus') == '+' ? 'selected' : '' }}>Positif (+)</option>
                <option value="-" {{ request('rhesus') == '-' ? 'selected' : '' }}>Negatif (-)</option>
            </select>

            <a href="{{ route('stok') }}"
                class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded-lg text-sm">
                Reset
            </a>

        </form>

        <div class="overflow-x-auto">

            <table class="w-full border-collapse overflow-hidden rounded-xl">

                <thead class="bg-teal-700 text-white">
                    <tr class="text-sm">
                        <th class="px-4 py-3 border">No</th>
                        <th class="px-4 py-3 border">Golongan</th>
                        <th class="px-4 py-3 border">Rhesus</th>
                        <th class="px-4 py-3 border">Jenis Komponen</th>
                        <th class="px-4 py-3 border">Tanggal Kadaluarsa</th>
                        <th class="px-4 py-3 border">Asal Darah</th>
                        <th class="px-4 py-3 border">Status</th>
                    </tr>
                </thead>

                <tbody class="bg-white text-center text-sm">

                    @forelse ($data as $index => $item)

                        <tr class="hover:bg-gray-100 transition">

                            <td class="border px-4 py-2">{{ $index + 1 }}</td>

                            <td class="border px-4 py-2 font-semibold">
                                {{ $item->golongan }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $item->rhesus == '+' ? 'Positif (+)' : 'Negatif (-)' }}
                            </td>

                            <td class="border px-4 py-2">
                               {{ $item->jenis_komponen }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $item->tanggal_kedaluwarsa }}
                            </td>

                            <td class="border px-4 py-2">
                                {{ $item->asal_darah }}
                            </td>

                            <td class="border px-4 py-2">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $item->status }}
                                </span>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="border px-4 py-5 text-gray-500">
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