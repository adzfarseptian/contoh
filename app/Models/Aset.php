<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    protected $table = 'aset';
    protected $fillable = [
        'nama_aset',
        'id_lokasi',
        'id_kategori',
        'kode_aset',
        'tanggal_perolehan',
    ];
    public $timestamps = false;
    
    protected $casts = [
        'tanggal_perolehan' => 'date',  // atau 'datetime' jika kamu butuh waktu juga
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    public function status()
    {
        return $this->hasMany(Status::class, 'id_aset');
    }

    public function mutasi()
    {
        return $this->hasMany(MutasiAset::class, 'id_aset');
    }
}
