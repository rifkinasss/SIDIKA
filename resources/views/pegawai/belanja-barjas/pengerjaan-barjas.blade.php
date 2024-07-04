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
        <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Pengerjaan Belanja Barang Jasa</u></span></li>
      </ol>
    </nav>
  </div>

  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row pt-4 ps-4">
        <h5>Pengerjaan Belanja Barang Jasa</h5>
      </div>
      <hr>
      <div class="row py-2 ps-4">
        <p>Lengkapi form dibawah ini beserta deskripsi yang jelas yang dapat menjadi pendukung untuk membuat Surat-surat Pengerjaan Belanja Barang Jasa.</p>
        <p>
          Formulir akan ditinjau dan balasan Pengerjaan akan dikirimkan minimal <span class="h5"><b>2 hari</b></span> setelah Pengerjaan dilakukan.<br>
          Jika terjadi kendala saat Pengerjaan dan belum menerima balasan klik <a href="#" class="text-first"><u>link bantuan</u></a>. <br>
          Pada Pengerjaan Belanja Barang Jasa ini bersifat progresif dimana halaman dapat dibuka kembali sampai semua form terisi(termasuk adendum kontrak).
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
      {{-- Pengerjaan Belanja Barang Jasa --}}
      <div class="row mx-4 my-4 align-items-start">
        <h4>0. Data Proposal Belanja Barang Jasa</h4>
        <div class="col-md-6">
          <label for="nomor-proposal-barang-jasa" class="form-label">Nomor Surat</label> 
          <input type="text" class="form-control rounded-0 mb-2" id="nomor-proposal-barang-jasa" disabled>
          <label for="latar-belakang-barang-jasa" class="form-label">Latar Belakang</label>
          <textarea class="form-control rounded-0 mb-2" id="latar-belakang-barang-jasa" placeholder="Contoh: Dalam rangka meningkatkan kinerja dan pelayanan, diperlukan pembangunan gedung kantor baru yang memadai." rows="4" disabled></textarea>
          <label for="tujuan-perencanaan-barang-jasa" class="form-label">Tujuan Belanja Barang Jasa</label>
          <textarea class="form-control rounded-0 mb-2" id="tujuan-perencanaan-barang-jasa" placeholder="Contoh: Membangun gedung kantor baru yang mampu menampung kebutuhan operasional dan memberikan kenyamanan bagi pegawai." rows="4" disabled></textarea>
          <label for="deskripsi-barang-jasa" class="form-label">Deskripsi Kebutuhan</label>
          <textarea class="form-control rounded-0 mb-2" id="deskripsi-barang-jasa" placeholder="Contoh: Belanja Barang Jasa Pembangunan Gedung Kantor 5 Lantai lengkap dengan fasilitas umum, listrik, dan air." rows="4" disabled></textarea>
          <label for="estimasi-Pengerjaan-barang-jasa" class="form-label">Estimasi Biaya (Rp.)</label> 
          <input type="number" class="form-control rounded-0 mb-2" id="estimasi-Pengerjaan-barang-jasa" disabled>
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
          <input type="text" class="form-control rounded-0 mb-2" id="belanja-barang-jasa-lainnya" placeholder="misal. belanja inventaris kantor" disabled>
          <label for="tanggal-mulai-barang-jasa" class="form-label">Tanggal Mulai</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-barang-jasa" placeholder="DD/MM/YYYY" disabled>
          <label for="tanggal-selesai-barang-jasa" class="form-label">Tanggal Selesai (Tenggat)</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-barang-jasa" placeholder="DD/MM/YYYY" disabled>
          <label for="durasi-perencanaan-barang-jasa" class="form-label">Durasi</label> 
          <input type="text" class="form-control rounded-0 mb-2" id="durasi-perencanaan-barang-jasa" disabled>
          <label for="deskripsi-spesifikasi-barang-jasa" class="form-label">Deskripsi dan Spesifikasi (detail)</label>
          <textarea class="form-control rounded-0 mb-2" id="deskripsi-spesifikasi-barang-jasa" placeholder="Spesifikasi:
