<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Anggaran;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Pegawai\PerjalananDinas;

class AnggaranController extends Controller
{
    public function PerjalananDinas()
    {
        $total_biaya = PerjalananDinas::pluck('jumlah_biaya')
            ->map(function ($value) {
                $cleanValue = str_replace(['Rp', '.', ' '], '', $value);
                return (int) $cleanValue;
            })->sum();

        $anggaran = DB::table('anggarans')->value('anggaran_perjalanan_dinas');

        $replace = (int) str_replace(['Rp', '.', ' '], '', $anggaran);

        $belum = $replace - $total_biaya;

        $sdhpake = 'Rp ' . number_format($total_biaya, 0, ',', '.');
        $blmpake = 'Rp ' . number_format($belum, 0, ',', '.');

        $anggaran = Anggaran::all();
        $title = 'Anggaran Biaya Perjalanan Dinas';
        return view('admin.anggaran.perjadin.index', compact('title', 'anggaran', 'sdhpake', 'blmpake'));
    }

    public function AjukanPerjadin(Request $request)
    {
        $request->validate([
            'anggaran_perjalanan_dinas' => 'required|string',
        ]);

        Anggaran::create([
            'anggaran_perjalanan_dinas' => $request->anggaran_perjalanan_dinas,
            'anggaran_belanja_modal' => "Rp. 0",
            'anggaran_belanja_barang_jasa' => "Rp. 0",
            'total_anggaran' => "Rp. 0",
            'tahun_anggaran' => $request->tahun_anggaran
        ]);

        return redirect()->back()->with('success', 'Anggaran perjalanan dinas berhasil diajukan.');
    }

    public function BelanjaModal()
    {
        $title = 'Anggaran Biaya Belanja Modal';
        return view('admin.anggaran.belanja-modal.index', compact('title'));
    }
    public function BelanjaBarjas()
    {
        $title = 'Anggaran Biaya Belanja Barang Jasa';
        return view('admin.anggaran.belanja-barjas.index', compact('title'));
    }
}
