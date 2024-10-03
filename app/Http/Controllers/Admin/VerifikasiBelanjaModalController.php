<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\BarangModal;
use App\Models\User;
use App\Notifications\belanja_modal\PengerjaanNotifikasiKePimpinan;
use App\Notifications\belanja_modal\PerencanaanNotifikasiKePimpinan;
use Illuminate\Http\Request;

class VerifikasiBelanjaModalController extends Controller
{
    public function detailPerencanaanbarmol($id)
    {
        $title = 'Perencanaan Barang Modal';
        $barmol = BarangModal::find($id);
        return view('admin.verifikasi.belanja-modal.detail-perencanaan', compact('barmol', 'title'));
    }

    public function perencanaan_kirimNotifPimpinan($id)
    {
        // Logika mendapatkan detail perjalanan dinas berdasarkan $id
        $barmol = BarangModal::find($id);

        // Misalkan ada role 'pimpinan', kita dapatkan pengguna dengan role tersebut
        $pimpinan = User::where('role', 'pimpinan')->get();

        // Kirim notifikasi ke semua pengguna dengan role pimpinan
        foreach ($pimpinan as $user) {
            $user->notify(new PerencanaanNotifikasiKePimpinan($barmol));
        }

        // Redirect setelah notifikasi dikirim
        return redirect()->back()->with('success', 'Notifikasi telah dikirim ke pimpinan.');
    }
    
    public function detailPengerjaanbarmol($id)
    {
        $title = 'Pengerjaan Barang Modal';
        $barmol = BarangModal::find($id);
        return view('admin.verifikasi.belanja-modal.detail-pengerjaan', compact('barmol', 'title'));
    }

    public function pengerjaan_kirimNotifPimpinan($id)
    {
        // Logika mendapatkan detail perjalanan dinas berdasarkan $id
        $barmol = BarangModal::find($id);

        // Misalkan ada role 'pimpinan', kita dapatkan pengguna dengan role tersebut
        $pimpinan = User::where('role', 'pimpinan')->get();

        // Kirim notifikasi ke semua pengguna dengan role pimpinan
        foreach ($pimpinan as $user) {
            $user->notify(new PengerjaanNotifikasiKePimpinan($barmol));
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
}
