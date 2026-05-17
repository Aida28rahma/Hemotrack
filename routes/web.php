<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\PermintaanDokter;
use App\Models\Pendonor;
use App\Models\DataDarahPendonor;

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

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

 Route::get('/dashboard', function () {
        if (auth()->user()->role == 'dokter') {
            return view('Dokter.dashboardDokter');
        }
       $totalPendonor = Pendonor::whereDate(
            'created_at',
            today()
        )->count();
        $totalStok = DataDarahPendonor::count();
        $totalPermintaan = PermintaanDokter::whereDate(
            'created_at',
            today()
        )->count();
        $belumDiuji = DataDarahPendonor::where(
            'status',
            'Belum diuji'
        )->count();
        $distribusiHariIni = PermintaanDokter::where(
            'status',
            'disetujui'
        )
        ->whereDate(
            'updated_at',
            today()
        )
        ->sum('jumlah');

        $grafik = [
            'A' => DataDarahPendonor::where('golongan','A')->count(),
            'B' => DataDarahPendonor::where('golongan','B')->count(),
            'AB' => DataDarahPendonor::where('golongan','AB')->count(),
            'O' => DataDarahPendonor::where('golongan','O')->count(),
        ];
        $notif = [];

        foreach (['A','B','AB','O'] as $gol) {

            $jumlah = DataDarahPendonor::where(
                'golongan',
                $gol
            )->count();

            if ($jumlah == 0) {

                $notif[] = "Stok darah $gol habis";

            }
            elseif ($jumlah <= 3) {

                $notif[] = "Stok darah $gol hampir habis";

            }

        }
        $belumDiuji = DataDarahPendonor::where(
            'status',
            'Belum diuji'
        )->count();

        if ($belumDiuji > 0) {
            $notif[] = $belumDiuji . " kantong belum diuji";
        }

        $menunggu = PermintaanDokter::where(
            'status',
            'menunggu'
        )->count();

        if ($menunggu > 0) {
            $notif[] = $menunggu . " permintaan menunggu";
        }
        $permintaanTerbaru = PermintaanDokter::latest()
            ->take(5)
            ->get();
            

            return view(
                'Petugas.dashboard',
               compact(
                    'totalPendonor',
                    'totalStok',
                    'totalPermintaan',
                    'belumDiuji',
                    'permintaanTerbaru',
                    'distribusiHariIni',
                    'grafik',
                    'notif'
                )
            );

        })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | STOK DARAH - PETUGAS
    |--------------------------------------------------------------------------
    */

    Route::get('/stok', function (Request $request) {
      
        $query = DataDarahPendonor::query();

        if ($request->golongan) {
            $query->where('golongan', $request->golongan);
        }

        if ($request->jenis_komponen) {
            $query->where('jenis_komponen', $request->jenis_komponen);
        }

        if ($request->rhesus) {
            $query->where('rhesus', $request->rhesus);
        }

        $data = $query->latest()->get();

        $ringkasan = DataDarahPendonor::selectRaw("
            golongan,
            SUM(CASE WHEN rhesus = '+' THEN 1 ELSE 0 END) as plus,
            SUM(CASE WHEN rhesus = '-' THEN 1 ELSE 0 END) as minus
        ")
            ->groupBy('golongan')
            ->get()
            ->keyBy('golongan');

        return view('Petugas.stok', compact('data', 'ringkasan'));
    })->name('stok');
    Route::get('/stok/{id}/edit', function ($id) {


        $data = DataDarahPendonor::findOrFail($id);

        return view('Petugas.editStok', compact('data'));

    })->name('stok.edit');

    Route::post('/stok/{id}/update', function (Request $request, $id) {

        $data = DataDarahPendonor::findOrFail($id);

        $data->update([
            'golongan' => $request->golongan,
            'rhesus' => $request->rhesus,
            'jenis_komponen' => $request->jenis_komponen,
            'tanggal_kedaluwarsa' => $request->tanggal_kedaluwarsa,
        ]);

        return redirect()->route('stok');

    })->name('stok.update');


    Route::delete('/stok/{id}', function ($id) {

        $data = DataDarahPendonor::findOrFail($id);

        $data->delete();

        return redirect()->route('stok');

    })->name('stok.delete');
    
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
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        $data = PermintaanDokter::findOrFail($id);

        $data->update([
            'status' => 'disetujui',
            'disetujui_oleh' => Auth::id(),
            'tanggal_disetujui' => now(),
        ]);

        return back()->with('success', 'Permintaan berhasil disetujui.');
    })->name('permintaan.approve');


    Route::post('/permintaan/{id}/reject', function ($id) {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        $data = PermintaanDokter::findOrFail($id);

        $data->update([
            'status' => 'ditolak',
            'disetujui_oleh' => Auth::id(),
            'tanggal_disetujui' => now(),
        ]);

        return back()->with('success', 'Permintaan berhasil ditolak.');
    })->name('permintaan.reject');
    Route::delete('/permintaan/{id}', function ($id) {
        $data = PermintaanDokter::findOrFail($id);
        $data->delete();


        return redirect()
            ->route('permintaan')
            ->with('success', 'Data permintaan berhasil dihapus.');
    })->name('permintaan.delete');

    Route::get('/distribusi', function () {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        return view('Petugas.distribusi');
    })->name('distribusi');


    /*
    |--------------------------------------------------------------------------
    | LAPORAN - PETUGAS
    |--------------------------------------------------------------------------
    */

    Route::get('/laporan', function (Request $request) {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;
        $golongan = $request->golongan;
        $komponen = $request->jenis_komponen;

        $darahMasuk = DataDarahPendonor::query()
            ->when($tanggalAwal, fn ($q) => $q->whereDate('created_at', '>=', $tanggalAwal))
            ->when($tanggalAkhir, fn ($q) => $q->whereDate('created_at', '<=', $tanggalAkhir))
            ->when($golongan, fn ($q) => $q->where('golongan', $golongan))
            ->when($komponen, fn ($q) => $q->where('jenis_komponen', $komponen))
            ->latest()
            ->get();

        $darahKeluar = PermintaanDokter::query()
            ->where('status', 'disetujui')
            ->when($tanggalAwal, fn ($q) => $q->whereDate('created_at', '>=', $tanggalAwal))
            ->when($tanggalAkhir, fn ($q) => $q->whereDate('created_at', '<=', $tanggalAkhir))
            ->when($golongan, fn ($q) => $q->where('golongan', $golongan))
            ->when($komponen, fn ($q) => $q->where('jenis_komponen', $komponen))
            ->latest()
            ->get();

        return view('Petugas.laporan', compact(
            'darahMasuk',
            'darahKeluar',
            'tanggalAwal',
            'tanggalAkhir',
            'golongan',
            'komponen'
        ));
    })->name('laporan');


    /*
    |--------------------------------------------------------------------------
    | PMI - PETUGAS
    |--------------------------------------------------------------------------
    */

    Route::get('/pmi', function () {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        return view('Petugas.pmi');
    })->name('pmi');


    Route::post('/pmi/simpan', function (Request $request) {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

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
            'status' => 'Sudah Teruji',
        ]);

        return redirect()
            ->route('pmi')
            ->with('success', 'Data darah PMI berhasil disimpan.');
    })->name('pmi.simpan');


    /*
    |--------------------------------------------------------------------------
    | UNIT BANK DARAH - PETUGAS
    |--------------------------------------------------------------------------
    */

    Route::get('/unit-bank-darah', function () {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        return view('Petugas.unitBankDarah');
    })->name('unitBankDarah');


    Route::post('/unit-bank-darah/simpan-pendonor', function (Request $request) {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

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
        ]);

        return redirect()
            ->route('unitBankDarah.darah')
            ->with('success', 'Data pendonor berhasil disimpan. Lanjut isi data darah.');
    })->name('unitBankDarah.simpanPendonor');


    Route::get('/unit-bank-darah/darah', function () {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        return view('Petugas.unitBankDarah2');
    })->name('unitBankDarah.darah');


    Route::post('/unit-bank-darah/simpan-darah', function (Request $request) {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

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
            'status' => 'Belum diuji',
        ]);

        return redirect()
            ->route('unitBankDarah.darah')
            ->with('success', 'Data darah berhasil disimpan.');
    })->name('unitBankDarah.simpanDarah');


    /*
    |--------------------------------------------------------------------------
    | UJI / SCAN / LABEL DARAH - PETUGAS
    |--------------------------------------------------------------------------
    */

    Route::get('/darah/{id}/scan', function ($id) {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        $darah = DataDarahPendonor::findOrFail($id);

        return view('Petugas.scanDarah', compact('darah'));
    })->name('darah.scan');


    Route::get('/darah/{id}/label', function ($id) {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        $darah = DataDarahPendonor::findOrFail($id);

        return view('Petugas.labelDarah', compact('darah'));
    })->name('darah.label');


    Route::post('/darah/{id}/uji', function ($id) {
        if (auth()->user()->role != 'petugas') {
            abort(403);
        }

        $darah = DataDarahPendonor::findOrFail($id);
        $darah->status = 'Sudah Teruji';
        $darah->save();

        return back()->with('success', 'Darah berhasil ditandai sudah teruji.');
    })->name('darah.uji');


    /*
    |--------------------------------------------------------------------------
    | DOKTER
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboardDokter', function () {
        if (auth()->user()->role != 'dokter') {
            abort(403);
        }

        return view('Dokter.dashboardDokter');
    })->name('Dokter.dashboardDokter');


    Route::get('/permintaanDokter', function () {
        if (auth()->user()->role != 'dokter') {
            abort(403);
        }

        return view('Dokter.permintaanDokter');
    })->name('permintaanDokter');


    Route::post('/permintaanDokter', function (Request $request) {
        if (auth()->user()->role != 'dokter') {
            abort(403);
        }

        $request->validate([
            'no_rm' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'golongan' => 'required',
            'rhesus' => 'required',
            'jenis_komponen' => 'required',
            'jumlah' => 'required|numeric',
            'poli' => 'required',
        ]);

        PermintaanDokter::create([
            'no_rm' => $request->no_rm,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan' => $request->golongan,
            'rhesus' => $request->rhesus,
            'jenis_komponen' => $request->jenis_komponen,
            'jumlah' => $request->jumlah,
            'poli' => $request->poli,
            'status' => 'menunggu',
        ]);

        return redirect()
            ->route('permintaanDokter')
            ->with('success', 'Permintaan berhasil dibuat!');
    })->name('permintaanDokter.store');

    Route::get('/status-dokter', function (Request $request) {
        if (auth()->user()->role != 'dokter') {
            abort(403);
        }

        $query = PermintaanDokter::query();

        // FILTER STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {

                $q->where('nama', 'like', '%' . $request->search . '%')
                ->orWhere('no_rm', 'like', '%' . $request->search . '%');

            });
        }

        $requests = $query->latest()->get();

        return view('Dokter.statusDokter', compact('requests'));
    })->name('statusDokter');
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
| AUTH BREEZE
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
