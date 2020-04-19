<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Karyawan;
use App\Presensi;
use App\Gaji;
use App\Jabatan;
use PDF;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function karyawan()
    {
        $karyawan = Karyawan::with(['jabatan'])->get();
        $jabatan = Jabatan::all();
        return view(
            'admin/karyawan',
            [
                'active' => 1,
                'karyawan' => $karyawan,
                'jabatan' => $jabatan
            ]
        );
    }

    public function gaji(Request $request)
    {
        $periode_tahun = Presensi::selectRaw('YEAR(date) as tahun')->groupBy('tahun')->orderBy('tahun', 'desc')->get();
        $bulan = date('m');
        $tahun = $periode_tahun[0]->tahun;

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

    public function laporan()
    {
        $periode_tahun = Presensi::selectRaw('YEAR(date) as tahun')->groupBy('tahun')->orderBy('tahun', 'desc')->get();
        $bulan = date('m');
        $tahun = $periode_tahun[0]->tahun;
        return view(
            'admin/laporan',
            [
                'active' => 3,
                'periode_tahun' => $periode_tahun,
                'bulan' => (int) $bulan,
                'tahun' => $tahun,
            ]
        );
    }

    public function invoice($karyawan_id, $bulan, $tahun)
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
        return $pdf->stream('Slip Gaji_' . $karyawan->name . '_01-' . $bulan . '-' . $tahun);
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
        $gaji->total = $request->total;
        $gaji->save();
        return response()->json([
            'error' => false,
        ], 200);
    }

    function cetak(Request $request)
    {
        $arr_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        $periode = $arr_bulan[$request->bulan1 - 1] . " s/d " . $arr_bulan[$request->bulan2 - 1] . " " . $request->tahun;
        $bulan1 = ($request->bulan1 < 10 ? '0' . $request->bulan1 : $request->bulan1);
        $bulan2 = ($request->bulan2 < 10 ? '0' . $request->bulan2 : $request->bulan2);
        $gaji = Gaji::with(['karyawan' => function ($query) {
            $query->with(['jabatan'])->get();
        }])->where(
            [
                ['period', '>=', $request->tahun . '-' . $bulan1 . '-01'],
                ['period', '<=', $request->tahun . '-' . $bulan2 . '-01'],
                ['status', 1]
            ]
        )->orderBy('period')->get();
        $pdf = PDF::loadview(
            'pdf/laporan',
            [
                'gaji' => $gaji,
                'periode' => $periode
            ]
        );
        return $pdf->stream('Laporan Gaji_' . $arr_bulan[$request->bulan1 - 1] . "-" . $arr_bulan[$request->bulan2 - 1] . "_" . $request->tahun);
    }

    function addKaryawan(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required'],
                'jabatan' => ['required'],
                'address' => ['required'],
                'birth' => ['required'],
                'phone' => ['required', 'numeric'],
                'gender' => ['required'],
                'start_work' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $karyawan = new Karyawan;
        $karyawan->id = date('hms').rand(0,9);
        $karyawan->name = $request->name;
        $karyawan->username = $karyawan->id;
        $karyawan->password = Hash::make($karyawan->id);
        $karyawan->jabatan_id = $request->jabatan;
        $karyawan->address = $request->address;
        $karyawan->birth = $request->birth;
        $karyawan->phone = $request->phone;
        $karyawan->gender = $request->gender;
        $karyawan->start_work = $request->start_work;
        $karyawan->save();

        $result = "";
        if (date('Y-m-d', strtotime($request->start_work))  == date('Y-m-d')) {
            $presensi = new Presensi;
            $presensi->karyawan_id = $karyawan->id;
            $presensi->date = date('Y-m-d');
            $presensi->save();
            $gaji = new Gaji;
            $gaji->id = date('hms').rand(0,9);
            $gaji->karyawan_id = $karyawan->id;
            $gaji->period = date('Y-m').'-01';
            $gaji->save();
        } else if (date('m-Y', strtotime($request->start_work)) == date('m-Y')) {
            $gaji = new Gaji;
            $gaji->id = date('hms').rand(0,9);
            $gaji->karyawan_id = $karyawan->id;
            $gaji->period = date('Y-m').'-01';
            $gaji->save();
        }

        return response()->json([
            'error' => false,
        ], 200);
    }
}
