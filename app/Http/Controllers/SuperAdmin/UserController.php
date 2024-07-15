<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;
use App\Imports\UsersImport;
use Carbon\Carbon;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'superadmin')->get();
        $title = 'User Management';
        return view('super-admin.user', compact('users', 'title'));
    }
    public function create()
    {
        $provinces = Province::all();
        $title = 'Create User';
        return view('super-admin.create-user', compact('title', 'provinces'));
    }
    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new UsersImport, $file);

        return back()->with('success', 'Users imported successfully.');
    }

    public function store(Request $request)
    {
        User::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_handphone' => $request->noHp,
            'jns_kelamin' => $request->jns_kelamin,
            'pendidikan_terakhir' => $request->pendidikanTerakhir,
            'status_perkawinan' => $request->statusPerkawinan,
            'role' => $request->role,
            'jabatan' => $request->jabatan,
            'unit_kerja' => $request->unit_kerja,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'golongan' => $request->golongan,
            'alamat' => $request->alamat,
            'password' => $request->password,
        ]);

        return redirect()->route('user-management');
    }
    public function edit(string $id)
    {
        $title = 'Edit User';
        $user = User::find($id);
        return view('super-admin.edit-user', compact('user', 'title'));
    }
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'email' => $request->email,
            'noHp' => $request->noHp,
            'jns_kelamin' => $request->jns_kelamin,
            'pendidikanTerakhir' => $request->pendidikanTerakhir,
            'statusPerkawinan' => $request->statusPerkawinan,
            'role' => $request->role,
            'jabatan' => $request->jabatan,
            'unit_kerja' => $request->unit_kerja,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'agama' => $request->agama,
            'golongan' => $request->golongan,
            'alamat' => $request->golongan,
            'password' => $request->password,
        ]);

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        return redirect()->route('user-management')->with('edit-user', 'User berhasil diperbarui.');
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user-management')->with('delet-user', 'User berhasil dihapus.');
    }
}