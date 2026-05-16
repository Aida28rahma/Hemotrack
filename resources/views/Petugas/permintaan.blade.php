@extends('layouts.app')

@section('content')

<div class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Permintaan Darah
        </h1>

<<<<<<< Updated upstream
=======
        <button
            class="bg-teal-500 hover:bg-teal-600 text-white px-5 py-3 rounded-xl shadow transition">
            + Tambah Permintaan
        </button>

>>>>>>> Stashed changes
    </div>

    <!-- Filter -->
    <div class="bg-white rounded-3xl shadow-md border border-gray-200 p-5 mb-8">

        <div class="flex justify-between items-end flex-wrap gap-4">

<<<<<<< Updated upstream
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
=======
            <!-- Status Filter -->
            <div class="flex flex-wrap gap-4">

                <!-- Semua -->
                <button
                    class="bg-white border border-gray-200 shadow rounded-xl px-6 py-4 flex items-center gap-3 hover:bg-gray-50 transition">

                    <span class="text-xl">📋</span>

                    <span class="font-semibold text-gray-700">
                        Semua
                    </span>

                </button>

                <!-- Menunggu -->
                <button
                    class="bg-white border border-gray-200 shadow rounded-xl px-6 py-4 flex items-center gap-3 hover:bg-gray-50 transition">

                    <span class="text-gray-600">◉</span>

                    <span class="font-semibold text-gray-700">
                        Menunggu
                    </span>

                    <span
                        class="w-7 h-7 rounded-full bg-orange-400 text-white flex items-center justify-center text-sm font-bold">
                        5
                    </span>

                </button>

                <!-- Selesai -->
                <button
                    class="bg-white border border-gray-200 shadow rounded-xl px-6 py-4 flex items-center gap-3 hover:bg-gray-50 transition">

                    <span class="text-gray-600">◉</span>

                    <span class="font-semibold text-gray-700">
                        Selesai
                    </span>

                    <span
                        class="w-7 h-7 rounded-full bg-green-500 text-white flex items-center justify-center text-sm font-bold">
                        7
                    </span>

                </button>

                <!-- Ditolak -->
                <button
                    class="bg-white border border-gray-200 shadow rounded-xl px-6 py-4 flex items-center gap-3 hover:bg-gray-50 transition">

                    <span class="text-gray-600">◉</span>

                    <span class="font-semibold text-gray-700">
                        Ditolak
                    </span>

                    <span
                        class="w-7 h-7 rounded-full bg-red-500 text-white flex items-center justify-center text-sm font-bold">
                        5
                    </span>

                </button>
>>>>>>> Stashed changes

            </div>

            <!-- Search -->
            <div>
<<<<<<< Updated upstream
                <form method="GET" action="{{ route('permintaan') }}">
                    <input type="text" name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama / poli..."
                        class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-64 focus:ring-2 focus:ring-teal-500 outline-none">
                </form>
=======

                <input type="text"
                    placeholder="Cari Data"
                    class="border border-gray-300 rounded-lg px-4 py-2 text-sm w-64 focus:ring-2 focus:ring-teal-500 outline-none">

>>>>>>> Stashed changes
            </div>

        </div>

    </div>

