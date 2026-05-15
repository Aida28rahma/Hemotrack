<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanDokter extends Model
{
    protected $fillable = [
    'no_rm',
    'nama',
    'jenis_kelamin',
    'golongan',
    'rhesus',
    'komponen',
    'jumlah',
    'poli',
    'status',
];
}
