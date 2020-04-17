<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class AdminController extends Controller
{
    public function karyawan(){
        $karyawan = Karyawan::with(['jabatan'])->get();
        return view('admin/karyawan', ['active' => 1, 'karyawan' => $karyawan]);
    }
}
