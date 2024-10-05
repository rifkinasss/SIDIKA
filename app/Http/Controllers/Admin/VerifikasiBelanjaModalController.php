<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\BarangModal;
use App\Models\User;
use App\Notifications\belanja_modal\PelaporanNotifikasiKePimpinan;
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

    public function detailPelaporanbarmol($id)
    {
        $title = 'Pengerjaan Barang Modal';
        $barmol = BarangModal::find($id);
        return view('admin.verifikasi.belanja-modal.detail-pelaporan', compact('barmol', 'title'));
    }

    public function pelaporan_kirimNotifPimpinan($id)
    {
        // Logika mendapatkan detail perjalanan dinas berdasarkan $id
        $barmol = BarangModal::find($id);

        // Misalkan ada role 'pimpinan', kita dapatkan pengguna dengan role tersebut
        $pimpinan = User::where('role', 'pimpinan')->get();

        // Kirim notifikasi ke semua pengguna dengan role pimpinan
        foreach ($pimpinan as $user) {
            $user->notify(new PelaporanNotifikasiKePimpinan($barmol));
        }

        // Redirect setelah notifikasi dikirim
        return redirect()->back()->with('success', 'Notifikasi telah dikirim ke pimpinan.');
    }
}
