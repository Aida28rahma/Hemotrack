<nav class="h-[86px] w-full bg-[#0f4d4d] rounded-br-[28px]
flex items-center justify-between px-10 shadow-sm">

    {{-- LOGO --}}
    <div class="flex items-center gap-3">

        <img src="/logo.png"
             alt="Hemotrack Logo"
             class="w-10 h-10">

        <h1 class="text-white font-bold text-xl tracking-wide">
            HEMOTRACK
        </h1>

    </div>


    {{-- PROFILE DROPDOWN --}}
    <div class="relative group">

        <button class="flex items-center gap-3 text-white">

            <svg class="w-5 h-5"
                 fill="currentColor"
                 viewBox="0 0 24 24">

                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v1h20v-1c0-3.3-6.7-5-10-5z"/>

            </svg>

            <span class="font-semibold">
                Halo {{ auth()->user()->name }}
            </span>

            ▼

        </button>


        {{-- MENU --}}
        <div class="
            absolute
            right-0
            mt-3
            w-52
            bg-white
            rounded-xl
            shadow-lg
            hidden
            group-hover:block
            overflow-hidden
            z-50
        ">

            {{-- PROFILE --}}
            <a href="{{ route('profile.edit') }}"
               class="block px-5 py-3 hover:bg-gray-100">

                Profil Saya

            </a>


            {{-- PASSWORD --}}
            <a href="{{ route('profile.edit') }}"
               class="block px-5 py-3 hover:bg-gray-100">

                Ubah Password

            </a>


            {{-- LOGOUT --}}
            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button
                    class="w-full text-left px-5 py-3 text-red-600 hover:bg-red-50">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>