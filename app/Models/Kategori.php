<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];
    public $timestamps = false;

    public function aset()
    {
        return $this->hasMany(Aset::class, 'id_kategori');
    }
}
