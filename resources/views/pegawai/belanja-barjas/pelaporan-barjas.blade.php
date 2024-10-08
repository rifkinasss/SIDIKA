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
        <li class="breadcrumb-item"><a href="{{ route('pegawai') }}" class="text-decoration-none text-dark">Home</a></li>
        <li class="breadcrumb-item">Belanja Barang Jasa</li>
        <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Pelaporan Belanja Barang Jasa</u></span></li>
      </ol>
    </nav>
  </div>

  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row pt-4 ps-4">
        <h5>Pelaporan Belanja Barang Jasa</h5>
      </div>
      <hr>
      <div class="row py-2 ps-4">
        <p>Lengkapi form dibawah ini beserta deskripsi yang jelas yang dapat menjadi pendukung untuk melengkapi Dokumen-dokumen Pelaporan Belanja Barang Jasa.</p>
        <p>
          Formulir akan ditinjau dan balasan Pelaporan akan dikirimkan minimal <span class="h5"><b>2 hari</b></span> setelah Pelaporan dilakukan.<br>
          Jika terjadi kendala saat Pelaporan dan belum menerima balasan klik <a href="#" class="text-first"><u>link bantuan</u></a>. <br>
          Pada Pelaporan Belanja Barang Jasa ini bersifat progresif dimana halaman dapat dibuka kembali sampai semua form terisi.
        </p>
      </div>
      <div class="row my-2 mx-4">
        <div class="card bg-warning border border-warning rounded-0 pt-4 px-4">
          <p><i class="bi bi-exclamation-square-fill"></i> Pastikan anda telah membaca seluruh ketentuan Belanja Barang Jasa. <br>
            <ul>
              <li>Kesalahan data pada dokumen berakibat penolakan</li>
              <li>Pemalsuan dokumen berakibat masuk ke daftar blacklist</li>
            </ul>
          </p>
        </div>
      </div>
    </div>
  </div>
      
  {{-- Perjanjian SPMK --}}
  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row mx-4 my-4 align-items-start">
        <h4>1. Sistem Pelaporan Monitoring Kontrak (SPMK)</h4>
        <div class="col-md-6">
          <label for="nomor-spmk-barang-jasa" class="form-label">Nomor Dokumen SPMK</label> 
          <input type="text" class="form-control rounded-0 mb-2" id="nomor-spmk-barang-jasa" required>
          <label for="tanggal-spmk-barang-jasa" class="form-label">Tanggal</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-spmk-barang-jasa" placeholder="DD/MM/YYYY" required>
          <label for="bukti-spmk-barang-jasa" class="form-label">Bukti Dokumen Sistem Pelaporan Monitoring Kontrak (.pdf)</label>
          <input class="form-control rounded-0 mb-2" type="file" id="bukti-spmk-barang-jasa" multiple>
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Pastikan Nomor Surat sama dengan nomor Surat Perijinan Kerja.</li>
                <li>Nilai kontrak masukkan angka saja tanpa (,)</li>
                <li>Jika ada Surat Perijinan Kerja lebih dari satu(misal. sub-SPK milik Kontraktor) harap dimasukkan</li>
              </ol>
            </p>
          </div>
        </div>
        {{-- tombol kirim dan cancel --}}
        <div class="col-sm-6 mt-4"> 
          <button type="button" class="btn btn-primary rounded-0">Kirim</button>
        </div>
        <div class="col-sm-6 mt-4 text-end">
          <button type="button" class="btn bg-third border-primary rounded-0">Reset</button>
          <button type="button" class="btn btn-danger rounded-0">kembali</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Provisional Hand Over (PHO) --}}
  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row mx-4 my-4 align-items-start">
        <h4>2. Provisional Hand Over (PHO)</h4>
        <div class="col-md-6">
          <label for="nomor-pho-barang-jasa" class="form-label">Nomor Dokumen PHO</label>
          <input class="form-control rounded-0 mb-2" type="text" id="nomor-pho-barang-jasa"  />
          <label for="tanggal-pho-barang-jasa" class="form-label">Tanggal PHO</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-pho-barang-jasa" placeholder="DD/MM/YYYY" >
          <label for="bukti-pho-barang-jasa" class="form-label">Bukti Dokumen PHO (.pdf)</label>
          <input class="form-control rounded-0 mb-2" type="file" id="bukti-pho-barang-jasa" multiple>
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Adendum Kontrak tidak wajib diisi</li>
                <li>File Dokumen Adendum Kontrak bisa diisi lebih dari 1</li>
              </ol>
            </p>
          </div>
        </div>
        {{-- tombol kirim dan cancel --}}
        <div class="col-sm-6 mt-4"> 
          <button type="button" class="btn btn-primary rounded-0">Kirim</button>
        </div>
        <div class="col-sm-6 mt-4 text-end">
          <button type="button" class="btn bg-third border-primary rounded-0">Reset</button>
          <button type="button" class="btn btn-danger rounded-0">kembali</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Berita Acara Serah Terima (BAST) --}}
  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row mx-4 my-4 align-items-start">
        <h4>3. Berita Acara Serah Terima (BAST)</h4>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="nomor-bast-barang-jasa" class="form-label">Nomor Dokumen BAST</label>
            <input class="form-control rounded-0 mb-2" type="text" id="nomor-bast-barang-jasa"  />
            <label for="tanggal-bast-barang-jasa" class="form-label">Tanggal BAST</label>
            <input type="date" class="form-control rounded-0 mb-2" id="tanggal-bast-barang-jasa" placeholder="DD/MM/YYYY" >
            <label for="nilai-bast-barang-jasa" class="form-label">Nilai BAST</label>
            <input class="form-control rounded-0 mb-2" type="number" id="nilai-bast-barang-jasa"  />
            <label for="bukti-bast-barang-jasa" class="form-label">Bukti Dokumen BAST (.pdf)</label>
            <input class="form-control rounded-0 mb-2" type="file" id="bukti-bast-barang-jasa" multiple>
            </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu(Bank Garansi / Surety Bond) atau dua-duanya(Bank Garansi & Surety Bond)</li>
                <li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
                <li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan penjamin lainnya.</li>
              </ol>
            </p>
          </div>
        </div>
        {{-- tombol kirim dan cancel --}}
        <div class="col-sm-6 mt-4"> 
          <button type="button" class="btn btn-primary rounded-0">Kirim</button>
        </div>
        <div class="col-sm-6 mt-4 text-end">
          <button type="button" class="btn bg-third border-primary rounded-0">Reset</button>
          <button type="button" class="btn btn-danger rounded-0">kembali</button>
        </div>
      </div>
    </div>
  </div>
  
  {{-- Jaminan pelaksanaan --}}
  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row mx-4 my-4 align-items-start">
        <h4>4. Final Hand Over (FHO)</h4>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="nomor-fho-barang-jasa" class="form-label">Nomor Dokumen FHO</label>
            <input class="form-control rounded-0 mb-2" type="text" id="nomor-fho-barang-jasa"  />
            <label for="tanggal-fho-barang-jasa" class="form-label">Tanggal FHO</label>
            <input type="date" class="form-control rounded-0 mb-2" id="tanggal-fho-barang-jasa" placeholder="DD/MM/YYYY" >
            <label for="bukti-fho-barang-jasa" class="form-label">Bukti Dokumen FHO (.pdf)</label>
            <input class="form-control rounded-0 mb-2" type="file" id="bukti-fho-barang-jasa" multiple>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu(Bank Garansi / Surety Bond) atau keduanya (Bank Garansi & Surety Bond)</li>
                <li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
                <li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan penjamin lainnya.</li>
              </ol>
            </p>
          </div>
        </div>
        {{-- tombol kirim dan cancel --}}
        <div class="col-sm-6 mt-4"> 
          <button type="button" class="btn btn-primary rounded-0">Kirim</button>
        </div>
        <div class="col-sm-6 mt-4 text-end">
          <button type="button" class="btn bg-third border-primary rounded-0">Reset</button>
          <button type="button" class="btn btn-danger rounded-0">kembali</button>
        </div>
      </div>
    </div>
  </div>

  {{-- Jaminan pelaksanaan --}}
  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row mx-4 my-4 align-items-start">
        <h4>5. Surat Perintah Pencairan Dana (SP2D)</h4>
        <div class="col-md-6">
          <div class="mb-3">
            <label for="nomor-sp2d-barang-jasa" class="form-label">Nomor Dokumen SP2D</label>
            <input class="form-control rounded-0 mb-2" type="text" id="nomor-sp2d-barang-jasa" />
            <label for="tanggal-sp2d-barang-jasa" class="form-label">Tanggal SP2D</label>
            <input type="date" class="form-control rounded-0 mb-2" id="tanggal-sp2d-barang-jasa" placeholder="DD/MM/YYYY" >
            <label for="nilai-sp2d-barang-jasa" class="form-label">Nilai SP2D</label>
            <input class="form-control rounded-0 mb-2" type="number" id="nilai-sp2d-barang-jasa" />
            <label for="bukti-sp2d-barang-jasa" class="form-label">Bukti Dokumen SP2D (.pdf)</label>
            <input class="form-control rounded-0 mb-2" type="file" id="bukti-sp2d-barang-jasa" multiple>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu (Dana APBN / Dana APBD/ Dana Hibah) atau ketiganya (Dana APBN & Dana APBD & Dana Hibah)</li>
                <li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
                <li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan penjamin lainnya.</li>
              </ol>
            </p>
          </div>
        </div>
        {{-- tombol kirim dan cancel --}}
        <div class="col-sm-6 mt-4"> 
          <button type="button" class="btn btn-primary rounded-0">Kirim</button>
        </div>
        <div class="col-sm-6 mt-4 text-end">
          <button type="button" class="btn bg-third border-primary rounded-0">Reset</button>
          <button type="button" class="btn btn-danger rounded-0">kembali</button>
        </div>
      </div>
    </div>
  </div>

@endsection