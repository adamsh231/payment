<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Presensi;
use App\Karyawan;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

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

    public function absenHadir(Presensi $presensi)
    {
        $presensi->worktime = 1;
        $presensi->save();
        return back();
    }

    public function lemburHadir(Presensi $presensi)
    {
        $presensi->overtime = 1;
        $presensi->save();
        return back();
    }

    public function biodata()
    {
        $karyawan = Karyawan::with(['jabatan'])->find(Auth::guard('karyawan')->user()->id);
        return view(
            'karyawan/biodata',
            [
                'active' => 1,
                'karyawan' => $karyawan            ]
        );
    }

    public function editBiodata(Request $request, Karyawan $karyawan){
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required'],
                'username' => ['required', Rule::unique('karyawan')->ignore($karyawan->id)],
                'address' => ['required'],
                'birth' => ['required'],
                'phone' => ['required', 'numeric', Rule::unique('karyawan')->ignore($karyawan->id)],
                'gender' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $karyawan->name = $request->name;
        $karyawan->username = $request->username;
        $karyawan->address = $request->address;
        $karyawan->birth = $request->birth;
        $karyawan->phone = $request->phone;
        $karyawan->gender = $request->gender;
        $karyawan->save();

        return response()->json([
            'error' => false,
        ], 200);
    }

    function password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'password' => ['required', 'confirmed'],
                'password_confirmation' => ['required'],
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $karyawan = Karyawan::find(Auth::guard('karyawan')->user()->id);
        $karyawan->password = Hash::make($request->password);
        $karyawan->save();
        return response()->json([
            'error' => false,
        ], 200);
    }
}
