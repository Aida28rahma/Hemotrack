{{-- resources/views/distribusi/input-data.blade.php --}}

@extends('layouts.app')

@section('title', 'Input Darah')

@section('content')

<div class="content-wrapper">

    {{-- JUDUL --}}
    <h2 class="page-title">
        Form Input Data Darah Pendonor
    </h2>

    {{-- CARD --}}
    <div class="blood-card">

        <div class="blood-header">
            Data Darah Pendonor
        </div>

        <div class="blood-body">

            <form action="" method="POST">
                @csrf

                {{-- Golongan Darah --}}
                <div class="form-group-custom">
                    <label>Golongan Darah</label>

                    <select class="form-control-custom">
                        <option selected disabled></option>
                        <option>A</option>
                        <option>B</option>
                        <option>AB</option>
                        <option>O</option>
                    </select>
                </div>

                {{-- Rhesus --}}
                <div class="form-group-custom">
                    <label>Rhesus Darah</label>

                    <select class="form-control-custom">
                        <option selected disabled></option>
                        <option>Positif (+)</option>
                        <option>Negatif (-)</option>
                    </select>
                </div>

                {{-- Jenis Komponen --}}
                <div class="form-group-custom">
                    <label>Jenis Komponen Darah</label>

                    <select class="form-control-custom">
                        <option selected disabled></option>
                        <option>Whole Blood</option>
                        <option>Plasma</option>
                        <option>Trombosit</option>
                    </select>
                </div>

                {{-- Tanggal --}}
                <div class="form-group-custom">
                    <label>Tanggal Kadaluarsa</label>

                    <input type="date" class="form-control-custom">
                </div>

            </form>

        </div>

    </div>

    {{-- BUTTON --}}
    <div class="button-wrapper">
        <button class="btn-simpan">
            Simpan
        </button>
    </div>

</div>

@endsection