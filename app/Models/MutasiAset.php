<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutasiAset extends Model
{
    protected $table = 'mutasi_aset';
    protected $fillable = ['id_aset', 'id_lokasi_susudah', 'id_lokasi_sebelum', 'tanggal_mutasi', 'keterangan'];
    public $timestamps = false;

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'id_aset');
    }

    public function lokasiSebelum()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi_sebelum');
    }

    public function lokasiSesudah()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi_susudah');
    }
}
