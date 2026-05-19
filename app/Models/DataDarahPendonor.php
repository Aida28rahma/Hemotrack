<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataDarahPendonor extends Model
{
    protected $fillable = [
        'golongan',
        'rhesus',
        'jenis_komponen',
        'tanggal_kedaluwarsa',
        'asal_darah',
        'status',
        'nik_pendonor',
        'kode_kantong',
    ];
}