<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Mail\BarangJasa\PengerjaanApproved;
use App\Mail\BarangJasa\PengerjaanRejected;
use App\Mail\BarangJasa\PerencanaanApproved;
use App\Mail\BarangJasa\PerencanaanRejected;
use App\Models\Pegawai\BarangJasa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BarangJasaController extends Controller
{
    public function perencanaan_detail(string $id)
    {
        $title = 'Detail Perjalanan Dinas';
        $user = User::find($id);
        $barjas = BarangJasa::find($id);
        return view('lead.verifikasi.barang-jasa.detail-perencanaan', compact('barjas', 'user', 'title'));
    }

    public function perencanaan_verif(Request $request, $id)
    {
        $barjas = BarangJasa::find($id);
        $tanggal = date('dmY');

        if ($request->has('disetujui')) {
            $nomor_spmk = "SPMK/BJS/DISDIKBUD/{$tanggal}/{$barjas->id}";

            $barjas->update([
                'nomor_surat' => $nomor_spmk,
                'status' => 'Disetujui',
            ]);

            // Send approval email
            Mail::to($barjas->user->email)->send(new PerencanaanApproved($barjas));
        } elseif ($request->has('ditolak')) {
            $barjas->update([
                'status' => 'Ditolak',
            ]);

            // Send rejection email
            Mail::to($barjas->user->email)->send(new PerencanaanRejected($barjas));
        }

        return redirect()->route('perencanaan-barjas-lead')->with('verif-barjas', 'Perencanaan belanja modal telah disetujui.');
    }

    public function pengerjaan_detail(string $id)
    {
        $title = 'Detail Perjalanan Dinas';
        $user = User::find($id);
        $barjas = BarangJasa::find($id);
        return view('lead.verifikasi.barang-jasa.detail-pengerjaan', compact('barjas', 'user', 'title'));
    }

    public function pengerjaan_verif(Request $request, $id)
    {
        $barjas = BarangJasa::find($id);

        if ($request->has('disetujui')) {
            $barjas->update([
                'status_pengerjaan' => 'Disetujui',
            ]);

            // Send approval email
            Mail::to($barjas->user->email)->send(new PengerjaanApproved($barjas));
        } elseif ($request->has('ditolak')) {
            $barjas->update([
                'status_pengerjaan' => 'Ditolak',
            ]);

            // Send rejection email
            Mail::to($barjas->user->email)->send(new PengerjaanRejected($barjas));
        }

        return redirect()->route('perencanaan-barjas-lead')->with('verif-barjas', 'Perencanaan belanja modal telah disetujui.');
    }

    public function pelaporan_detail(string $id)
    {
        $title = 'Detail Perjalanan Dinas';
        $user = User::find($id);
        $barjas = BarangJasa::find($id);
        return view('lead.verifikasi.barang-jasa.detail-pelaporan', compact('barjas', 'user', 'title'));
    }

    public function pelaporan_verif(Request $request, $id)
    {
        $barjas = BarangJasa::find($id);

        if ($request->has('disetujui')) {
            $barjas->update([
                'status_lapor' => 'Disetujui',
            ]);

            // Send approval email
            Mail::to($barjas->user->email)->send(new PelaporanApproved($barjas));
        } elseif ($request->has('ditolak')) {
            $barjas->update([
                'status_lapor' => 'Ditolak',
            ]);

            // Send rejection email
            Mail::to($barjas->user->email)->send(new PelaporanRejected($barjas));
        }

        return redirect()->route('perencanaan-barjas-lead')->with('verif-barjas', 'Perencanaan belanja modal telah disetujui.');
    }
}
