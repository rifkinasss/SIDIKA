<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new User([
            'nip'                => $row['nip'],
            'nama'               => $row['nama'],
            'email'              => $row['email'],
            'no_handphone'               => $row['no_handphone'],
            'jns_kelamin'        => $row['jns_kelamin'],
            'pendidikan_terakhir' => $row['pendidikan_terakhir'],
            'status_perkawinan'   => $row['status_perkawinan'],
            'role'               => $row['role'],
            'jabatan'            => $row['jabatan'],
            'unit_kerja'         => $row['unit_kerja'],
            'golongan'           => $row['golongan'],
            'tempat_lahir'       => $row['tempat_lahir'],
            'tanggal_lahir'      => $row['tanggal_lahir'],
            'agama'              => $row['agama'],
            'alamat'             => $row['alamat'],
            'password'           => Hash::make($row['password']),
        ]);
    }
}
