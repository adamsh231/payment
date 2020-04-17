<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Presensi;

class AdminController extends Controller
{
    public function karyawan()
    {
        $karyawan = Karyawan::with(['jabatan'])->get();
        return view('admin/karyawan', ['active' => 1, 'karyawan' => $karyawan]);
    }

    public function gaji(Request $request)
    {
        $bulan = date('m');
        $tahun = date('Y');
        if (!empty($request->tahun)) {
            $bulan = ($request->bulan < 10 ? '0' . $request->bulan : $request->bulan);
            $tahun = $request->tahun;
        }

        $karyawan = Karyawan::with(
            [
                'presensi' => function ($query) use ($bulan, $tahun) {
                    $query->where([['date', 'LIKE', '%-' . $bulan . '-%'], ['date', 'LIKE', $tahun . '%']]);
                },
                'jabatan'
            ]
        )->get();
        $periode_tahun = Presensi::selectRaw('YEAR(date) as tahun')->groupBy('tahun')->get();
        return view(
            'admin/gaji',
            [
                'active' => 2,
                'karyawan' => $karyawan,
                'periode_tahun' => $periode_tahun,
                'bulan' => (int)$bulan,
                'tahun' => $tahun,
            ]
        );
    }
}
