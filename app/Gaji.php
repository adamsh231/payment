<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = "gaji";
    protected $guarded = ['id'];

    public function karyawan(){
        return $this->belongsTo('App\Karyawan');
    }
}
