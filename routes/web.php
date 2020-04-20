<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/login/admin', function () {
        return view('loginA');
    });
    Route::post('/admin', 'AuthController@authAdmin');
    Route::get('/login/karyawan', function () {
        return view('loginK');
    });
    Route::post('/karyawan', 'AuthController@authKaryawan');
});


Route::group(['middleware' => ['isAdmin']], function () {
    Route::get('/admin', function () {
        return view('admin/dashboard', ['active' => 0]);
    });
    Route::patch('/admin/password', 'AdminController@password');
    Route::get('/admin/karyawan', 'AdminController@karyawan');
    Route::put('/admin/karyawan', 'AdminController@addKaryawan');
    Route::patch('/admin/karyawan/{karyawan}', 'AdminController@editKaryawan');
    Route::delete('/admin/karyawan/{karyawan}', 'AdminController@deleteKaryawan');
    Route::get('/admin/gaji', 'AdminController@gaji');
    Route::get('/admin/laporan', 'AdminController@laporan');
    Route::get('/admin/profile', function () {
        return view('admin/profile', ['active' => 4]);
    });
    Route::patch('/admin/slip', 'AdminController@statusGaji');
    Route::get('/admin/slip/{karyawan_id}/{bulan}/{tahun}', 'AdminController@invoice');
    Route::get('/admin/laporan/cetak', 'AdminController@cetak');
});

Route::group(['middleware' => ['isKaryawan']], function () {
    Route::get('/karyawan', function () {
        return view('karyawan/dashboard', ['active' => 0]);
    });
    Route::get('/karyawan/biodata', 'KaryawanController@biodata');
    Route::patch('/karyawan/password', 'KaryawanController@password');
    Route::patch('/karyawan/biodata/{karyawan}', 'KaryawanController@editBiodata');
    Route::get('/karyawan/absen', 'KaryawanController@presensi');
    Route::post('/karyawan/absen/{presensi}', 'KaryawanController@absenHadir');
    Route::get('/karyawan/lembur', 'KaryawanController@lembur');
    Route::post('/karyawan/lembur/{presensi}', 'KaryawanController@lemburHadir');
    Route::get('/karyawan/profile', function () {
        return view('karyawan/profile', ['active' => 4]);
    });
});

Route::get('/logout', 'AuthController@logout');
