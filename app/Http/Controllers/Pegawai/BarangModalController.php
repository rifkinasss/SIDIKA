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

        return redirect()->route('pegawai')->with('belanja-modal', 'Perencanaan belanja modal berhasil dikirim.');
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

    public function PengerjaanUpdate(Request $request, string $id)
    {
        $barmod = BarangModal::find($id);

        // Perjanjian SPK
        if ($request->has('submit_spk')) {
            $request->validate([
                'bukti_spk.*' => 'mimes:pdf|max:2048',
            ]);

            $tgl_mulai_spk = Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_spk);
            $tgl_selesai_spk = Carbon::createFromFormat('Y-m-d', $request->tgl_selesai_spk);
            
            $persentase = $barmod->persentase;
            $persentase += 20;

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
                'persentase' => $persentase,
            ]);
        }

        // Adendum Kontrak Belanja Modal
        elseif ($request->has('submit_adendum')) {
            $request->validate([
                'bukti_surat_adendum.*' => 'mimes:pdf|max:2048',
            ]);

            if ($request->nomor_surat_adendum != '-') {
                $tgl_mulai_adendum = Carbon::createFromFormat('Y-m-d', $request->tgl_mulai_adendum);
                $tgl_selesai_adendum = Carbon::createFromFormat('Y-m-d', $request->tgl_selesai_adendum);

                $barmod->update([
                    'tgl_mulai_adendum' => $tgl_mulai_adendum,
                    'tgl_selesai_adendum' => $tgl_selesai_adendum,
                ]);
            };

            $persentase = $barmod->persentase;
            $persentase += 20;

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
                'nilai_kontrak_adendum' => $request->nilai_kontrak_adendum,
                'persentase' => $persentase,
                'bukti_surat_adendum' => json_encode($filePaths),
            ]);
        }

        // Jaminan Pelaksanaan
        elseif ($request->has('submit_jaminan_pelaksanaan')) {
            $persentase = $barmod->persentase;
            $persentase += 20;
            
            $path_1 = null;
            $path_2 = null;

            if ($request->nilai_bank_garansi_pelaksanaan != '') {
                $request->validate([
                    'bukti_bank_garansi_pelaksanaan' => 'required|mimes:pdf|max:2048',
                ]);
                // Handle file upload bukti bank garansi pelaksanaan
                $file_1 = $request->file('bukti_bank_garansi_pelaksanaan');
                if ($file_1) {
                    $path_1 = $file_1->store('public/belanja_modal/bukti_bank_garansi_pelaksanaan');
                }
            }

            if ($request->nilai_surety_bond_pelaksanaan != '') {
                $request->validate([
                    'bukti_surety_bond_pelaksanaan' => 'required|mimes:pdf|max:2048',
                ]);
                // Handle file upload bukti surety bond pelaksanaan
                $file_2 = $request->file('bukti_surety_bond_pelaksanaan');
                if ($file_2) {
                    $path_2 = $file_2->store('public/belanja_modal/bukti_surety_bond_pelaksanaan');
                }
            }

            $barmod->update([
                'nilai_bank_garansi_pelaksanaan' => $request->nilai_bank_garansi_pelaksanaan,
                'bukti_bank_garansi_pelaksanaan' => $path_1,
                'nilai_surety_bond_pelaksanaan' => $request->nilai_surety_bond_pelaksanaan,
                'bukti_surety_bond_pelaksanaan' => $path_2,
                'persentase' => $persentase,
            ]);
        }

        // Jaminan Pengadaan
        elseif ($request->has('submit_jaminan_pengadaan')) {
            $persentase = $barmod->persentase;
            $persentase += 20;
            
            $path_1 = null;
            $path_2 = null;

            if ($request->nilai_bank_garansi_pengadaan != '') {
                $request->validate([
                    'bukti_bank_garansi_pengadaan' => 'required|mimes:pdf|max:2048',
                ]);
                // Handle file upload bukti bank garansi pengadaan
                $file_1 = $request->file('bukti_bank_garansi_pengadaan');
                if ($file_1) {
                    $path_1 = $file_1->store('public/belanja_modal/bukti_bank_garansi_pengadaan');
                }
            }

            if ($request->nilai_surety_bond_pengadaan != '') {
                $request->validate([
                    'bukti_surety_bond_pengadaan' => 'required|mimes:pdf|max:2048',
                ]);
                // Handle file upload bukti surety bond pengadaan
                $file_2 = $request->file('bukti_surety_bond_pengadaan');
                if ($file_2) {
                    $path_2 = $file_2->store('public/belanja_modal/bukti_surety_bond_pengadaan');
                }
            }

            $barmod->update([
                'nilai_bank_garansi_pengadaan' => $request->nilai_bank_garansi_pengadaan,
                'bukti_bank_garansi_pengadaan' => $path_1,
                'nilai_surety_bond_pengadaan' => $request->nilai_surety_bond_pengadaan,
                'bukti_surety_bond_pengadaan' => $path_2,
                'persentase' => $persentase,
            ]);
        }

        // Sumber Dana DPA
        elseif ($request->has('submit_sumber_dana_dpa')) {
            $request->validate([
                'bukti_dpa.*' => 'required|mimes:pdf|max:2048',
            ]);
            
            $persentase = $barmod->persentase;
            $persentase += 20;
            
            // Handle file upload
            $uploadedFiles = $request->file('bukti_dpa');
            $filePaths = [];

            if ($uploadedFiles) {
                foreach ($uploadedFiles as $file) {
                    $path = $file->store('public/belanja_modal/bukti_dpa');
                    $filePaths[] = $path;
                }
            }
            
            $barmod->update([
                'dana_apbn' => $request->dana_apbn,
                'dana_apbd' => $request->dana_apbd,
                'dana_hibah' => $request->dana_hibah,
                'bentuk_pengadaan' => $request->bentuk_pengadaan,
                'nilai_dpa' => $request->nilai_dpa,
                'bukti_dpa' => json_encode($filePaths),
                'persentase' => $persentase,
            ]);
        }

        return redirect()->back()->with('peng-belanja-modal', 'Progress dokumen belanja modal berhasil diperbarui.');
    }

    public function pelaporan(string $id)
    {
        $title = 'Pelaporan Belanja Modal';
        $barmod = BarangModal::find($id);
        return view('pegawai.belanja-modal.pelaporan-modal', compact('title', 'barmod'));
    }

    public function PelaporanUpdate(Request $request, string $id) 
    {
        $barmod = BarangModal::find($id);

        // SPMK
        if ($request->has('submit_spmk')) {
            $request->validate([
                'bukti_spmk' => 'mimes:pdf|max:2048',
            ]);

            $path = null;

            // Handle file upload bukti surety bond pelaksanaan
            $file = $request->file('bukti_spmk');
            if ($file) {
                $path = $file->store('public/belanja_modal/bukti_spmk');
            }

            $tgl_spmk = Carbon::createFromFormat('Y-m-d', $request->tgl_spmk);
            
            $persentase_lapor = $barmod->persentase_lapor;
            $persentase_lapor += 20;

            $barmod->update([
                'nomor_spmk' => $request->nomor_spmk,
                'tgl_spmk' => $tgl_spmk,
                'bukti_spmk' => $path,
                'persentase_lapor' => $persentase_lapor,
            ]);
        }

        // PHO
        elseif ($request->has('submit_pho')) {
            $request->validate([
                'bukti_pho' => 'mimes:pdf|max:2048',
            ]);

            $path = null;

            // Handle file upload bukti surety bond pelaksanaan
            $file = $request->file('bukti_pho');
            if ($file) {
                $path = $file->store('public/belanja_modal/bukti_pho');
            }

            $tgl_pho = Carbon::createFromFormat('Y-m-d', $request->tgl_pho);
            
            $persentase_lapor = $barmod->persentase_lapor;
            $persentase_lapor += 20;

            $barmod->update([
                'nomor_pho' => $request->nomor_pho,
                'tgl_pho' => $tgl_pho,
                'bukti_pho' => $path,
                'persentase_lapor' => $persentase_lapor,
            ]);
        }

        // BAST
        elseif ($request->has('submit_bast')) {
            $request->validate([
                'bukti_bast' => 'mimes:pdf|max:2048',
            ]);

            $path = null;

            // Handle file upload bukti surety bond pelaksanaan
            $file = $request->file('bukti_bast');
            if ($file) {
                $path = $file->store('public/belanja_modal/bukti_bast');
            }

            $tgl_bast = Carbon::createFromFormat('Y-m-d', $request->tgl_bast);
            
            $persentase_lapor = $barmod->persentase_lapor;
            $persentase_lapor += 20;

            $barmod->update([
                'nomor_bast' => $request->nomor_bast,
                'tgl_bast' => $tgl_bast,
                'nilai_bast' => $request->nilai_bast,
                'bukti_bast' => $path,
                'persentase_lapor' => $persentase_lapor,
            ]);
        }

        // FHO
        elseif ($request->has('submit_fho')) {
            $request->validate([
                'bukti_fho' => 'mimes:pdf|max:2048',
            ]);

            $path = null;

            // Handle file upload bukti surety bond pelaksanaan
            $file = $request->file('bukti_fho');
            if ($file) {
                $path = $file->store('public/belanja_modal/bukti_fho');
            }

            $tgl_fho = Carbon::createFromFormat('Y-m-d', $request->tgl_fho);
            
            $persentase_lapor = $barmod->persentase_lapor;
            $persentase_lapor += 20;

            $barmod->update([
                'nomor_fho' => $request->nomor_fho,
                'tgl_fho' => $tgl_fho,
                'bukti_fho' => $path,
                'persentase_lapor' => $persentase_lapor,
            ]);
        }

        // SP2D
        elseif ($request->has('submit_sp2d')) {
            $request->validate([
                'bukti_sp2d' => 'mimes:pdf|max:2048',
            ]);

            $path = null;

            // Handle file upload bukti surety bond pelaksanaan
            $file = $request->file('bukti_sp2d');
            if ($file) {
                $path = $file->store('public/belanja_modal/bukti_sp2d');
            }

            $tgl_sp2d = Carbon::createFromFormat('Y-m-d', $request->tgl_sp2d);
            
            $persentase_lapor = $barmod->persentase_lapor;
            $persentase_lapor += 20;

            $barmod->update([
                'nomor_sp2d' => $request->nomor_sp2d,
                'tgl_sp2d' => $tgl_sp2d,
                'nilai_sp2d' => $request->nilai_sp2d,
                'bukti_sp2d' => $path,
                'persentase_lapor' => $persentase_lapor,
            ]);
        }

        return redirect()->back()->with('pel-belanja-modal', 'Progress dokumen belanja modal berhasil diperbarui.');
    }
}
