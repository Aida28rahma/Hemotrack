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

                {{-- ICON --}}
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 fill-current"
                     viewBox="0 0 24 24">

                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>

                </svg>

                <span class="font-bold text-[17px]">
                    Beranda
                </span>

            </a>

        </li>

        {{-- INPUT DATA --}}
        <li class="mt-4">

            <div class="flex items-center gap-4 px-5 py-3 text-white">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 fill-current"
                     viewBox="0 0 24 24">

                    <path d="M19 11H13V5h-2v6H5v2h6v6h2v-6h6z"/>

                </svg>

                <span class="font-bold text-[17px]">
                    Input data Pendonor
                </span>

            </div>

            {{-- SUB MENU --}}
            <div class="ml-14 mt-2 space-y-3 text-white">

                <a href="#"
                   class="block hover:text-gray-200 transition font-semibold">

                    › PMI

                </a>

                <a href="#"
                   class="block hover:text-gray-200 transition font-semibold">

                    › Unit Bank Darah

                </a>

            </div>

        </li>

        {{-- STOK DARAH --}}
        <li class="mt-4">

            <a href="{{ route('stok') }}"
               class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('stok')
                    ? 'bg-white text-[#0f5c5c] shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 fill-current"
                     viewBox="0 0 24 24">

                    <path d="M12 2C12 2 5 10 5 15a7 7 0 0014 0c0-5-7-13-7-13z"/>

                </svg>

                <span class="font-bold text-[17px]">
                    Stok Darah
                </span>

            </a>

        </li>

        {{-- PERMINTAAN DARAH --}}
        <li>

            <a href="{{ route('permintaan') }}"
               class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200

               {{ request()->routeIs('permintaan')
                    ? 'bg-white text-[#0f5c5c] shadow-md'
                    : 'hover:bg-white/10 text-white'
               }}">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 fill-current"
                     viewBox="0 0 24 24">

                    <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 4l-8 5-8-5V6l8 5 8-5z"/>

                </svg>

                <span class="font-bold text-[17px]">
                    Permintaan Darah
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

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 fill-current"
                     viewBox="0 0 24 24">

                    <path d="M6 2h9l5 5v15a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2z"/>

                </svg>

                <span class="font-bold text-[17px]">
                    Cetak laporan
                </span>

            </a>

        </li>

        {{-- LOGOUT --}}
        <li class="mt-8">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                        class="flex items-center gap-4 px-5 py-4 w-full rounded-l-full
                        hover:bg-red-500/30 transition-all duration-200 text-white">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 fill-current"
                         viewBox="0 0 24 24">

                        <path d="M10 17l5-5-5-5v10zm-6 4h12v-2H4V5h12V3H4a2 2 0 00-2 2v14a2 2 0 002 2z"/>

                    </svg>

                    <span class="font-bold text-[17px]">
                        Log Out
                    </span>

                </button>

            </form>

        </li>

    </ul>

</div>