<aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-teal-800 text-white transform transition-transform duration-300 ease-in-out lg:translate-x-0 lg:z-10 flex flex-col"
>
    <!-- Sidebar Header -->
    <div class="flex items-center justify-between px-5 py-5 border-b border-teal-700">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
            <span class="text-xl font-bold tracking-wide">HEMOTRACK</span>
        </a>
        <!-- Close button (mobile only) -->
        <button @click="sidebarOpen = false" class="lg:hidden text-teal-300 hover:text-white focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- User Info -->
    @auth
    <div class="px-5 py-4 border-b border-teal-700">
        <div class="flex items-center space-x-3">
            <div class="w-9 h-9 rounded-full bg-teal-600 flex items-center justify-center text-sm font-bold">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
            <div class="min-w-0">
                <p class="text-sm font-medium truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-teal-300 truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
    @endauth

    <!-- Navigation Links -->
    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
        <a href="{{ route('dashboard') }}"
           class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors duration-150
                  {{ request()->routeIs('dashboard') ? 'bg-teal-700 text-white' : 'text-teal-100 hover:bg-teal-700 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Beranda
        </a>

        <a href="#"
           class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-teal-100 hover:bg-teal-700 hover:text-white transition-colors duration-150">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
            </svg>
            Stok Darah
        </a>

        <a href="#"
           class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-teal-100 hover:bg-teal-700 hover:text-white transition-colors duration-150">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            Permintaan Darah
        </a>

        <a href="#"
           class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-teal-100 hover:bg-teal-700 hover:text-white transition-colors duration-150">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
            </svg>
            Distribusi Darah
        </a>

        <a href="#"
           class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-teal-100 hover:bg-teal-700 hover:text-white transition-colors duration-150">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Input Data
        </a>

        <a href="#"
           class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-teal-100 hover:bg-teal-700 hover:text-white transition-colors duration-150">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
            </svg>
            Cetak Laporan
        </a>
    </nav>

    <!-- Sidebar Footer -->
    <div class="px-3 py-4 border-t border-teal-700">
        <a href="{{ route('profile.edit') }}"
           class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-teal-100 hover:bg-teal-700 hover:text-white transition-colors duration-150">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            Profil
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); this.closest('form').submit();"
               class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-teal-100 hover:bg-red-600 hover:text-white transition-colors duration-150">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Log Out
            </a>
        </form>
    </div>
</aside>
