<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\PermintaanDokter;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('Petugas.dashboard');
    })->name('dashboard');

    Route::get('/stok', function () {
        return view('Petugas.stok');
    })->name('stok');

    Route::get('/permintaan', function () {
        return view('Petugas.permintaan');
    })->name('permintaan');

    Route::get('/distribusi', function () {
        return view('Petugas.distribusi');
    })->name('distribusi');

    Route::get('/laporan', function () {
        return view('Petugas.laporan');
    })->name('laporan');

    Route::get('/pmi', function () {
        return view('Petugas.pmi');
    })->name('pmi');

    Route::get('/unit-bank-darah', function () {
        return view('Petugas.unitBankDarah');
    })->name('unitBankDarah');

});
    /*
    |--------------------------------------------------------------------------
    | DOKTER
    |--------------------------------------------------------------------------
    */

    // Dashboard dokter
    Route::get('/dashboardDokter', fn() => view('dashboardDokter'))->name('dashboardDokter');

    // Form permintaan dokter (GET)
    Route::get('/permintaanDokter', fn() => view('permintaanDokter'))->name('permintaanDokter');

    // SIMPAN PERMINTAAN (POST)
    Route::post('/permintaanDokter', function (Request $request) {

        PermintaanDokter::create([
            'no_rm' => $request->no_rm,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan' => $request->golongan,
            'rhesus' => $request->rhesus,
            'komponen' => $request->komponen,
            'jumlah' => $request->jumlah,
            'poli' => $request->poli,
            'status' => 'diproses',
        ]);

        return redirect()
            ->route('permintaanDokter')
            ->with('success', 'Permintaan berhasil dibuat!');
    })->name('permintaanDokter.store');

    Route::get('/status-dokter', function () {

        $requests = [
            [
                'no_rm' => '0025',
                'nama' => 'Diani Pitasari',
                'golongan' => 'O',
                'komponen' => 'PRC',
                'rhesus' => 'Negatif (-)',
                'jumlah' => '3 Kantong',
                'status' => 'Menunggu'
            ],
            [
                'no_rm' => '0065',
                'nama' => 'Alya Solei',
                'golongan' => 'O',
                'komponen' => 'PRC',
                'rhesus' => 'Negatif (-)',
                'jumlah' => '3 Kantong',
                'status' => 'Menunggu'
            ],
            [
                'no_rm' => '0071',
                'nama' => 'Vina Tianda',
                'golongan' => 'A',
                'komponen' => 'PRC',
                'rhesus' => 'Negatif (-)',
                'jumlah' => '5 Kantong',
                'status' => 'Disetujui'
            ],
            [
                'no_rm' => '0101',
                'nama' => 'Andini Vita',
                'golongan' => 'AB',
                'komponen' => 'PRC',
                'rhesus' => 'Negatif (-)',
                'jumlah' => '3 Kantong',
                'status' => 'Disetujui'
            ],
            [
                'no_rm' => '0032',
                'nama' => 'Linda Arisa',
                'golongan' => 'O',
                'komponen' => 'PRC',
                'rhesus' => 'Positif (+)',
                'jumlah' => '3 Kantong',
                'status' => 'Disetujui'
            ],
            [
                'no_rm' => '0039',
                'nama' => 'Lovita Cinta',
                'golongan' => 'O',
                'komponen' => 'PRC',
                'rhesus' => 'Negatif (-)',
                'jumlah' => '6 Kantong',
                'status' => 'Disetujui'
            ],
        ];

        return view('Dokter.statusDokter', compact('requests'));

    })->middleware(['auth'])->name('statusDokter');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

/*
|--------------------------------------------------------------------------
| AUTH (BREEZE)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';