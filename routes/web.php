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

Route::get('/', function () {
    return view('home');
});
Route::get('/login/admin', function () {
    return view('loginA');
});
Route::get('/login/karyawan', function () {
    return view('loginK');
});
Route::post('/admin', function () {
    return view('admin/dashboard');
});
Route::post('/karyawan', function () {
    return view('karyawan/dashboard');
});
