@extends('layouts.app')

@section('content')

<div class="p-6 max-w-2xl mx-auto">

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-6">Form Permintaan Darah</h2>

        <form method="POST" action="{{ route('permintaanDokter.store') }}">
            @csrf

            <!-- NO RM -->
            <div class="mb-4">
                <label class="block text-sm font-medium">No RM</label>
                <input type="text" name="no_rm"
                    class="w-full border rounded-lg px-3 py-2 mt-1 focus:ring focus:ring-teal-200">
            </div>

            <!-- NAMA PASIEN -->
            <div class="mb-4">
                <label class="block text-sm font-medium">Nama Pasien</label>
                <input type="text" name="nama"
                    class="w-full border rounded-lg px-3 py-2 mt-1">
            </div>

            <!-- JENIS KELAMIN -->
            <div class="mb-4">
                <label class="block text-sm font-medium">Jenis Kelamin</label>
                <select name="jenis_kelamin"
                    class="w-full border rounded-lg px-3 py-2 mt-1">
                    <option value="">-- Pilih --</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <!-- POLI -->
            <div class="mb-4">
                <label class="block text-sm font-medium">Poli</label>
                <select name="poli"
                    class="w-full border rounded-lg px-3 py-2 mt-1">
                    <option value="">-- Pilih --</option>
                    <option value="Bedah">Bedah</option>
                    <option value="PD">Penyakit Dalam</option>
                    <option value="Anak">Anak</option>
                    <option value="Obgyn">Obgyn</option>
                    <option value="UGD">UGD</option>
                </select>
            </div>
            
            <!-- Golongan -->
            <div class="mb-4">
                <label class="block text-sm font-medium">Golongan</label>
                <select name="golongan"
                    class="w-full border rounded-lg px-3 py-2 mt-1">
                    <option value="">-- Pilih --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>

            <!-- RHESUS -->
            <div class="mb-4">
                <label class="block text-sm font-medium">Rhesus</label>
                <select name="rhesus"
                    class="w-full border rounded-lg px-3 py-2 mt-1">
                    <option value="">-- Pilih --</option>
                    <option value="+">Positif (+)</option>
                    <option value="-">Negatif (-)</option>
                </select>
            </div>

            <!-- KOMPONEN DARAH -->
            <div class="mb-4">
                <label class="block text-sm font-medium">Komponen Darah</label>
                <select name="komponen"
                    class="w-full border rounded-lg px-3 py-2 mt-1">
                    <option value="">-- Pilih --</option>
                    <option value="WB">Whole Blood</option>
                    <option value="PRC">PRC</option>
                    <option value="TC">Trombosit</option>
                    <option value="FFP">Plasma</option>
                    <option value="Kriopresipitat">Kriopresipitat</option>
                </select>
            </div>

            <!-- JUMLAH -->
            <div class="mb-6">
                <label class="block text-sm font-medium">Jumlah (kantong)</label>
                <input type="number" name="jumlah"
                    class="w-full border rounded-lg px-3 py-2 mt-1">
            </div>

            <!-- BUTTON -->
            <button class="w-full bg-teal-600 text-white py-2 rounded-lg font-semibold hover:bg-teal-700 transition">
                Kirim Permintaan
            </button>

        </form>
    </div>

</div>

@endsection