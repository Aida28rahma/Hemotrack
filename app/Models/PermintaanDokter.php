<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class PermintaanDokter extends Model
{
    protected $fillable = [
    'kode_permintaan',
    'dokter_id',
    'no_rm',
    'nama',
    'jenis_kelamin',
    'golongan',
    'rhesus',
    'jenis_komponen',
    'jumlah',
    'poli',
    'status',
    'disetujui_oleh',
    'tanggal_disetujui',
    ];
    public function dokter()
    {
        return $this->belongsTo(
            User::class,
            'dokter_id'
        );
    }
    public function petugasPenyetuju()
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }
}
