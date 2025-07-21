<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutasiAset extends Model
{
    protected $table = 'mutasi_aset';
    protected $fillable = ['id_aset', 'id_lokasi_ke', 'id_lokasi_dari', 'tanggal_mutasi', 'keterangan'];
    public $timestamps = false;

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'id_aset');
    }

    public function lokasiDari()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi_dari');
    }

    public function lokasiKe()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi_ke');
    }
}

