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

    @if ($errors->any())
        <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-5 py-3 rounded-lg font-bold">
            Semua data wajib diisi dengan benar.
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-md border border-gray-200 w-full">

        <div class="px-8 py-5 border-b border-[#5bb7b2]">
            <h2 class="text-2xl font-bold text-[#0f5c5c]">
                Data Darah Pendonor
            </h2>
        </div>

        <form action="{{ route('unitBankDarah.simpanDarah') }}" method="POST" class="px-8 py-8 space-y-6">
            @csrf

            <div>
                <label class="block font-bold text-base mb-2">Golongan</label>
                <select name="golongan"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A" {{ old('golongan') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('golongan') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ old('golongan') == 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ old('golongan') == 'O' ? 'selected' : '' }}>O</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-base mb-2">Rhesus</label>
                <select name="rhesus"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    <option value="">Pilih Rhesus</option>
                    <option value="Positif (+)" {{ old('rhesus') == 'Positif (+)' ? 'selected' : '' }}>Positif (+)</option>
                    <option value="Negatif (-)" {{ old('rhesus') == 'Negatif (-)' ? 'selected' : '' }}>Negatif (-)</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-base mb-2">Jenis Komponen</label>
                <select name="jenis_komponen"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    <option value="">Pilih Jenis Komponen</option>
                    <option value="Whole Blood" {{ old('jenis_komponen') == 'Whole Blood' ? 'selected' : '' }}>Whole Blood</option>
                    <option value="PRC" {{ old('jenis_komponen') == 'PRC' ? 'selected' : '' }}>PRC</option>
                    <option value="TC" {{ old('jenis_komponen') == 'TC' ? 'selected' : '' }}>TC</option>
                    <option value="FFP" {{ old('jenis_komponen') == 'FFP' ? 'selected' : '' }}>FFP</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-base mb-2">Tanggal Kedaluwarsa</label>
                <input type="date"
                       name="tanggal_kedaluwarsa"
                       value="{{ old('tanggal_kedaluwarsa') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
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