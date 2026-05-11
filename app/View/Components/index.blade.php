@extends('layouts.app')
@section('title', 'Beranda')

@section('content')
<div class="page-header">
    <div>
        <div class="page-title">Beranda</div>
    </div>
</div>

<!-- Notifikasi Stok -->
<div class="notif-banner">
    <i class="fas fa-bell"></i>
    <div class="notif-text">
        <strong>Notifikasi Stok</strong>
        <span class="notif-warn">&nbsp; *Stok O hampir habis</span>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    <!-- Left: Stat Cards + Recent -->
    <div>
        <!-- Stat Cards -->
        <div style="display: flex; flex-direction: column; gap: 14px; margin-bottom: 20px;">
            <div class="bstat-card">
                <div class="bstat-icon-wrap"><i class="fas fa-tint"></i></div>
                <span class="bstat-label">Total Pendonor</span>
                <span class="bstat-count">{{ $totalPendonor }}</span>
            </div>
            <div class="bstat-card">
                <div class="bstat-icon-wrap"><i class="fas fa-truck"></i></div>
                <span class="bstat-label">Distribusi Hari Ini</span>
                <span class="bstat-count">{{ $distribusiHariIni }}</span>
            </div>
            <div class="bstat-card">
                <div class="bstat-icon-wrap"><i class="fas fa-tint"></i></div>
                <span class="bstat-label">Stok Darah</span>
                <span class="bstat-count">{{ $stokDarah }}</span>
            </div>
            <div class="bstat-card">
                <div class="bstat-icon-wrap"><i class="fas fa-envelope-open-text"></i></div>
                <span class="bstat-label">Permintaan Darah</span>
                <span class="bstat-count">{{ $permintaanDarah }}</span>
            </div>
        </div>

        <!-- Permintaan Terbaru -->
        <div class="card">
            <div class="card-title">Permintaan</div>
            @foreach($permintaanTerbaru as $p)
            <div class="recent-item">
                <div class="recent-name">{{ $p->nama_dokter }} &ndash; {{ $p->golongan }} &ndash; {{ $p->jumlah }} Kantong</div>
                <div class="recent-detail">
                    <span class="badge badge-{{ $p->status === 'Disetujui' ? 'green' : ($p->status === 'Ditolak' ? 'red' : 'yellow') }}">{{ $p->status }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Right: Grafik + Distribusi -->
    <div>
        <!-- Grafik Stok Darah -->
        <div class="card" style="margin-bottom: 18px;">
            <div class="card-title">Grafik Stok Darah</div>
            <div class="chart-container">
                <canvas id="chartStok"></canvas>
            </div>
        </div>

        <!-- Distribusi Terbaru -->
        <div class="card">
            <div class="card-title">Distribusi</div>
            @foreach($distribusiTerbaru as $d)
            <div class="recent-item">
                <div class="recent-name">{{ $d->nama_dokter }} &ndash; {{ $d->golongan }} &ndash; {{ $d->jumlah }} Kantong</div>
                <div class="recent-detail">
                    <span class="badge badge-{{ $d->status === 'Diterima' ? 'green' : ($d->status === 'Ditolak' ? 'red' : 'yellow') }}">{{ $d->status }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<script>
const ctx = document.getElementById('chartStok').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['A', 'B', 'AB', 'O'],
        datasets: [
            { label: '+', data: {{ json_encode($chartData['positif']) }}, backgroundColor: '#8b1a1a', borderRadius: 4 },
            { label: '-', data: {{ json_encode($chartData['negatif']) }}, backgroundColor: '#d1d5db', borderRadius: 4 }
        ]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, grid: { color: '#f0f0f0' }, ticks: { font: { size: 11 } } },
            x: { grid: { display: false }, ticks: { font: { size: 11 } } }
        }
    }
});
</script>
@endpush