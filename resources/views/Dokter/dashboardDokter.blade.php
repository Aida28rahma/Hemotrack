@extends('layouts.app')

@section('content')

<div class="w-full px-8 py-6">

    {{-- STATUS PERMINTAAN --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-200 p-5 mb-6 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <svg class="w-6 h-6 text-[#0f5c5c]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2a7 7 0 00-7 7v4.5L3 16v1h18v-1l-2-2.5V9a7 7 0 00-7-7zm0 20a3 3 0 003-3H9a3 3 0 003 3z"/>
            </svg>

{{-- STOK DARAH --}}
<h2 class="text-xl font-bold text-[#0f5c5c] mb-3">
    Stok Darah
</h2>

<div class="grid grid-cols-2 gap-5">

    @foreach($stok as $gol => $jumlah)
        <div class="bg-white rounded-2xl shadow-md px-5 py-4 flex items-center justify-between">

            <div>
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-100 mb-3">
                    🩸
                </div>

                <p class="text-[#8b1118] font-bold text-sm">
                    Gol. {{ $gol }}
                </p>
            </div>

            <span class="bg-[#0f5c5c] text-white font-bold px-3 py-2 rounded-md">
                {{ $jumlah }}
            </span>

        </div>
    @endforeach

</div>
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
                    <tr>
                        <td class="border px-4 py-3">1</td>
                        <td class="border px-4 py-3">A</td>
                        <td class="border px-4 py-3">Negatif (-)</td>
                        <td class="border px-4 py-3">Whole Blood</td>
                        <td class="border px-4 py-3">10/10/2026</td>
                        <td class="border px-4 py-3">Unit Bank Darah</td>
                        <td class="border px-4 py-3">Telah diuji</td>
                    </tr>

                    <tr>
                        <td class="border px-4 py-3">2</td>
                        <td class="border px-4 py-3">A</td>
                        <td class="border px-4 py-3">Negatif (-)</td>
                        <td class="border px-4 py-3">Whole Blood</td>
                        <td class="border px-4 py-3">10/10/2026</td>
                        <td class="border px-4 py-3">Unit Bank Darah</td>
                        <td class="border px-4 py-3">Telah diuji</td>
                    </tr>

                    <tr>
                        <td class="border px-4 py-3">3</td>
                        <td class="border px-4 py-3">A</td>
                        <td class="border px-4 py-3">Negatif (-)</td>
                        <td class="border px-4 py-3">Whole Blood</td>
                        <td class="border px-4 py-3">10/10/2026</td>
                        <td class="border px-4 py-3">Unit Bank Darah</td>
                        <td class="border px-4 py-3">Telah diuji</td>
                    </tr>
                </tbody>

            </table>

        </div>

        <div class="flex justify-end mt-5">
            <a href="{{ route('stok') }}"
               class="border border-gray-300 px-6 py-2 rounded-lg text-sm font-bold text-[#0f5c5c] hover:bg-gray-100 transition">
                Lihat Detail Stok
            </a>

        </div>

        @endforeach

    </div>

</div>
        

    </div>

</div>

@endsection