@extends('layouts.app')

@section('content')

<div class="w-full px-8 py-6">

    <h1 class="text-3xl font-bold text-[#0f5c5c] mb-8">
        Form Input Data Pendonor
    </h1>

    @if(session('success'))
        <div class="mb-5 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl font-semibold shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-5 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl font-semibold shadow-sm">
            Semua data wajib diisi dengan benar.
        </div>
    @endif

    <form method="POST" action="{{ route('unitBankDarah.simpanPendonor') }}">
        @csrf

        <div class="bg-white rounded-3xl shadow-md border border-gray-200 overflow-hidden mb-8">

            <div class="px-8 py-5 border-b border-[#5bb7b2] flex items-center gap-4">
                <span class="bg-[#3aa39c] text-white font-bold px-4 py-2 rounded-xl shadow">A.</span>
                <h2 class="text-2xl font-bold text-[#0f5c5c]">Data Pendonor</h2>
            </div>

            <div class="p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                    <div>
                        <label class="block font-bold mb-2">Nama Pendonor</label>
                        <input
                            type="text"
                            name="nama_pendonor"
                            value="{{ old('nama_pendonor') }}"
                            placeholder="Masukkan Nama Pendonor"
                            class="w-full border border-black-300 rounded-lg px-4 py-3 text-gray-400 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    </div>

                    <div>
                        <label class="block font-bold mb-2">NIK Pendonor</label>
                        <input
                            type="text"
                            name="nik_pendonor"
                            value="{{ old('nik_pendonor') }}"
                            placeholder="Masukkan NIK"
                            maxlength="16"
                            minlength="16"
                            inputmode="numeric"
                            pattern="[0-9]{16}"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16)"
                            class="w-full border border-black-300 rounded-lg px-4 py-3 text-gray-400 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">

                    <div class="md:col-span-2">
                        <label class="block font-bold mb-2">Jenis Kelamin</label>
                        <select
                            name="jenis_kelamin"
                            class="w-full border border-black-300 rounded-lg px-4 py-3 text-gray-400 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold mb-2">Tanggal Lahir</label>
                        <input
                            type="date"
                            id="tanggal_lahir"
                            name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}"
                            class="w-full border border-black-300 rounded-lg px-4 py-3 text-gray-400 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    </div>

                    <div>
                        <label class="block font-bold mb-2">Usia</label>
                        <input
                            type="number"
                            id="usia"
                            name="usia"
                            value="{{ old('usia') }}"
                            readonly
                            placeholder=" "
                            class="w-full border border-black-300 rounded-lg px-4 py-3 text-gray-400 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block font-bold mb-2">Alamat Pendonor</label>
                        <textarea
                            name="alamat_pendonor"
                            rows="4"
                            placeholder="Masukkan Alamat Pendonor"
                            class="w-full border border-black-300 rounded-lg px-4 py-3 text-gray-400 outline-none focus:ring-2 focus:ring-[#0f5c5c]">{{ old('alamat_pendonor') }}</textarea>
                    </div>

                    <div>
                        <label class="block font-bold mb-2">Nomor Telepon Pendonor</label>
                        <input
                            type="text"
                            name="nomor_telpon_pendonor"
                            value="{{ old('nomor_telpon_pendonor') }}"
                            placeholder="Masukkan Nomor Telepon Pendonor"
                            maxlength="13"
                            inputmode="numeric"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 13)"
                            class="w-full border border-black-300 rounded-lg px-4 py-3 text-gray-400 outline-none focus:ring-2 focus:ring-[#0f5c5c]">
                    </div>

                </div>

            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-md border border-gray-200 overflow-hidden">

            <div class="px-8 py-5 border-b border-[#5bb7b2] flex items-center gap-4">
                <span class="bg-[#3aa39c] text-white font-bold px-4 py-2 rounded-xl shadow">B.</span>
                <h2 class="text-2xl font-bold text-[#0f5c5c]">Data Skrining</h2>
            </div>

            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div>
                        <label class="block font-bold mb-2">Tekanan Darah</label>
                        <input
                            type="text"
                            name="tekanan_darah"
                            value="{{ old('tekanan_darah') }}"
                            placeholder="120/80"
                            class="w-full border border-black-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#0f5c5c] focus:outline-none">
                    </div>

                    <div>
                        <label class="block font-bold mb-2">Berat Badan</label>
                        <input
                            type="text"
                            name="berat_badan"
                            value="{{ old('berat_badan') }}"
                            placeholder="Kg"
                            class="w-full border border-black-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#0f5c5c] focus:outline-none">
                    </div>

                    <div>
                        <label class="block font-bold mb-2">Suhu Badan</label>
                        <input
                            type="text"
                            name="suhu_badan"
                            value="{{ old('suhu_badan') }}"
                            placeholder="°C"
                            class="w-full border border-black-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-[#0f5c5c] focus:outline-none">
                    </div>

                </div>
            </div>
        </div>

        <div class="flex justify-end mt-10 pb-10">
            <button
                type="submit"
                class="px-14 py-3 rounded-xl border border-[#0f5c5c] text-[#0f5c5c] font-bold shadow-md hover:bg-[#0f5c5c] hover:text-white transition-all duration-300">
                Simpan
            </button>
        </div>

    </form>

</div>

<script>
    const tanggalLahir = document.getElementById('tanggal_lahir');
    const usia = document.getElementById('usia');

    tanggalLahir.addEventListener('change', function () {
        if (!this.value) {
            usia.value = '';
            return;
        }

        const lahir = new Date(this.value);
        const hariIni = new Date();

        let umur = hariIni.getFullYear() - lahir.getFullYear();
        const bulan = hariIni.getMonth() - lahir.getMonth();

        if (bulan < 0 || (bulan === 0 && hariIni.getDate() < lahir.getDate())) {
            umur--;
        }

        usia.value = umur < 0 ? '' : umur;
    });
</script>

@endsection