@extends('layouts.app')

@section('content')

<div class="mb-6 rounded-2xl border border-gray-200 bg-white p-5 shadow-sm">


    <!-- Header -->
    <div class="mb-5 rounded-3xl bg-white p-5 shadow">

        <h1 class="text-3xl font-bold text-[#0f5c5c]">
            Permintaan Darah
        </h1>

    

    <!-- Filter -->

        <div class="flex justify-between items-end flex-wrap gap-4">

          <!-- Status Filter -->
            <div class="mt-5 flex flex-wrap gap-4">

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

        <h2 class="text-2xl font-bold text-[#0f5c5c] mb-5">
            Data Riwayat Permintaan Darah
        </h2>

        <div class="overflow-x-auto">

            <table class="w-full overflow-hidden rounded-2xl">

                <!-- Head -->
                <thead class="bg-teal-700 text-white">

                    <tr class="text-sm">

                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Dokter Pengaju</th>
                        <th class="px-4 py-3">Nama Pasien</th>
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
                        <td class="px-4 py-3">{{ $item->dokter->name ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $item->nama }}</td>
                        <td class="px-4 py-3">{{ $item->poli }}</td>
                        <td class="px-4 py-3 font-semibold">{{ $item->golongan }}</td>
                        <td class="px-4 py-3">{{ $item->rhesus }}</td>
                        <td class="px-4 py-3">{{ $item->jenis_komponen }}</td>
                        <td class="px-4 py-3">{{ $item->jumlah }}</td>
                        <td class="px-4 py-3">{{ $item->created_at->format('d/m/Y') }}</td>

                        <!-- STATUS -->
                        <td class="px-4 py-3">
                            @if($item->status == 'menunggu')
                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Menunggu
                                </span>
                            @elseif($item->status == 'disetujui')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Disetujui
                                </span>
                            @elseif($item->status == 'ditolak')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Ditolak
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">

                            @if($item->status == 'menunggu')

                            <button
                            type="button"

                            onclick="openModal({{ $item->id }})"

                            class="
                            bg-yellow-100
                            hover:bg-yellow-200
                            text-yellow-700
                            px-4
                            py-2
                            rounded-full
                            text-sm
                            font-semibold
                            transition
                            ">

                            Menunggu

                            </button>

                            @else

                            <span class="text-gray-400">
                            -
                            </span>

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

{{-- MODAL STATUS --}}
<div id="statusModal"
class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center">

<div class="bg-white rounded-2xl p-6 w-[420px] shadow-xl">

<h2 class="text-xl font-bold text-[#0f5c5c] mb-5">
Proses Permintaan Darah
</h2>


<div class="grid grid-cols-2 gap-3 mb-5">

<form id="approveForm" method="POST">

@csrf

<button
type="submit"
class="
w-full
rounded-xl
bg-green-100
py-3
font-semibold
text-green-700
hover:bg-green-200
">

Setujui

</button>

</form>


<button
type="button"

onclick="showRejectArea()"

class="
rounded-xl
bg-red-100
py-3
font-semibold
text-red-700
hover:bg-red-200
">

Tolak

</button>

</div>



<div id="rejectArea"
class="hidden">

<form id="rejectForm"
method="POST">

@csrf


<textarea
name="alasan_penolakan"

required

placeholder="Masukkan alasan penolakan..."

class="
w-full
border
rounded-xl
p-3
mb-4
">

</textarea>


<button
type="submit"

class="
w-full
rounded-xl
bg-red-500
py-3
text-white
font-semibold
">

Simpan Penolakan

</button>

</form>

</div>



<button
type="button"

onclick="closeModal()"

class="
mt-4
w-full
rounded-xl
border
py-2
hover:bg-gray-100
">

Batal

</button>

</div>

</div>



<script>

function openModal(id){

const modal =
document.getElementById(
'statusModal'
);

document.getElementById(
'approveForm'
).action =
'/permintaan/' +
id +
'/approve';


document.getElementById(
'rejectForm'
).action =
'/permintaan/' +
id +
'/reject';


document.getElementById(
'rejectArea'
).classList.add(
'hidden'
);

modal.classList.remove(
'hidden'
);

modal.classList.add(
'flex'
);

}



function showRejectArea(){

document.getElementById(
'rejectArea'
).classList.remove(
'hidden'
);

}



function closeModal(){

const modal =
document.getElementById(
'statusModal'
);

modal.classList.add(
'hidden'
);

modal.classList.remove(
'flex'
);

}

</script>



@endsection