<<<<<<< Updated upstream
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
=======
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
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
=======
                    @foreach ([
                        ['dokter' => 'dr. Olivia', 'poli' => 'IGD', 'goldar' => 'A', 'rhesus' => 'Negatif (-)', 'komponen' => 'Whole Blood', 'jumlah' => 2, 'tanggal' => '04/05/2025', 'status' => 'Selesai'],
                        ['dokter' => 'dr. Aida', 'poli' => 'Obgyn', 'goldar' => 'B', 'rhesus' => 'Negatif (-)', 'komponen' => 'Whole Blood', 'jumlah' => 1, 'tanggal' => '04/05/2025', 'status' => 'Ditolak'],
                        ['dokter' => 'dr. Anisa', 'poli' => 'Bedah', 'goldar' => 'A', 'rhesus' => 'Positif (+)', 'komponen' => 'Whole Blood', 'jumlah' => 1, 'tanggal' => '30/05/2025', 'status' => 'Menunggu'],
                        ['dokter' => 'dr. Olivia', 'poli' => 'IGD', 'goldar' => 'AB', 'rhesus' => 'Positif (+)', 'komponen' => 'Whole Blood', 'jumlah' => 5, 'tanggal' => '03/06/2025', 'status' => 'Selesai'],
                        ['dokter' => 'dr. Olivia', 'poli' => 'IGD', 'goldar' => 'A', 'rhesus' => 'Negatif (-)', 'komponen' => 'Whole Blood', 'jumlah' => 3, 'tanggal' => '03/06/2025', 'status' => 'Ditolak'],
                    ] as $index => $item)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-4 py-3">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item['dokter'] }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item['poli'] }}
                            </td>

                            <td class="px-4 py-3 font-semibold">
                                {{ $item['goldar'] }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item['rhesus'] }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item['komponen'] }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item['jumlah'] }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $item['tanggal'] }}
                            </td>

                           <!-- Status -->
                            <td class="px-4 py-3 status-cell">

                                @if ($item['status'] == 'Diproses')

                                    <!-- Bisa diklik -->
                                    <button
                                        onclick="finishProcess(this)"
                                        class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold transition">

                                        Diproses

                                    </button>

                                @elseif ($item['status'] == 'Selesai')

                                    <span
                                        class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">

                                        Selesai

                                    </span>

                                @elseif ($item['status'] == 'Ditolak')

                                    <span
                                        class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">

                                        Ditolak

                                    </span>

                                @else

                                    <span
                                        class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">

                                        Menunggu

                                    </span>

                                @endif

                            </td>

                           <!-- Persetujuan -->
                            <td class="px-4 py-3 action-cell">

                                @if ($item['status'] == 'Menunggu')

                                    <div class="flex justify-center gap-2">

                                        <!-- Setujui -->
                                        <button
                                            onclick="approveRequest(this)"
                                            class="bg-green-100 hover:bg-green-200 text-green-700 px-3 py-1 rounded-full text-xs font-semibold transition">

                                            ✔ Disetujui

                                        </button>

                                        <!-- Tolak -->
                                        <button
                                            onclick="openRejectModal(this)"
                                            class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded-full text-xs font-semibold transition">

                                            ✖ Ditolak

                                        </button>

                                    </div>

                                @else

                                    <span class="text-gray-400">
                                        -
                                    </span>

                                @endif

                            </td>
                        </tr>

                    @endforeach

                </tbody>
>>>>>>> Stashed changes

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

<<<<<<< Updated upstream
=======
<!-- Modal Tolak -->
<div id="rejectModal"
    class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

    <div class="bg-white rounded-3xl shadow-xl w-full max-w-lg p-6">

        <div class="flex justify-between items-center mb-5">

            <h2 class="text-2xl font-bold text-red-600">
                Alasan Penolakan
            </h2>

            <button
                onclick="closeRejectModal()"
                class="text-gray-400 hover:text-red-500 text-2xl">

                ×

            </button>

        </div>

        <textarea
            id="rejectReason"
            rows="5"
            placeholder="Tulis alasan penolakan..."
            class="w-full border border-gray-300 rounded-2xl p-4 focus:ring-2 focus:ring-red-400 outline-none resize-none"></textarea>

        <div class="flex justify-end gap-3 mt-6">

            <button
                onclick="closeRejectModal()"
                class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2 rounded-xl transition">

                Batal

            </button>

            <button
                onclick="submitReject()"
                class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl transition">

                Kirim

            </button>

        </div>

    </div>

</div>


<script>

    let currentRejectButton = null;

    // APPROVE
    function approveRequest(button) {

        let row = button.closest('tr');

        // status cell
        let statusCell = row.querySelector('.status-cell');

        // ubah jadi diproses
        statusCell.innerHTML = `
            <button
                onclick="finishProcess(this)"
                class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold transition">

                Diproses

            </button>
        `;

        // hilangkan tombol persetujuan
        row.querySelector('.action-cell').innerHTML = `
            <span class="text-gray-400">-</span>
        `;
    }

    // FINISH PROCESS
    function finishProcess(button) {

        let statusCell = button.parentElement;

        statusCell.innerHTML = `
            <span
                class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">

                Selesai

            </span>
        `;
    }

    // OPEN MODAL
    function openRejectModal(button) {

        currentRejectButton = button;

        document.getElementById('rejectModal').classList.remove('hidden');
        document.getElementById('rejectModal').classList.add('flex');
    }

    // CLOSE MODAL
    function closeRejectModal() {

    document.getElementById('rejectModal').classList.remove('flex');
    document.getElementById('rejectModal').classList.add('hidden');

    // reset textarea
    document.getElementById('rejectReason').value = '';
    }

    // SUBMIT REJECT
    function submitReject() {

        let row = currentRejectButton.closest('tr');

        // ubah status
        row.querySelector('.status-cell').innerHTML = `
            <span
                class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">

                Ditolak

            </span>
        `;

        // hilangkan tombol
        row.querySelector('.action-cell').innerHTML = `
            <span class="text-gray-400">-</span>
        `;

        closeRejectModal();
    }

</script>

>>>>>>> Stashed changes
@endsection