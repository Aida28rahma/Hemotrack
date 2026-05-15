
@extends('layouts.app')

@section('title', 'Input Pendonor')

@section('content')

<div class="content-wrapper">

    {{-- TITLE --}}
    <h2 class="page-title">
        Form Input Data Pendonor
    </h2>

    {{-- =========================
         CARD A
    ========================== --}}
    <div class="custom-card">

        <div class="custom-header">
            <span class="badge-title">A.</span>
            Data Pendonor
        </div>

        <div class="custom-body">

            <div class="form-grid">

                {{-- Nama --}}
                <div class="form-group-custom full">
                    <label>Nama Pendonor</label>
                    <input type="text" class="form-control-custom">
                </div>

                {{-- NIK --}}
                <div class="form-group-custom full">
                    <label>NIK Pendonor</label>
                    <input type="text" class="form-control-custom">
                </div>

                {{-- Jenis Kelamin --}}
                <div class="form-group-custom">
                    <label>Jenis Kelamin</label>

                    <select class="form-control-custom">
                        <option selected disabled></option>
                        <option>Laki-Laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>

                {{-- Tanggal Lahir --}}
                <div class="form-group-custom">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control-custom">
                </div>

                {{-- Usia --}}
                <div class="form-group-custom">
                    <label>Usia</label>
                    <input type="number" class="form-control-custom">
                </div>

                {{-- Alamat --}}
                <div class="form-group-custom full">
                    <label>Alamat Pendonor</label>
                    <textarea class="form-control-custom textarea-custom"></textarea>
                </div>

                {{-- Nomor Telp --}}
                <div class="form-group-custom">
                    <label>Nomor Telfon Pendonor</label>
                    <input type="text" class="form-control-custom">
                </div>

            </div>

        </div>

    </div>

    {{-- =========================
         CARD B
    ========================== --}}
    <div class="custom-card mt-4">

        <div class="custom-header">
            <span class="badge-title">B.</span>
            Data Skrining
        </div>

        <div class="custom-body">

            <div class="form-grid-3">

                {{-- Tekanan Darah --}}
                <div class="form-group-custom">
                    <label>Tekanan Darah</label>
                    <input type="text" class="form-control-custom">
                </div>

                {{-- Berat Badan --}}
                <div class="form-group-custom">
                    <label>Berat Badan</label>
                    <input type="text" class="form-control-custom">
                </div>

                {{-- Suhu --}}
                <div class="form-group-custom">
                    <label>Suhu Badan</label>
                    <input type="text" class="form-control-custom">
                </div>

            </div>

        </div>

    </div>

    {{-- BUTTON --}}
    <div class="button-wrapper">
       <a href="{{ url('/inputDarah') }}" class="btn-next">
    Berikutnya
        </a>
    </div>

</div>

@endsection