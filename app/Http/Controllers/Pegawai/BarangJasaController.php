<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\BarangJasa;
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

    public function show($id)
    {
        $barjas = BarangJasa::find($id);
        return view('pegawai.laporan_belanja-barang-jasa', compact('barjas'));
    }

    public function update(Request $request, string $id)
    {
        $barjas = BarangJasa::find($id);

        if ($barjas->status_lapor == 'Belum') {
            $tgl_spmk = Carbon::createFromFormat('Y-m-d', $request->tgl_spmk);
            $tgl_bast = Carbon::createFromFormat('Y-m-d', $request->tgl_bast);
            $tgl_pho = Carbon::createFromFormat('Y-m-d', $request->tgl_pho);
            $tgl_fho = Carbon::createFromFormat('Y-m-d', $request->tgl_fho);
            $tgl_sp2d = Carbon::createFromFormat('Y-m-d', $request->tgl_sp2d);

            $barjas->update([
                'tgl_spmk' => $tgl_spmk,
                'tgl_bast' => $tgl_bast,
                'nilai_bast' => $request->nilai_bast,
                'tgl_pho' => $tgl_pho,
                'tgl_fho' => $tgl_fho,
                'tgl_sp2d' => $tgl_sp2d,
                'nilai_sp2d' => $request->nilai_sp2d,
                'persentase_progress' => $request->persentase_progress,
                'status_lapor' => 'Lapor',
            ]);
        } elseif ($barjas->status_lapor != 'Belum') {
            $barjas->update([
                'persentase_progress' => $request->persentase_progress,
            ]);
        }

        return redirect()->route('pegawai')->with('pel-belanja-barjas', 'Progress dokumen belanja barang jasa berhasil diperbarui.');
    }
}
