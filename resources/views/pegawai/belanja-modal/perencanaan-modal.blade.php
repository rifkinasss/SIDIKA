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
        <li class="breadcrumb-item">Belanja Modal</li>
        <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Perencanaan Belanja Modal</u></span></li>
      </ol>
    </nav>
  </div>

  <div class="container-fluid bg-transparent">
    <div class="card bg-light rounded-0">
      <div class="row pt-4 ps-4">
        <h5>Perencanaan Belanja Modal</h5>
      </div>
      <hr>
      <div class="row py-2 ps-4">
        <p>Lengkapi form dibawah ini beserta deskripsi yang jelas yang dapat menjadi pendukung untuk membuat Proposal Perencanaan Belanja Modal.</p>
        <p>
          Formulir akan ditinjau dan balasan perencanaan akan dikirimkan minimal <span class="h5"><b>2 hari</b></span> setelah perencanaan dilakukan.<br>
          Jika terjadi kendala saat pengajuan dan belum menerima balasan klik <a href="#" class="text-first"><u>link bantuan</u></a>.
        </p>
      </div>
      <div class="row my-2 mx-4">
        <div class="card bg-warning border border-warning rounded-0 pt-4 px-4">
          <p><i class="bi bi-exclamation-square-fill"></i> Pastikan anda telah membaca seluruh ketentuan Belanja Modal. <br>
            <ul>
              <li>Kesalahan data pada dokumen berakibat penolakan</li>
              <li>Pemalsuan dokumen berakibat masuk ke daftar blacklist</li>
            </ul>
          </p>
        </div>
      </div>
      <hr>
      {{-- Perencanaan Belanja Modal --}}
      <div class="row mx-4 my-4 align-items-start">
        <h4>1. Proposal & Surat Permohonan Belanja Modal</h4>
        <div class="col-md-6">
          <label for="nomor-proposal-modal" class="form-label">Nomor Surat</label> 
          <input type="text" class="form-control rounded-0 mb-2" id="nomor-proposal-modal" disabled>
          <label for="latar-belakang-modal" class="form-label">Latar Belakang</label>
          <textarea class="form-control rounded-0 mb-2" id="latar-belakang-modal" placeholder="Contoh: Dalam rangka meningkatkan kinerja dan pelayanan, diperlukan pembangunan gedung kantor baru yang memadai." rows="4" required></textarea>
          <label for="tujuan-perencanaan-modal" class="form-label">Tujuan Belanja Modal</label>
          <textarea class="form-control rounded-0 mb-2" id="tujuan-perencanaan-modal" placeholder="Contoh: Membangun gedung kantor baru yang mampu menampung kebutuhan operasional dan memberikan kenyamanan bagi pegawai." rows="4" required></textarea>
          <label for="deskripsi-modal" class="form-label">Deskripsi Kebutuhan</label>
          <textarea class="form-control rounded-0 mb-2" id="deskripsi-modal" placeholder="Contoh: Belanja Modal Pembangunan Gedung Kantor 5 Lantai lengkap dengan fasilitas umum, listrik, dan air." rows="4" required></textarea>
          <label for="estimasi-perencanaan-modal" class="form-label">Estimasi Biaya (Rp.)</label> 
          <input type="number" class="form-control rounded-0 mb-2" id="estimasi-perencanaan-modal" required>
          <label for="jenis-belanja-modal" class="form-label">Jenis Belanja Modal</label>
          <select class="form-select rounded-0 mb-2" aria-label="Default select example" id="jenis-belanja-modal" required>
            <option selected>Pilih Jenis Belanja Modal</option>
            <option value="1">Pembelian Tanah</option>
            <option value="2">Pembangunan Gedung</option>
            <option value="3">Pengadaan Peralatan dan Mesin</option>
            <option value="4">Pembangunan Infrastruktur</option>
            <option value="5">Renovasi dan Perbaikan</option>
            <option value="6">Pembelian Kendaraan</option>
            <option value="7">Pengembangan Teknologi Informasi</option>
            <option value="8">Belanja Modal Jalan, Irigasi dan Jaringan </option>
            <option value="9">Belanja Modal Lainnya</option>
          </select>
          <label for="belanja-modal-lainnya" class="form-label">Belanja Modal Lainnya </label>
          <input type="text" class="form-control rounded-0 mb-2" id="belanja-modal-lainnya" placeholder="misal. belanja inventaris kantor">
          <label for="tanggal-mulai-modal" class="form-label">Tanggal Mulai</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-modal" placeholder="DD/MM/YYYY" required>
          <label for="tanggal-selesai-modal" class="form-label">Tanggal Selesai (Tenggat)</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-modal" placeholder="DD/MM/YYYY" required>
          <label for="durasi" class="form-label">Durasi</label> 
          <input type="text" class="form-control rounded-0 mb-2" id="durasi" disabled>
          <label for="deskripsi-spesifikasi-modal" class="form-label">Deskripsi dan Spesifikasi (detail)</label>
          <textarea class="form-control rounded-0 mb-2" id="deskripsi-spesifikasi-modal" placeholder="Spesifikasi:
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
                <li>Setelah Form ini disetujui akan keluar sebagai <b>Surat digital Permohonan Perencanaan Belanja Modal dan Proposal digital Proposal Belanja Modal</b> yang dapat diunduh</li>
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