<<<<<<< Updated upstream
<div class="w-64 min-h-[calc(100vh-86px)] bg-gradient-to-b from-[#0f4d4d] to-[#43b3b0] rounded-br-[28px] px-4 py-8 text-white shrink-0">

    {{-- MENU PETUGAS --}}
    @if(auth()->user()->role == 'petugas')
        <ul class="space-y-3">

            {{-- BERANDA --}}
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition
                   {{ request()->routeIs('dashboard') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                    <span>Beranda</span>
=======
<div class="w-64 min-h-screen bg-gradient-to-b from-[#0f4d4d] to-[#46b4b0] rounded-r-[35px] px-4 py-6">

    {{-- LOGO --}}
    <div class="flex items-center gap-3 px-3 mb-12">

        <img src="/logo.png" class="w-10 h-10">

        <h1 class="text-2xl font-bold text-white tracking-wide">
            HEMOTRACK
        </h1>

    </div>

    {{-- MENU --}}
    <ul class="space-y-2">

        {{-- BERANDA --}}
        <li>

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('dashboard')
                    ? 'bg-white text-[#0f5c5c] shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                {{-- ICON HOME --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 fill-current"
                     viewBox="0 0 24 24">

                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>

                </svg>

                <span class="font-bold text-[17px]">
                    Beranda
                </span>

            </a>

        </li>

        {{-- INPUT DATA PENDONOR --}}
        <li x-data="{ open: false }" class="mt-4">

            <button
                @click="open = !open"
                class="flex items-center justify-between w-full px-5 py-4 rounded-l-full transition-all duration-200

                {{ request()->routeIs('asalDarah')
                    ? 'bg-white text-[#0f5c5c] shadow-md'
                    : 'hover:bg-white/10 text-white'
                }}">

                <div class="flex items-center gap-4">

                    {{-- ICON PLUS --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 fill-current"
                         viewBox="0 0 24 24">

                        <path d="M19 11H13V5h-2v6H5v2h6v6h2v-6h6z"/>

                    </svg>

                    <span class="font-bold text-[17px]">
                        Input Data Pendonor
                    </span>

                </div>

                {{-- ARROW --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 transition-transform duration-300"
                     :class="{ 'rotate-180': open }"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="m19 9-7 7-7-7"/>

                </svg>

            </button>

            {{-- SUB MENU --}}
            <div x-show="open"
                 x-transition
                 class="ml-14 mt-3 space-y-3">

                <a href="{{ route('pmi') }}"
                    class="block px-4 py-2 rounded-l-full font-bold transition
                    {{ request()->routeIs('pmi') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
                        › PMI
>>>>>>> Stashed changes
                </a>
            </li>

<<<<<<< Updated upstream
            {{-- INPUT DATA PENDONOR --}}
            <li x-data="{ open: {{ request()->routeIs('pmi') || request()->routeIs('unitBankDarah') ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-l-full font-bold transition
                        {{ request()->routeIs('pmi') || request()->routeIs('unitBankDarah') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">

                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M6 2h12a2 2 0 012 2v16a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2zm3 5h6v2H9V7zm0 4h6v2H9v-2zm0 4h4v2H9v-2z"/>
                        </svg>

                        <span class="text-left leading-tight">
                            Input data Pendonor
                        </span>
                    </div>

                    <svg class="w-4 h-4 transition-transform duration-200"
                         :class="{ 'rotate-90': open }"
                         viewBox="0 0 24 24"
                         fill="currentColor">
                        <path d="M9 18l6-6-6-6v12z"/>
                    </svg>
                </button>

                <div x-show="open" x-transition class="ml-12 mt-3 space-y-2">
                    <a href="{{ route('pmi') }}"
                       class="block px-3 py-2 rounded-l-full font-bold transition
                       {{ request()->routeIs('pmi') ? 'bg-white/30 text-white' : 'text-white hover:bg-white/10' }}">
                        › PMI
                    </a>

                    <a href="{{ route('unitBankDarah') }}"
                       class="block px-3 py-2 rounded-l-full font-bold transition
                       {{ request()->routeIs('unitBankDarah') ? 'bg-white/30 text-white' : 'text-white hover:bg-white/10' }}">
                        › Unit Bank Darah
                    </a>
                </div>
            </li>

            {{-- STOK DARAH --}}
            <li>
                <a href="{{ route('stok') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition
                   {{ request()->routeIs('stok') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2S5 10 5 15a7 7 0 0014 0c0-5-7-13-7-13z"/>
                    </svg>
                    <span>Stok Darah</span>
=======
                <a href="{{ route('unitBankDarah') }}"
                    class="block px-4 py-2 rounded-l-full font-bold transition
                    {{ request()->routeIs('unitBankDarah') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
                        › Unit Bank Darah
>>>>>>> Stashed changes
                </a>
            </li>

            {{-- PERMINTAAN DARAH --}}
            <li>
                <a href="{{ route('permintaan') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition
                   {{ request()->routeIs('permintaan') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5z"/>
                    </svg>
                    <span>Permintaan Darah</span>
                </a>
            </li>

            {{-- CETAK LAPORAN --}}
            <li>
                <a href="{{ route('laporan') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition
                   {{ request()->routeIs('laporan') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M5 4h14v16H5V4zm3 3v2h8V7H8zm0 4v2h8v-2H8zm0 4v2h5v-2H8z"/>
                    </svg>
                    <span>Cetak laporan</span>
                </a>
            </li>

<<<<<<< Updated upstream
        </ul>
    @endif


    {{-- MENU DOKTER --}}
    @if(auth()->user()->role == 'dokter')
        <ul class="space-y-3">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200
                   {{ request()->routeIs('dashboardDokter') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                    <span class="font-bold">Beranda</span>
                </a>
            </li>

            <li>
                <a href="{{ route('permintaanDokter') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200
                   {{ request()->routeIs('permintaanDokter') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5z"/>
                    </svg>
                    <span class="font-bold">Permintaan Darah</span>
                </a>
            </li>

            <li>
                <a href="{{ route('statusDokter') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200
                   {{ request()->routeIs('statusDokter') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2a7 7 0 00-7 7v4.6L3.3 16.3A1 1 0 004 18h16a1 1 0 00.7-1.7L19 13.6V9a7 7 0 00-7-7zm0 20a3 3 0 003-3H9a3 3 0 003 3z"/>
                    </svg>
                    <span class="font-bold">Status Permintaan</span>
                </a>
            </li>
=======
        {{-- STOK DARAH --}}
        <li class="mt-4">

            <a href="{{ route('stok') }}"
               class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('stok')
                    ? 'bg-white text-[#0f5c5c] shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                {{-- ICON BLOOD --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 fill-current"
                     viewBox="0 0 24 24">

                    <path d="M12 2C12 2 5 10 5 15a7 7 0 0014 0c0-5-7-13-7-13z"/>

                </svg>

                <span class="font-bold text-[17px]">
                    Stok Darah
                </span>
>>>>>>> Stashed changes

            <li>
                <a href="{{ route('stok') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200
                   {{ request()->routeIs('Petugas.stok') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2S5 10 5 15a7 7 0 0014 0c0-5-7-13-7-13z"/>
                    </svg>
                    <span class="font-bold">Stok Darah</span>
                </a>
            </li>

        </ul>
    @endif

<<<<<<< Updated upstream

    {{-- LOGOUT --}}
    <ul class="space-y-3 mt-3">
        <li>
=======
        {{-- PERMINTAAN DARAH --}}
        <li>

            <a href="{{ route('permintaan') }}"
               class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('permintaan')
                    ? 'bg-white text-[#0f5c5c] shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                {{-- ICON MAIL --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 fill-current"
                     viewBox="0 0 24 24">

                    <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5z"/>

                </svg>

                <span class="font-bold text-[17px]">
                    Permintaan Darah
                </span>

            </a>

        </li>

        {{-- DISTRIBUSI --}}
        <li>

            <a href="{{ route('distribusi') }}"
               class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('distribusi')
                    ? 'bg-white text-[#0f5c5c] shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                {{-- ICON TRUCK --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 fill-current"
                     viewBox="0 0 24 24">

                    <path d="M20 8h-3V4H3v13h2a3 3 0 006 0h4a3 3 0 006 0h1v-5l-2-4zM8 19a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm10 0a1.5 1.5 0 110-3 1.5 1.5 0 010 3zm-1-7V9h2l1.5 3H17z"/>

                </svg>

                <span class="font-bold text-[17px]">
                    Distribusi
                </span>

            </a>

        </li>

        {{-- CETAK LAPORAN --}}
        <li>

            <a href="{{ route('laporan') }}"
               class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('laporan')
                    ? 'bg-white text-[#0f5c5c] shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                {{-- ICON DOCUMENT --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 fill-current"
                     viewBox="0 0 24 24">

                    <path d="M6 2h9l5 5v15a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2z"/>

                </svg>

                <span class="font-bold text-[17px]">
                    Cetak Laporan
                </span>

            </a>

        </li>

        {{-- LOGOUT --}}
        <li class="mt-8">

>>>>>>> Stashed changes
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
<<<<<<< Updated upstream
                        class="w-full flex items-center gap-4 px-4 py-3 rounded-l-full font-bold text-white hover:bg-white/10 transition">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M10 17l5-5-5-5v10zM4 3h8v2H6v14h6v2H4V3z"/>
                    </svg>
                    <span>Log Out</span>
=======
                        class="flex items-center gap-4 px-5 py-4 w-full rounded-l-full
                        hover:bg-red-500/30 transition-all duration-200 text-white">

                    {{-- ICON LOGOUT --}}
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 fill-current"
                         viewBox="0 0 24 24">

                        <path d="M10 17l5-5-5-5v10zm-6 4h12v-2H4V5h12V3H4a2 2 0 00-2 2v14a2 2 0 002 2z"/>

                    </svg>

                    <span class="font-bold text-[17px]">
                        Log Out
                    </span>

>>>>>>> Stashed changes
                </button>
            </form>
        </li>
    </ul>

</div>