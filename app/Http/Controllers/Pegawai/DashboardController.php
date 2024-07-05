<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Models\Pegawai\BarangJasa;
use App\Models\Pegawai\BarangModal;
use App\Http\Controllers\Controller;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $perjadin = PerjalananDinas::all();
        $pelaporan = PelaporanPerjadin::all();
        $barjas = BarangJasa::all();
        $barmol = BarangModal::all();
        return view('pegawai.index', compact('title', 'perjadin', 'barjas', 'barmol', 'pelaporan'));
    }
}
