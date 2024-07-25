<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RedirectToLogin;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\Pegawai\PerjalananDinasController;
use App\Http\Controllers\Pegawai\PelaporanPerjadinController;
use App\Http\Controllers\Pegawai\DashboardController as DashController;
use App\Http\Controllers\Admin\DashboardController as AdminDashController;
use App\Http\Controllers\Admin\VerifikasiBelanjaModalController;
use App\Http\Controllers\Admin\VerifikasiBelanjaBarangJasaController;
use App\Http\Controllers\Pegawai\BarangJasaController;
use App\Http\Controllers\Pegawai\BarangModalController;
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
    Route::post('dashboard-superadmin/user-management/import', [UserController::class, 'import'])->name('import');
    Route::get('dashboard-superadmin/user-management/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('dashboard-superadmin/user-management/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('dashboard-superadmin/user-management/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware('admin')->group(function () {
    Route::get('dashboard-admin', [AdminDashController::class, 'index'])->name('admin');
    
    // Perjalanan Dinas
    Route::get('dashboard-admin/pengajuan-perjalanan-dinas', [AdminDashController::class, 'Pengajuan']);
    Route::get('dashboard-admin/pelaporan-perjalanan-dinas', [AdminDashController::class, 'Pelaporan']);
    
    // Belanja Barang Jasa
    Route::get('dashboard-admin/perencanaan-belanja-barjas', [AdminDashController::class, 'Perencanaanbarjas']);
    Route::post('dashboard-admin/perencanaan-belanja-barjas/{id}', [VerifikasiBelanjaBarangJasaController::class, 'verif'])->name('perencanaan-belanja-barjas.verif');
    Route::get('dashboard-admin/pengerjaan-belanja-barjas', [AdminDashController::class, 'Pengerjaanbarjas']);
    Route::get('dashboard-admin/pelaporan-belanja-barjas', [AdminDashController::class, 'Pelaporanbarjas']);

    // Belanja Modal
    Route::get('dashboard-admin/perencanaan-belanja-modal', [AdminDashController::class, 'Perencanaanbarmol']);
    Route::post('dashboard-admin/perencanaan-belanja-modal/{id}', [VerifikasiBelanjaModalController::class, 'verif'])->name('perencanaan-belanja-modal.verif');
    Route::get('dashboard-admin/pengerjaan-belanja-modal', [AdminDashController::class, 'Pengerjaanbarmol']);
    Route::get('dashboard-admin/pelaporan-belanja-modal', [AdminDashController::class, 'Pelaporanbarmol']);
});

Route::middleware('pegawai')->group(function () {
    Route::get('dashboard', [Dashcontroller::class, 'index'])->name('pegawai');
    
    // Profile
    Route::get('profile/{id}', [Dashcontroller::class, 'profile'])->name('profile');
    Route::get('profile/upload/{id}', [Dashcontroller::class, 'uploadfoto'])->name('uploadfoto');

    // Perjalanan Dinas
    Route::get('pengajuan-perjalanan-dinas', [PerjalananDinasController::class, 'index']);
    Route::get('ketentuan-perjalanan-dinas', [PerjalananDinasController::class, 'ketentuan'])->name('ketentuan-perjalanan-dinas');
    Route::post('pengajuan-perjalanan-dinas', [PerjalananDinasController::class, 'pengajuan'])->name('pengajuan-perjalanan-dinas');
    Route::post('pengajuan-perjalanan-dinas/kota', [PerjalananDinasController::class, 'getkota'])->name('getkota');
    Route::get('pelaporan-perjalanan-dinas/{id}', [PelaporanPerjadinController::class, 'show'])->name('pelaporan-perjalanan-dinas.show');
    Route::post('pelaporan-perjalanan-dinas/{id}', [PelaporanPerjadinController::class, 'store'])->name('pelaporan-perjalanan-dinas.store');
    
    // Belanja Modal
    Route::get('perencanaan-belanja-modal', [BarangModalController::class, 'perencanaan']);
    Route::post('perencanaan-belanja-modal', [BarangModalController::class, 'store'])->name('perencanaan-belanja-modal.store');
    Route::get('pengerjaan-belanja-modal/{id}', [BarangModalController::class, 'pengerjaan'])->name('pengerjaan-belanja-modal');
    Route::post('pengerjaan-belanja-modal/{id}', [BarangModalController::class, 'update'])->name('pengerjaan-belanja-modal.update');
    Route::get('/get-regencies/{province_name}', [BarangModalController::class, 'getRegenciesByProvinceName'])->name('get-regencies');
    
    // Belanja Barang Jasa
    Route::get('perencanaan-belanja-barjas', [BarangJasaController::class, 'perencanaan']);
    Route::post('perencanaan-belanja-barjas', [BarangJasaController::class, 'store'])->name('perencanaan-belanja-barjas.store');
});

Route::get('/pelaporan-perjadin', function () {
    return view('pegawai.perjadin.pelaporan-perjadin');
});

Route::get('/pelaporan-belanja-modal', function () {
    $title = '';
    return view('pegawai.belanja-modal.pelaporan-modal', compact('title'));
});

Route::get('/pengerjaan-belanja-barjas', function () {
    return view('pegawai.belanja-barjas.pengerjaan-barjas', ['title' => '']);
});
Route::get('/pelaporan-belanja-barjas', function () {
    return view('pegawai.belanja-barjas.pelaporan-barjas', ['title' => '']);
});

Route::get('/ketentuan-perjadin', function () {
    return view('pegawai.perjadin.ket-perjadin', [
        'title' => 'Ketentuan Perjalanan Dinas'
    ]);
});
