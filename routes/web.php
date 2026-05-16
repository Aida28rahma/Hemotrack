<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Pendonor;
use App\Models\DataDarahPendonor;
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
        return view('Petugas.distribusi');
    })->name('distribusi');

    Route::get('/laporan', function () {
        return view('Petugas.laporan');
    })->name('laporan');

    // ===============================
// PMI
// ===============================
Route::get('/pmi', function () {
    return view('Petugas.pmi');
})->name('pmi');

Route::post('/pmi/simpan', function (Request $request) {

    $request->validate([
        'golongan' => 'required',
        'rhesus' => 'required',
        'jenis_komponen' => 'required',
        'tanggal_kedaluwarsa' => 'required|date',
    ]);

    DataDarahPendonor::create([
        'golongan' => $request->golongan,
        'rhesus' => $request->rhesus,
        'jenis_komponen' => $request->jenis_komponen,
        'tanggal_kedaluwarsa' => $request->tanggal_kedaluwarsa,
        'asal_darah' => 'PMI',
    ]);

    return redirect()->route('pmi')
        ->with('success', 'Data darah pendonor berhasil disimpan.');

})->name('pmi.simpan');


// ===============================
// UNIT BANK DARAH - TAHAP 1
// Data Pendonor + Data Skrining
// ===============================
Route::get('/unit-bank-darah', function () {
    return view('Petugas.unitBankDarah');
})->name('unitBankDarah');

Route::post('/unit-bank-darah/simpan-pendonor', function (Request $request) {

    $request->validate([
        'nama_pendonor' => 'required',
        'nik_pendonor' => 'required',
        'jenis_kelamin' => 'required',
        'tanggal_lahir' => 'required|date',
        'usia' => 'required|numeric',
        'alamat_pendonor' => 'required',
        'nomor_telpon_pendonor' => 'required',
        'tekanan_darah' => 'required',
        'berat_badan' => 'required',
        'suhu_badan' => 'required',
    ]);

    Pendonor::create([
        'nama_pendonor' => $request->nama_pendonor,
        'nik_pendonor' => $request->nik_pendonor,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_lahir' => $request->tanggal_lahir,
        'usia' => $request->usia,
        'alamat_pendonor' => $request->alamat_pendonor,
        'nomor_telpon_pendonor' => $request->nomor_telpon_pendonor,
        'tekanan_darah' => $request->tekanan_darah,
        'berat_badan' => $request->berat_badan,
        'suhu_badan' => $request->suhu_badan,
        'asal_darah' => 'Unit Bank Darah',
    ]);

    return redirect()->route('unitBankDarah.darah')
        ->with('success', 'Data pendonor berhasil disimpan. Silakan lanjut input data darah.');

})->name('unitBankDarah.simpanPendonor');


// ===============================
// UNIT BANK DARAH - TAHAP 2
// Data Darah Pendonor
// ===============================
Route::get('/unit-bank-darah/darah', function () {
    return view('Petugas.unitBankDarah2');
})->name('unitBankDarah.darah');

Route::post('/unit-bank-darah/simpan-darah', function (Request $request) {

    $request->validate([
        'golongan' => 'required',
        'rhesus' => 'required',
        'jenis_komponen' => 'required',
        'tanggal_kedaluwarsa' => 'required|date',
    ]);

    DataDarahPendonor::create([
        'golongan' => $request->golongan,
        'rhesus' => $request->rhesus,
        'jenis_komponen' => $request->jenis_komponen,
        'tanggal_kedaluwarsa' => $request->tanggal_kedaluwarsa,
        'asal_darah' => 'Unit Bank Darah',
    ]);

    return redirect()->route('unitBankDarah.darah')
        ->with('success', 'Data darah pendonor berhasil disimpan.');

})->name('unitBankDarah.simpanDarah');

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
            'status' => 'menunggu',
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