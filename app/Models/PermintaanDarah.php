<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermintaanDarah extends Model
{
    protected $table = 'permintaan_darahs';

    protected $fillable = [
        'nama_dokter',
        'golongan',
        'rhesus',
        'jenis_komponen',
        'poli',
        'jumlah',
        'status',
        'disetujui_oleh',
        'tanggal_disetujui',
    ];

    public function petugasPenyetuju()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }
}