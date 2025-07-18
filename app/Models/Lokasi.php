<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $fillable = ['nama_lokasi'];
    public $timestamps = false;

    public function aset()
    {
        return $this->hasMany(Aset::class, 'id_lokasi');
    }
}
