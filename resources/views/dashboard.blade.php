<x-app-layout>
    <div class="flex min-h-screen bg-gray-100">

        <!-- Sidebar -->
        <aside class="w-64 bg-teal-800 text-white p-5">
            <h1 class="text-xl font-bold mb-6">HEMOTRACK</h1>

            <nav class="space-y-3">
                <a href="#" class="block hover:bg-teal-700 p-2 rounded">🏠 Beranda</a>
                <a href="#" class="block hover:bg-teal-700 p-2 rounded">🩸 Stok Darah</a>
                <a href="#" class="block hover:bg-teal-700 p-2 rounded">📩 Permintaan Darah</a>
                <a href="#" class="block hover:bg-teal-700 p-2 rounded">🚚 Distribusi Darah</a>
                <a href="#" class="block hover:bg-teal-700 p-2 rounded">📥 Input Data</a>
                <a href="#" class="block hover:bg-teal-700 p-2 rounded">🖨️ Cetak Laporan</a>
                <a href="#" class="block hover:bg-teal-700 p-2 rounded">↩️ Log Out</a>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">

            <!-- Cards -->
            <div class="grid grid-cols-4 gap-4 mb-6">

                @foreach ([
                    ['title' => 'Total Pendonor', 'value' => 110],
                    ['title' => 'Distribusi Hari Ini', 'value' => 20],
                    ['title' => 'Stok darah', 'value' => 80],
                    ['title' => 'Permintaan Darah', 'value' => 14],
                ] as $card)

                    <div class="bg-white p-4 rounded-xl shadow flex justify-between items-center border-l-4 border-teal-600">
                        <div>
                            <p class="text-gray-500">{{ $card['title'] }}</p>
                            <h2 class="text-xl font-bold">{{ $card['value'] }}</h2>
                        </div>
                        <span class="text-red-600 text-2xl">🩸</span>
                    </div>

                @endforeach

            </div>

            <!-- Notifikasi -->
            <div class="bg-white p-4 rounded-xl shadow mb-6 flex justify-between">
                <span class="font-semibold">🔔 Notifikasi Stok</span>
                <span class="text-red-500 font-bold">*Stok O hampir habis</span>
            </div>

            <!-- Grafik + List -->
            <div class="grid grid-cols-2 gap-6">

                <!-- Grafik -->
                <div class="bg-white p-4 rounded-xl shadow">
                    <h2 class="font-bold mb-4">Grafik Stok Darah</h2>

                    <!-- Dummy Bar Chart -->
                    <div class="flex items-end space-x-4 h-40">
                        <div class="bg-red-700 w-8 h-24"></div>
                        <div class="bg-red-700 w-8 h-36"></div>
                        <div class="bg-red-700 w-8 h-28"></div>
                        <div class="bg-red-700 w-8 h-16"></div>
                    </div>

                    <div class="flex justify-around mt-2 text-sm">
                        <span>A</span>
                        <span>B</span>
                        <span>AB</span>
                        <span>O</span>
                    </div>
                </div>

                <!-- Permintaan & Distribusi -->
                <div class="space-y-4">

                    <!-- Permintaan -->
                    <div class="bg-white p-4 rounded-xl shadow">
                        <h2 class="font-bold mb-2">Permintaan</h2>
                        <p>dr. Bayu Bimasena - A+ - 2 Kantong</p>
                        <p class="text-yellow-500">Diproses</p>
                        <hr class="my-2">
                        <p>dr. Budi Utomo - O- - 1 Kantong</p>
                        <p class="text-green-500">Diterima</p>
                    </div>

                    <!-- Distribusi -->
                    <div class="bg-white p-4 rounded-xl shadow">
                        <h2 class="font-bold mb-2">Distribusi</h2>
                        <p>dr. Fajri Alfahri - B+ - 3 Kantong</p>
                        <p class="text-green-500">Diterima</p>
                        <hr class="my-2">
                        <p>dr. Diska Fatiha - AB+ - 1 Kantong</p>
                        <p class="text-red-500">Ditolak</p>
                    </div>

                </div>

            </div>

        </main>
    </div>
</x-app-layout>