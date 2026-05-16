<div class="w-64 min-h-[calc(100vh-86px)] bg-gradient-to-b from-[#0f4d4d] to-[#43b3b0] rounded-br-[28px] px-4 py-8 text-white shrink-0">

    {{-- MENU DOKTER --}}
    @if(auth()->user()->role == 'dokter')

        <ul class="space-y-4">

            {{-- BERANDA --}}
            <li class="-mr-4">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-4 px-5 py-4 font-bold transition-all duration-200
                   {{ request()->routeIs('dashboard') || request()->is('dashboard')
                        ? 'bg-white text-[#0f5c5c] rounded-l-full shadow-md'
                        : 'text-white hover:bg-white/10 rounded-l-full'
                   }}">

                    <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                        <path d="M3 11.5 12 4l9 7.5V21a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1v-9.5z"/>
                    </svg>

                    <span>Beranda</span>
                </a>
            </li>


            {{-- PERMINTAAN DARAH --}}
            <li class="-mr-4">
                <a href="{{ route('permintaanDokter') }}"
                   class="flex items-center gap-4 px-5 py-4 font-bold transition-all duration-200
                   {{ request()->routeIs('permintaanDokter')
                        ? 'bg-white text-[#0f5c5c] rounded-l-full shadow-md'
                        : 'text-white hover:bg-white/10 rounded-l-full'
                   }}">

                    <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                        <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5z"/>
                    </svg>

                    <span class="leading-tight">
                        Permintaan<br>Darah
                    </span>
                </a>
            </li>


            {{-- STATUS PERMINTAAN --}}
            <li class="-mr-4">
                <a href="{{ route('statusDokter') }}"
                   class="flex items-center gap-4 px-5 py-4 font-bold transition-all duration-200
                   {{ request()->routeIs('statusDokter')
                        ? 'bg-white text-[#0f5c5c] rounded-l-full shadow-md'
                        : 'text-white hover:bg-white/10 rounded-l-full'
                   }}">

                    <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                        <path d="M12 2a7 7 0 00-7 7v4.6L3.3 16.3A1 1 0 004 18h16a1 1 0 00.7-1.7L19 13.6V9a7 7 0 00-7-7zm0 20a3 3 0 003-3H9a3 3 0 003 3z"/>
                    </svg>

                    <span class="leading-tight">
                        Status<br>Permintaan
                    </span>
                </a>
            </li>


            {{-- STOK DARAH --}}
            <li class="-mr-4">
                <a href="{{ route('stokDokter') }}"
                   class="flex items-center gap-4 px-5 py-4 font-bold transition-all duration-200
                   {{ request()->routeIs('stokDokter')
                        ? 'bg-white text-[#0f5c5c] rounded-l-full shadow-md'
                        : 'text-white hover:bg-white/10 rounded-l-full'
                   }}">

                    <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                        <path d="M12 2S6 9.2 6 14a6 6 0 0012 0C18 9.2 12 2 12 2Zm0 17a4 4 0 01-4-4c0-2.5 2.5-6.4 4-8.5 1.5 2.1 4 6 4 8.5a4 4 0 01-4 4Z"/>
                    </svg>

                    <span>Stok Darah</span>
                </a>
            </li>


            {{-- LOG OUT --}}
            <li class="-mr-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="w-full flex items-center gap-4 px-5 py-4 rounded-l-full font-bold text-white hover:bg-white/10 transition-all duration-200">

                        <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                            <path d="M10 17l5-5-5-5v10zM4 3h8v2H6v14h6v2H4V3z"/>
                        </svg>

                        <span>Log Out</span>
                    </button>
                </form>
            </li>

        </ul>

    @endif


    {{-- MENU PETUGAS --}}
    @if(auth()->user()->role == 'petugas')

        <ul class="space-y-3">

            {{-- BERANDA --}}
            <li class="-mr-4">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-l-full font-bold transition
                   {{ request()->routeIs('dashboard')
                        ? 'bg-white text-[#0f5c5c] shadow-md'
                        : 'text-white hover:bg-white/10'
                   }}">

                    <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                        <path d="M3 11.5 12 4l9 7.5V21a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1v-9.5z"/>
                    </svg>

                    <span>Beranda</span>
                </a>
            </li>


            {{-- INPUT DATA PENDONOR --}}
            <li x-data="{ open: {{ request()->routeIs('pmi') || request()->routeIs('unitBankDarah') || request()->routeIs('unitBankDarah.darah') ? 'true' : 'false' }} }" class="-mr-4">

                <button type="button"
                        @click="open = !open"
                        class="w-full flex items-center justify-between px-5 py-4 rounded-l-full font-bold transition
                        {{ request()->routeIs('pmi') || request()->routeIs('unitBankDarah') || request()->routeIs('unitBankDarah.darah')
                            ? 'bg-white text-[#0f5c5c] shadow-md'
                            : 'text-white hover:bg-white/10'
                        }}">

                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                            <path d="M6 2h12a2 2 0 012 2v16a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2zm3 5h6v2H9V7zm0 4h6v2H9v-2zm0 4h4v2H9v-2z"/>
                        </svg>

                        <span class="text-left leading-tight">
                            Input data<br>Pendonor
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
                       {{ request()->routeIs('unitBankDarah') || request()->routeIs('unitBankDarah.darah') ? 'bg-white/30 text-white' : 'text-white hover:bg-white/10' }}">
                        › Unit Bank Darah
                    </a>
                </div>
            </li>


            {{-- STOK DARAH --}}
            <li class="-mr-4">
                <a href="{{ route('stok') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-l-full font-bold transition
                   {{ request()->routeIs('stok') ? 'bg-white text-[#0f5c5c] shadow-md' : 'text-white hover:bg-white/10' }}">

                    <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                        <path d="M12 2S6 9.2 6 14a6 6 0 0012 0C18 9.2 12 2 12 2Zm0 17a4 4 0 01-4-4c0-2.5 2.5-6.4 4-8.5 1.5 2.1 4 6 4 8.5a4 4 0 01-4 4Z"/>
                    </svg>

                    <span>Stok Darah</span>
                </a>
            </li>


            {{-- PERMINTAAN DARAH --}}
            <li class="-mr-4">
                <a href="{{ route('permintaan') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-l-full font-bold transition
                   {{ request()->routeIs('permintaan') ? 'bg-white text-[#0f5c5c] shadow-md' : 'text-white hover:bg-white/10' }}">

                    <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                        <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5z"/>
                    </svg>

                    <span>Permintaan Darah</span>
                </a>
            </li>


            {{-- CETAK LAPORAN --}}
            <li class="-mr-4">
                <a href="{{ route('laporan') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-l-full font-bold transition
                   {{ request()->routeIs('laporan') ? 'bg-white text-[#0f5c5c] shadow-md' : 'text-white hover:bg-white/10' }}">

                    <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                        <path d="M5 4h14v16H5V4zm3 3v2h8V7H8zm0 4v2h8v-2H8zm0 4v2h5v-2H8z"/>
                    </svg>

                    <span>Cetak laporan</span>
                </a>
            </li>


            {{-- LOG OUT --}}
            <li class="-mr-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="w-full flex items-center gap-4 px-5 py-4 rounded-l-full font-bold text-white hover:bg-white/10 transition">

                        <svg class="w-5 h-5 fill-current shrink-0" viewBox="0 0 24 24">
                            <path d="M10 17l5-5-5-5v10zM4 3h8v2H6v14h6v2H4V3z"/>
                        </svg>

                        <span>Log Out</span>
                    </button>
                </form>
            </li>

        </ul>

    @endif

</div>