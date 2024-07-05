<?php

namespace App\Http\Controllers\Pegawai;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai\PerjalananDinas;
<<<<<<< HEAD
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
=======

class PerjalananDinasController extends Controller
{
    public function create()
    {

        $dataForChart = PerjalananDinas::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Map month numbers to month names
        $months = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        // Format the data
        $formattedData = [];
        foreach ($dataForChart as $data) {
            $yearMonth = explode('-', $data->month);
            $year = $yearMonth[0];
            $monthNumber = $yearMonth[1];

            $formattedData[] = [
                'month' => $months[$monthNumber] . ' ' . $year,
                'total' => $data->total
            ];
        }
        return view('pegawai.perjalanan-dinas', compact('formattedData'));
    }
    public function store(Request $request)
>>>>>>> 5e4032ed4a40664b5d8cfdb1bcee999cd326c77a
    {
        $tglBerangkat = Carbon::createFromFormat('Y-m-d', $request->tgl_berangkat);
        $tglKembali = Carbon::createFromFormat('Y-m-d', $request->tgl_kembali);
        $jumlah_hari = $tglKembali->diffInDays($tglBerangkat);

<<<<<<< HEAD
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

=======
        $uang_total = $request->uang_harian * $jumlah_hari;

        $uang_total = (float)$uang_total;
        $biaya_akomodasi = (float)$request->biaya_akomodasi;
        $biaya_lain = (float)$request->biaya_lain;
        $biaya_tiket = (float)$request->biaya_tiket;

        if (!is_numeric($uang_total) || !is_numeric($biaya_akomodasi) || !is_numeric($biaya_lain) || !is_numeric($biaya_tiket)) {
            return response()->json(['error' => 'Input tidak valid'], 400);
        }

        $jumlah_biaya = $uang_total + $biaya_akomodasi + $biaya_lain + $biaya_tiket;

        PerjalananDinas::create([
            'user_id' => Auth::id(),
            'keperluan_perjadin' => $request->keperluan_perjadin,
            'jumlah_dibayarkan' => $request->jumlah_dibayarkan,
            'tujuan' => $request->tujuan,
            'tgl_berangkat' => $request->tgl_berangkat,
            'tgl_kembali' => $request->tgl_kembali,
            'jumlah_hari' => $jumlah_hari,
            'uang_harian' => $request->uang_harian,
            'uang_total' => $uang_total,
            'biaya_akomodasi' => $request->biaya_akomodasi,
            'biaya_lain' => $request->biaya_lain,
            'biaya_tiket' => $request->biaya_tiket,
            'jumlah_biaya' => $jumlah_biaya,
        ]);

        session()->flash('uang_total', $uang_total);

>>>>>>> 5e4032ed4a40664b5d8cfdb1bcee999cd326c77a
        return redirect()->route('pegawai')->with('perjadin', 'Pengajuan perjalanan dinas berhasil dibuat.');
    }
    public function destroy(string $id)
    {
        $perjadin = PerjalananDinas::find($id);
        $perjadin->delete();
        return redirect()->route('pegawai');
    }
}
