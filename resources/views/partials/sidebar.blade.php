<div class="w-64 min-h-[calc(100vh-86px)] bg-gradient-to-b from-[#0f4d4d] to-[#43b3b0] rounded-br-[28px] px-4 py-8 text-white shrink-0">

    {{-- MENU PETUGAS --}}
    @if(auth()->user()->role == 'petugas')
        <ul class="space-y-3">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition-all duration-300 ease-in-out
                   {{ request()->routeIs('dashboard') ? 'bg-[#f3f4f6] text-[#0f5c5c] w-[calc(100%+16px)] -mr-4' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                    <span>Beranda</span>
                </a>
            </li>

            <li x-data="{ open: {{ request()->routeIs('pmi') || request()->routeIs('unitBankDarah') ? 'true' : 'false' }} }">

                <button type="button"
                        @click="open = !open"
                        class="w-full flex items-center justify-between px-4 py-3 rounded-l-full font-bold transition-all duration-300 ease-in-out
                        {{ request()->routeIs('pmi') || request()->routeIs('unitBankDarah') ? 'bg-[#f3f4f6] text-[#0f5c5c] w-[calc(100%+16px)] -mr-4' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">

                    <div class="flex items-center gap-4">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                            <path d="M6 2h12a2 2 0 012 2v16a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2zm3 5h6v2H9V7zm0 4h6v2H9v-2zm0 4h4v2H9v-2z"/>
                        </svg>

                        <span class="text-left leading-tight">
                            Input data Pendonor
                        </span>
                    </div>

                    <svg class="w-4 h-4 transition-transform duration-300"
                         :class="{ 'rotate-90': open }"
                         viewBox="0 0 24 24"
                         fill="currentColor">
                        <path d="M9 18l6-6-6-6v12z"/>
                    </svg>
                </button>

                <div x-show="open" x-transition class="ml-12 mt-3 space-y-2">
                    <a href="{{ route('pmi') }}"
                       class="block px-3 py-2 rounded-l-full font-bold transition-all duration-300 ease-in-out
                       {{ request()->routeIs('pmi') ? 'bg-white/30 text-white' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">
                        › PMI
                    </a>

                    <a href="{{ route('unitBankDarah') }}"
                       class="block px-3 py-2 rounded-l-full font-bold transition-all duration-300 ease-in-out
                       {{ request()->routeIs('unitBankDarah') ? 'bg-white/30 text-white' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">
                        › Unit Bank Darah
                    </a>
                </div>
            </li>

            <li>
                <a href="{{ route('stok') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition-all duration-300 ease-in-out
                   {{ request()->routeIs('stok') ? 'bg-[#f3f4f6] text-[#0f5c5c] w-[calc(100%+16px)] -mr-4' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2S5 10 5 15a7 7 0 0014 0c0-5-7-13-7-13z"/>
                    </svg>
                    <span>Stok Darah</span>
                </a>
            </li>

            <li>
                <a href="{{ route('permintaan') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition-all duration-300 ease-in-out
                   {{ request()->routeIs('permintaan') ? 'bg-[#f3f4f6] text-[#0f5c5c] w-[calc(100%+16px)] -mr-4' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5z"/>
                    </svg>
                    <span>Permintaan Darah</span>
                </a>
            </li>

            <li>
                <a href="{{ route('laporan') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition-all duration-300 ease-in-out
                   {{ request()->routeIs('laporan') ? 'bg-[#f3f4f6] text-[#0f5c5c] w-[calc(100%+16px)] -mr-4' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M5 4h14v16H5V4zm3 3v2h8V7H8zm0 4v2h8v-2H8zm0 4v2h5v-2H8z"/>
                    </svg>
                    <span>Cetak laporan</span>
                </a>
            </li>

        </ul>
    @endif


    {{-- MENU DOKTER --}}
    @if(auth()->user()->role == 'dokter')

        @php
            $isBeranda = request()->is('dashboard');
            $isPermintaan = request()->is('permintaanDokter');
            $isStatus = request()->is('status-dokter');
            $isStok = request()->is('stok');
        @endphp

        <ul class="space-y-3">

            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition-all duration-300 ease-in-out
                   {{ $isBeranda ? 'bg-[#f3f4f6] text-[#0f5c5c] w-[calc(100%+16px)] -mr-4' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                    </svg>
                    <span>Beranda</span>
                </a>
            </li>

            <li>
                <a href="{{ route('permintaanDokter') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition-all duration-300 ease-in-out
                   {{ $isPermintaan ? 'bg-[#f3f4f6] text-[#0f5c5c] w-[calc(100%+16px)] -mr-4' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5z"/>
                    </svg>
                    <span>Permintaan Darah</span>
                </a>
            </li>

            <li>
                <a href="{{ route('statusDokter') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition-all duration-300 ease-in-out
                   {{ $isStatus ? 'bg-[#f3f4f6] text-[#0f5c5c] w-[calc(100%+16px)] -mr-4' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2a7 7 0 00-7 7v4.6L3.3 16.3A1 1 0 004 18h16a1 1 0 00.7-1.7L19 13.6V9a7 7 0 00-7-7zm0 20a3 3 0 003-3H9a3 3 0 003 3z"/>
                    </svg>
                    <span>Status Permintaan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('stok') }}"
                   class="flex items-center gap-4 px-4 py-3 rounded-l-full font-bold transition-all duration-300 ease-in-out
                   {{ $isStok ? 'bg-[#f3f4f6] text-[#0f5c5c] w-[calc(100%+16px)] -mr-4' : 'text-white hover:bg-white/10 hover:translate-x-1' }}">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12 2S5 10 5 15a7 7 0 0014 0c0-5-7-13-7-13z"/>
                    </svg>
                    <span>Stok Darah</span>
                </a>
            </li>

        </ul>

    @endif


    {{-- LOGOUT --}}
    <ul class="space-y-3 mt-3">
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="w-full flex items-center gap-4 px-4 py-3 rounded-l-full font-bold text-white hover:bg-white/10 hover:translate-x-1 transition-all duration-300 ease-in-out">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M10 17l5-5-5-5v10zM4 3h8v2H6v14h6v2H4V3z"/>
                    </svg>
                    <span>Log Out</span>
                </button>
            </form>
        </li>
    </ul>

</div>