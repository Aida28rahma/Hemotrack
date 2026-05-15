@extends('layouts.app')

@section('content')

<div class="w-full px-8 py-6">

    <h1 class="text-3xl font-bold text-[#0f5c5c] mb-8">
        Form Input Data Pendonor
    </h1>

    {{-- CARD A - DATA PENDONOR --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-200 w-full mb-8">

        {{-- HEADER --}}
        <div class="px-8 py-5 border-b border-[#5bb7b2] flex items-center gap-4">
            <span class="bg-[#3aa39c] text-white font-bold px-4 py-2 rounded-lg">
                A.
            </span>

            <h2 class="text-2xl font-bold text-[#0f5c5c]">
                Data Pendonor
            </h2>
        </div>

        {{-- FORM DATA PENDONOR --}}
        <div class="px-8 py-7">

            <div class="grid grid-cols-2 gap-6 mb-6">

                <div>
                    <label class="block font-bold text-base mb-2">
                        Nama Pendonor
                    </label>

                    <input type="text"
                           class="w-full border border-gray-400 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                </div>

                <div>
                    <label class="block font-bold text-base mb-2">
                        NIK Pendonor
                    </label>

                    <input type="text"
                           class="w-full border border-gray-400 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                </div>

            </div>

            <div class="grid grid-cols-4 gap-6 mb-6">

                <div class="col-span-2">
                    <label class="block font-bold text-base mb-2">
                        Jenis Kelamin
                    </label>

                    <select class="w-full border border-gray-400 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-base mb-2">
                        Tanggal Lahir
                    </label>

                    <input type="date"
                           class="w-full border border-gray-400 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                </div>

                <div>
                    <label class="block font-bold text-base mb-2">
                        Usia
                    </label>

                    <input type="number"
                           class="w-full border border-gray-400 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                </div>

            </div>

            <div class="grid grid-cols-2 gap-6">

                <div>
                    <label class="block font-bold text-base mb-2">
                        Alamat Pendonor
                    </label>

                    <textarea
                        class="w-full border border-gray-400 rounded-md px-4 py-3 h-24 outline-none focus:ring-2 focus:ring-[#0f5c5c]"></textarea>
                </div>

                <div>
                    <label class="block font-bold text-base mb-2">
                        Nomor Telpon Pendonor
                    </label>

                    <input type="text"
                           class="w-full border border-gray-400 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                </div>

            </div>

        </div>

    </div>

    {{-- CARD B - DATA SKRINING --}}
    <div class="bg-white rounded-2xl shadow-md border border-gray-200 w-full">

        {{-- HEADER --}}
        <div class="px-8 py-5 border-b border-[#5bb7b2] flex items-center gap-4">
            <span class="bg-[#3aa39c] text-white font-bold px-4 py-2 rounded-lg">
                B.
            </span>

            <h2 class="text-2xl font-bold text-[#0f5c5c]">
                Data Skrining
            </h2>
        </div>

        {{-- FORM DATA SKRINING --}}
        <div class="px-8 py-7">

            <div class="grid grid-cols-3 gap-6">

                <div>
                    <label class="block font-bold text-base mb-2">
                        Tekanan Darah
                    </label>

                    <input type="text"
                           class="w-full border border-gray-400 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                </div>

                <div>
                    <label class="block font-bold text-base mb-2">
                        Berat Badan
                    </label>

                    <input type="text"
                           class="w-full border border-gray-400 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                </div>

                <div>
                    <label class="block font-bold text-base mb-2">
                        Suhu Badan
                    </label>

                    <input type="text"
                           class="w-full border border-gray-400 rounded-md px-4 py-3 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                </div>

            </div>

        </div>

    </div>

    {{-- BUTTON BERIKUTNYA --}}
    <div class="flex justify-end w-full mt-16 pb-10">

        <a href="{{ route('unitBankDarah.darah') }}"
           class="px-16 py-3 border border-[#0f5c5c] text-[#0f5c5c] font-bold shadow-md hover:bg-[#0f5c5c] hover:text-white transition">
            Berikutnya
        </a>

    </div>

</div>

@endsection