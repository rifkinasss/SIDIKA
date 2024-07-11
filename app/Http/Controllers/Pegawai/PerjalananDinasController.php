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

    public function ketentuan()
    {
        $title = 'Ketentuan Perjalanan Dinas';
        return view('pegawai.perjadin.ket-perjadin', compact('title'));
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
        $request->validate([
            'bukti_surat_tugas' => 'required|mimes:pdf|max:10204', // Validasi file PDF maksimal 2MB
        ]);

        $tglBerangkat = Carbon::createFromFormat('Y-m-d', $request->tgl_berangkat);
        $tglKembali = Carbon::createFromFormat('Y-m-d', $request->tgl_kembali);
        $jumlah_hari = $tglKembali->diffInDays($tglBerangkat);

        $uangHarian = $request->uang_harian;
        $uang_harian = (int) preg_replace("/[^0-9]/", "", $uangHarian);
        $jmlh_uang_harian = $jumlah_hari * $uang_harian;
        $jumlah_uang_harian = 'Rp ' . number_format($jmlh_uang_harian, 0, ',', '.');

        $biaya_akomodasi = $request->biaya_akomodasi;
        $biaya_akomodasi = (int) preg_replace("/[^0-9]/", "", $biaya_akomodasi);
        $biaya_lain = $request->biaya_lain;
        $biaya_lain = (int) preg_replace("/[^0-9]/", "", $biaya_lain);
        $biaya_tiket_pp = $request->biaya_tiket_pp;
        $biaya_tiket_pp = (int) preg_replace("/[^0-9]/", "", $biaya_tiket_pp);
        $uang_representasi = $request->uang_representasi;
        $uang_representasi = (int) preg_replace("/[^0-9]/", "", $uang_representasi);

        $jumlah_biaya = $jmlh_uang_harian + $biaya_akomodasi + $biaya_lain + $biaya_tiket_pp + $uang_representasi;
        $jmlh_biaya = 'Rp. ' . number_format($jumlah_biaya, 0, ',', '.');

        if ($request->hasFile('bukti_surat_tugas')) {
            $file = $request->file('bukti_surat_tugas');
            $id = Auth::user()->id;
            $filename = $id . time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_surat_tugas', $filename, 'public');
        }

        PerjalananDinas::create([
            // Data Diri
            'user_id' => Auth::id(),

            // Keperluan Perjalanan Dinas
            'jns_perjadin' => $request->jns_perjadin,
            'keperluan_perjadin' => $request->keperluan_perjadin,
            'province_id' => $request->provinsi,
            'regency_id' => $request->kota_kab,

            // Perencanaan Tanggal Perjalanan Dinas
            'tgl_berangkat' => $request->tgl_berangkat,
            'tgl_kembali' => $request->tgl_kembali,
            'jumlah_hari' => $jumlah_hari,

            // Rincian Biaya
            'uang_harian' => $request->uang_harian,
            'jmlh_uang_harian' => $jumlah_uang_harian,
            'biaya_akomodasi' => $request->biaya_akomodasi,
            'biaya_lain' => $request->biaya_lain,
            'biaya_tiket_pp' => $request->biaya_tiket_pp,
            'uang_representasi' => $request->uang_representasi,
            'jumlah_biaya' => $jmlh_biaya,

            // Bukti Surat Tugas
            'bukti_surat_tugas' => '/storage/' . $filePath,
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
