<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = ['id_aset', 'id_kondisi', 'keterangan', 'tanggal_status'];
    public $timestamps = false;

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'id_aset');
    }

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class, 'id_kondisi');
    }
}
