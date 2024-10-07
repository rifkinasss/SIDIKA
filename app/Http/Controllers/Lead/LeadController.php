<?php

namespace App\Http\Controllers\Lead;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pegawai\BarangJasa;
use App\Models\Pegawai\BarangModal;
use App\Http\Controllers\Controller;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;

class LeadController extends Controller
{
    public function index()
    {
        $jmlhuser = User::count();
        $jmlhperjadin = PerjalananDinas::count();
        $jmlhpelaporan = PelaporanPerjadin::count();
        $jmlhbarjas = BarangJasa::count();
        $jmlhbarmol = BarangModal::count();
        $title = 'Dashboard';
        return view('lead.index', compact('jmlhuser', 'title', 'jmlhbarjas', 'jmlhperjadin', 'jmlhbarmol', 'jmlhpelaporan'));
    }

    public function perjadin()
    {
        $title = 'Perjalanan Dinas';
        $perjadin = PerjalananDinas::all();
        return view('lead.verifikasi.perjadin.index', compact('perjadin', 'title'));
    }

    public function perencanaan_barmol()
    {
        $title = 'Belanja Modal';
        $barmol = BarangModal::all();
        return view('lead.verifikasi.belanja-modal.perencanaan', compact('barmol', 'title'));
    }
    
    public function pengerjaan_barmol()
    {
        $title = 'Belanja Modal';
        $barmol = BarangModal::all();
        return view('lead.verifikasi.belanja-modal.pengerjaan', compact('barmol', 'title'));
    }
    
    public function pelaporan_barmol()
    {
        $title = 'Belanja Modal';
        $barmol = BarangModal::all();
        return view('lead.verifikasi.belanja-modal.pelaporan', compact('barmol', 'title'));
    }

    public function perencanaan_barjas()
    {
        $title = 'Belanja Modal';
        $barjas = BarangJasa::all();
        return view('lead.verifikasi.barang-jasa.perencanaan', compact('barjas', 'title'));
    }

    public function pengerjaan_barjas()
    {
        $title = 'Belanja Modal';
        $barjas = BarangJasa::all();
        return view('lead.verifikasi.barang-jasa.pengerjaan', compact('barjas', 'title'));
    }

    public function pelaporan_barjas()
    {
        $title = 'Belanja Modal';
        $barjas = BarangJasa::all();
        return view('lead.verifikasi.barang-jasa.pelaporan', compact('barjas', 'title'));
    }
}
