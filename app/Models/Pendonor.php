<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendonor extends Model
{
    protected $fillable = [
        'nama_pendonor',
        'nik_pendonor',
        'jenis_kelamin',
        'tanggal_lahir',
        'usia',
        'alamat_pendonor',
        'nomor_telpon_pendonor',
        'tekanan_darah',
        'berat_badan',
        'suhu_badan',
        'asal_darah',
    ];
}