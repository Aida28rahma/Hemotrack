
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

         <form action="{{ route('pmi.simpan') }}" method="POST" class="px-8 py-8 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block font-bold text-base mb-2">Golongan</label>
                    <select name="golongan" class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                        <option value="">Pilih Golongan Darah</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-base mb-2">Rhesus</label>
                    <select name="rhesus" class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                        <option value="">Pilih Rhesus</option>
                        <option value="+">Positif (+)</option>
                        <option value="-">Negatif (-)</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-base mb-2">Jenis komponen</label>
                    <select name="jenis_komponen" class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                        <option value="">Pilih Jenin komponen</option>
                        <option value="Whole Blood">Whole Blood</option>
                        <option value="PRC">PRC</option>
                        <option value="Trombosit">Trombosit</option>
                        <option value="FFP">FFP</option>
                        <option value="Krioprsipitasi">Krioprsipitasi</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-base mb-2">Tanggal Kedaluwarsa</label>
                    <input type="date" name="tanggal_kedaluwarsa"
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                </div>

            </div>

            <div class="flex justify-end w-full pt-8">
                <button type="submit"
                    class="px-14 py-3 border border-[#0f5c5c] text-[#0f5c5c] font-bold rounded-sm shadow-md hover:bg-[#0f5c5c] hover:text-white transition">
                    Simpan
                </button>
            </div>

        </form>

    </div>

</div>

@endsection