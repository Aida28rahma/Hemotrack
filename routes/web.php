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

    if (auth()->user()->role == 'dokter') {
        return view('Dokter.dashboardDokter');
    }
    return view('Petugas.dashboard');
    })->middleware(['auth'])->name('dashboard');


    Route::get('/stok', function () {
        return view('Petugas.stok');
    })->name('stok');

    Route::get('/permintaan', function (Request $request) {
        if (auth()->user()->role != 'petugas') {
        abort(403);
        }

        $query = PermintaanDokter::query();

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('poli', 'like', '%' . $request->search . '%');
            });
        }

        $data = $query->latest()->get();

        return view('Petugas.permintaan', compact('data'));

    })->name('permintaan');
    Route::post('/permintaan/{id}/approve', function ($id) {
        $data = \App\Models\PermintaanDokter::findOrFail($id);
        $data->status = 'disetujui';
        $data->save();

        return back()->with('success', 'Permintaan berhasil disetujui');
    })->name('permintaan.approve');

    Route::post('/permintaan/{id}/reject', function ($id) {
        $data = \App\Models\PermintaanDokter::findOrFail($id);
        $data->status = 'ditolak';
        $data->save();

        return back()->with('success', 'Permintaan berhasil ditolak');
    })->name('permintaan.reject');

    Route::get('/distribusi', function () {
        if (auth()->user()->role != 'petugas') {
        abort(403);
        }

        return view('Petugas.distribusi');
    })->name('distribusi');

    Route::get('/laporan', function () {
        if (auth()->user()->role != 'petugas') {
        abort(403);
        }

        return view('Petugas.laporan');
    })->name('laporan');

    Route::get('/pmi', function () {
        if (auth()->user()->role != 'petugas') {
        abort(403);
        }

        return view('Petugas.pmi');
    })->name('pmi');

    Route::post('/pmi/simpan', function () {
        return redirect()->route('pmi')->with('success', 'Data darah pendonor berhasil disimpan.');
    })->name('pmi.simpan');

    Route::get('/unit-bank-darah', function () {
        if (auth()->user()->role != 'petugas') {
        abort(403);
        }

        return view('Petugas.unitBankDarah');
    })->name('unitBankDarah');

    Route::get('/unit-bank-darah/darah', function () {
        return view('Petugas.unitBankDarah2');
    })->name('unitBankDarah.darah');

    Route::post('/unit-bank-darah/simpan', function () {
        return redirect()->route('unitBankDarah.darah')->with('success', 'Data berhasil disimpan.');
    })->name('unitBankDarah.simpan');
});
    /*
    |--------------------------------------------------------------------------
    | DOKTER
    |--------------------------------------------------------------------------
    */

    // Dashboard dokter
    Route::get('/dashboardDokter', function () {
        if (auth()->user()->role != 'dokter') {
        abort(403);
        }

        return view('dashboardDokter');
    })->name('Dokter.dashboardDokter');

    // Form permintaan dokter (GET)
    Route::get('/permintaanDokter', function () {
        if (auth()->user()->role != 'dokter') {
        abort(403);
        }

        return view('Dokter.permintaanDokter');
    })->name('permintaanDokter');

    // SIMPAN PERMINTAAN (POST)
    Route::post('/permintaanDokter', function (Request $request) {

    $request->validate([
        'no_rm' => 'required',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'golongan' => 'required',
        'rhesus' => 'required',
        'komponen' => 'required',
        'jumlah' => 'required|numeric',
        'poli' => 'required',
    ]);

    PermintaanDokter::create([
        'no_rm' => $request->no_rm,
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jenis_kelamin,
        'golongan' => $request->golongan,
        'rhesus' => $request->rhesus,
        'komponen' => $request->komponen,
        'jumlah' => $request->jumlah,
        'poli' => $request->poli,
        'status' => 'menunggu',
    ]);

    return redirect()
        ->route('permintaanDokter')
        ->with('success', 'Permintaan berhasil dibuat!');
})->name('permintaanDokter.store');
    Route::get('/status-dokter', function () {

        if (auth()->user()->role != 'dokter') {
            abort(403);
        }

        $requests = PermintaanDokter::latest()->get();

        return view('Dokter.statusDokter', compact('requests'));

    })->middleware(['auth'])->name('statusDokter');
    /*
    |---------------------------------------------------------------------------
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