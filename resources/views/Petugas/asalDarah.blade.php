@extends('layouts.app')

@section('title', 'Asal Darah')

@section('content')

<div class="content-wrapper">

    {{-- HEADER --}}
    <div class="page-header">
        <h2 class="page-title">
            Input Data
        </h2>

        <p class="page-subtitle">
            Pilih asal kantung darah
        </p>
    </div>

    {{-- CARD --}}
    <div class="asal-card">

        <div class="button-container">

            {{-- BUTTON PMI --}}
            <a href="{{ route('inputDarah') }}" class="btn-asal">
                PMI
            </a>

            {{-- BUTTON UBD --}}
            <a href="{{ route('inputPendonor') }}" class="btn-asal">
                Unit Bank Darah RS
            </a>

        </div>

    </div>

</div>

@endsection