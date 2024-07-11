<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Pegawai\PelaporanPerjadin;

class PelaporanPerjadinController extends Controller
{
    public function show($id)
    {
        $perjadin = PerjalananDinas::findOrFail($id);
        $title = 'Pelaporan Perjalanan Dinas';
        return view('pegawai.perjadin.pelaporan-perjadin', compact('title', 'perjadin'));
    }

    public function store(Request $request, $id)
    {
        $perjadin = PerjalananDinas::find($id);

        if ($request->hasFile('bukti_akomodasi')) {
            $file = $request->file('bukti_akomodasi');
            $id = Auth::user()->id;
            $filename = $id . time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_akomodasi', $filename, 'public');
        }
        if ($request->hasFile('bukti_biaya_lain')) {
            $file = $request->file('bukti_biaya_lain');
            $id = Auth::user()->id;
            $filename = $id . time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_biaya_lain', $filename, 'public');
        }
        if ($request->hasFile('bukti_tiket_pp')) {
            $file = $request->file('bukti_tiket_pp');
            $id = Auth::user()->id;
            $filename = $id . time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_tiket_pp', $filename, 'public');
        }
        if ($request->hasFile('bukti_brgkt')) {
            $file = $request->file('bukti_brgkt');
            $id = Auth::user()->id;
            $filename = $id . time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_brgkt', $filename, 'public');
        }
        if ($request->hasFile('bukti_kmbl')) {
            $file = $request->file('bukti_kmbl');
            $id = Auth::user()->id;
            $filename = $id . time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_kmbl', $filename, 'public');
        }
        if ($request->hasFile('bukti_uang_representasi')) {
            $file = $request->file('bukti_uang_representasi');
            $id = Auth::user()->id;
            $filename = $id . time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_uang_representasi', $filename, 'public');
        }

        $perjadin->update([
            'perjalanan_dinas_id' => $perjadin->id,
            'user_id' => Auth::user()->id,
            'uang_harian' => $request->uang_harian,
            'jmlh_uang_harian' => $request->jmlh_uang_harian,
            'biaya_akomodasi' => $request->biaya_akomodasi,
            'nama_jns_penginapan' => $request->nama_jns_penginapan,
            'bukti_akomodasi' => '/storage/' . $filePath,
            'biaya_lain' => $request->biaya_lain,
            'penggunaan_biaya' => $request->penggunaan_biaya,
            'bukti_biaya_lain' => '/storage/' . $filePath,
            'biaya_tiket_pp' => '/storage/' . $filePath,
            'tgl_brgkt' => $request->tgl_brgkt,
            'tgl_kmbl' => $request->tgl_kmbl,
            'jns_transport_brgkt' => $request->jns_transport_brgkt,
            'jns_transport_kmbl' => $request->jns_transport_kmbl,
            'nama_transport_brgkt' => $request->nama_transport_brgkt,
            'nama_transport_kmbl' => $request->nama_transport_kmbl,
            'nomor_tiket_brgkt' => $request->nomor_tiket_brgkt,
            'nomor_tiket_kmbl' => $request->nomor_tiket_kmbl,
            'nomor_kursi_brgkt' => $request->nomor_kursi_brgkt,
            'nomor_kursi_kmbl' => $request->nomor_kursi_kmbl,
            'status_brgkt' => $request->status_brgkt,
            'status_kmbl' => $request->status_kmbl,
            'biaya_brgkt' => $request->biaya_brgkt,
            'biaya_kmbl' => $request->biaya_kmbl,
            'bukti_brgkt' => '/storage/' . $filePath,
            'bukti_kmbl' => '/storage/' . $filePath,
            'uang_representasi' => $request->uang_representasi,
            'bukti_uang_representasi' => '/storage/' . $filePath,
            'jumlah_biaya' => $request->jumlah_biaya,
        ]);
    }

    public function destroy(string $id)
    {
        $pelaporan = PelaporanPerjadin::find($id);
        $pelaporan->delete();
        return redirect()->route('pegawai');
    }
}
