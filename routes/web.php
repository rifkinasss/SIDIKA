<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\RedirectToLogin;
use App\Http\Controllers\Lead\LeadController;
use App\Http\Controllers\Lead\PerjadinController;
use App\Http\Controllers\Admin\AnggaranController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\Pegawai\BarangJasaController;
use App\Http\Controllers\Pegawai\BarangModalController;
use App\Http\Controllers\Pegawai\PerjalananDinasController;
use App\Http\Controllers\Pegawai\PelaporanPerjadinController;
use App\Http\Controllers\Admin\VerifikasiBelanjaModalController;
use App\Http\Controllers\Admin\VerifikasiPerjalananDinasController;
use App\Http\Controllers\Admin\VerifikasiBelanjaBarangJasaController;
use App\Http\Controllers\Pegawai\DashboardController as DashController;
use App\Http\Controllers\Admin\DashboardController as AdminDashController;
use App\Http\Controllers\Lead\BarangJasaController as LeadBarangJasaController;
use App\Http\Controllers\Lead\BarangModalController as LeadBarangModalController;
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
    Route::get('dashboard-superadmin/user-management/create', [UserController::class, 'create']);
    Route::post('dashboard-superadmin/user-management/create', [UserController::class, 'store']);
    Route::post('dashboard-superadmin/user-management/import', [UserController::class, 'import'])->name('import');
    Route::get('dashboard-superadmin/user-management/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('dashboard-superadmin/user-management/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('dashboard-superadmin/user-management/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware('pimpinan')->group(function () {
    Route::get('dashboard-pimpinan', [LeadController::class, 'index'])->name('pimpinan');

    // Perjalanan Dinas
    Route::get('dashboard-pimpinan/pengajuan-perjalanan-dinas', [LeadController::class, 'perjadin'])->name('perjadinLead');
    Route::get('dashboard-pimpinan/pengajuan-perjalanan-dinas/{id}', [PerjadinController::class, 'detail'])->name('detail-perjadinLead');
    Route::post('dashboard-pimpinan/pengajuan-perjalanan-dinas/{id}', [PerjadinController::class, 'update'])->name('update-perjadinLead');

    // Belanja Modal
    Route::get('dashboard-pimpinan/perencanaan-belanja-modal', [LeadController::class, 'perencanaan_barmol'])->name('perencanaan-barmol-lead');
    Route::get('dashboard-pimpinan/perencanaan-belanja-modal/{id}', [LeadBarangModalController::class, 'perencanaan_detail'])->name('detail-perencanaan-barmol-lead');
    Route::post('dashboard-pimpinan/perencanaan-belanja-modal/{id}', [LeadBarangModalController::class, 'perencanaan_verif'])->name('update-perencanaan-barmol-lead');
    Route::get('dashboard-pimpinan/pengerjaan-belanja-modal', [LeadController::class, 'pengerjaan_barmol'])->name('pengerjaan-barmol-lead');
    Route::get('dashboard-pimpinan/pengerjaan-belanja-modal/{id}', [LeadBarangModalController::class, 'pengerjaan_detail'])->name('detail-pengerjaan-barmol-lead');
    Route::post('dashboard-pimpinan/pengerjaan-belanja-modal/{id}', [LeadBarangModalController::class, 'pengerjaan_verif'])->name('update-pengerjaan-barmol-lead');
    Route::get('dashboard-pimpinan/pelaporan-belanja-modal', [LeadController::class, 'pelaporan_barmol'])->name('pelaporan-barmol-lead');
    Route::get('dashboard-pimpinan/pelaporan-belanja-modal/{id}', [LeadBarangModalController::class, 'pelaporan_detail'])->name('detail-pelaporan-barmol-lead');
    Route::post('dashboard-pimpinan/pelaporan-belanja-modal/{id}', [LeadBarangModalController::class, 'pelaporan_verif'])->name('update-pelaporan-barmol-lead');

    // Belanja Barang Jasa
    Route::get('dashboard-pimpinan/perencanaan-belanja-barjas', [LeadController::class, 'perencanaan_barjas'])->name('perencanaan-barjas-lead');
    Route::get('dashboard-pimpinan/perencanaan-belanja-barjas/{id}', [LeadBarangJasaController::class, 'perencanaan_detail'])->name('detail-perencanaan-barjas-lead');
    Route::post('dashboard-pimpinan/perencanaan-belanja-barjas/{id}', [LeadBarangJasaController::class, 'perencanaan_verif'])->name('update-perencanaan-barjas-lead');
    Route::get('dashboard-pimpinan/pengerjaan-belanja-barjas', [LeadController::class, 'pengerjaan_barjas'])->name('pengerjaan-barjas-lead');
    Route::get('dashboard-pimpinan/pengerjaan-belanja-barjas/{id}', [LeadBarangJasaController::class, 'pengerjaan_detail'])->name('detail-pengerjaan-barjas-lead');
    Route::post('dashboard-pimpinan/pengerjaan-belanja-barjas/{id}', [LeadBarangJasaController::class, 'pengerjaan_verif'])->name('update-pengerjaan-barjas-lead');
    Route::get('dashboard-pimpinan/pelaporan-belanja-barjas', [LeadController::class, 'pelaporan_barjas'])->name('pelaporan-barjas-lead');
    Route::get('dashboard-pimpinan/pelaporan-belanja-barjas/{id}', [LeadBarangJasaController::class, 'pelaporan_detail'])->name('detail-pelaporan-barjas-lead');
    Route::post('dashboard-pimpinan/pelaporan-belanja-barjas/{id}', [LeadBarangJasaController::class, 'pelaporan_verif'])->name('update-pelaporan-barjas-lead');
});

