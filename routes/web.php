<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/stok', function () {
        return view('stok');
    })->name('stok');

    Route::get('/permintaan', function () {
        return view('permintaan');
    })->name('permintaan');

    Route::get('/distribusi', function () {
        return view('distribusi');
    })->name('distribusi');

    Route::get('/asalDarah', function () {
        return view('asalDarah');
    })->name('asalDarah');

    Route::get('/laporan', function () {
        return view('laporan');
    })->name('laporan');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';

Route::get('/inputDarah', function () {
    session(['asal_darah' => 'PMI']);
    return view('inputDarah');
})->name('inputDarah');

Route::get('/inputPendonor', function () {
    session(['asal_darah' => 'Unit Bank Darah RS']);
    return view('inputPendonor');
})->name('inputPendonor');

Route::get('/dashboardDokter', function () {
        return view('dashboardDokter');
    })->name('dashboardDokter');
 Route::get('/permintaanDokter', function () {
        return view('permintaanDokter');
    })->name('permintaanDokter');

