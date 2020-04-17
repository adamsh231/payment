<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = "gaji";
    protected $guarded = ['id'];

    public function karyawan(){
        return $this->belongsTo('App\Karyawan');
    }
}
