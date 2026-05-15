@extends('layouts.app')

@section('content')

<div class="w-full px-8 py-6">

    <h1 class="text-2xl font-bold text-[#0f5c5c] mb-6">
        Form Input Data Pendonor
    </h1>

    {{-- DATA PENDONOR --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-200 w-full mb-6">

        <div class="px-6 py-4 border-b border-[#5bb7b2] flex items-center gap-3">
            <span class="bg-[#3aa39c] text-white font-bold px-3 py-2 rounded-lg">A.</span>
            <h2 class="text-xl font-bold text-[#0f5c5c]">Data Pendonor</h2>
        </div>

        <div class="p-6 grid grid-cols-2 gap-6">
            <div>
                <label class="block font-bold text-sm mb-2">Nama Pendonor</label>
                <input type="text" class="w-full border rounded-md px-4 py-2">
            </div>

            <div>
                <label class="block font-bold text-sm mb-2">NIK Pendonor</label>
                <input type="text" class="w-full border rounded-md px-4 py-2">
            </div>

            <div>
                <label class="block font-bold text-sm mb-2">Jenis Kelamin</label>
                <select class="w-full border rounded-md px-4 py-2">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block font-bold text-sm mb-2">Tanggal Lahir</label>
                    <input type="date" class="w-full border rounded-md px-4 py-2">
                </div>

                <div>
                    <label class="block font-bold text-sm mb-2">Usia</label>
                    <input type="number" class="w-full border rounded-md px-4 py-2">
                </div>
            </div>

            <div>
                <label class="block font-bold text-sm mb-2">Alamat Pendonor</label>
                <textarea class="w-full border rounded-md px-4 py-2 h-20"></textarea>
            </div>

            <div>
                <label class="block font-bold text-sm mb-2">Nomor Telpon Pendonor</label>
                <input type="text" class="w-full border rounded-md px-4 py-2">
            </div>
        </div>

    </div>

    {{-- DATA SKRINING --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-200 w-full">

        <div class="px-6 py-4 border-b border-[#5bb7b2] flex items-center gap-3">
            <span class="bg-[#3aa39c] text-white font-bold px-3 py-2 rounded-lg">B.</span>
            <h2 class="text-xl font-bold text-[#0f5c5c]">Data Skrining</h2>
        </div>

        <div class="p-6 grid grid-cols-3 gap-6">
            <div>
                <label class="block font-bold text-sm mb-2">Tekanan Darah</label>
                <input type="text" class="w-full border rounded-md px-4 py-2">
            </div>

            <div>
                <label class="block font-bold text-sm mb-2">Berat Badan</label>
                <input type="text" class="w-full border rounded-md px-4 py-2">
            </div>

            <div>
                <label class="block font-bold text-sm mb-2">Suhu Badan</label>
                <input type="text" class="w-full border rounded-md px-4 py-2">
            </div>
        </div>

    </div>

    <div class="flex justify-end mt-8">
        <button class="px-12 py-3 border border-[#0f5c5c] text-[#0f5c5c] font-bold shadow-md hover:bg-[#0f5c5c] hover:text-white transition">
            Berikutnya
        </button>
    </div>

</div>

@endsection