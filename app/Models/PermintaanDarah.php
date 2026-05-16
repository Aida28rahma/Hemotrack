<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanDarah extends Model
{
    protected $fillable = [
        'nama_dokter',
        'golongan',
        'rhesus',
        'jenis_komponen',
        'poli',
        'jumlah',
        'status',
    ];
}
