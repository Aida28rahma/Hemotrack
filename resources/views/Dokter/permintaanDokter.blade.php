@extends('layouts.app')

@section('content')

<div class="min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-5xl bg-gradient-to-br from-[#063b3a] via-[#0d7770] to-[#20b8b0] rounded-xl shadow-2xl p-10">

        <h1 class="text-3xl font-bold text-white text-center mb-8">
            Form Permintaan Darah
        </h1>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl">
                ✅ {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
    <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <form method="POST" action="{{ route('permintaanDokter.store') }}">
            @csrf

            <!-- DATA PASIEN -->
            <div class="border border-white/70 rounded-md p-5 mb-6">
                <h2 class="text-2xl font-bold text-white mb-3">
                    Data Pasien
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">

                    <!-- NO RM -->
                    <div>
                        <label class="block text-white text-sm mb-2">
                            No Rekam Medis
                        </label>
                        <input type="text" name="no_rm"
                            class="w-full rounded-md border-none px-4 py-3 text-gray-800 focus:ring-2 focus:ring-teal-300">
                    </div>

                    <!-- POLI -->
                    <div>
                        <label class="block text-white text-sm mb-2">
                            Poli Tujuan
                        </label>
                        <select name="poli"
                            class="w-full rounded-md border-none px-4 py-3 text-gray-800 focus:ring-2 focus:ring-teal-300">
                            <option value="">Pilih Poli</option>
                            <option value="IGD">IGD</option>
                            <option value="Poli Anak">Poli Anak</option>
                            <option value="Poli Bedah">Poli Bedah</option>
                            <option value="Poli Obgyn">Poli Obgyn</option>
                            <option value="Poli Penyakit Dalam">Poli Penyakit Dalam</option>
                        </select>
                    </div>

                </div>

               <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-5">

    <!-- NAMA PASIEN -->
<div class="md:col-span-2">
        <label class="block text-white text-sm mb-2">
            Nama Pasien
        </label>

        <input type="text" name="nama"
            class="w-full rounded-md border-none px-4 py-3 text-gray-800 focus:ring-2 focus:ring-teal-300">
    </div>

    <!-- JENIS KELAMIN -->
    <div>
        <label class="block text-white text-sm mb-2">
            Jenis Kelamin
        </label>

        <select name="jenis_kelamin"
            class="w-full rounded-md border-none px-4 py-3 text-gray-800 focus:ring-2 focus:ring-teal-300">

            <option value="">Pilih Jenis Kelamin</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>

        </select>
    </div>
</div>
</div>

            <!-- DETAIL PERMINTAAN -->
            <div class="border border-white/70 rounded-md p-5 mb-6">
                <h2 class="text-2xl font-bold text-white mb-3">
                    Detail Permintaan Darah
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-5">

                    <!-- GOLONGAN -->
                    <div>
                        <label class="block text-white text-sm mb-2">
                            Golongan Darah
                        </label>
                        <select name="golongan"
                            class="w-full rounded-md border-none px-4 py-3 text-gray-800 focus:ring-2 focus:ring-teal-300">
                            <option value="">Pilih</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>

                    <!-- RHESUS -->
                    <div>
                        <label class="block text-white text-sm mb-2">
                            Rhesus
                        </label>
                        <select name="rhesus"
                            class="w-full rounded-md border-none px-4 py-3 text-gray-800 focus:ring-2 focus:ring-teal-300">
                            <option value="">Pilih</option>
                            <option value="+">Positif (+)</option>
                            <option value="-">Negatif (-)</option>
                        </select>
                    </div>

                    <!-- KOMPONEN -->
                    <div>
                        <label class="block text-white text-sm mb-2">
                            Jenis Komponen
                        </label>
                        <select name="komponen"
                            class="w-full rounded-md border-none px-4 py-3 text-gray-800 focus:ring-2 focus:ring-teal-300">
                            <option value="">Pilih</option>
                            <option value="Whole Blood">Whole Blood</option>
                            <option value="PRC">PRC</option>
                            <option value="Trombosit">Trombosit</option>
                            <option value="FFP">FFP</option>
                            <option value="Kriopresipitasi">Kriopresipitasi</option>
                        </select>
                    </div>

                    <!-- JUMLAH -->
                    <div>
                        <label class="block text-white text-sm mb-2">
                            Jumlah
                        </label>
                        <input type="number" name="jumlah"
                            class="w-full rounded-md border-none px-4 py-3 text-gray-800 focus:ring-2 focus:ring-teal-300">
                    </div>

                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-white text-teal-700 px-6 py-3 rounded-md font-bold shadow hover:bg-gray-100 transition">
                    Ajukan Permintaan
                </button>
            </div>

        </form>
    </div>

</div>

@endsection