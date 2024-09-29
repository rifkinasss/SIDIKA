<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pegawai\BarangJasa;
use App\Models\Pegawai\BarangModal;
use App\Http\Controllers\Controller;
use App\Models\Pegawai\PelaporanPerjadin;
use App\Models\Pegawai\PerjalananDinas;

class DashboardController extends Controller
{
    public function index()
    {
        $jmlhuser = User::count();
        $jmlhperjadin = PerjalananDinas::count();
        $jmlhpelaporan = PelaporanPerjadin::count();
        $jmlhbarjas = BarangJasa::count();
        $jmlhbarmol = BarangModal::count();
        $title = 'Dashboard';
        return view('admin.index', compact('jmlhuser', 'title', 'jmlhbarjas', 'jmlhperjadin', 'jmlhbarmol', 'jmlhpelaporan'));
    }

    public function Pengajuan()
    {
        $title = 'Perjalanan Dinas';
        $perjadin = PerjalananDinas::all();
        return view('admin.verifikasi.perjadin.index', compact('perjadin', 'title'));
    }

    public function Pelaporan()
    {
        $title = 'Perjalanan Dinas';
        $pelaporan = PelaporanPerjadin::all();

        return view('admin.pelaporan-perjadin', compact('pelaporan', 'title'));
    }

    public function Perencanaanbarjas()
    {
        $title = 'Perencanaan Barang Jasa';
        $barjas = BarangJasa::all();
        return view('admin.verifikasi.belanja-barjas.perencanaan', compact('barjas', 'title'));
    }
    public function Pengerjaanbarjas()
    {
        $title = 'Pengerjaan Barang Jasa';
        $barjas = BarangJasa::all();
        return view('admin.verifikasi.belanja-barjas.pengerjaan', compact('barjas', 'title'));
    }
    public function Pelaporanbarjas()
    {
        $title = 'Pelaporan Barang Jasa';
        $barjas = BarangJasa::all();
        return view('admin.verifikasi.belanja-barjas.pelaporan', compact('barjas', 'title'));
    }

    public function Perencanaanbarmol()
    {
        $title = 'Perencanaan Barang Modal';
        $barmol = BarangModal::all();
        return view('admin.verifikasi.belanja-modal.perencanaan', compact('barmol', 'title'));
    }
    public function Pengerjaanbarmol()
    {
        $title = 'Pengerjaan Barang Modal';
        $barmol = BarangModal::all();
        return view('admin.verifikasi.belanja-modal.pengerjaan', compact('barmol', 'title'));
    }
    public function Pelaporanbarmol()
    {
        $title = 'Pelaporan Barang Modal';
        $barmol = BarangModal::all();
        return view('admin.verifikasi.belanja-modal.pelaporan', compact('barmol', 'title'));
    }
}
