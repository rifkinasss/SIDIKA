<?php

namespace App\Http\Controllers\Pegawai;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pegawai\BarangJasa;
use App\Models\Pegawai\BarangModal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai\PerjalananDinas;
use Illuminate\Support\Facades\Storage;
use App\Models\Pegawai\PelaporanPerjadin;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $user_id = Auth::user()->id;

        $perjadin = PerjalananDinas::where('user_id', $user_id)->get();
        $pelaporan = PelaporanPerjadin::where('user_id', $user_id)->get();
        $barjas = BarangJasa::where('user_id', $user_id)->get();
        $barmol = BarangModal::where('user_id', $user_id)->get();

        return view('pegawai.index', compact('title', 'perjadin', 'barjas', 'barmol', 'pelaporan'));
    }

    public function profile($id)
    {
        $user = User::find($id);
        $title = 'Profile';
        return view('pegawai.profile', compact('title', 'user'));
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $user = User::find($id);
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $user_id = Auth::user()->id;
            $imageName = $user_id . time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('profile_images', $imageName, 'public');

            // Hapus gambar lama jika ada
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Simpan path gambar baru di database
            $user->profile_photo_path = $imagePath;
            $user->save();

            return response()->json(['success' => true, 'image_url' => Storage::url($imagePath)]);
        }

        return response()->json(['success' => false, 'message' => 'Failed to upload image.']);
    }

    public function ketentuanPerjadin()
    {
        return view('pegawai.perjadin.ket-perjadin', [
            'title' => 'Ketentuan Perjalanan Dinas'
        ]);
    }

    public function ketentuanBarMol()
    {
        return view('pegawai.belanja-modal.ket-modal', [
            'title' => 'Ketentuan Belanja Modal'
        ]);
    }

    public function ketentuanBarJas()
    {
        return view('pegawai.belanja-barjas.ket-barjas', [
            'title' => 'Ketentuan Belanja Barang Jasa'
        ]);
    }

    public function bantuan()
    {
        return view('pegawai.bantuan', [
            'title' => 'Bantuan Pengguna'
        ]);
    }
}
