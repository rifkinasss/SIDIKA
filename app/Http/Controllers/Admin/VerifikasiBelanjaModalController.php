<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\BarangModal;
use App\Models\User;
use App\Notifications\belanja_modal\NotifikasiKePimpinan;
use Illuminate\Http\Request;

class VerifikasiBelanjaModalController extends Controller
{
    public function detailPerencanaanbarmol($id)
    {
        $title = 'Perencanaan Barang Modal';
        $barmol = BarangModal::find($id);
        return view('admin.verifikasi.belanja-modal.detail-perencanaan', compact('barmol', 'title'));
    }

    public function kirimNotifPimpinan($id)
    {
        // Logika mendapatkan detail perjalanan dinas berdasarkan $id
        $barmol = BarangModal::find($id);

        // Misalkan ada role 'pimpinan', kita dapatkan pengguna dengan role tersebut
        $pimpinan = User::where('role', 'pimpinan')->get();

        // Kirim notifikasi ke semua pengguna dengan role pimpinan
        foreach ($pimpinan as $user) {
            $user->notify(new NotifikasiKePimpinan($barmol));
        }

        // Redirect setelah notifikasi dikirim
        return redirect()->back()->with('success', 'Notifikasi telah dikirim ke pimpinan.');
    }

    public function PerencanaanVerif(Request $request, $id)
    {
        $barmod = BarangModal::find($id);
        $tanggal = date('dmY');

        if ($request->has('disetujui')) {
            $nomor_spmk = "SPMK/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";

            $barmod->update([
                'nomor_surat' => $nomor_spmk,
                'status' => 'Disetujui',
            ]);
        } elseif ($request->has('ditolak')) {
            $barmod->update([
                'status' => 'Ditolak',
            ]);
        }

        return redirect(url('/dashboard-admin/perencanaan-belanja-modal'))->with('verif-barmod', 'Perencanaan belanja modal telah disetujui.');
    }

    public function PengerjaanVerif(Request $request, $id)
    {
        $barmod = BarangModal::find($id);

        if ($request->has('disetujui')) {
            $barmod->update([
                'status_pengerjaan' => 'Disetujui',
            ]);
        } elseif ($request->has('ditolak')) {
            $barmod->update([
                'status_pengerjaan' => 'Ditolak',
            ]);
        }

        return redirect(url('/dashboard-admin/pengerjaan-belanja-modal'))->with('verif-pengerjaan-barmod', 'Pengerjaan belanja modal telah disetujui.');
    }

    public function update(Request $request, string $id)
    {
        $barmod = BarangModal::find($id);

        if ($request->has('disetujui')) {
            $tanggal = date('dmY');
            $nomor_surat_spk = "SPK/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";
            $nomor_kontrak = "JWK/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";
            $nomor_tgl_adendum = "AKT/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";
            $nomor_sumber_dpa = "DPPA/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";

            $barmod->update([
                'nomor_sumber_dpa' => $nomor_sumber_dpa,
                'nomor_tgl_adendum' => $nomor_tgl_adendum,
                'nomor_kontrak' => $nomor_kontrak,
                'nomor_surat_spk' => $nomor_surat_spk,
                'status' => 'Disetujui',
            ]);
        } elseif ($request->has('ditolak')) {
            $barmod->update([
                'status' => 'Ditolak',
            ]);
        }

        return redirect()->route('verifikasi-belanja-modal.index')->with('verif-pel-barmod', 'Status progress belanja modal berhasil diperbarui.');
    }
}
