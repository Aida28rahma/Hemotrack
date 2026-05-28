<nav class="h-[86px] w-full bg-[#0f4d4d] rounded-br-[28px]
flex items-center justify-between px-10 shadow-sm">

    {{-- LOGO --}}
    <div class="flex items-center gap-3">

        <img
            src="/logo.png"
            alt="Hemotrack Logo"
            class="w-10 h-10"
        >

        <h1 class="text-white font-bold text-xl tracking-wide">
            HEMOTRACK
        </h1>

    </div>


    {{-- PROFILE --}}
    <div class="relative">

        <button
            type="button"
            onclick="
                document
                .getElementById('profileMenu')
                .classList
                .toggle('hidden')
            "
            class="
                flex
                items-center
                gap-2
                text-white
                px-4
                py-2
                rounded-lg
                hover:bg-white/10
                transition
            "
        >

           

            <span>
                Halo {{ auth()->user()->name }}
            </span>

            <span>▼</span>

        </button>


        {{-- DROPDOWN --}}
        <div
            id="profileMenu"
            class="
                hidden
                absolute
                right-0
                mt-3
                w-56
                bg-white
                rounded-2xl
                shadow-xl
                overflow-hidden
                z-50
            "
        >

            {{-- PROFIL --}}
            <a
                href="{{ route('profile.edit') }}"
                class="
                    block
                    px-5
                    py-4
                    hover:bg-gray-100
                "
            >

                Profil Saya

            </a>


            {{-- PASSWORD --}}
            <a
                href="{{ route('profile.edit') }}"
                class="
                    block
                    px-5
                    py-4
                    hover:bg-gray-100
                "
            >

                Ubah Password

            </a>


            {{-- LOGOUT --}}
            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="
                        w-full
                        text-left
                        px-5
                        py-4
                        text-red-600
                        hover:bg-red-50
                    "
                >

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>