<?php

namespace App\Http\Controllers\Lead;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\PerjalananDinasApproved;
use App\Mail\PerjalananDinasRejected;
use App\Models\Pegawai\PerjalananDinas;

class PerjadinController extends Controller
{
    public function detail(string $id)
    {
        $title = 'Detail Perjalanan Dinas';
        $user = User::find($id);
        $detail_perjalanandinas = perjalanandinas::find($id);
        return view('lead.verifikasi.perjadin.detail-perjadin', compact('detail_perjalanandinas', 'user', 'title'));
    }

    public function update(Request $request, string $id)
    {
        $perjalanandinas = PerjalananDinas::find($id);

        if ($request->has('disetujui')) {
            $tanggal = date('dmY');
            $nomorSurat = "SPM/{$tanggal}/{$perjalanandinas->id}";

            $perjalanandinas->update([
                'nomor_surat' => $nomorSurat,
                'status' => 'Disetujui',
            ]);

            // Send approval email
            Mail::to($perjalanandinas->user->email)->send(new PerjalananDinasApproved($perjalanandinas));
        } elseif ($request->has('ditolak')) {
            $perjalanandinas->update([
                'status' => 'Ditolak',
            ]);

            // Send rejection email
            Mail::to($perjalanandinas->user->email)->send(new PerjalananDinasRejected($perjalanandinas));
        }

        return redirect()->route('perjadinLead')->with('verif-perjadin', 'Status perjalanan dinas berhasil diperbarui.');
    }
}
