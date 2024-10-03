<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use App\Mail\BarangModal\PerencanaanApprove;
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
            Mail::to($barmod->user->email)->send(new PerencanaanApprove($barmod));
        } elseif ($request->has('ditolak')) {
            $barmod->update([
                'status' => 'Ditolak',
            ]);

            // Send rejection email
            Mail::to($barmod->user->email)->send(new PerencanaanRejected($barmod));
        }

        return redirect()->route('perencanaan-barmol-lead')->with('verif-barmod', 'Perencanaan belanja modal telah disetujui.');
    }
}
