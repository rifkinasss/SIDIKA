@extends('pegawai.layouts.app')

@section('content')
<style>
  body {
    background-color: #E6F4F1;
  }
</style>
  <div class="container-fluid py-4 px-4 pb-2 bg-transparent">
    {{-- breadcrumb --}}
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Home</a></li>
        <li class="breadcrumb-item">Profile</li>
        <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Settings</u></span></li>
      </ol>
    </nav>
  </div>

  <div class="container-fluid bg-transparent">
    <div class="card bg-light rounded-0 mb-4">
      <div class="row py-4 px-4">
        <h2>Profile's Settings</h2>
        <hr>
        <h5>Foto Profile</h5>
        <div class="col-md-4 text-center mt-4">
          <img src="{{ asset('images/miles1x1.jpeg') }}" alt="Profile" class="rounded-0" style="width: 50%;">
          <p class="mt-4 text-muted">
            <a href="mx-2">Ganti Profile</a> |
            <a href="mx-2">Lihat</a> |
            <a href="mx-2">Simpan</a>
          </p>
          
        </div>
        <div class="col-md-8 mt-4">
          <p class="mt-4">Ketentuan Foto Profile :
            <ul>
              <li>Skala Foto 1x1(persegi)</li>
              <li>Menggunakan foto formal</li>
              <li>File foto format jpeg, jpg, png</li>
              <li class="text-danger">Dilarang menggunakan foto selfie</li>
            </ul>
          </p>
        </div>
        <div class="row py-4 px-4">
          <h5>Data Diri</h5>
          <div class="col-md-4 mt-4">
            <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
              <p><i class="bi bi-info-square-fill"></i> data diri otomatis diambil dari database informasi akun pegawai yang terdaftar. jika ada data diri yang kosong/salah harap hubungi <a href=""> admin SIDIKA.</a>
              </p>
            </div>  
          </div>
          <div class="col-md-8 mt-4">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input class="form-control rounded-0 mb-2" type="text" id="nama_lengkap" placeholder="misal. Faiq Athari" required />
            <label for="email" class="form-label">Email</label>
            <input class="form-control rounded-0 mb-2" type="email" id="email" placeholder="misal. faiq athari@email.com" required />
            <label for="nip" class="form-label">Nomor Induk Pegawai (NIP)</label>
            <input class="form-control rounded-0 mb-2" type="text" id="nip" disabled />
            <label for="jabatan" class="form-label">Jabatan</label>
            <input class="form-control rounded-0 mb-2" type="text" id="jabatan" disabled />
            <label for="instansi" class="form-label">Instansi/Unit</label>
            <input class="form-control rounded-0 mb-2" type="text" id="instansi" disabled />
          </div>  
        </div>  
      </div>
    </div>

    {{-- ganti password --}}
    <div class="card bg-light rounded-0 my-4">
      <div class="row py-4 px-4">
        <h2>Ganti Password</h2>
        <hr>
        <div class="col-md-4 mt-4">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> harap catat dan ingat password yang telah anda ganti. jika anda lupa password hubungi <a href=""> admin SIDIKA.</a>
            </p>
          </div>  
        </div>
        <div class="col-md-8 mt-4">
          <label for="password-lama" class="form-label">Password Lama</label>
          <input class="form-control rounded-0 mb-2" type="text" id="password-lama" placeholder="misal. Faiq Athari" />
          <label for="password-baru" class="form-label">Password Baru</label>
          <input class="form-control rounded-0 mb-2" type="text" id="password-baru" placeholder="misal. Faiq Athari" />
          <label for="konfirmasi-password" class="form-label">Konfirmasi Password Baru</label>
          <input class="form-control rounded-0 mb-2" type="text" id="konfirmasi-password" />
        </div>  
    </div>
    </div>
  </div>
@endsection