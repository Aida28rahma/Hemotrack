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
                        <th class="px-4 py-3">Aksi</th>
                        

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

                            @if (trim(strtolower($item->status)) == 'menunggu')

                                <button type="button"
                                    onclick="openStatusModal({{ $item->id }})"
                                    class="relative z-50 cursor-pointer bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold transition">

                                    Menunggu

                                </button>

                            @elseif (trim(strtolower($item->status)) == 'disetujui')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Disetujui
                                </span>

                            @elseif (trim(strtolower($item->status)) == 'ditolak')

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Ditolak
                                </span>

                            @endif

                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('permintaan.delete', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin mau hapus permintaan ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Hapus
                                </button>
                            </form>
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

<div id="statusModal"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 text-center">
        <h2 class="text-xl font-bold text-gray-800 mb-4">
            Konfirmasi Permintaan
        </h2>

        <p class="text-gray-600 mb-6">
            Apakah permintaan akan disetujui atau ditolak?
        </p>

        <div class="flex justify-center gap-4">

            <form id="approveForm" method="POST">
                @csrf
                <button class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-xl font-semibold">
                    ✔ Disetujui
                </button>
            </form>

            <form id="rejectForm" method="POST">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl font-semibold">
                    ✖ Ditolak
                </button>
            </form>

        </div>

        <button onclick="closeStatusModal()"
            class="mt-5 text-gray-500 hover:text-gray-700 text-sm">
            Batal
        </button>
    </div>
</div>

<script>
    function openStatusModal(id) {
        const modal = document.getElementById('statusModal');
        const approveForm = document.getElementById('approveForm');
        const rejectForm = document.getElementById('rejectForm');

        approveForm.action = `/permintaan/${id}/approve`;
        rejectForm.action = `/permintaan/${id}/reject`;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeStatusModal() {
        const modal = document.getElementById('statusModal');

        modal.classList.remove('flex');
        modal.classList.add('hidden');
    }
</script>
@endsection