Route::middleware('admin')->group(function () {
    Route::get('dashboard-admin', [AdminDashController::class, 'index'])->name('admin');

    // Perjalanan Dinas
    Route::get('dashboard-admin/pengajuan-perjalanan-dinas', [AdminDashController::class, 'Pengajuan'])->name('pengajuan');
    Route::get('dashboard-admin/pengajuan-perjalanan-dinas/{id}', [VerifikasiPerjalananDinasController::class, 'detail'])->name('detail-perjadin.index');
    Route::post('dashboard-admin/pengajuan-perjalanan-dinas/{id}/send-notification', [VerifikasiPerjalananDinasController::class, 'kirimNotifPimpinan'])->name('perjadin.kirimNotifPimpinan');

    // Pelaporan Perjalanan Dinas
    Route::get('dashboard-admin/pelaporan-perjalanan-dinas', [AdminDashController::class, 'Pelaporan']);

    // Belanja Barang Jasa
    Route::get('dashboard-admin/perencanaan-belanja-barjas', [AdminDashController::class, 'Perencanaanbarjas']);
    Route::get('dashboard-admin/perencanaan-belanja-barjas/{id}', [VerifikasiBelanjaBarangJasaController::class, 'detailPerencanaanbarjas'])->name('detail-perencanaan-barjas');
    Route::post('dashboard-admin/perencanaan-beanja-barjas/{id}/send-notification', [VerifikasiBelanjaBarangJasaController::class, 'perencanaan_kirimNotifPimpinan'])->name('perencanaan-belanja-barjas.kirimNotifPimpinan');
    Route::get('dashboard-admin/pengerjaan-belanja-barjas', [AdminDashController::class, 'Pengerjaanbarjas'])->name('pengerjaan-barang-barjas');
    Route::get('dashboard-admin/pengerjaan-belanja-barjas/{id}', [VerifikasiBelanjaBarangJasaController::class, 'detailPengerjaanbarjas'])->name('detail-pengerjaan-barjas');
    Route::post('dashboard-admin/pengerjaan-belanja-barjas/{id}/send-notification', [VerifikasiBelanjaBarangJasaController::class, 'pengerjaan_kirimNotifPimpinan'])->name('pengerjaan-belanja-barjas.kirimNotifPimpinan');
    Route::get('dashboard-admin/pelaporan-belanja-barjas', [AdminDashController::class, 'Pelaporanbarjas'])->name('pelaporan-barang-barjas');
    Route::get('dashboard-admin/pelaporan-belanja-barjas/{id}', [VerifikasiBelanjaBarangJasaController::class, 'detailPelaporanbarjas'])->name('detail-pelaporan-barjas');
    Route::post('dashboard-admin/pelaporan-belanja-barjas/{id}/send-notification', [VerifikasiBelanjaBarangJasaController::class, 'pelaporan_kirimNotifPimpinan'])->name('pelaporan-belanja-barjas.kirimNotifPimpinan');

    // Belanja Modal
    Route::get('dashboard-admin/perencanaan-belanja-modal', [AdminDashController::class, 'Perencanaanbarmol'])->name('perencanaan-barang-modal');
    Route::get('dashboard-admin/perencanaan-belanja-modal/{id}', [VerifikasiBelanjaModalController::class, 'detailPerencanaanbarmol'])->name('detail-perencanaan-barmod');
    Route::post('dashboard-admin/perencanaan-beanja-modal/{id}/send-notification', [VerifikasiBelanjaModalController::class, 'perencanaan_kirimNotifPimpinan'])->name('perencanaan-belanja-modal.kirimNotifPimpinan');
    Route::get('dashboard-admin/pengerjaan-belanja-modal', [AdminDashController::class, 'Pengerjaanbarmol'])->name('pengerjaan-barang-modal');
    Route::get('dashboard-admin/pengerjaan-belanja-modal/{id}', [VerifikasiBelanjaModalController::class, 'detailPengerjaanbarmol'])->name('detail-pengerjaan-barmod');
    Route::post('dashboard-admin/pengerjaan-belanja-modal/{id}/send-notification', [VerifikasiBelanjaModalController::class, 'pengerjaan_kirimNotifPimpinan'])->name('pengerjaan-belanja-modal.kirimNotifPimpinan');
    Route::get('dashboard-admin/pelaporan-belanja-modal', [AdminDashController::class, 'Pelaporanbarmol'])->name('pelaporan-barang-modal');
    Route::get('dashboard-admin/pelaporan-belanja-modal/{id}', [VerifikasiBelanjaModalController::class, 'detailPelaporanbarmol'])->name('detail-pelaporan-barmod');
    Route::post('dashboard-admin/pelaporan-belanja-modal/{id}/send-notification', [VerifikasiBelanjaModalController::class, 'pelaporan_kirimNotifPimpinan'])->name('pelaporan-belanja-modal.kirimNotifPimpinan');

    // Anggaran Biaya
    Route::get('dashboard-admin/anggaran-perjalanan-dinas', [AnggaranController::class, 'PerjalananDinas'])->name('BiayaPerjadin');
    Route::post('dashboard-admin/anggaran-perjalanan-dinas/store', [AnggaranController::class, 'AjukanPerjadin'])->name('AjukanPerjadin');
});

