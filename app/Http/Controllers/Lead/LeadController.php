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
}
