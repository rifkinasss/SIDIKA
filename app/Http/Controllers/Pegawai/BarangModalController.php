<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai\BarangModal;
use App\Models\Province;
use App\Models\Regency;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BarangModalController extends Controller
{
    public function perencanaan()
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

    public function pengerjaan(string $id)
    {
        $title = 'Pengerjaan Belanja Modal';
        $barmod = BarangModal::find($id);
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('pegawai.belanja-modal.pengerjaan-modal', compact('barmod', 'provinces', 'regencies', 'title'));
    }

    public function getRegenciesByProvinceName($province_name)
    {
        $province = Province::where('name', $province_name)->first();
        if ($province) {
            $regencies = Regency::where('province_id', $province->id)->get();
            return response()->json($regencies);
        } else {
            return response()->json([]);
        }
    }

    public function update(Request $request, string $id)
    {
        $barmod = BarangModal::find($id);

        // Perjanjian SPK
        if ($request->has('submit_spk')) {
            $request->validate([
                'bukti_spk.*' => 'mimes:pdf|max:2048',
            ]);

            $tgl_mulai_spk = Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_spk);
            $tgl_selesai_spk = Carbon::createFromFormat('Y-m-d', $request->tgl_selesai_spk);

            // Handle file upload
            $uploadedFiles = $request->file('bukti_spk');
            $filePaths = [];

            if ($uploadedFiles) {
                foreach ($uploadedFiles as $file) {
                    $path = $file->store('public/belanja_modal/bukti_spk');
                    $filePaths[] = $path;
                }
            }

            $barmod->update([
                'nomor_surat_spk' => $request->nomor_surat_spk,
                'nama_vendor' => $request->nama_vendor,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'tgl_mulai_spk' => $tgl_mulai_spk,
                'tgl_selesai_spk' => $tgl_selesai_spk,
                'durasi_spk' => $request->durasi_spk,
                'nilai_kontrak_spk' => $request->nilai_kontrak_spk,
                'uraian_pengadaan' => $request->uraian_pengadaan,
                'bukti_spk' => json_encode($filePaths),
            ]);
        }

        // Adendum Kontrak Belanja Modal
        elseif ($request->has('submit_adendum')) {
            $request->validate([
                'bukti_surat_adendum.*' => 'mimes:pdf|max:2048',
            ]);

            $tgl_mulai_adendum = Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_adendum);
            $tgl_selesai_adendum = Carbon::createFromFormat('Y-m-d', $request->tgl_selesai_adendum);

            // Handle file upload
            $uploadedFiles = $request->file('bukti_surat_adendum');
            $filePaths = [];

            if ($uploadedFiles) {
                foreach ($uploadedFiles as $file) {
                    $path = $file->store('public/belanja_modal/bukti_surat_adendum');
                    $filePaths[] = $path;
                }
            }

            $barmod->update([
                'nomor_surat_adendum' => $request->nomor_surat_adendum,
                'uraian_adendum' => $request->uraian_adendum,
                'tgl_mulai_adendum' => $tgl_mulai_adendum,
                'tgl_selesai_adendum' => $tgl_selesai_adendum,
                'nilai_kontrak_adendum' => $request->nilai_kontrak_adendum,
                'bukti_surat_adendum' => json_encode($filePaths),
            ]);
        }

        // Jaminan Pelaksanaan
        elseif ($request->has('submit_jaminan_pelaksanaan')) {
            if ($request->nilai_bank_garansi_pelaksanaan != '') {
                $request->validate([
                    'bukti_bank_garansi_pelaksanaan' => 'required|mimes:pdf|max:2048',
                ]);
                // Handle file upload bukti bank garansi pelaksanaan
                $file_1 = $request->file('bukti_bank_garansi_pelaksanaan');
                $path_1 = $file_1->store('public/belanja_modal/bukti_bank_garansi_pelaksanaan');
            } else {
                $path_1 = null;
            }

            if ($request->nilai_surety_bond_pelaksanaan != '') {
                $request->validate([
                    'bukti_surety_bond_pelaksanaan' => 'required|mimes:pdf|max:2048',
                ]);
                // Handle file upload bukti surety bond pelaksanaan
                $file_2 = $request->file('bukti_surety_bond_pelaksanaan');
                $path_2 = $file_2->store('public/belanja_modal/bukti_surety_bond_pelaksanaan');
            } else {
                $path_2 = null;
            }

            $barmod->update([
                'nilai_bank_garansi_pelaksanaan' => $request->nilai_bank_garansi_pelaksanaan,
                'bukti_bank_garansi_pelaksanaan' => $path_1,
                'nilai_surety_bond_pelaksanaan' => $request->nilai_surety_bond_pelaksanaan,
                'bukti_surety_bond_pelaksanaan' => $path_2,
            ]);
        }

        return redirect()->back()->with('pel-belanja-modal', 'Progress dokumen belanja modal berhasil diperbarui.');
    }
}
