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

    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // HALAMAN PETUGAS
    Route::get('/stok', fn() => view('stok'))->name('stok');
    Route::get('/permintaan', function () {

        $data = PermintaanDokter::latest()->get();

        return view('permintaan', compact('data'));

    })->name('permintaan');
    Route::post('/permintaan/{id}/approve', function ($id) {

        $data = \App\Models\PermintaanDokter::find($id);
        $data->status = 'disetujui';
        $data->save();

        return back()->with('success', 'Permintaan disetujui');

    })->name('permintaan.approve');


    Route::post('/permintaan/{id}/reject', function ($id) {

        $data = \App\Models\PermintaanDokter::find($id);
        $data->status = 'ditolak';
        $data->save();

        return back()->with('success', 'Permintaan ditolak');

    })->name('permintaan.reject');
    Route::get('/distribusi', fn() => view('distribusi'))->name('distribusi');
    Route::get('/asalDarah', fn() => view('asalDarah'))->name('asalDarah');
    Route::get('/laporan', fn() => view('laporan'))->name('laporan');

    // INPUT
    Route::get('/inputDarah', function () {
        session(['asal_darah' => 'PMI']);
        return view('inputDarah');
    })->name('inputDarah');

    Route::get('/inputPendonor', function () {
        session(['asal_darah' => 'Unit Bank Darah RS']);
        return view('inputPendonor');
    })->name('inputPendonor');

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
});

/*
|--------------------------------------------------------------------------
| AUTH (BREEZE)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';