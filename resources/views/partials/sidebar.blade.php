<div class="w-64 min-h-screen bg-gradient-to-b from-[#0f4d4d] to-[#46b4b0] text-white rounded-r-[30px] px-4 py-6">

    {{-- LOGO --}}
    <div class="flex items-center gap-3 mb-12 px-2">

        <img src="/logo.png" class="w-10 h-10">

        <h1 class="text-2xl font-bold tracking-wide">
            HEMOTRACK
        </h1>

    </div>

    {{-- MENU --}}
    <ul class="space-y-2">

        {{-- BERANDA --}}
        <li>

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('dashboard')
                    ? 'bg-white text-[#0f5c5c] font-semibold shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                {{-- ICON --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m0-8H5m7 0h7"/>
                </svg>

                <span>Beranda</span>

            </a>

        </li>

        {{-- INPUT DATA --}}
        <li class="mt-4">

            <div class="flex items-center gap-4 px-4 py-3 text-white font-medium">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>

                <span>Input data Pendonor</span>

            </div>

            {{-- SUB MENU --}}
            <div class="ml-12 mt-2 space-y-2 text-sm">

                <a href="#"
                   class="block hover:text-gray-200 transition">
                    › PMI
                </a>

                <a href="#"
                   class="block hover:text-gray-200 transition">
                    › Unit Bank Darah
                </a>

            </div>

        </li>

        {{-- STOK --}}
        <li class="mt-4">

            <a href="{{ route('stok') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('stok')
                    ? 'bg-white text-[#0f5c5c] font-semibold shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 3v10m0 0a4 4 0 100 8 4 4 0 000-8z"/>
                </svg>

                <span>Stok Darah</span>

            </a>

        </li>

        {{-- PERMINTAAN --}}
        <li>

            <a href="{{ route('permintaan') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('permintaan')
                    ? 'bg-white text-[#0f5c5c] font-semibold shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 10h8m-8 4h6m2 5H6a2 2 0 01-2-2V7
                             a2 2 0 012-2h3.586a1 1 0 00.707-.293
                             l1.414-1.414A1 1 0 0112.414 3H18
                             a2 2 0 012 2v12a2 2 0 01-2 2z"/>
                </svg>

                <span>Permintaan Darah</span>

            </a>

        </li>

        {{-- LAPORAN --}}
        <li>

            <a href="{{ route('laporan') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('laporan')
                    ? 'bg-white text-[#0f5c5c] font-semibold shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 17v-6h13M9 5v6h13M5 5h.01M5 12h.01M5 19h.01"/>
                </svg>

                <span>Cetak laporan</span>

            </a>

        </li>

        {{-- LOGOUT --}}
        <li class="mt-6">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="flex items-center gap-4 px-4 py-4 w-full hover:bg-red-500/30 rounded-l-full transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                    </svg>

                    <span>Log Out</span>

                </button>

            </form>

        </li>

    </ul>

</div>