<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai\BarangJasa;
use App\Models\User;
use App\Notifications\barang_jasa\PelaporanNotifikasiKePimpinan;
use App\Notifications\barang_jasa\PengerjaanNotifikasiKePimpinan;
use App\Notifications\barang_jasa\PerencanaanNotifikasiKePimpinan;
use Illuminate\Http\Request;

class VerifikasiBelanjaBarangJasaController extends Controller
{
    public function detailPerencanaanbarjas($id)
    {
        $title = 'Perencanaan Barang Barang Jasa';
        $barjas = BarangJasa::find($id);
        return view('admin.verifikasi.barang-jasa.detail-perencanaan', compact('barjas', 'title'));
    }

    public function perencanaan_kirimNotifPimpinan($id)
    {
        // Logika mendapatkan detail perjalanan dinas berdasarkan $id
        $barjas = BarangJasa::find($id);

        // Misalkan ada role 'pimpinan', kita dapatkan pengguna dengan role tersebut
        $pimpinan = User::where('role', 'pimpinan')->get();

        // Kirim notifikasi ke semua pengguna dengan role pimpinan
        foreach ($pimpinan as $user) {
            $user->notify(new PerencanaanNotifikasiKePimpinan($barjas));
        }

        // Redirect setelah notifikasi dikirim
        return redirect()->back()->with('success', 'Notifikasi telah dikirim ke pimpinan.');
    }
    
    public function detailPengerjaanbarjas($id)
    {
        $title = 'Pengerjaan Barang Barang Jasa';
        $barjas = BarangJasa::find($id);
        return view('admin.verifikasi.barang-jasa.detail-pengerjaan', compact('barjas', 'title'));
    }

    public function pengerjaan_kirimNotifPimpinan($id)
    {
        // Logika mendapatkan detail perjalanan dinas berdasarkan $id
        $barjas = BarangJasa::find($id);

        // Misalkan ada role 'pimpinan', kita dapatkan pengguna dengan role tersebut
        $pimpinan = User::where('role', 'pimpinan')->get();

        // Kirim notifikasi ke semua pengguna dengan role pimpinan
        foreach ($pimpinan as $user) {
            $user->notify(new PengerjaanNotifikasiKePimpinan($barjas));
        }

        // Redirect setelah notifikasi dikirim
        return redirect()->back()->with('success', 'Notifikasi telah dikirim ke pimpinan.');
    }

    public function detailPelaporanbarjas($id)
    {
        $title = 'Pengerjaan Barang Barang Jasa';
        $barjas = BarangJasa::find($id);
        return view('admin.verifikasi.barang-jasa.detail-pelaporan', compact('barjas', 'title'));
    }

    public function pelaporan_kirimNotifPimpinan($id)
    {
        // Logika mendapatkan detail perjalanan dinas berdasarkan $id
        $barjas = BarangJasa::find($id);

        // Misalkan ada role 'pimpinan', kita dapatkan pengguna dengan role tersebut
        $pimpinan = User::where('role', 'pimpinan')->get();

        // Kirim notifikasi ke semua pengguna dengan role pimpinan
        foreach ($pimpinan as $user) {
            $user->notify(new PelaporanNotifikasiKePimpinan($barjas));
        }

        // Redirect setelah notifikasi dikirim
        return redirect()->back()->with('success', 'Notifikasi telah dikirim ke pimpinan.');
    }
}