1. Struktur Bangunan:
   - Pondasi beton bertulang dengan kualitas K-300.
   - Dinding menggunakan bata ringan dengan finishing cat eksterior anti-jamur.
   - Atap menggunakan baja ringan dengan penutup genteng metal.dst." rows="20" disabled></textarea>
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
                <li>Perbedaan Estimasi Biaya saat Pengerjaan dan pelaporan harap diberikan catatan tambahan nanti saat pelaporan.</li>
                <li>Bagian ini hanya sebagai tambahan referensi Belanja Barang Jasa yang anda rencanakan.</li>
              </ol>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
      
  {{-- Perjanjian SPK --}}
  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row mx-4 my-4 align-items-start">
        <h4>1. Perjanjian/Kontrak/SPK</h4>
        <div class="col-md-6">
          <label for="nomor-spk-barang-jasa" class="form-label">Nomor Surat Perijinan Kerja</label> 
          <input type="text" class="form-control rounded-0 mb-2" id="nomor-spk-barang-jasa" required>
          <label for="penyedia-spk-barang-jasa" class="form-label">Nama Penyedia Barang / Kontraktor</label> 
          <input type="text" class="form-control rounded-0 mb-2" id="penyedia-spk-barang-jasa" placeholder="misal. PT.Deka Sari Perkasa" required>
          <label for="lokasi" class="form-label">Lokasi Penyedia Barang/ Kontraktor</label><br>
          <label for="lokasi-provinsi-barang-jasa" class="form-label">Provinsi</label>
          <select class="form-select rounded-0 mb-2" aria-label="Default select example" id="lokasi-provinsi-barang-jasa">
            <option selected>Provinsi</option>
            <option value="1">Kalimantan Timur</option>
            <option value="2">DKI Jakarta</option>
            <option value="3">Bali</option>
          </select>    
          <label for="lokasi-kota-barang-jasa" class="form-label">Kota/Kabupaten</label>
          <select class="form-select rounded-0 mb-2" aria-label="Default select example" id="lokasi-kota-barang-jasa">
            <option selected>Kota/Kabupaten</option>
            <option value="1">Kota Balikpapan</option>
            <option value="2">Kota Samarinda</option>
            <option value="3">Kab. Kutai Kartanegara</option>
          </select>    
          <label for="tanggal-mulai-spk-barang-jasa" class="form-label">Tanggal Mulai Kontrak</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-spk-barang-jasa" placeholder="DD/MM/YYYY" required>
          <label for="tanggal-selesai-spk-barang-jasa" class="form-label">Tanggal Berakhir Kontrak (tenggat)</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-spk-barang-jasa" placeholder="DD/MM/YYYY" required>
          <label for="durasi-spk-barang-jasa" class="form-label">Durasi</label> 
          <input type="text" class="form-control rounded-0 mb-2" id="durasi-spk-barang-jasa" disabled>
          <label for="nilai-kedua-barang-jasa" class="form-label">Nilai Kontrak</label>
          <input type="number" class="form-control rounded-0 mb-4" id="nilai-kedua-barang-jasa" placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)" required>
          <label for="uraian-pengadaan-barang-jasa" class="form-label">Uraian Pengadaan (Sesuai Kontrak)</label>
          <textarea class="form-control rounded-0 mb-4" id="uraian-pengadaan-barang-jasa" placeholder="Contoh: Pembayaran Belanja Barang Jasa Pembangunan Gedung Kantor 5 Lantai lengkap dengan fasilitas umum, listrik, dan air." rows="4" required></textarea>
          <label for="bukti-spk" class="form-label">Bukti Surat Perijinan Kerja (.pdf)</label>
          <input class="form-control rounded-0 mb-2" type="file" id="bukti-spk" multiple>
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

  {{-- Adendum Kontrak Belanja Barang Jasa --}}
  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row mx-4 my-4 align-items-start">
        <h4>2. Adendum Kontrak Belanja Barang Jasa</h4>
        <div class="col-md-6">
          <label for="nomor-adendum-barang-jasa" class="form-label">Nomor Surat Adendum Kontrak</label>
          <input class="form-control rounded-0 mb-2" type="text" id="nomor-adendum-barang-jasa"  />
          <label for="uraian-adendum-barang-jasa" class="form-label">Uraian Adendum (Sesuai Kontrak)</label>
          <textarea class="form-control rounded-0 mb-4" id="uraian-adendum-barang-jasa" placeholder="Contoh: Pembayaran Belanja Barang Jasa Pembangunan Gedung Kantor 5 Lantai lengkap dengan fasilitas umum, listrik, dan air." rows="4" ></textarea>
          <label for="tanggal-mulai-adendum-barang-jasa" class="form-label">Tanggal Mulai Adendum Kontrak</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-adendum-barang-jasa" placeholder="DD/MM/YYYY" >
          <label for="tanggal-selesai-adendum-barang-jasa" class="form-label">Tanggal Berakhir Adendum Kontrak (tenggat)</label>
          <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-adendum-barang-jasa" placeholder="DD/MM/YYYY" >
          <label for="nilai-adendum-barang-jasa" class="form-label">Nilai Kontrak Adendum</label>
          <input type="number" class="form-control rounded-0 mb-4" id="nilai-adendum-barang-jasa" placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)">
          <label for="bukti-adendum-barang-jasa" class="form-label">Bukti Surat Adendum Kerja (.pdf)</label>
          <input class="form-control rounded-0 mb-2" type="file" id="bukti-adendum-barang-jasa" multiple>
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

  {{-- Jaminan pelaksanaan --}}
  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row mx-4 my-4 align-items-start">
        <h4>3. Jaminan Pelaksanaan</h4>
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Bukti Jaminan Pelaksanaan</label> <br>
            <label for="nilai-bank-pelaksanaan-barang-jasa" class="form-label">Nilai Bank Garansi</label>
            <input type="number" class="form-control rounded-0 mb-2" id="nilai-bank-pelaksanaan-barang-jasa" placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)">
            <label for="bank-garansi-pelaksanaan-barang-jasa" class="form-label">Bank Garansi</label>
            <input class="form-control rounded-0 mb-4" type="file" id="bukti-bank-garansi-barang-jasa" multiple>
            <label for="nilai-surety-barang-jasa" class="form-label">Nilai Surety Bond</label>
            <input type="number" class="form-control rounded-0 mb-2" id="nilai-surety-barang-jasa" placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)">  
            <label for="surety-bond-pelaksanaan-barang-jasa" class="form-label">Surety Bond</label>
            <input class="form-control rounded-0 mb-2" type="file" id="surety-bond-pelaksanaan-barang-jasa" multiple>
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
  
  {{-- Jaminan pengadaan --}}
  <div class="container-fluid bg-transparent mb-4">
    <div class="card bg-light rounded-0">
      <div class="row mx-4 my-4 align-items-start">
        <h4>4. Jaminan Pengadaan</h4>
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Bukti Jaminan Pengadaan</label> <br>
            <label for="nilai-bank-pengadaan-barang-jasa" class="form-label">Nilai Bank Garansi</label>
            <input type="number" class="form-control rounded-0 mb-2" id="nilai-bank-pengadaan-barang-jasa" placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)">
            <label for="bank-garansi-Pengadaan-barang-jasa" class="form-label">Bank Garansi</label>
            <input class="form-control rounded-0 mb-4" type="file" id="bukti-bank-garansi-barang-jasa" multiple>
            <label for="nilai-surety-pengadaan-barang-jasa" class="form-label">Nilai Surety Bond</label>
            <input type="number" class="form-control rounded-0 mb-2" id="nilai-surety-pengadaan-barang-jasa" placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)">  
            <label for="surety-bond-Pengadaan-barang-jasa" class="form-label">Surety Bond</label>
            <input class="form-control rounded-0 mb-2" type="file" id="surety-bond-pelaksanaan-barang-jasa" multiple>
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
        <h4>5. Sumber Dana DPA (Dokumen Pengadaan Anggaran) Belanja Barang Jasa</h4>
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Nilai Pengadaan Anggaran</label> <br>
            <label for="dana-apbn-barang-jasa" class="form-label">Nominal Dana APBN</label>
            <input type="number" class="form-control rounded-0 mb-2" id="dana-apbn-barang-jasa" placeholder="misal. Rp 10.000.000.000 (sepuluh miliar rupiah)">  
            <label for="dana-apbd-barang-jasa" class="form-label">Nominal Dana APBD</label>
            <input type="number" class="form-control rounded-0 mb-2" id="dana-apbd-barang-jasa" placeholder="misal. Rp 5.000.000.000 (sepuluh miliar rupiah)">  
            <label for="dana-hibah-barang-jasa" class="form-label">Nominal Dana Hibah</label>
            <input type="number" class="form-control rounded-0 mb-2" id="dana-hibah-barang-jasa" placeholder="misal. Rp 1.000.000.000 (sepuluh miliar rupiah)">  
            <label for="bentuk-pengadaan" class="form-label">Bentuk Pengadaan</label>
            <select class="form-select rounded-0 mb-2" aria-label="Default select example" id="bentuk-pengadaan">
              <option selected>Pilih Bentuk Pengadaan</option>
              <option value="1">Tender Terbuka</option>
              <option value="2">Tender Terbatas</option>
              <option value="3">Pengadaan Langsung</option>
              <option value="4">Penunjukan Langsung</option>
            </select>
            <label for="nilai-dpa-barang-jasa" class="form-label">Nilai DPA</label>
            <input type="number" class="form-control rounded-0 mb-2" id="nilai-dpa-barang-jasa" placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)">  
            <label class="form-label" for="bukti-dpa">Bukti Dokumen Pengadaan Anggaran</label>
            <input class="form-control rounded-0 mb-2" type="file" id="bukti-dpa" multiple>
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