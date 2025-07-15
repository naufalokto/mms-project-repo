<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $table = 'cabang';
    protected $primaryKey = 'id_cabang';
    public $timestamps = false;

    protected $fillable = [
    'nama_cabang'
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'id_cabang', 'id_cabang');
    }
}

  