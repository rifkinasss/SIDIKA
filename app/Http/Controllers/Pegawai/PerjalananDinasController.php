<?php

namespace App\Http\Controllers\Pegawai;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai\PerjalananDinas;
use App\Models\Province;
use App\Models\Regency;

class PerjalananDinasController extends Controller
{
    public function index()
    {
        $provinces = Province::all();

        $title = 'Perjalanan Dinas';
        return view('pegawai.perjadin.perjadin', compact('title', 'provinces'));
    }

    public function getkota(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $kotas = Regency::where('province_id', $id_provinsi)->get();

        $option = "<option selected>Pilih Kota/Kabupaten</option>";
        foreach ($kotas as $kota) {
            echo "<option value='$kota->id'>$kota->name</option>";
        }

        echo $option;
    }
    public function pengajuan(Request $request)
    {
        $tglBerangkat = Carbon::createFromFormat('Y-m-d', $request->tgl_berangkat);
        $tglKembali = Carbon::createFromFormat('Y-m-d', $request->tgl_kembali);
        $jumlah_hari = $tglKembali->diffInDays($tglBerangkat);

        $jmlh_uang_harian = (int)$request->uang_harian * (int)$jumlah_hari;

        $jmlh_uang_harian = (float)$jmlh_uang_harian;
        $biaya_akomodasi = (float)$request->biaya_akomodasi;
        $biaya_lain = (float)$request->biaya_lain;
        $biaya_tiket_pp = (float)$request->biaya_tiket_pp;

        if (!is_numeric($jmlh_uang_harian) || !is_numeric($biaya_akomodasi) || !is_numeric($biaya_lain) || !is_numeric($biaya_tiket_pp)) {
            return response()->json(['error' => 'Input tidak valid'], 400);
        }
        $jumlah_biaya = $jmlh_uang_harian + $biaya_akomodasi + $biaya_lain + $biaya_tiket_pp;

        PerjalananDinas::create([
            // Data Diri
            'user_id' => Auth::id(),

            // Keperluan Perjalanan Dinas
            'jns_perjadin' => $request->jns_perjadin,
            'keperluan_perjadin' => $request->keperluan_perjadin,
            'provinsi' => $request->provinsi,
            'kota_kab' => $request->kota_kab,

            // Perencanaan Tanggal Perjalanan Dinas
            'tgl_berangkat' => $request->tgl_berangkat,
            'tgl_kembali' => $request->tgl_kembali,
            'jumlah_hari' => $jumlah_hari,

            // Rincian Biaya
            'uang_harian' => $request->uang_harian,
            'jmlh_uang_harian' => $jmlh_uang_harian,
            'biaya_akomodasi' => $request->biaya_akomodasi,
            'biaya_lain' => $request->biaya_lain,
            'biaya_tiket_pp' => $request->biaya_tiket_pp,
            'uang_representasi' => $request->uang_representasi,
            'jumlah_biaya' => $jumlah_biaya,

            // Bukti Surat Tugas
            'bukti_surat_tugas' => $request->bukti_surat_tugas,
            // 'file_surat_tugas' => $request->file('surat_tugas')->store('surat_tugas'),
        ]);

        return redirect()->route('pegawai')->with('perjadin', 'Pengajuan perjalanan dinas berhasil dibuat.');
    }
    public function destroy(string $id)
    {
        $perjadin = PerjalananDinas::find($id);
        $perjadin->delete();
        return redirect()->route('pegawai');
    }
}
