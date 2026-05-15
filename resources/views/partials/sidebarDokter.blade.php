<ul class="space-y-3">

    <li>
        <a href="{{ route('dashboardDokter') }}"
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

    <li>
        <a href="{{ route('stokDokter') }}"
           class="flex items-center gap-4 px-5 py-4 rounded-l-full transition-all duration-200
           {{ request()->routeIs('stokDokter') ? 'bg-white text-[#0f5c5c]' : 'text-white hover:bg-white/10' }}">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                <path d="M12 2S5 10 5 15a7 7 0 0014 0c0-5-7-13-7-13z"/>
            </svg>
            <span class="font-bold">Stok Darah</span>
        </a>
    </li>

</ul>