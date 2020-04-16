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
        return view('admin/dashboard');
    });
});

Route::group(['middleware' => ['isKaryawan']], function () {
    Route::get('/karyawan', function () {
        return view('karyawan/dashboard');
    });
});

Route::get('/logout', 'AuthController@logout');
