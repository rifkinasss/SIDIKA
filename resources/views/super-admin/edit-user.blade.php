@extends('super-admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-superadmin') }}">Home</a></li>
                            <li class="breadcrumb-item active">User Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <div class="card-body">
                                <form id="quickForm" method="POST"
                                    action="{{ url('dashboard-superadmin/user-management/create') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="NIP">NIP</label>
                                                <input type="text" name="nip" class="form-control" id="NIP"
                                                    placeholder="Masukkan NIP" maxlength="18" value="{{ $user->nip }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="Nama">Nama Lengkap</label>
                                                <input type="text" name="nama" class="form-control" id="Nama"
                                                    placeholder="Masukkan Nama Lengkap Tanpa Gelar"
                                                    value="{{ $user->nama }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="Email">Email address</label>
                                                <input type="email" name="email" class="form-control" id="Email"
                                                    placeholder="Masukkan Email" value="{{ $user->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label>No Handphone</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control"
                                                        data-inputmask='"mask": "(+62) 899-9999-9999"' data-mask
                                                        id="nohp" name="noHp" placeholder="(+62) 899-9999-9999"
                                                        value="{{ $user->noHp }}">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Jenis_Kelamin">Jenis Kelamin</label>
                                                <select id="Jenis_Kelamin" class="form-control select2" style="width: 100%;"
                                                    name="jns_kelamin">
                                                    <option value="{{ $user->jns_kelamin }}" disabled selected>
                                                        {{ $user->jns_kelamin }}</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                                <select id="pendidikan_terakhir" class="form-control select2"
                                                    style="width: 100%;" name="pendidikan_terakhir">
                                                    <option value="{{ $user->pendidikan_terakhir }}" disabled selected>
                                                        {{ $user->pendidikan_terakhir }}
                                                    </option>
                                                    <option value="SD">SD</option>
                                                    <option value="SMP">Protestan</option>
                                                    <option value="SMA/K">SMA/K</option>
                                                    <option value="D3">D3</option>
                                                    <option value="S1">S1</option>
                                                    <option value="S2">S2</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="status_perkawinan">Status Perkawinan</label>
                                                <select id="status_perkawinan" class="form-control select2"
                                                    style="width: 100%;" name="status_perkawinan">
                                                    <option value="{{ $user->status_perkawinan }}" disabled selected>
                                                        {{ $user->status_perkawinan }}
                                                    </option>
                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                    <option value="Sudah Menikah">Sudah Menikah</option>
                                                    <option value="Duda">Duda</option>
                                                    <option value="Janda">Janda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Role">Role</label>
                                                <select id="Role" class="form-control select2" style="width: 100%;"
                                                    name="role">
                                                    <option value="{{ $user->role }}" disabled selected>
                                                        {{ $user->role }}</option>
                                                    <option value="pegawai">Pegawai</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="superadmin">Superadmin</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatan">Jabatan</label>
                                                <select id="jabatan" class="form-control select2" style="width: 100%;"
                                                    name="jabatan">
                                                    <option value="{{ $user->jabatan }}" disabled selected>
                                                        {{ $user->jabatan }}</option>
                                                    <option>Super Admin</option>
                                                    <option>Admin</option>
                                                    <option>Kepala Dinas Pendidikan</option>
                                                    <option>Wakil Kepala Dinas Pendidikan</option>
                                                    <option>Sekretaris Dinas Pendidikan</option>
                                                    <option>Kepala Bidang</option>
                                                    <option>Wakil Kepala Bidang</option>
                                                    <option>Sekretaris Bidang</option>
                                                    <option>Staff</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="unit_kerja">Unit Kerja</label>
                                                <select id="unit_kerja" class="form-control select2" style="width: 100%;"
                                                    name="unit_kerja">
                                                    <option value="{{ $user->unit_kerja }}" disabled selected>
                                                        {{ $user->unit_kerja }}</option>
                                                    <option>Super Admin</option>
                                                    <option>Admin</option>
                                                    <option>Dinas Pendidikan Jakarta</option>
                                                    <option>Bidang Pendidikan Dasar</option>
                                                    <option>Bidang Pendidikan Menengah</option>
                                                    <option>Bidang Pendidikan Tinggi</option>
                                                    <option>Bidang Kurikulum dan Pembelajaran</option>
                                                    <option>Bidang Ketenagaan</option>
                                                    <option>Bidang Sarana dan Prasarana Pendidikan</option>
                                                    <option>Bidang Penelitian dan Pengembangan Pendidikan</option>
                                                    <option>Bidang Evaluasi Pendidikan</option>
                                                    <option>Bidang Keuangan dan Administrasi</option>
                                                    <option>Bidang Hukum</option>
                                                    <option>Bidang Humas dan Komunikasi</option>
                                                    <option>Bidang Teknologi Informasi dan Komputerisasi</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="pangkat">Golongan</label>
                                                <select id="golongan" class="form-control select2" style="width: 100%;"
                                                    name="golongan">
                                                    <option value="{{ $user->golongan }}" disabled selected>
                                                        {{ $user->golongan }}
                                                    </option>
                                                    <option value="I-a">I-a</option>
                                                    <option value="I-b">I-b</option>
                                                    <option value="I-c">I-c</option>
                                                    <option value="I-d">I-d</option>
                                                    <option value="II-a">II-a</option>
                                                    <option value="II-b">II-b</option>
                                                    <option value="II-c">II-c</option>
                                                    <option value="II-d">II-d</option>
                                                    <option value="III-a">III-a</option>
                                                    <option value="III-b">III-b</option>
                                                    <option value="III-c">III-c</option>
                                                    <option value="III-d">III-d</option>
                                                    <option value="IV-a">IV-a</option>
                                                    <option value="IV-b">IV-b</option>
                                                    <option value="IV-c">IV-c</option>
                                                    <option value="IV-d">IV-d</option>
                                                    <option value="IV-e">IV-e</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="Tempat_Lahir">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" class="form-control"
                                                    id="Tempat_Lahir" placeholder="Masukkan Tempat Lahir"
                                                    value="{{ $user->tempat_lahir }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <div class="input-group date" id="tanggal_lahir"
                                                    data-target-input="nearest">
                                                    <input type="text" class="form-control datetimepicker-input"
                                                        data-target="#tanggal_lahir" name="tanggal_lahir"
                                                        value="{{ $user->tanggal_lahir }}" />
                                                    <div class="input-group-append" data-target="#tanggal_lahir"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Agama">Agama</label>
                                                <select id="Agama" class="form-control select2" style="width: 100%;"
                                                    name="agama">
                                                    <option value="{{ $user->agama }}" disabled selected>
                                                        {{ $user->agama }}
                                                    </option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Protestan">Protestan</option>
                                                    <option value="Katholik">Katholik</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Buddha">Buddha</option>
                                                    <option value="Kong hu cu">Kong hu cu</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3" placeholder="Masukkan Alamat">{{ $user->alamat }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Password">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" class="form-control" id="Password"
                                                placeholder="Masukkan Password">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-eye" id="togglePassword"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-end">
                                            <a href="{{ url('dashboard-superadmin/user-management') }}" type="submit"
                                                class="btn btn-warning mr-2">Kembali</a>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
