@extends('layouts.app')

@section('content')

<main class="flex-1 p-6">

    <h1 class="mb-6 text-2xl font-bold text-gray-800">
        Edit Data Stok Darah
    </h1>

    <div class="rounded-2xl bg-white p-6 shadow-md">

        <form action="{{ route('stok.update', $data->id) }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2">

                {{-- GOLONGAN --}}
                <div>

                    <label class="mb-2 block font-semibold">
                        Golongan Darah
                    </label>

                    <select
                        name="golongan"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none focus:ring-2 focus:ring-teal-500"
                    >

                        <option value="A" {{ $data->golongan == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $data->golongan == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ $data->golongan == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O" {{ $data->golongan == 'O' ? 'selected' : '' }}>O</option>

                    </select>

                </div>


                {{-- RHESUS --}}
                <div>

                    <label class="mb-2 block font-semibold">
                        Rhesus
                    </label>

                    <select
                        name="rhesus"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none focus:ring-2 focus:ring-teal-500"
                    >

                        <option value="+" {{ $data->rhesus == '+' ? 'selected' : '' }}>
                            Positif (+)
                        </option>

                        <option value="-" {{ $data->rhesus == '-' ? 'selected' : '' }}>
                            Negatif (-)
                        </option>

                    </select>

                </div>


                {{-- JENIS KOMPONEN --}}
                <div>

                    <label class="mb-2 block font-semibold">
                        Jenis Komponen
                    </label>

                    <select
                        name="jenis_komponen"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none focus:ring-2 focus:ring-teal-500"
                    >

                        <option value="Whole Blood" {{ $data->jenis_komponen == 'Whole Blood' ? 'selected' : '' }}>
                            Whole Blood
                        </option>

                        <option value="PRC" {{ $data->jenis_komponen == 'PRC' ? 'selected' : '' }}>
                            PRC
                        </option>

                        <option value="Trombosit" {{ $data->jenis_komponen == 'Trombosit' ? 'selected' : '' }}>
                            Trombosit
                        </option>

                        <option value="FFP" {{ $data->jenis_komponen == 'FFP' ? 'selected' : '' }}>
                            FFP
                        </option>

                    </select>

                </div>


                {{-- TANGGAL --}}
                <div>

                    <label class="mb-2 block font-semibold">
                        Tanggal Kadaluarsa
                    </label>

                    <input
                        type="date"
                        name="tanggal_kedaluwarsa"
                        value="{{ $data->tanggal_kedaluwarsa }}"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none focus:ring-2 focus:ring-teal-500"
                    >

                </div>

            </div>


            {{-- BUTTON --}}
            <div class="mt-6 flex justify-end gap-3">

                <a href="{{ route('stok') }}"
                   class="rounded-lg bg-gray-200 px-5 py-2 font-semibold text-gray-700 hover:bg-gray-300">

                    Batal

                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-teal-700 px-5 py-2 font-semibold text-white hover:bg-teal-800">

                    Update

                </button>

            </div>

        </form>

    </div>

</main>

@endsection