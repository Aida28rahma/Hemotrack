<div class="w-64 bg-gradient-to-b from-[#1c6b67] to-[#3aa39c] text-white p-5 rounded-r-3xl">

    <div class="flex items-center gap-3 mb-10">
        <img src="/logo.png" class="w-10">
        <h1 class="font-semibold">HEMOTRACK</h1>
    </div>

    <ul class="space-y-3">

        <li class="flex items-center gap-3 p-2 rounded-lg">
            <a href="{{ route('dashboard') }}"
            class="block w-full p-2 rounded 
            {{ request()->routeIs('dashboard') ? 'bg-white/20' : 'hover:bg-white/10' }}">
                🏠 Beranda
            </a>
        </li>

        <li class="flex items-center gap-3 p-2 rounded-lg">
            <a href="{{ route('stok') }}"
            class="block w-full p-2 rounded 
            {{ request()->routeIs('stok') ? 'bg-white/20' : 'hover:bg-white/10' }}">
                🩸 Stok Darah
            </a>
        </li>

         <li class="flex items-center gap-3 p-2 rounded-lg">
            <a href="{{ route('permintaan') }}"
            class="block w-full p-2 rounded 
            {{ request()->routeIs('permintaan') ? 'bg-white/20' : 'hover:bg-white/10' }}">
                📩 Permintaan
            </a>
        </li>

        <li class="flex items-center gap-3 p-2 rounded-lg">
            <a href="{{ route('distribusi') }}"
            class="block w-full p-2 rounded 
            {{ request()->routeIs('distribusi') ? 'bg-white/20' : 'hover:bg-white/10' }}">
               🚑 Distribusi
            </a>
        </li>

        <li class="flex items-center gap-3 p-2 rounded-lg">
            <a href="{{ route('asalDarah') }}"
            class="block w-full p-2 rounded 
            {{ request()->routeIs('asalDarah') ? 'bg-white/20' : 'hover:bg-white/10' }}">
              📥 Input Data
            </a>
        </li>

        <li class="flex items-center gap-3 p-2 rounded-lg">
            <a href="{{ route('laporan') }}"
            class="block w-full p-2 rounded 
            {{ request()->routeIs('laporan') ? 'bg-white/20' : 'hover:bg-white/10' }}">
              📄 Laporan
            </a>
        </li>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full text-left p-2 rounded hover:bg-red-500">
                ↩️ Logout
            </button>
        </form>

    </ul>
</div>