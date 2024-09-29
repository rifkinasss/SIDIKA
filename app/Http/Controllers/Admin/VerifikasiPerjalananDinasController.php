<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\PerjalananDinasApproved;
use App\Mail\PerjalananDinasRejected;
use App\Models\Pegawai\PerjalananDinas;
use App\Notifications\NotifikasiKePimpinan;

class VerifikasiPerjalananDinasController extends Controller
{
    public function detail(string $id)
    {
        $title = 'Detail Perjalanan Dinas';
        $user = User::find($id);
        $detail_perjalanandinas = perjalanandinas::find($id);
        return view('admin.verifikasi.perjadin.detail-perjadin', compact('detail_perjalanandinas', 'user', 'title'));
    }

    public function kirimNotifPimpinan($id)
    {
        // Logika mendapatkan detail perjalanan dinas berdasarkan $id
        $perjalanandinas = PerjalananDinas::find($id);

        // Misalkan ada role 'pimpinan', kita dapatkan pengguna dengan role tersebut
        $pimpinan = User::where('role', 'pimpinan')->get();

        // Kirim notifikasi ke semua pengguna dengan role pimpinan
        foreach ($pimpinan as $user) {
            $user->notify(new NotifikasiKePimpinan($perjalanandinas));
        }

        // Redirect setelah notifikasi dikirim
        return redirect()->back()->with('success', 'Notifikasi telah dikirim ke pimpinan.');
    }

    // public function update(Request $request, string $id)
    // {
    //     $perjalanandinas = perjalanandinas::find($id);

    //     if ($request->has('disetujui')) {
    //         $tanggal = date('dmY');
    //         $nomorSurat = "SPM/{$tanggal}/{$perjalanandinas->id}";

    //         $perjalanandinas->update([
    //             'nomor_surat' => $nomorSurat,
    //             'status' => 'Disetujui',
    //         ]);

    //         // Send approval email
    //         Mail::to($perjalanandinas->user->email)->send(new PerjalananDinasApproved($perjalanandinas));
    //     } elseif ($request->has('ditolak')) {
    //         $perjalanandinas->update([
    //             'status' => 'Ditolak',
    //         ]);

    //         // Send rejection email
    //         Mail::to($perjalanandinas->user->email)->send(new PerjalananDinasRejected($perjalanandinas));
    //     }

    //     return redirect()->route('verifikasi-perjalanan-dinas.index')->with('verif-perjadin', 'Status perjalanan dinas berhasil diperbarui.');
    // }
}
