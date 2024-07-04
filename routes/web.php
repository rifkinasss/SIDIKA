<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashController;
use App\Http\Controllers\Admin\DashboardController as AdminDashController;

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


Route::get('/admin/perjadin', function () {
    return view('admin.verifikasi.perjadin.verifikasi-perjalanan-dinas');
});
Route::get('/admin/pelaporan-perjadin', function () {
    return view('admin.verifikasi.perjadin.verifikasi-pelaporan');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('superadmin')->group(function () {
    Route::get('dashboard-superadmin', [SuperAdminDashController::class, 'index'])->name('superadmin');
    Route::get('dashboard-superadmin/user-management', [UserController::class, 'index'])->name('user-management');
    Route::get('dashboard-superadmin/user-management/tambah', [UserController::class, 'create']);
    Route::post('dashboard-superadmin/user-management/tambah', [UserController::class, 'store']);
    Route::get('dashboard-superadmin/user-management/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('dashboard-superadmin/user-management/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('dashboard-superadmin/user-management/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});


Route::get('dashboard-admin', [AdminDashController::class, 'index'])->name('admin');
Route::get('dashboard-admin/pengajuan-perjalanan-dinas', [AdminDashController::class, 'Pengajuan'])->name('admin');
Route::get('dashboard-admin/pelaporan-perjalanan-dinas', [AdminDashController::class, 'Pelaporan'])->name('admin');
Route::get('dashboard-admin/perencanaan-belanja-barjas', [AdminDashController::class, 'Perencanaanbarjas'])->name('admin');
Route::get('dashboard-admin/perencanaan-belanja-modal', [AdminDashController::class, 'Perencanaanbarmol'])->name('admin');
