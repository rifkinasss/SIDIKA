<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai\BarangModal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BarangModalController extends Controller
{
    public function detail(string $id)
    {
        $barmod = BarangModal::find($id);
        return view('pegawai.detail.detail-belanja-modal', compact('barmod'));
    }

    public function create()
    {
        $title = 'Perencanaan Belanja Modal';
        return view('pegawai.belanja-modal.perencanaan-modal', compact('title'));
    }

    public function store(Request $request)
    {
        $tgl_mulai = Carbon::createFromFormat('Y-m-d', $request->tgl_mulai);
        $tgl_selesai = Carbon::createFromFormat('Y-m-d', $request->tgl_selesai);
        
        BarangModal::create([
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
            'deskripsi_spesifikasi' => $request->deskripsi_spesifikasi,
        ]);

        return redirect()->route('pegawai');
    }

    public function show($id)
    {
        $barmod = BarangModal::find($id);
        return view('pegawai.laporan_belanja-modal', compact('barmod'));
    }

    public function update(Request $request, string $id)
    {
        $barmod = BarangModal::find($id);

        if ($barmod->status_lapor == 'Belum') {
            $tgl_spmk = Carbon::createFromFormat('Y-m-d', $request->tgl_spmk);
            $tgl_bast = Carbon::createFromFormat('Y-m-d', $request->tgl_bast);
            $tgl_pho = Carbon::createFromFormat('Y-m-d', $request->tgl_pho);
            $tgl_fho = Carbon::createFromFormat('Y-m-d', $request->tgl_fho);
            $tgl_sp2d = Carbon::createFromFormat('Y-m-d', $request->tgl_sp2d);

            $barmod->update([
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
        } elseif ($barmod->status_lapor != 'Belum') {
            $barmod->update([
                'persentase_progress' => $request->persentase_progress,
            ]);
        }

        return redirect()->route('pegawai')->with('pel-belanja-modal', 'Progress dokumen belanja modal berhasil diperbarui.');
    }
}
