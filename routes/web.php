<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RedirectToLogin;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\Pegawai\PerjalananDinasController;
use App\Http\Controllers\Pegawai\DashboardController as DashController;
use App\Http\Controllers\Admin\DashboardController as AdminDashController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashController;

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

Route::middleware([RedirectToLogin::class])->group(function () {
    Route::get('/', function () {
        return redirect('/login');
    });
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

Route::middleware('admin')->group(function () {
    Route::get('dashboard-admin', [AdminDashController::class, 'index'])->name('admin');
    Route::get('dashboard-admin/pengajuan-perjalanan-dinas', [AdminDashController::class, 'Pengajuan']);
    Route::get('dashboard-admin/pelaporan-perjalanan-dinas', [AdminDashController::class, 'Pelaporan']);
    Route::get('dashboard-admin/perencanaan-belanja-barjas', [AdminDashController::class, 'Perencanaanbarjas']);
    Route::get('dashboard-admin/pengerjaan-belanja-barjas', [AdminDashController::class, 'Pengerjaanbarjas']);
    Route::get('dashboard-admin/pelaporan-belanja-barjas', [AdminDashController::class, 'Pelaporanbarjas']);
    Route::get('dashboard-admin/perencanaan-belanja-modal', [AdminDashController::class, 'Perencanaanbarmol']);
    Route::get('dashboard-admin/pengerjaan-belanja-modal', [AdminDashController::class, 'Pengerjaanbarmol']);
    Route::get('dashboard-admin/pelaporan-belanja-modal', [AdminDashController::class, 'Pelaporanbarmol']);
});

Route::middleware('pegawai')->group(function () {
    Route::get('dashboard', [Dashcontroller::class, 'index'])->name('pegawai');
    Route::get('pengajuan-perjalanan-dinas', [PerjalananDinasController::class, 'index']);
    Route::post('pengajuan-perjalanan-dinas', [PerjalananDinasController::class, 'pengajuan'])->name('pengajuan-perjalanan-dinas');
    Route::post('pengajuan-perjalanan-dinas/kota', [PerjalananDinasController::class, 'getkota'])->name('getkota');
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
