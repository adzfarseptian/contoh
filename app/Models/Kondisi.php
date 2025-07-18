<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    protected $table = 'kondisi';
    protected $fillable = ['nama_kondisi'];
    public $timestamps = false;

    public function status()
    {
        return $this->hasMany(Status::class, 'id_kondisi');
    }
}
