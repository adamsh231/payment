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
    Route::get('/admin/karyawan', function () {
        return view('admin/karyawan', ['active' => 1]);
    });
    Route::get('/admin/gaji', function () {
        return view('admin/gaji', ['active' => 2]);
    });
    Route::get('/admin/laporan', function () {
        return view('admin/laporan', ['active' => 3]);
    });
    Route::get('/admin/profile', function () {
        return view('admin/profile', ['active' => 4]);
    });
});

Route::group(['middleware' => ['isKaryawan']], function () {
    Route::get('/karyawan', function () {
        return view('karyawan/dashboard', ['active' => 0]);
    });
    Route::get('/karyawan/biodata', function () {
        return view('karyawan/biodata', ['active' => 1]);
    });
    Route::get('/karyawan/absen', function () {
        return view('karyawan/absen', ['active' => 2]);
    });
    Route::get('/karyawan/lembur', function () {
        return view('karyawan/lembur', ['active' => 3]);
    });
    Route::get('/karyawan/profile', function () {
        return view('karyawan/profile', ['active' => 4]);
    });
});

Route::get('/logout', 'AuthController@logout');