Route::middleware('pegawai')->group(function () {
    Route::get('dashboard', [Dashcontroller::class, 'index'])->name('pegawai');

    // Ketentuan-ketentuan
    Route::get('/ketentuan-perjalanan-dinas', [Dashcontroller::class, 'ketentuanPerjadin'])->name('ketentuan-perjalanan-dinas');
    Route::get('/ketentuan-belanja-modal', [Dashcontroller::class, 'ketentuanBarMol'])->name('ketentuan-belanja-modal');
    Route::get('/ketentuan-belanja-barang-jasa', [Dashcontroller::class, 'ketentuanBarJas'])->name('ketentuan-belanja-barang-jasa');
    Route::get('/bantuan', [Dashcontroller::class, 'bantuan'])->name('bantuan');

    // Profile
    Route::get('profile/{id}', [Dashcontroller::class, 'profile'])->name('profile');
    Route::get('profile/upload/{id}', [Dashcontroller::class, 'uploadfoto'])->name('uploadfoto');

    // Perjalanan Dinas
    Route::get('pengajuan-perjalanan-dinas', [PerjalananDinasController::class, 'index']);
    Route::post('pengajuan-perjalanan-dinas', [PerjalananDinasController::class, 'pengajuan'])->name('pengajuan-perjalanan-dinas');
    Route::post('pengajuan-perjalanan-dinas/kota', [PerjalananDinasController::class, 'getkota'])->name('getkota');
    Route::get('pelaporan-perjalanan-dinas/{id}', [PelaporanPerjadinController::class, 'show'])->name('pelaporan-perjalanan-dinas');
    Route::post('pelaporan-perjalanan-dinas/{id}', [PelaporanPerjadinController::class, 'store'])->name('pelaporan-perjalanan-dinas.store');

    // Belanja Modal
    Route::get('perencanaan-belanja-modal', [BarangModalController::class, 'perencanaan']);
    Route::post('perencanaan-belanja-modal', [BarangModalController::class, 'store'])->name('perencanaan-belanja-modal.store');
    Route::get('pengerjaan-belanja-modal/{id}', [BarangModalController::class, 'pengerjaan'])->name('pengerjaan-belanja-modal');
    Route::post('pengerjaan-belanja-modal/{id}', [BarangModalController::class, 'PengerjaanUpdate'])->name('pengerjaan-belanja-modal.update');
    Route::get('/get-regencies/{province_name}', [BarangModalController::class, 'getRegenciesByProvinceName'])->name('get-regencies');
    Route::get('pelaporan-belanja-modal/{id}', [BarangModalController::class, 'pelaporan'])->name('pelaporan-belanja-modal');
    Route::post('pelaporan-belanja-modal/{id}', [BarangModalController::class, 'PelaporanUpdate'])->name('pelaporan-belanja-modal.update');

    // Belanja Barang Jasa
    Route::get('perencanaan-belanja-barjas', [BarangJasaController::class, 'perencanaan']);
    Route::post('perencanaan-belanja-barjas', [BarangJasaController::class, 'store'])->name('perencanaan-belanja-barjas.store');
    Route::get('pengerjaan-belanja-barjas/{id}', [BarangJasaController::class, 'pengerjaan'])->name('pengerjaan-belanja-barjas');
    Route::post('pengerjaan-belanja-barjas/{id}', [BarangJasaController::class, 'PengerjaanUpdate'])->name('pengerjaan-belanja-barjas.update');
    Route::get('/get-regencies/{province_name}', [BarangJasaController::class, 'getRegenciesByProvinceName'])->name('get-regencies');
    Route::get('pelaporan-belanja-barjas/{id}', [BarangJasaController::class, 'pelaporan'])->name('pelaporan-belanja-barjas');
    Route::post('pelaporan-belanja-barjas/{id}', [BarangJasaController::class, 'PelaporanUpdate'])->name('pelaporan-belanja-barjas.update');
});
