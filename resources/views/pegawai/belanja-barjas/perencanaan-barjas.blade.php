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
        <li class="breadcrumb-item">Belanja Barang Jasa</li>
        <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Perencanaan Belanja Barang Jasa</u></span></li>
      </ol>
    </nav>
  </div>

  <div class="container-fluid bg-transparent">
    <div class="card bg-light rounded-0">
      <div class="row pt-4 ps-4">
        <h5>Perencanaan Belanja Barang Jasa</h5>
      </div>
      <hr>
      <div class="row py-2 ps-4">
        <p>Lengkapi form dibawah ini beserta deskripsi yang jelas yang dapat menjadi pendukung untuk membuat Proposal Perencanaan Belanja Barang Jasa.</p>
        <p>
          Formulir akan ditinjau dan balasan perencanaan akan dikirimkan minimal <span class="h5"><b>2 hari</b></span> setelah perencanaan dilakukan.<br>
          Jika terjadi kendala saat pengajuan dan belum menerima balasan klik <a href="#" class="text-first"><u>link bantuan</u></a>.
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
      <hr>
      {{-- Perencanaan Belanja Barang Jasa --}}
      <div class="row mx-4 my-4 align-items-start">
        <h4>1. Proposal & Surat Permohonan Belanja Barang Jasa</h4>
        <div class="col-md-6">
          <label for="nomor-proposal-barang-jasa" class="form-label">Nomor Surat</label> 
          <input type="text" class="form-control rounded-0 mb-2" id="nomor-proposal-barang-jasa" disabled>
          <label for="latar-belakang-barang-jasa" class="form-label">Latar Belakang</label>
          <textarea class="form-control rounded-0 mb-2" id="latar-belakang-barang-jasa" placeholder="Contoh: Dalam rangka meningkatkan kinerja dan pelayanan, diperlukan pembangunan gedung kantor baru yang memadai." rows="4" required></textarea>
          <label for="tujuan-perencanaan-barang-jasa" class="form-label">Tujuan Belanja Barang Jasa</label>
          <textarea class="form-control rounded-0 mb-2" id="tujuan-perencanaan-barang-jasa" placeholder="Contoh: Membangun gedung kantor baru yang mampu menampung kebutuhan operasional dan memberikan kenyamanan bagi pegawai." rows="4" required></textarea>
          <label for="deskripsi-barang-jasa" class="form-label">Deskripsi Kebutuhan</label>
          <textarea class="form-control rounded-0 mb-2" id="deskripsi-barang-jasa" placeholder="Contoh: Belanja Barang Jasa Pembangunan Gedung Kantor 5 Lantai lengkap dengan fasilitas umum, listrik, dan air." rows="4" required></textarea>
          <label for="estimasi-perencanaan-barang-jasa" class="form-label">Estimasi Biaya (Rp.)</label> 
          <input type="number" class="form-control rounded-0 mb-2" id="estimasi-perencanaan-barang-jasa" required>
          <label for="jenis-belanja-barang-jasa" class="form-label">Jenis Belanja Barang Jasa</label>
          <select class="form-select rounded-0 mb-2" aria-label="Default select example" id="jenis-belanja-barang-jasa" required>
            <option selected>Pilih Jenis Belanja Barang Jasa</option>
            <option value="1">Belanja Barang Habis Pakai</option>
            <option value="2">Belanja Barang Tidak Habis Pakai</option>
            <option value="3">Belanja Barang untuk Pemeliharaan</option>
            <option value="4">Belanja Jasa Konsultan</option>
            <option value="5">Belanja Jasa Non-Konsultan</option>
            <option value="6">Belanja Jasa Pemeliharaan</option>
            <option value="7">Belanja Barang Jasa Lainnya</option>
          </select>
          <label for="belanja-barang-jasa-lainnya" class="form-label">Belanja Barang Jasa Lainnya </label>
          <input type="text" class="form-control rounded-0 mb-2" id="belanja-barang-jasa-lainnya" placeholder="misal. belanja inventaris kantor">
          <label for="tanggal-mulai-barang-jasa" class="form-label">Tanggal Mulai</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-barang-jasa" placeholder="DD/MM/YYYY" required>
          <label for="tanggal-selesai-barang-jasa" class="form-label">Tanggal Selesai (Tenggat)</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-barang-jasa" placeholder="DD/MM/YYYY" required>
          <label for="durasi" class="form-label">Durasi</label> 
          <input type="text" class="form-control rounded-0 mb-2" id="durasi" disabled>
          <label for="rab-barjas" class="form-label">Dokumen RAB (.pdf)</label>
          <input class="form-control rounded-0 mb-2" type="file" id="rab-barjas" multiple>
          <label for="deskripsi-spesifikasi-barang-jasa" class="form-label">Deskripsi dan Spesifikasi (detail)</label>
          <textarea class="form-control rounded-0 mb-2" id="deskripsi-spesifikasi-barang-jasa" placeholder="Spesifikasi:
1. Struktur Bangunan:
   - Pondasi beton bertulang dengan kualitas K-300.
   - Dinding menggunakan bata ringan dengan finishing cat eksterior anti-jamur.
   - Atap menggunakan baja ringan dengan penutup genteng metal.dst." rows="20" required></textarea>
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Nomor Surat akan terisi otomatis jika form disetujui oleh admin.</li>
                <li>Setelah Form ini disetujui akan keluar sebagai <b>Surat digital Permohonan Perencanaan Belanja Barang Jasa dan Proposal digital Proposal Belanja Barang Jasa</b> yang dapat diunduh</li>
                <li>Latar Belakang dan tujuan harap menggunakan kalimat <b>baku dan formal</b>.</li>
                <li>Deskripsi Kebutuhan diisi singkat, padat, dan jelas.</li>
                <li>Deskripsi Spesifikasi berisi kebutuhan mendetail.</li>
                <li>Perbedaan Estimasi Biaya saat pengajuan dan pelaporan harap diberikan catatan tambahan nanti saat pelaporan.</li>
              </ol>
            </p>
          </div>
        </div>
      </div>

      {{-- tombol kirim dan cancel --}}
      <div class="row my-4 mx-4">
        <div class="col-sm-6"> 
          <button type="button" class="btn btn-primary rounded-0">Kirim</button>
        </div>
        <div class="col-sm-6 text-end">
          <button type="button" class="btn bg-third border-primary rounded-0">Reset</button>
          <button type="button" class="btn btn-danger rounded-0">kembali</button>
        </div>
      </div>    

    </div>
  </div>

@endsection