@extends('layouts.app')

@section('content')

<div class="w-full px-8 py-6">

    {{-- TITLE --}}
    <h1 class="text-3xl font-bold text-[#0f5c5c] mb-8">
        Form Input Data Darah Pendonor
    </h1>

<<<<<<< Updated upstream
    @if(session('success'))
        <div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-5 py-3 rounded-lg font-bold">
            {{ session('success') }}
        </div>
    @endif

    @if(session('success'))
        <div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-5 py-3 rounded-lg font-bold">
            {{ session('success') }}
        </div>
    @endif

=======
>>>>>>> Stashed changes
    {{-- CARD FORM --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-200 w-full">

        {{-- CARD HEADER --}}
        <div class="px-8 py-5 border-b border-[#5bb7b2]">
            <h2 class="text-2xl font-bold text-[#0f5c5c]">
                Data Darah Pendonor
            </h2>
        </div>

        {{-- FORM --}}
<<<<<<< Updated upstream
        <form action="{{ route('pmi.simpan') }}" method="POST" class="px-8 py-8 space-y-6">
            @csrf

            <form action="{{ route('pmi.simpan') }}" method="POST" class="px-8 py-8 space-y-6">
    @csrf

    {{-- GOLONGAN --}}
    <div>
        <label class="block font-bold text-base mb-2">
            Golongan
        </label>

        <select name="golongan"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
            <option value="">Pilih Golongan Darah</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
            <option value="O">O</option>
        </select>
    </div>

    {{-- RHESUS --}}
    <div>
        <label class="block font-bold text-base mb-2">
            Rhesus
        </label>

        <select name="rhesus"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
            <option value="">Pilih Rhesus</option>
            <option value="Positif">Positif (+)</option>
            <option value="Negatif">Negatif (-)</option>
        </select>
    </div>

    {{-- JENIS KOMPONEN --}}
    <div>
        <label class="block font-bold text-base mb-2">
            Jenis Komponen
        </label>

        <select name="jenis_komponen"
                class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
            <option value="">Pilih Jenis Komponen</option>
            <option value="Whole Blood">Whole Blood</option>
            <option value="PRC">PRC</option>
            <option value="TC">TC</option>
            <option value="FFP">FFP</option>
        </select>
    </div>

    {{-- TANGGAL KEDALUWARSA --}}
    <div>
        <label class="block font-bold text-base mb-2">
            Tanggal Kedaluwarsa
        </label>

        <input type="date"
               name="tanggal_kedaluwarsa"
               class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
    </div>

    {{-- BUTTON --}}
    <div class="flex justify-end w-full pt-6">

        <button type="submit"
                class="px-14 py-3 border border-[#0f5c5c] text-[#0f5c5c] font-bold rounded-sm shadow-md hover:bg-[#0f5c5c] hover:text-white transition">
=======
        <form class="px-8 py-8 space-y-6">

            {{-- GOLONGAN --}}
            <div>
                <label class="block font-bold text-base mb-2">
                    Golongan
                </label>

                <select class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>

            {{-- RHESUS --}}
            <div>
                <label class="block font-bold text-base mb-2">
                    Rhesus
                </label>

                <select class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    <option value="">Pilih Rhesus</option>
                    <option value="Positif">Positif (+)</option>
                    <option value="Negatif">Negatif (-)</option>
                </select>
            </div>

            {{-- JENIS KOMPONEN --}}
            <div>
                <label class="block font-bold text-base mb-2">
                    Jenis Komponen
                </label>

                <select class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    <option value="">Pilih Jenis Komponen</option>
                    <option value="Whole Blood">Whole Blood</option>
                    <option value="PRC">PRC</option>
                    <option value="TC">TC</option>
                    <option value="FFP">FFP</option>
                </select>
            </div>

            {{-- TANGGAL KEDALUWARSA --}}
            <div>
                <label class="block font-bold text-base mb-2">
                    Tanggal Kedaluwarsa
                </label>

                <input type="date"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
            </div>

        </form>

    </div>

    {{-- BUTTON --}}
    <div class="flex justify-end w-full mt-10">

        <button class="px-14 py-3 border border-[#0f5c5c] text-[#0f5c5c] font-bold rounded-sm shadow-md hover:bg-[#0f5c5c] hover:text-white transition">
>>>>>>> Stashed changes
            Simpan
        </button>

    </div>

<<<<<<< Updated upstream
</form>
=======
</div>
>>>>>>> Stashed changes

@endsection