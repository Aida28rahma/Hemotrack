@extends('layouts.app')

@section('content')

<div class="p-6">
    <div class="bg-white rounded-xl shadow p-6 max-w-xl mx-auto">

        <h1 class="text-2xl font-bold text-teal-700 mb-4">
            Data Darah
        </h1>

        <p><b>Golongan:</b> {{ $darah->golongan }}</p>
        <p><b>Rhesus:</b> {{ $darah->rhesus }}</p>
        <p><b>Jenis Komponen:</b> {{ $darah->jenis_komponen }}</p>
        <p><b>Tanggal Kedaluwarsa:</b> {{ $darah->tanggal_kedaluwarsa }}</p>
        <p><b>Asal Darah:</b> {{ $darah->asal_darah }}</p>
        <p><b>Status:</b> {{ $darah->status }}</p>

    </div>
</div>

@endsection