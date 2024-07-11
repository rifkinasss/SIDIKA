@extends('pegawai.layouts.app')

@section('content')
    <style>
        body {
            background-color: #E6F4F1;
        }
    </style>
    <div class="container-fluid py-4 px-4 pb-2 bg-transparent">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item">Perjalanan Dinas</li>
                <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Pengajuan Perjalanan
                            Dinas</u></span></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid bg-transparent">
        <div class="card bg-light rounded-0">
            <div class="row pt-4 ps-4">
                <h5>Pengajuan Perjalanan Dinas</h5>
            </div>
            <hr>
            <div class="row py-2 ps-4">
                <p>Lengkapi form dibawah ini beserta dokumen-dokumen pendukung untuk mengajukan perjalanan dinas.</p>
                <p>
                    Formulir akan ditinjau dan balasan pengajuan akan dikirimkan minimal <span class="h6"><b>2
                            hari</b></span> setelah pengajuan dilakukan.<br>
                    Jika terjadi kendala saat pengajuan dan belum menerima balasan klik <a href="#"
                        class="text-first"><u>link bantuan</u></a>.
                </p>
            </div>
            <div class="row my-2 mx-4">
                <div class="card bg-warning border border-warning rounded-0 pt-4 px-4">
                    <p><i class="bi bi-exclamation-square-fill"></i> Pastikan anda telah membaca seluruh ketentuan
                        perjalanan dinas. <br>
                    <ul>
                        <li>Kesalahan data pada dokumen berakibat penolakan</li>
                        <li>Pemalsuan dokumen berakibat masuk ke daftar blacklist</li>
                    </ul>
                    </p>
                </div>
            </div>
            <hr>
            <form action="{{ route('pengajuan-perjalanan-dinas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mx-4 my-4 align-items-start">
                    <h4>1. Data Diri</h4>
                    <div class="col-md-6">
                        <label for="namalengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control rounded-0 mb-4" id="namalengkap"
                            value="{{ Auth::user()->nama }}">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control rounded-0" maxlength="18" id="nip"
                            value="{{ Auth::user()->nip }}">
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> data diri otomatis diambil dari informasi akun. jika
                                ada
                                data diri yang kosong harap dilengkapi. serta lengkapi data diri yang kurang di profile.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row mx-4 my-4 align-items-start">
                    <h4>2. Keperluan Perjalanan Dinas</h4>
                    <div class="col-md-6">
                        <label for="jenis-perjadin" class="form-label">Jenis Perjalanan Dinas</label>
                        <select class="form-select rounded-0 mb-2" aria-label="Default select example" id="jenis-perjadin"
                            name="jns_perjadin" required>
                            <option selected>Pilih Jenis Perjalanan Dinas</option>
                            <option value="Perjalanan Dinas Jabatan">Perjalanan Dinas Jabatan</option>
                            <option value="Perjalanan Dinas Pindah">Perjalanan Dinas Pindah</option>
                        </select>
                        <label for="keperluan" class="form-label">Keperluan Perjalanan Dinas</label>
                        <textarea class="form-control rounded-0 mb-4" id="keperluan"
                            placeholder="Contoh: Kunjungan ke kantor DPRD dalam rangka.." rows="4" name="keperluan_perjadin" required></textarea>
                        <label for="tujuan" class="form-label">Tujuan Perjalanan Dinas</label><br>
                        <label for="tujuan" class="form-label">Provinsi Tujuan</label>
                        <select class="form-select rounded-0 mb-2" aria-label="Default select example" id="provinsi"
                            name="provinsi">
                            <option selected>Pilih Provinsi</option>
                            @foreach ($provinces as $provinsi)
                                <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                            @endforeach
                        </select>
                        <label for="tujuan" class="form-label">Kota/Kabupaten Tujuan</label>
                        <select class="form-select rounded-0 mb-2" aria-label="Default select example" id="kota"
                            name="kota_kab">
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Keperluan Perjalanan Dinas harus singkat, padat dan jelas. </li>
                                <li>Tujuan Perjalanan Dinas memilih dari dropdown provinsi, kemudian memilih dropdown
                                    kota/kabupaten. </li>
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
                        <input class="form-control rounded-0 mb-2" placeholder="dd/mm/yyyy" type="date"
                            id="tanggal-berangkat" name="tgl_berangkat" required />
                        <label for="tanggal-kembali" class="form-label">Tanggal kembali</label>
                        <input class="form-control rounded-0 mb-2" placeholder="dd/mm/yyyy" type="date"
                            id="tanggal-kembali" name="tgl_kembali" required />
                        <label for="jumlah-hari" class="form-label">Jumlah Hari</label>
                        <input class="form-control rounded-0 mb-2" type="number" placeholder="" id="jumlah-hari"
                            name="jumlah_hari" disabled />
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Tanggal Berangkat <b>tidak</b> bisa sehari sebelum (h-1) form diisi. <i>misalnya</i>,
                                    saat
                                    form diisi adalah tanggal 16 januari, maka anda tidak bisa mengisi tanggal berangkat 15
                                    januari.</li>
                                <li>Jumlah hari dalam kegiatan perjalanan dinas minimal adalah 1 hari. misalnya, tanggal 16
                                    januari - 17 januari.</li>
                            </ol>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Rincian Biaya Perjalanan Dinas --}}
                <div class="row mx-4 my-4 align-items-start">
                    <h4>4. Rincian Biaya Perjalanan Dinas</h4>
                    <div class="col-md-6">
                        <label for="uang-harian" class="form-label">Uang Harian</label>
                        <input class="form-control rounded-0 mb-2" type="text" id="uang-harian" name="uang_harian"
                            required oninput="formatRupiah(this)" />
                        <label for="jumlah-uang-harian" class="form-label">Jumlah Uang Harian</label>
                        <input class="form-control rounded-0 mb-2" type="text" id="jumlah-uang-harian"
                            oninput="formatRupiah(this)" name="jmlh_uang_harian" disabled />
                        <label for="biaya-akomodasi" class="form-label">Biaya Akomodasi</label>
                        <input class="form-control rounded-0 mb-2" type="text" id="biaya-akomodasi" required
                            oninput="formatRupiah(this)" name="biaya_akomodasi" />
                        <label for="biaya-lain" class="form-label">Biaya lain /Kontribusi /Bantuan Transport (Jika
                            ada)</label>
                        <input class="form-control rounded-0 mb-2" type="text" id="biaya-lain" name="biaya_lain"
                            oninput="formatRupiah(this)" />
                        <label for="biaya-tiket-pp" class="form-label">Biaya Tiket Pulang-Pergi</label>
                        <input class="form-control rounded-0 mb-2" type="text" id="biaya-tiket-pp"
                            name="biaya_tiket_pp" required oninput="formatRupiah(this)" />
                        <label for="uang-representasi" class="form-label">Uang Representasi (jika ada)</label>
                        <input class="form-control rounded-0 mb-2" type="text" id="uang-representasi"
                            name="uang_representasi" oninput="formatRupiah(this)" />
                        <label for="jumlah-biaya" class="form-label">Jumlah Biaya</label>
                        <input class="form-control rounded-0 mb-2" type="text" oninput="formatRupiah(this)"
                            id="jumlah-biaya" name="jumlah_biaya" disabled />
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Nominal uang harian otomatis diambil berdasarkan posisi dan jabatan.</li>
                                <li>Jumlah uang harian dikalikan dengan berapa hari perjalanan dinas dilaksanakan.</li>
                                <li>Biaya Akomodasi yaitu biaya penyewaan tempat singgah (hotel, motel, penginapan).
                                    <b>Untuk
                                        Perjalanan Dinas Pindah tidak ada Biaya Akomodasi (ketikkan Rp 0)</b>. Sebagai
                                    gantinya
                                    bisa mengisi Biaya lain /Kontribusi /Bantuan Transport jika membutuhkan biaya untuk
                                    pengangkutan barang ke tempat tujuan.
                                </li>
                                <li>Biaya lain /Kontribusi /Bantuan Transport <b></b>hanya untuk Perjalanan Dinas Pindah
                                </li>
                                <li>Biaya Tiket Pulang-Pergi merupakan biaya perkiraan. <b>Harap menambahkan catatan Jika
                                        terdapat perubahan biaya sewaktu pelaporan nanti.</b></li>
                                <li>Uang Representasi <b>(jika ada)</b> Untuk pejabat tertentu yang memiliki tanggung jawab
                                    kehumasan atau penyambutan tamu.</li>
                            </ol>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Bukti Surat Tugas Perjalanan Dinas --}}
                <div class="row mx-4 my-4 align-items-start">
                    <h4>5. Bukti Surat Tugas Perjalanan Dinas</h4>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="bukti-surat-tugas" class="form-label">Bukti Surat Tugas</label>
                            <input class="form-control" type="file" id="bukti-surat-tugas" name="bukti_surat_tugas"
                                accept="application/pdf" multiple>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Bukti Surat Tugas <b>Wajib surat resmi instansi dan ditandatangi oleh atasan.</b> File
                                    dikirimkan dalam bentuk .pdf (bisa lebih dari satu file).</li>
                            </ol>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- tombol kirim dan cancel --}}
                <div class="row my-4 mx-4">
                    <div class="col-sm-6">
                        <a type="button" href="{{ url('dashboard') }}" class="btn btn-danger rounded-0">kembali</a>
                        <button type="reset" class="btn bg-third border-primary rounded-0">Reset</button>
                    </div>
                    <div class="col-sm-6 text-end">
                        <button type="submit" class="btn btn-primary rounded-0">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
