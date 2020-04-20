<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Presensi;

class KaryawanController extends Controller
{
    public function presensi()
    {
        $presensi = Presensi::where('karyawan_id', Auth::guard('karyawan')->user()->id)->orderBy('date', 'desc')->get();
        $absen = Presensi::where(
            [
                ['date', date('Y-m-d')],
                ['karyawan_id', Auth::guard('karyawan')->user()->id]
            ]
        )->get();
        return view(
            'karyawan/absen',
            [
                'active' => 2,
                'presensi' => $presensi,
                'absen' => $absen
            ]
        );
    }
    public function lembur()
    {
        $presensi = Presensi::where('karyawan_id', Auth::guard('karyawan')->user()->id)->orderBy('date', 'desc')->get();
        $absen = Presensi::where(
            [
                ['date', date('Y-m-d')],
                ['karyawan_id', Auth::guard('karyawan')->user()->id]
            ]
        )->get();
        return view(
            'karyawan/lembur',
            [
                'active' => 3,
                'presensi' => $presensi,
                'absen' => $absen
            ]
        );
    }

    public function absenHadir(Presensi $presensi){
        $presensi->worktime = 1;
        $presensi->save();
        return back();
    }

    public function lemburHadir(Presensi $presensi){
        $presensi->overtime = 1;
        $presensi->save();
        return back();
    }
}
