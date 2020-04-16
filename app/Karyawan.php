<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Authenticatable
{
    protected $table = "karyawan";
    protected $guarded = ['id'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
