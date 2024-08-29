<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\BarangJasa;
use App\Models\Province;
use App\Models\Regency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangJasaController extends Controller
{
    public function perencanaan()
    {
        $title = 'Perencanaan Belanja Barang Jasa';
        return view('pegawai.belanja-barjas.perencanaan-barjas', compact('title'));
    }

    public function pengerjaan(string $id)
    {
        $title = 'Pengerjaan Belanja Modal';
        $barjas = BarangJasa::find($id);
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('pegawai.belanja-barjas.pengerjaan-barjas', compact('barjas', 'provinces', 'regencies', 'title'));
    }

    public function store(Request $request)
    {
        $tgl_mulai = Carbon::createFromFormat('Y-m-d', $request->tgl_mulai);
        $tgl_selesai = Carbon::createFromFormat('Y-m-d', $request->tgl_selesai);

        $request->validate([
            'dokumen_rab' => 'mimes:pdf|max:2048',
        ]);

        // Handle file upload bukti dokumen rab
        $file = $request->file('dokumen_rab');
        $path = $file->store('public/belanja_barjas/dokumen_rab');

        BarangJasa::create([
            'user_id' => Auth::id(),
            'latar_belakang' => $request->latar_belakang,
            'tujuan' => $request->tujuan,
            'deskripsi_kebutuhan' => $request->deskripsi_kebutuhan,
            'estimasi_biaya' => $request->estimasi_biaya,
            'jns_belanja' => $request->jns_belanja,
            'lainnya' => $request->lainnya,
            'tgl_mulai' => $tgl_mulai,
            'tgl_selesai' => $tgl_selesai,
            'durasi' => $request->durasi,
            'dokumen_rab' => $path,
            'deskripsi_spesifikasi' => $request->deskripsi_spesifikasi,
        ]);

        return redirect()->route('pegawai')->with('belanja-barjas', 'Pengajuan belanja barang jasa berhasil dikirim.');
    }
}
