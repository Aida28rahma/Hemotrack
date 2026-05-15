@extends('layouts.app')

@section('content')

<div class="w-full px-8 py-6">

    <h1 class="text-3xl font-bold text-[#0f5c5c] mb-8">
        Form Input Data Darah Pendonor
    </h1>

    @if(session('success'))
        <div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-5 py-3 rounded-lg font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-md border border-gray-200 w-full">

        <div class="px-8 py-5 border-b border-[#5bb7b2]">
            <h2 class="text-2xl font-bold text-[#0f5c5c]">
                Data Darah Pendonor
            </h2>
        </div>

        <form action="{{ route('unitBankDarah.simpan') }}" method="POST" class="px-8 py-8 space-y-6">
            @csrf

            <div>
                <label class="block font-bold text-base mb-2">Golongan</label>
                <select name="golongan" class="w-full border border-gray-300 rounded-lg px-4 py-3">
                    <option value="">Pilih Golongan Darah</option>
                    <option>A</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>O</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-base mb-2">Rhesus</label>
                <select name="rhesus" class="w-full border border-gray-300 rounded-lg px-4 py-3">
                    <option value="">Pilih Rhesus</option>
                    <option>Positif (+)</option>
                    <option>Negatif (-)</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-base mb-2">Jenis Komponen</label>
                <select name="jenis_komponen" class="w-full border border-gray-300 rounded-lg px-4 py-3">
                    <option value="">Pilih Jenis Komponen</option>
                    <option>Whole Blood</option>
                    <option>PRC</option>
                    <option>TC</option>
                    <option>FFP</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-base mb-2">Tanggal Kedaluwarsa</label>
                <input type="date" name="tanggal_kedaluwarsa" class="w-full border border-gray-300 rounded-lg px-4 py-3">
            </div>

            <div class="flex justify-end pt-24">
                <button type="submit"
                        class="px-14 py-3 border border-[#0f5c5c] text-[#0f5c5c] font-bold shadow-md hover:bg-[#0f5c5c] hover:text-white transition">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>

@endsection