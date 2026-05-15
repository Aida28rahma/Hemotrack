@extends('layouts.app')

@section('content')

<div class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Permintaan Darah
        </h1>

    </div>

    <!-- Filter -->
    <div class="bg-white rounded-3xl shadow-md border border-gray-200 p-5 mb-8">

        <div class="flex justify-between items-end flex-wrap gap-4">

          <!-- Status Filter -->
            <div class="flex flex-wrap gap-4">

                <!-- Semua -->
                <a href="{{ route('permintaan', ['search' => request('search')]) }}"
                class="bg-white border border-gray-200 shadow rounded-xl px-6 py-4 flex items-center gap-3 hover:bg-gray-50">
                    📋 Semua
                </a>

                <!-- Menunggu -->
                <a href="{{ route('permintaan', ['status' => 'menunggu', 'search' => request('search')]) }}"
                class="bg-white border border-gray-200 shadow rounded-xl px-6 py-4 flex items-center gap-3 hover:bg-gray-50">
                    ◉ Menunggu
                </a>

                <!-- Disetujui -->
                <a href="{{ route('permintaan', ['status' => 'disetujui', 'search' => request('search')]) }}"
                class="bg-white border border-gray-200 shadow rounded-xl px-6 py-4 flex items-center gap-3 hover:bg-gray-50">
                    ◉ Disetujui
                </a>

                <!-- Ditolak -->
                <a href="{{ route('permintaan', ['status' => 'ditolak', 'search' => request('search')]) }}"
                class="bg-white border border-gray-200 shadow rounded-xl px-6 py-4 flex items-center gap-3 hover:bg-gray-50">
                    ◉ Ditolak
                </a>

            </div>

            <!-- Search -->
            <div>
                <form method="GET" action="{{ route('permintaan') }}">
                    <input type="text" name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama / poli..."
                        class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-64 focus:ring-2 focus:ring-teal-500 outline-none">
                </form>
            </div>

        </div>

    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <!-- Table -->
    <div class="bg-white rounded-3xl shadow-md border border-gray-200 p-5">

        <h2 class="text-2xl font-bold text-teal-700 mb-5">
            Data Riwayat Permintaan Darah
        </h2>

        <div class="overflow-x-auto">

            <table class="w-full overflow-hidden rounded-2xl">

                <!-- Head -->
                <thead class="bg-teal-500 text-white">

                    <tr class="text-sm">

                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Nama Dokter</th>
                        <th class="px-4 py-3">Poli</th>
                        <th class="px-4 py-3">Golongan Darah</th>
                        <th class="px-4 py-3">Rhesus</th>
                        <th class="px-4 py-3">Komponen</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3">Tanggal Permintaan</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Persetujuan</th>

                    </tr>

                </thead>

                <!-- Body -->
                <tbody class="divide-y divide-gray-200 bg-white text-center">

                    @foreach ($data as $index => $item)

                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-4 py-3">{{ $index + 1 }}</td>

                        <td class="px-4 py-3">
                            {{ $item->nama }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $item->poli }}
                        </td>

                        <td class="px-4 py-3 font-semibold">
                            {{ $item->golongan }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $item->rhesus }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $item->komponen }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $item->jumlah }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $item->created_at->format('d/m/Y') }}
                        </td>

                        <!-- STATUS -->
                        <td class="px-4 py-3">

                            @if ($item->status == 'menunggu')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Menunggu
                                </span>

                            @elseif ($item->status == 'disetujui')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Disetujui
                                </span>

                            @elseif ($item->status == 'ditolak')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Ditolak
                                </span>
                            @endif

                        </td>
                        <!-- AKSI -->
                        <td class="px-4 py-3">

                        @if ($item->status == 'menunggu')

                            <div class="flex justify-center gap-2">

                                <!-- SETUJUI -->
                                <form action="{{ route('permintaan.approve', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-green-100 hover:bg-green-200 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        ✔ Setujui
                                    </button>
                                </form>

                                <!-- TOLAK -->
                                <form action="{{ route('permintaan.reject', $item->id) }}" method="POST">
                                    @csrf
                                    <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        ✖ Tolak
                                    </button>
                                </form>

                            </div>

                        @else

                            <span class="text-gray-400">-</span>

                        @endif

                        </td>

                    </tr>

                    @endforeach

                    </tbody>

            </table>

        </div>

        <!-- Pagination -->
        <div class="flex justify-end items-center gap-2 mt-5">

            <button class="px-3 py-1 bg-gray-200 rounded">
                ‹
            </button>

            <button class="px-3 py-1 bg-teal-600 text-white rounded">
                1
            </button>

            <button class="px-3 py-1 bg-gray-200 rounded">
                ›
            </button>

        </div>

    </div>

</div>

@endsection