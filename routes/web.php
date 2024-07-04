<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pegawai.index');
});
Route::get('/perjadin', function () {
    return view('pegawai.perjadin.perjadin');
});
Route::get('/pelaporan-perjadin', function () {
    return view('pegawai.perjadin.pelaporan-perjadin');
});
Route::get('/perencanaan-belanja-modal', function () {
    return view('pegawai.belanja-modal.perencanaan-modal');
});
Route::get('/pengerjaan-belanja-modal', function () {
    return view('pegawai.belanja-modal.pengerjaan-modal');
});
Route::get('/pelaporan-belanja-modal', function () {
    return view('pegawai.belanja-modal.pelaporan-modal');
});
Route::get('/perencanaan-belanja-barjas', function () {
    return view('pegawai.belanja-barjas.perencanaan-barjas');
});
Route::get('/pengerjaan-belanja-barjas', function () {
    return view('pegawai.belanja-barjas.pengerjaan-barjas');
});
Route::get('/pelaporan-belanja-barjas', function () {
    return view('pegawai.belanja-barjas.pelaporan-barjas');
});

// admin
Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/perjadin', function () {
    return view('admin.verifikasi.perjadin.verifikasi-perjalanan-dinas');
});
Route::get('/admin/pelaporan-perjadin', function () {
    return view('admin.verifikasi.perjadin.verifikasi-pelaporan');
});

Route::get('/admin/perencanaan-belanja-modal', function () {
    return view('admin.verifikasi.belanja-modal.perencanaan');
});
Route::get('/admin/pengerjaan-belanja-modal', function () {
    return view('admin.verifikasi.belanja-modal.pengerjaan');
});
Route::get('/admin/pelaporan-belanja-modal', function () {
    return view('admin.verifikasi.belanja-modal.pelaporan');
});

Route::get('/admin/perencanaan-belanja-barjas', function () {
    return view('admin.verifikasi.belanja-barjas.perencanaan');
});
Route::get('/admin/pengerjaan-belanja-barjas', function () {
    return view('admin.verifikasi.belanja-barjas.pengerjaan');
});
Route::get('/admin/pelaporan-belanja-barjas', function () {
    return view('admin.verifikasi.belanja-barjas.pelaporan');
});

Route::get('/login', function () {
    return view('login');
});
