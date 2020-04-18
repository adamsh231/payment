<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Presensi;
use App\Gaji;
use PDF;

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
                'jabatan',
                'gaji' => function ($query) use ($bulan, $tahun) {
                    $query->where([['period', 'LIKE', '%-' . $bulan . '-%'], ['period', 'LIKE', $tahun . '%']]);
                },
            ]
        )->whereIn('id', function ($query) use ($bulan, $tahun) {
            $query->select('karyawan_id')
                ->from('presensi')
                ->where([['date', 'LIKE', '%-' . $bulan . '-%'], ['date', 'LIKE', $tahun . '%']]);
        })->get();
        $periode_tahun = Presensi::selectRaw('YEAR(date) as tahun')->groupBy('tahun')->get();
        return view(
            'admin/gaji',
            [
                'active' => 2,
                'karyawan' => $karyawan,
                'periode_tahun' => $periode_tahun,
                'bulan' => (int) $bulan,
                'tahun' => $tahun,
            ]
        );
    }

    public function cetak($karyawan_id, $bulan, $tahun)
    {
        $bulan = ($bulan < 10 ? '0' . $bulan : $bulan);
        $karyawan = Karyawan::with(
            [
                'presensi' => function ($query) use ($bulan, $tahun) {
                    $query->where([['date', 'LIKE', '%-' . $bulan . '-%'], ['date', 'LIKE', $tahun . '%']]);
                },
                'jabatan',
                'gaji' => function ($query) use ($bulan, $tahun) {
                    $query->where([['period', 'LIKE', '%-' . $bulan . '-%'], ['period', 'LIKE', $tahun . '%']]);
                },
            ]
        )->whereIn('id', function ($query) use ($bulan, $tahun) {
            $query->select('karyawan_id')
                ->from('presensi')
                ->where([['date', 'LIKE', '%-' . $bulan . '-%'], ['date', 'LIKE', $tahun . '%']]);
        })->find($karyawan_id);
        $pdf = PDF::loadview('pdf/slip', [
            'karyawan' => $karyawan,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]);
        return $pdf->stream('Slip Gaji 01/' . $bulan . '/' . $tahun);
    }

    function statusGaji(Request $request)
    {
        $bulan = ($request->bulan < 10 ? '0' . $request->bulan : $request->bulan);
        $gaji = Gaji::where([
            ['karyawan_id', $request->id],
            ['period', 'LIKE', '%-' . $bulan . '-%'],
            ['period', 'LIKE', $request->tahun . '%']
        ])->first();
        $gaji->status = 1;
        $gaji->save();
        return response()->json([
            'error' => false,
        ], 200);
    }
}
