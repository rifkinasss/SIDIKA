@extends('pegawai.layouts.app')

@section('content')
  <div class="container-fluid py-4 px-4 pb-2 bg-light">
    {{-- breadcrumb --}}
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Home</a></li>
        <li class="breadcrumb-item">Perjalanan Dinas</li>
        <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Pelaporan Perjalanan Dinas</u></span></li>
      </ol>
    </nav>
  </div>

  <div class="container-fluid bg-light">
    <div class="card bg-transparent rounded-0">
      <div class="row pt-4 ps-4">
        <h5>Pelaporan Perjalanan Dinas</h5>
      </div>
      <hr>
      <div class="row py-2 ps-4">
        <p>Lengkapi form dibawah ini beserta dokumen-dokumen pendukung untuk melaporkan perjalanan dinas yang anda lakukan.</p>
        <p>
          Formulir akan ditinjau dan balasan pengajuan akan dikirimkan minimal <span class="h5"><b>2 hari</b></span> setelah pengajuan dilakukan.<br>
          Jika terjadi kendala saat pengajuan dan belum menerima balasan klik <a href="#" class="text-first"><u>link bantuan</u></a>.
        </p>
      </div>
      <div class="row my-2 mx-4">
        <div class="card bg-warning border border-warning rounded-0 pt-4 px-4">
          <p><i class="bi bi-exclamation-square-fill"></i> Pastikan anda telah membaca seluruh ketentuan perjalanan dinas. <br>
            <ul>
              <li>Kesalahan data pada dokumen berakibat penolakan</li>
              <li>Pemalsuan dokumen berakibat masuk ke daftar blacklist</li>
            </ul>
          </p>
        </div>
      </div>
      <hr>
      {{-- data diri form --}}
      <div class="row mx-4 my-4 align-items-start">
        <h4>1. Data Diri</h4>
        <div class="col-md-6">
          <label for="namalengkap" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control rounded-0 mb-2" id="namalengkap">
          <label for="nip" class="form-label">NIP (Nomor Induk Pegawai)</label>
          <input type="number" class="form-control rounded-0" id="nip">
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> data diri otomatis diambil dari informasi akun. jika ada data diri yang kosong harap dilengkapi. serta lengkapi data diri yang kurang di profile.
            </p>
          </div>
        </div>
      </div>

      {{-- keperluan & tujuan perjadin --}}
      <div class="row mx-4 my-4 align-items-start">
        <h4>2. Keperluan Perjalanan Dinas</h4>
        <div class="col-md-6">
          <label for="nomor_surat" class="form-label">Nomor Surat</label>
          <input type="text" class="form-control rounded-0 mb-2" id="nomor_surat">
          <label for="jenis-perjadin" class="form-label">Jenis Perjalanan Dinas</label>
          <select class="form-select rounded-0 mb-2" aria-label="Default select example" id="jenis-perjadin" required>
            <option selected>Pilih Jenis Perjalanan Dinas</option>
            <option value="1">Perjalanan Dinas Jabatan</option>
            <option value="2">Perjalanan Dinas Pindah</option>
          </select>    
          <label for="keperluan" class="form-label">Keperluan Perjalanan Dinas</label>
          <textarea class="form-control rounded-0 mb-4" id="keperluan" placeholder="Contoh: Kunjungan ke kantor DPRD dalam rangka.." rows="4" name="keperluan_perjadin" required></textarea>
          <label for="tujuan" class="form-label">Tujuan Perjalanan Dinas</label><br>
          <label for="tujuan" class="form-label">Provinsi Tujuan</label>
          <select class="form-select rounded-0 mb-2" aria-label="Default select example">
            <option selected>Provinsi</option>
            <option value="1">Kalimantan Timur</option>
            <option value="2">DKI Jakarta</option>
            <option value="3">Bali</option>
          </select>    
          <label for="tujuan" class="form-label">Kota/Kabupaten Tujuan</label>
          <select class="form-select rounded-0 mb-2" aria-label="Default select example">
            <option selected>Kota/Kabupaten</option>
            <option value="1">Kota Balikpapan</option>
            <option value="2">Kota Samarinda</option>
            <option value="3">Kab. Kutai Kartanegara</option>
          </select>    
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Keperluan Perjalanan Dinas harus singkat, padat dan jelas. </li>
                <li>Tujuan Perjalanan Dinas memilih dari dropdown provinsi, kemudian memilih dropdown kota/kabupaten. </li>
              </ol>
            </p>
          </div>
        </div>
      </div>

      {{-- Perencanaan Tanggal Perjalanan Dinas --}}
      <div class="row mx-4 my-4 align-items-start">
        <h4>3. Perencanaan Tanggal Perjalanan Dinas</h4>
        <div class="col-md-6">
          <label for="tanggal-berangkat" class="form-label">Tanggal Berangkat</label>
          <input class="form-control rounded-0 mb-2" placeholder="dd/mm/yyyy" type="date" id="tanggal-berangkat" name="tgl_berangkat" required />
          <label for="tanggal-kembali" class="form-label">Tanggal kembali</label>
          <input class="form-control rounded-0 mb-2" placeholder="dd/mm/yyyy" type="date" id="tanggal-kembali" name="tgl_kembali" required />
          <label for="jumlah_hari" class="form-label">Jumlah Hari</label>
          <input class="form-control rounded-0 mb-2" type="number" id="jumlah_hari" name="jumlah_hari" required />
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Tanggal Berangkat <b>tidak</b> bisa sehari sebelum (h-1) form diisi. <i>misalnya</i>, saat form diisi adalah tanggal 16 januari, maka anda tidak bisa mengisi tanggal berangkat 15 januari.</li>
                <li>Jumlah hari dalam kegiatan perjalanan dinas minimal adalah 1 hari. misalnya, tanggal 16 januari - 17 januari.</li>
              </ol>
            </p>
          </div>
        </div>
      </div>

      {{-- Pelaporan Rincian Biaya Perjalanan Dinas --}}
      <div class="row mx-4 my-4 align-items-start">
        <h4>4. Pelaporan Rincian Biaya Perjalanan Dinas</h4>
        <h6 class="mt-4">A. Data Pelaporan Uang Harian</h6>
        <div class="col-md-6 mb-4">
          {{-- data pengajuan sebelumnya --}}
          <label for="uang-harian" class="form-label">Uang Harian</label> 
          <input class="form-control rounded-0 mb-2" type="number" id="uang-harian" required />{{-- data pengajuan sebelumnya --}}
          <label for="jumlah-uang-harian" class="form-label">Jumlah Uang harian</label>
          <input class="form-control rounded-0 mb-2" type="number" id="jumlah-uang-harian" required />{{-- data pengajuan sebelumnya --}}
          <hr>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Data otomatis terisi berdasarkan data pengajuan perjalanan dinas.
            </p>
          </div>
        </div>

        <h6 class="mt-4">B. Pelaporan Akomodasi Perjalanan Dinas </h6>
        <div class="col-md-6 mb-4">
          <label for="biaya_akomodasi" class="form-label">Biaya Akomodasi</label>
          <input class="form-control rounded-0 mb-2" type="number" id="biaya_akomodasi" required />{{-- data pengajuan sebelumnya --}}
          <label for="nama_penginapan" class="form-label">Nama & Jenis Penginapan</label>
          <input class="form-control rounded-0 mb-2" type="text" id="nama_penginapan" placeholder="misal. Hotel Jakarta, Kamar Reguler 2 Bed" required />
          <label for="bukti_akomodasi" class="form-label">Bukti Akomodasi (.pdf)</label>
          <input class="form-control rounded-0 mb-4" type="file" id="bukti-akomodasi" multiple>
          <hr>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Nama & Jenis Penginapan yaitu nama penginapan seperti nama hotelnya (misal. hotel jakarta) dan tipe kamarnya seperti tipe reguler 2 bed (jika ada).</li>
                <li>Bukti Akomodasi berupa struk elektronik format .pdf ataupun struk kertas yang discan menjadi .pdf. Bisa memasukkan lebih dari 1 file pdf.</li>
              </ol>
            </p>
          </div>
        </div>

        <h6 class="mt-4">C. Pelaporan Biaya Lain </h6>
        <div class="col-md-6">
          <label for="biaya_lain" class="form-label">Biaya lain /Kontribusi /Bantuan Transport (Jika ada)</label>
          <input class="form-control rounded-0 mb-2" type="number" id="biaya_lain" />{{-- data pengajuan sebelumnya (jika ada)--}}
          <label for="biaya_lain" class="form-label">Penggunaan Biaya lain /Kontribusi /Bantuan Transport (Jika ada)</label>
          <input class="form-control rounded-0 mb-2" type="text" id="biaya_lain" placeholder="misal. Biaya Penyewaan Transportasi angkutan barang"/>
          <label for="bukti_biaya_lain" class="form-label">Bukti Penggunaan Biaya lain (.pdf)</label>
          <input class="form-control rounded-0 mb-4" type="file" id="bukti-biaya_lain" multiple>
          <hr>
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Isi untuk apa saja Penggunaan biaya lain. misalnya, biaya penyewaan transportasi barang.
            </p>
          </div>
        </div>

        <h6 class="mt-4">D. Data Biaya Tiket Pulang-Pergi</h6>
        <div class="col-md-6">
          <label for="biaya_pp" class="form-label">Biaya Tiket Pulang-Pergi</label>
          <input class="form-control rounded-0 mb-2" type="number" id="biaya_pp" required /> {{-- data pengajuan sebelumnya --}}
          <hr>
        </div>
        <div class="col-md-6">
        </div>
        
        <h6 class="mt-4">E. Pelaporan Data Berangkat Perjalanan Dinas </h6>
        <div class="col-md-6">
          <label for="tanggal-berangkat" class="form-label">Tanggal Berangkat</label>
          <input class="form-control rounded-0 mb-2" placeholder="dd/mm/yyyy" type="date" id="tanggal-berangkat" name="tgl_berangkat" required /> {{-- data pengajuan sebelumnya --}}
          <label class="form-label">Jenis Transportasi (Berangkat)</label>
          <select class="form-control rounded-0 mb-2" name="jns_transportasi_berangkat">
            <option selected>Pilih Jenis Transportasi</option>
            <option value="Pesawat">Pesawat</option>
            <option value="Kereta Api">Kereta Api</option>
            <option value="Bis">Bis</option>
            <option value="Kapal Laut">Kapal</option>
          </select>
          <label for="nama-transportasi" class="form-label">Nama Transportasi (Berangkat)</label>
          <input class="form-control rounded-0 mb-2" type="text" id="nama-transportasi" placeholder="misal. Pesawat Lion Air economic class"/>
          <label for="nomor-tiket-berangkat" class="form-label">Nomor Tiket (Berangkat)</label>
          <input class="form-control rounded-0 mb-2" type="text" id="nomor-tiket-berangkat" placeholder="012309498459834"/>
          <label for="tempat-duduk-berangkat" class="form-label">Tempat Duduk (Berangkat)</label>
          <input class="form-control rounded-0 mb-2" type="text" id="tempat-duduk-berangkat" placeholder="A-15"/>
          <label class="form-label">Apakah Harga Tiket (Berangkat) sama saat pengajuan perjalanan dinas?</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Sama
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              Berbeda
            </label>
          </div>
          <label for="biaya_pergi" class="form-label">Biaya Tiket Pergi (Berangkat)</label>
          <input class="form-control rounded-0 mb-2" type="number" id="biaya_pergi" required />
          <label for="bukti_biaya_berangkat" class="form-label">Bukti Biaya Berangkat (.pdf)</label>
          <input class="form-control rounded-0 mb-4" type="file" id="bukti-biaya_berangkat" multiple>
          <hr>
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Jika terdapat perubahan antara biaya saat pengajuan dengan biaya tiket saat pelaporan(berangkat) cukup pilih perubahan harga (dalam bentuk pilihan bulat disamping). kemudian masukkan nominal biaya yang terbaru</li>
                <li>Bukti biaya yaitu berupa struk elektronik/ tiket elektronik/ tiket yang discan dalam format .pdf</li>
              </ol>
            </p>
          </div>
        </div>

        <div class="col-md-6 mt-4">
          <label for="tanggal-kembali" class="form-label">Tanggal Kembali</label>
          <input class="form-control rounded-0 mb-2" placeholder="dd/mm/yyyy" type="date" id="tanggal-kembali" name="tgl_Kembali" required /> {{-- data pengajuan sebelumnya --}}
          <label class="form-label">Jenis Transportasi (Kembali)</label>
          <select class="form-control rounded-0 mb-2" name="jns_transportasi_Kembali">
            <option selected>Pilih Jenis Transportasi</option>
            <option value="Pesawat">Pesawat</option>
            <option value="Kereta Api">Kereta Api</option>
            <option value="Bis">Bis</option>
            <option value="Kapal Laut">Kapal</option>
          </select>
          <label for="nama-transportasi" class="form-label">Nama Transportasi (Kembali)</label>
          <input class="form-control rounded-0 mb-2" type="text" id="nama-transportasi" placeholder="misal. Pesawat Lion Air economic class"/>
          <label for="nomor-tiket-kembali" class="form-label">Nomor Tiket (Kembali)</label>
          <input class="form-control rounded-0 mb-2" type="text" id="nomor-tiket-kembali" placeholder="012309498459834"/>
          <label for="tempat-duduk-kembali" class="form-label">Tempat Duduk (Kembali)</label>
          <input class="form-control rounded-0 mb-2" type="text" id="tempat-duduk-kembali" placeholder="A-15"/>
          <label class="form-label">Apakah Harga Tiket (Kembali) sama saat pengajuan perjalanan dinas?</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              Sama
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
              Berbeda
            </label>
          </div>
          <label for="biaya_pergi" class="form-label">Biaya Tiket Pergi (Kembali)</label>
          <input class="form-control rounded-0 mb-2" type="number" id="biaya_pergi" required />
          <label for="bukti_biaya_kembali" class="form-label">Bukti Biaya Kembali (.pdf)</label>
          <input class="form-control rounded-0 mb-4" type="file" id="bukti-biaya_kembali" multiple>
          <hr>
        </div>
        <div class="col-md-6 mt-4">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Info
              <ol>
                <li>Jika terdapat perubahan antara biaya saat pengajuan dengan biaya tiket saat pelaporan(kembali) cukup pilih perubahan harga (dalam bentuk pilihan bulat disamping). kemudian masukkan nominal biaya yang terbaru</li>
                <li>Bukti biaya yaitu berupa struk elektronik/ tiket elektronik/ tiket yang discan dalam format .pdf</li>
              </ol>
            </p>
          </div>
        </div>

        <div class="col-md-6">
          <label for="uang-representasi" class="form-label">Uang Representasi (jika ada)</label>
          <input class="form-control rounded-0 mb-2" type="number" id="uang-representasi" />{{-- data pengajuan sebelumnya --}}
          <label for="bukti_biaya_kembali" class="form-label">Bukti Uang Representasi (.pdf)</label>
          <input class="form-control rounded-0 mb-4" type="file" id="bukti-biaya_kembali" multiple>
          <hr>
        </div>
        <div class="col-md-6">
          <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
            <p><i class="bi bi-info-square-fill"></i> Bukti Uang Representasi bisa berupa :
              <ul>
                <li>Kwitansi Tangan</li>
                <li>Memo atau Surat Pernyataan</li>
                <li>Transaksi Bank atau Kartu Kredit</li>
                <li>Email atau Pesan Elektronik</li>
                <li>Fotokopi atau Scan</li>
                <li>Foto</li>
              </ul>
              Yang kemudian dijadikan .pdf
            </p>
          </div>
        </div>

        <div class="col-md-6 mt-4">
          <label for="jumlah-biaya" class="form-label">Jumlah Biaya</label>
          <input class="form-control rounded-0 mb-2" type="number" id="jumlah-biaya" />{{-- data pengajuan sebelumnya --}}
        </div>
        <div class="col-md-6">
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