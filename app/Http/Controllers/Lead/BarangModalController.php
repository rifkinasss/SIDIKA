<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Mail\BarangModal\PelaporanApproved;
use App\Mail\BarangModal\PelaporanRejected;
use App\Mail\BarangModal\PengerjaanApproved;
use App\Mail\BarangModal\PengerjaanRejected;
use App\Mail\BarangModal\PerencanaanApproved;
use App\Mail\BarangModal\PerencanaanRejected;
use App\Models\Pegawai\BarangModal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BarangModalController extends Controller
{
    public function perencanaan_detail(string $id)
    {
        $title = 'Detail Perjalanan Dinas';
        $user = User::find($id);
        $barmol = BarangModal::find($id);
        return view('lead.verifikasi.belanja-modal.detail-perencanaan', compact('barmol', 'user', 'title'));
    }

    public function perencanaan_verif(Request $request, $id)
    {
        $barmod = BarangModal::find($id);
        $tanggal = date('dmY');

        if ($request->has('disetujui')) {
            $nomor_spmk = "SPMK/MDL/DISDIKBUD/{$tanggal}/{$barmod->id}";

            $barmod->update([
                'nomor_surat' => $nomor_spmk,
                'status' => 'Disetujui',
            ]);

            // Send approval email
            Mail::to($barmod->user->email)->send(new PerencanaanApproved($barmod));
        } elseif ($request->has('ditolak')) {
            $barmod->update([
                'status' => 'Ditolak',
            ]);

            // Send rejection email
            Mail::to($barmod->user->email)->send(new PerencanaanRejected($barmod));
        }

        return redirect()->route('perencanaan-barmol-lead')->with('verif-barmod', 'Perencanaan belanja modal telah disetujui.');
    }

    public function pengerjaan_detail(string $id)
    {
        $title = 'Detail Perjalanan Dinas';
        $user = User::find($id);
        $barmol = BarangModal::find($id);
        return view('lead.verifikasi.belanja-modal.detail-pengerjaan', compact('barmol', 'user', 'title'));
    }

    public function pengerjaan_verif(Request $request, $id)
    {
        $barmod = BarangModal::find($id);

        if ($request->has('disetujui')) {
            $barmod->update([
                'status_pengerjaan' => 'Disetujui',
            ]);

            // Send approval email
            Mail::to($barmod->user->email)->send(new PengerjaanApproved($barmod));
        } elseif ($request->has('ditolak')) {
            $barmod->update([
                'status_pengerjaan' => 'Ditolak',
            ]);

            // Send rejection email
            Mail::to($barmod->user->email)->send(new PengerjaanRejected($barmod));
        }

        return redirect()->route('perencanaan-barmol-lead')->with('verif-barmod', 'Perencanaan belanja modal telah disetujui.');
    }

    public function pelaporan_detail(string $id)
    {
        $title = 'Detail Perjalanan Dinas';
        $user = User::find($id);
        $barmol = BarangModal::find($id);
        return view('lead.verifikasi.belanja-modal.detail-pelaporan', compact('barmol', 'user', 'title'));
    }

    public function pelaporan_verif(Request $request, $id)
    {
        $barmod = BarangModal::find($id);

        if ($request->has('disetujui')) {
            $barmod->update([
                'status_lapor' => 'Disetujui',
            ]);

            // Send approval email
            Mail::to($barmod->user->email)->send(new PelaporanApproved($barmod));
        } elseif ($request->has('ditolak')) {
            $barmod->update([
                'status_lapor' => 'Ditolak',
            ]);

            // Send rejection email
            Mail::to($barmod->user->email)->send(new PelaporanRejected($barmod));
        }

        return redirect()->route('perencanaan-barmol-lead')->with('verif-barmod', 'Perencanaan belanja modal telah disetujui.');
    }
}
