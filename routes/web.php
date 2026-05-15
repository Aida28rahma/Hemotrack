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