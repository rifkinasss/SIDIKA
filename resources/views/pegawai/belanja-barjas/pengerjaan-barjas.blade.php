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
                <li class="breadcrumb-item"><a href="{{ route('pegawai') }}" class="text-decoration-none text-dark">Home</a>
                </li>
                <li class="breadcrumb-item">Belanja Barang Jasa</li>
                <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Pengerjaan Belanja Barang
                            Jasa</u></span></li>
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
                <p>Lengkapi form dibawah ini beserta deskripsi yang jelas yang dapat menjadi pendukung untuk membuat
                    Surat-surat Pengerjaan Belanja Barang Jasa.</p>
                <p>
                    Formulir akan ditinjau dan balasan Pengerjaan akan dikirimkan minimal <span class="h5"><b>2
                            hari</b></span> setelah Pengerjaan dilakukan.<br>
                    Jika terjadi kendala saat Pengerjaan dan belum menerima balasan klik <a href="#"
                        class="text-first"><u>link bantuan</u></a>. <br>
                    Pada Pengerjaan Belanja Barang Jasa ini bersifat progresif dimana halaman dapat dibuka kembali sampai
                    semua form terisi(termasuk adendum kontrak).
                </p>
            </div>
            <div class="row my-2 mx-4">
                <div class="card bg-warning border border-warning rounded-0 pt-4 px-4">
                    <p><i class="bi bi-exclamation-square-fill"></i> Pastikan anda telah membaca seluruh ketentuan Belanja
                        Barang Jasa. <br>
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
                    <label for="nomor-proposal-barjas" class="form-label">Nomor Surat</label>
                    <input type="text" class="form-control rounded-0 mb-2" id="nomor-proposal-barjas"
                        value="{{ $barjas->nomor_surat }}" disabled>

                    <label for="latar-belakang-barjas" class="form-label">Latar Belakang</label>
                    <textarea class="form-control rounded-0 mb-2" id="latar-belakang-barjas" rows="4" disabled>{{ $barjas->latar_belakang }}</textarea>

                    <label for="tujuan-perencanaan-barjas" class="form-label">Tujuan Belanja Barang Jasa</label>
                    <textarea class="form-control rounded-0 mb-2" id="tujuan-perencanaan-barjas" rows="4" disabled>{{ $barjas->tujuan }}</textarea>

                    <label for="deskripsi-barjas" class="form-label">Deskripsi Kebutuhan</label>
                    <textarea class="form-control rounded-0 mb-2" id="deskripsi-barjas" rows="4" disabled>{{ $barjas->deskripsi_kebutuhan }}</textarea>

                    <label for="estimasi-Pengerjaan-barjas" class="form-label">Estimasi Biaya (Rp.)</label>
                    <input type="text" class="form-control rounded-0 mb-2" id="estimasi-Pengerjaan-barjas"
                        value="{{ $barjas->estimasi_biaya }}" disabled>

                    <label for="jenis-belanja-barjas" class="form-label">Jenis Belanja Barang Jasa</label>
                    <input type="text" class="form-control rounded-0 mb-2" id="jenis-belanja-barjas"
                        value="{{ $barjas->jns_belanja }}" disabled>

                    @if ($barjas->jns_belanja == 'Belanja Barang Jasa Lainnya')
                        <label for="belanja-barjas-lainnya" class="form-label">Belanja Barang Jasa Lainnya </label>
                        <input type="text" class="form-control rounded-0 mb-2" id="belanja-barjas-lainnya"
                            value="{{ $barjas->lainnya }}" disabled>
                    @endif

                    <label for="tanggal-mulai-barjas" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-barjas"
                        value="{{ $barjas->tgl_mulai }}" disabled>

                    <label for="tanggal-selesai-barjas" class="form-label">Tanggal Selesai (Tenggat)</label>
                    <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-barjas"
                        value="{{ $barjas->tgl_selesai }}" disabled>

                    <label for="durasi-perencanaan-barjas" class="form-label">Durasi</label>
                    <input type="text" class="form-control rounded-0 mb-2" id="durasi-perencanaan-barjas"
                        value="{{ $barjas->durasi }}" disabled>

                    <label for="deskripsi-spesifikasi-barjas" class="form-label">Deskripsi dan Spesifikasi (detail)</label>
                    <textarea class="form-control rounded-0 mb-2" id="deskripsi-spesifikasi-barjas" rows="10" disabled>{{ $barjas->deskripsi_spesifikasi }}</textarea>

                    <label for="deskripsi-spesifikasi-barjas" class="form-label">Dokumen RAB</label>
                    <ul>
                        <li><a href="{{ Storage::url($barjas->dokumen_rab) }}" target="_blank">Lihat Dokumen RAB</a></li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                        <p><i class="bi bi-info-square-fill"></i> Info
                        <ol>
                            <li>Nomor Surat akan terisi otomatis jika form disetujui oleh admin.</li>
                            <li>Setelah Form ini disetujui akan keluar sebagai <b>Surat digital Permohonan Perencanaan
                                    Belanja Modal dan Proposal digital Proposal Belanja Modal</b> yang dapat diunduh.</li>
                            <li>Latar Belakang dan tujuan harap menggunakan kalimat <b>baku dan formal</b>.</li>
                            <li>Deskripsi Kebutuhan diisi singkat, padat, dan jelas.</li>
                            <li>Deskripsi Spesifikasi berisi kebutuhan mendetail.</li>
                            <li>Perbedaan Estimasi Biaya saat Pengerjaan dan pelaporan harap diberikan catatan tambahan
                                nanti saat pelaporan.</li>
                            <li>Bagian ini hanya sebagai tambahan referensi Belanja Modal yang anda rencanakan.</li>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Perjanjian SPK --}}
    <form action="{{ route('pengerjaan-belanja-barjas.update', $barjas->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid bg-transparent mb-4">
            <div class="card bg-light rounded-0">
                <div class="row mx-4 my-4 align-items-start">
                    <h4>1. Perjanjian/Kontrak/SPK</h4>
                    <div class="col-md-6">
                        <label for="nomor-spk-barjas" class="form-label">Nomor Surat Perijinan Kerja</label>
                        <input type="text" class="form-control rounded-0 mb-2" id="nomor-spk-barjas"
                            name="nomor_surat_spk"
                            @if ($barjas->nomor_surat_spk != '') value="{{ $barjas->nomor_surat_spk }}" disabled @endif
                            required>

                        <label for="penyedia-spk-barjas" class="form-label">Nama Penyedia Barang / Kontraktor</label>
                        <input type="text" class="form-control rounded-0 mb-2" id="penyedia-spk-barjas"
                            placeholder="misal. PT.Deka Sari Perkasa" name="nama_vendor"
                            @if ($barjas->nama_vendor != '') value="{{ $barjas->nama_vendor }}" disabled @endif required>

                        <label for="lokasi" class="form-label">Lokasi Penyedia Barang/ Kontraktor</label><br>
                        <label for="lokasi-provinsi-barjas" class="form-label">Provinsi</label>
                        @if ($barjas->provinsi != '')
                            <input class="form-control rounded-0 mb-2" id="lokasi-provinsi-barjas" name="provinsi"
                                value="{{ $barjas->provinsi }}" disabled>
                        @else
                            <select class="form-select rounded-0 mb-2" aria-label="Default select example"
                                id="lokasi-provinsi-barjas" name="provinsi">
                                <option selected>Provinsi</option>
                                @foreach ($provinces as $provinsi)
                                    <option value="{{ $provinsi->name }}">{{ $provinsi->name }}</option>
                                @endforeach
                            </select>
                        @endif

                        <label for="lokasi-kota-barjas" class="form-label">Kota/Kabupaten</label>
                        @if ($barjas->kota != '')
                            <input class="form-control rounded-0 mb-2" id="lokasi-kota-barjas" name="kota"
                                value="{{ $barjas->kota }}" disabled>
                        @else
                            <select class="form-select rounded-0 mb-2" aria-label="Default select example"
                                id="lokasi-kota-barjas" name="kota">
                                <option selected>Kota/Kabupaten</option>
                            </select>
                        @endif

                        <label for="tanggal-mulai-spk-barjas" class="form-label">Tanggal Mulai Kontrak</label>
                        <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-spk-barjas"
                            placeholder="DD/MM/YYYY" name="tgl_mulai_spk"
                            @if ($barjas->tgl_mulai_spk != '') value="{{ $barjas->tgl_mulai_spk }}" disabled @endif
                            required>

                        <label for="tanggal-selesai-spk-barjas" class="form-label">Tanggal Berakhir Kontrak
                            (tenggat)</label>
                        <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-spk-barjas"
                            placeholder="DD/MM/YYYY" name="tgl_selesai_spk"
                            @if ($barjas->tgl_selesai_spk != '') value="{{ $barjas->tgl_selesai_spk }}" disabled @endif
                            required>

                        <label for="durasi-spk-barjas" class="form-label">Durasi</label>
                        <input type="text" class="form-control rounded-0 mb-2" id="durasi-spk-barjas"
                            name="durasi_spk"
                            @if ($barjas->durasi_spk != '') value="{{ $barjas->durasi_spk }}" disabled @endif disabled>
                        <input type="hidden" id="durasi-spk-hidden" name="durasi_spk">

                        <label for="nilai-kedua-barjas" class="form-label">Nilai Kontrak</label>
                        <input type="text" class="form-control rounded-0 mb-4" id="nilai-kedua-barjas"
                            placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)" name="nilai_kontrak_spk"
                            @if ($barjas->nilai_kontrak_spk != '') value="{{ $barjas->nilai_kontrak_spk }}" disabled @endif
                            onkeyup="formatRupiah(this)" required>

                        <label for="uraian-pengadaan-barjas" class="form-label">Uraian Pengadaan (Sesuai Kontrak)</label>
                        <textarea class="form-control rounded-0 mb-4" id="uraian-pengadaan-barjas"
                            placeholder="Contoh: Pembayaran Belanja barjas Pembangunan Gedung Kantor 5 Lantai lengkap dengan fasilitas umum, listrik, dan air."
                            rows="4" name="uraian_pengadaan" @if ($barjas->uraian_pengadaan != '') disabled @endif required>
@if ($barjas->uraian_pengadaan != '')
{{ $barjas->uraian_pengadaan }}
@endif
</textarea>

                        <label for="bukti-spk" class="form-label" accept=".pdf">Bukti Surat Perijinan Kerja
                            (.pdf)</label>
                        @if ($barjas->bukti_spk)
                            @php
                                $filePaths = json_decode($barjas->bukti_spk);
                            @endphp

                            <ul>
                                @foreach ($filePaths as $filePath)
                                    <li><a href="{{ Storage::url($filePath) }}" target="_blank">Lihat Bukti SPK</a></li>
                                @endforeach
                            </ul>
                        @else
                            <input class="form-control rounded-0 mb-2" type="file" id="bukti-spk" name="bukti_spk[]"
                                multiple required>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Pastikan Nomor Surat sama dengan nomor Surat Perijinan Kerja.</li>
                                <li>Nilai kontrak masukkan angka saja tanpa (,)</li>
                                <li>Jika ada Surat Perijinan Kerja lebih dari satu(misal. sub-SPK milik Kontraktor) harap
                                    dimasukkan</li>
                                <li>Ukuran maksimal setiap file Dokumen Surat Perijinan Kerja adalah 2 MB.</li>
                            </ol>
                            </p>
                        </div>
                    </div>

                    {{-- tombol kirim dan cancel --}}
                    @if ($barjas->nomor_surat_spk == '')
                        <div class="col-sm-6 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0" name="submit_spk">Kirim</button>
                        </div>
                        <div class="col-sm-6 mt-4 text-end">
                            <button type="button" class="btn bg-third border-primary rounded-0"
                                onclick="window.location.reload();">Reset</button>
                            <button type="button" class="btn btn-danger rounded-0"
                                onclick="window.location.href='{{ url('dashboard') }}';">Kembali</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    {{-- Adendum Kontrak Belanja Barang Jasa --}}
    <form action="{{ route('pengerjaan-belanja-barjas.update', $barjas->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid bg-transparent mb-4">
            <div class="card bg-light rounded-0">
                <div class="row mx-4 my-4 align-items-start">
                    <h4>2. Adendum Kontrak Belanja Barang Jasa</h4>
                    <div class="col-md-6">
                        <label for="nomor-adendum-barjas" class="form-label">Nomor Surat Adendum Kontrak</label>
                        <input class="form-control rounded-0 mb-2" type="text" id="nomor-adendum-barjas"
                            name="nomor_surat_adendum" required
                            @if ($barjas->nomor_surat_adendum != '') value='{{ $barjas->nomor_surat_adendum }}' disabled @endif>

                        <label for="uraian-adendum-barjas" class="form-label">Uraian Adendum (Sesuai Kontrak)</label>
                        <textarea class="form-control rounded-0 mb-4" id="uraian-adendum-barjas"
                            placeholder="Contoh: Pembayaran Belanja barjas Pembangunan Gedung Kantor 5 Lantai lengkap dengan fasilitas umum, listrik, dan air."
                            rows="4" name="uraian_adendum" @if ($barjas->uraian_adendum != '' || $barjas->nomor_surat_adendum == '-') disabled @endif>@if ($barjas->uraian_adendum != '' || $barjas->nomor_surat_adendum == '-'){{ $barjas->uraian_adendum }}@endif</textarea>

                        <label for="tanggal-mulai-adendum-barjas" class="form-label">Tanggal Mulai Adendum Kontrak</label>
                        <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-adendum-barjas"
                            placeholder="DD/MM/YYYY" name="tgl_mulai_adendum"
                            @if ($barjas->tgl_mulai_adendum != '' || $barjas->nomor_surat_adendum == '-') value='{{ $barjas->tgl_mulai_adendum }}' disabled @endif>

                        <label for="tanggal-selesai-adendum-barjas" class="form-label">Tanggal Berakhir Adendum Kontrak
                            (tenggat)</label>
                        <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-adendum-barjas"
                            placeholder="DD/MM/YYYY" name="tgl_selesai_adendum" 
                            @if ($barjas->tgl_selesai_adendum != '' || $barjas->nomor_surat_adendum == '-') value='{{ $barjas->tgl_selesai_adendum }}' disabled @endif>

                        <label for="nilai-adendum-barjas" class="form-label">Nilai Kontrak Adendum</label>
                        <input type="text" class="form-control rounded-0 mb-4" id="nilai-adendum-barjas"
                            placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)" name="nilai_kontrak_adendum"
                            onkeyup="formatRupiah(this)"
                            @if ($barjas->nilai_kontrak_adendum != '' || $barjas->nomor_surat_adendum == '-') value='{{ $barjas->nilai_kontrak_adendum }}' disabled @endif>

                        @if ($barjas->nomor_surat_adendum != '-')
                            <label for="bukti-adendum-barjas" class="form-label" accept=".pdf">Bukti Surat Adendum Kerja (.pdf)</label>
                            @if ($barjas->bukti_surat_adendum != '[]')
                                @php
                                    $filePaths = json_decode($barjas->bukti_surat_adendum);
                                @endphp

                                <ul>
                                    @foreach ($filePaths as $filePath)
                                        <li><a href="{{ Storage::url($filePath) }}" target="_blank">Lihat Bukti Surat Adendum</a></li>
                                    @endforeach
                                </ul>
                            @else
                                <input class="form-control rounded-0 mb-2" type="file" id="bukti-adendum-barjas"
                                    name="bukti_surat_adendum[]" multiple>
                            @endif
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Adendum Kontrak tidak wajib diisi.</li>
                                <li>File Dokumen Adendum Kontrak bisa diisi lebih dari 1.</li>
                                <li>Ukuran maksimal setiap file Dokumen Adendum adalah 2 MB.</li>
                                <li>Jika tidak ada data yang perlu diisi, masukkan karakter "-" pada nomor surat adendum.</li>
                            </ol>
                            </p>
                        </div>
                    </div>

                    {{-- tombol kirim dan cancel --}}
                    @if ($barjas->nomor_surat_adendum == '')
                        <div class="col-sm-6 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0" name="submit_adendum">Kirim</button>
                        </div>
                        <div class="col-sm-6 mt-4 text-end">
                            <button type="button" class="btn bg-third border-primary rounded-0"
                                onclick="window.location.reload();">Reset</button>
                            <button type="button" class="btn btn-danger rounded-0"
                                onclick="window.location.href='{{ url('dashboard') }}';">Kembali</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    {{-- Jaminan pelaksanaan --}}
    <form action="{{ route('pengerjaan-belanja-barjas.update', $barjas->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid bg-transparent mb-4">
            <div class="card bg-light rounded-0">
                <div class="row mx-4 my-4 align-items-start">
                    <h4>3. Jaminan Pelaksanaan</h4>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Bukti Jaminan Pelaksanaan</label> <br>

                            <label for="nilai-bank-pelaksanaan-barjas" class="form-label">Nilai Bank Garansi</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="nilai-bank-pelaksanaan-barjas"
                                placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)"
                                name="nilai_bank_garansi_pelaksanaan" onkeyup="formatRupiah(this)"
                                @if ($barjas->nilai_bank_garansi_pelaksanaan != '') value='{{ $barjas->nilai_bank_garansi_pelaksanaan }}' disabled 
                                @elseif ($barjas->nilai_surety_bond_pelaksanaan != '') value='-' disabled @endif>

                            <label for="bank-garansi-pelaksanaan-barjas" class="form-label">Bank Garansi (.pdf)</label>
                            @if ($barjas->bukti_bank_garansi_pelaksanaan != '')
                                <ul>
                                    <li><a href="{{ Storage::url($barjas->bukti_bank_garansi_pelaksanaan) }}"
                                            target="_blank">Lihat Bukti Bank Garansi</a></li>
                                </ul>
                            @elseif ($barjas->bukti_surety_bond_pelaksanaan != '')
                                <input type="text" class="form-control rounded-0 mb-2" id="bukti-bank-garansi-barjas"
                                    value="-" disabled>
                            @else
                                <input class="form-control rounded-0 mb-4" type="file" id="bukti-bank-garansi-barjas"
                                    name="bukti_bank_garansi_pelaksanaan">
                            @endif

                            <label for="nilai-surety-barjas" class="form-label">Nilai Surety Bond</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="nilai-surety-barjas"
                                placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)"
                                name="nilai_surety_bond_pelaksanaan" onkeyup="formatRupiah(this)"
                                @if ($barjas->nilai_surety_bond_pelaksanaan != '') value='{{ $barjas->nilai_surety_bond_pelaksanaan }}' disabled 
                                @elseif ($barjas->nilai_bank_garansi_pelaksanaan != '') value='-' disabled @endif>

                            <label for="surety-bond-pelaksanaan-barjas" class="form-label">Surety Bond (.pdf)</label>
                            @if ($barjas->bukti_surety_bond_pelaksanaan != '')
                                <ul>
                                    <li><a href="{{ Storage::url($barjas->bukti_surety_bond_pelaksanaan) }}"
                                            target="_blank">Lihat Bukti Surety Bond</a></li>
                                </ul>
                            @elseif ($barjas->bukti_bank_garansi_pelaksanaan != '')
                                <input type="text" class="form-control rounded-0 mb-2" id="bukti-surety-bond-barjas"
                                    value="-" disabled>
                            @else
                                <input class="form-control rounded-0 mb-2" type="file"
                                    id="surety-bond-pelaksanaan-barjas" name="bukti_surety_bond_pelaksanaan">
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu(Bank Garansi / Surety Bond)
                                    atau dua-duanya(Bank Garansi & Surety Bond).</li>
                                <li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah
                                    uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
                                <li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan
                                    penjamin lainnya.</li>
                                <li>Ukuran maksimal setiap file adalah 2 MB.</li>
                            </ol>
                            </p>
                        </div>
                    </div>

                    {{-- tombol kirim dan cancel --}}
                    @if ($barjas->nilai_bank_garansi_pelaksanaan == '' && $barjas->nilai_surety_bond_pelaksanaan == '')
                        <div class="col-sm-6 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0"
                                name="submit_jaminan_pelaksanaan">Kirim</button>
                        </div>
                        <div class="col-sm-6 mt-4 text-end">
                            <button type="button" class="btn bg-third border-primary rounded-0"
                                onclick="window.location.reload();">Reset</button>
                            <button type="button" class="btn btn-danger rounded-0"
                                onclick="window.location.href='{{ url('dashboard') }}';">Kembali</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    {{-- Jaminan pengadaan --}}
    <form action="{{ route('pengerjaan-belanja-barjas.update', $barjas->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid bg-transparent mb-4">
            <div class="card bg-light rounded-0">
                <div class="row mx-4 my-4 align-items-start">
                    <h4>4. Jaminan Pengadaan</h4>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Bukti Jaminan Pengadaan</label> <br>
                            <label for="nilai-bank-pengadaan-barjas" class="form-label">Nilai Bank Garansi</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="nilai-bank-pengadaan-barjas"
                                placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)"
                                name="nilai_bank_garansi_pengadaan" onkeyup="formatRupiah(this)"
                                @if ($barjas->nilai_bank_garansi_pengadaan != '') value='{{ $barjas->nilai_bank_garansi_pengadaan }}' disabled
                                @elseif ($barjas->nilai_surety_bond_pengadaan != '') value='-' disabled @endif>

                            <label for="bank-garansi-Pengadaan-barjas" class="form-label">Bank Garansi</label>
                            @if ($barjas->bukti_bank_garansi_pengadaan != '')
                                <ul>
                                    <li><a href="{{ Storage::url($barjas->bukti_bank_garansi_pengadaan) }}"
                                            target="_blank">Lihat Bukti Bank Garansi</a></li>
                                </ul>
                            @elseif ($barjas->bukti_surety_bond_pengadaan != '')
                                <input type="text" class="form-control rounded-0 mb-2" id="bukti-bank-pengadaan-barjas"
                                    value="-" disabled>
                            @else
                                <input class="form-control rounded-0 mb-4" type="file" id="bukti-bank-pengadaan-barjas"
                                    name="bukti_bank_garansi_pengadaan">
                            @endif

                            <label for="nilai-surety-pengadaan-barjas" class="form-label">Nilai Surety Bond</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="nilai-surety-pengadaan-barjas"
                                placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)"
                                name="nilai_surety_bond_pengadaan" onkeyup="formatRupiah(this)"
                                @if ($barjas->nilai_surety_bond_pengadaan != '') value='{{ $barjas->nilai_surety_bond_pengadaan }}' disabled
                                @elseif ($barjas->nilai_bank_garansi_pengadaan != '') value='-' disabled @endif>

                            <label for="surety-bond-Pengadaan-barjas" class="form-label">Surety Bond</label>
                            @if ($barjas->bukti_surety_bond_pengadaan != '')
                                <ul>
                                    <li><a href="{{ Storage::url($barjas->bukti_surety_bond_pengadaan) }}"
                                            target="_blank">Lihat Bukti Surety Bond</a></li>
                                </ul>
                            @elseif ($barjas->bukti_bank_garansi_pengadaan != '')
                                <input type="text" class="form-control rounded-0 mb-2" id="bukti-surety_bond-barjas"
                                    value="-" disabled>
                            @else
                                <input class="form-control rounded-0 mb-2" type="file"
                                    id="surety-bond-pelaksanaan-barjas" name="bukti_surety_bond_pengadaan">
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu(Bank Garansi / Surety Bond)
                                    atau keduanya (Bank Garansi & Surety Bond).</li>
                                <li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah
                                    uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
                                <li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan
                                    penjamin lainnya.</li>
                                <li>Ukuran maksimal setiap file adalah 2 MB.</li>
                            </ol>
                            </p>
                        </div>
                    </div>

                    {{-- tombol kirim dan cancel --}}
                    @if ($barjas->nilai_bank_garansi_pengadaan == '' && $barjas->nilai_surety_bond_pengadaan == '')
                        <div class="col-sm-6 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0"
                                name="submit_jaminan_pengadaan">Kirim</button>
                        </div>
                        <div class="col-sm-6 mt-4 text-end">
                            <button type="button" class="btn bg-third border-primary rounded-0"
                                onclick="window.location.reload();">Reset</button>
                            <button type="button" class="btn btn-danger rounded-0"
                                onclick="window.location.href='{{ url('dashboard') }}';">Kembali</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    {{-- Sumber Dana DPA --}}
    <form action="{{ route('pengerjaan-belanja-barjas.update', $barjas->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid bg-transparent mb-4">
            <div class="card bg-light rounded-0">
                <div class="row mx-4 my-4 align-items-start">
                    <h4>5. Sumber Dana DPA (Dokumen Pengadaan Anggaran) Belanja Barang Jasa</h4>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nilai Pengadaan Anggaran</label> <br>
                            <label for="dana-apbn-barjas" class="form-label">Nominal Dana APBN</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="dana-apbn-barjas"
                                placeholder="misal. Rp 10.000.000.000 (sepuluh miliar rupiah)" name="dana_apbn"
                                oninput="formatRupiah(this); calculateTotal()"
                                @if ($barjas->dana_apbn != '') value='{{ $barjas->dana_apbn }}' disabled
                                @elseif ($barjas->dana_apbd != '' || $barjas->dana_hibah != '') value='-' disabled @endif>

                            <label for="dana-apbd-barjas" class="form-label">Nominal Dana APBD</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="dana-apbd-barjas"
                                placeholder="misal. Rp 5.000.000.000 (sepuluh miliar rupiah)" name="dana_apbd"
                                oninput="formatRupiah(this); calculateTotal()"
                                @if ($barjas->dana_apbd != '') value='{{ $barjas->dana_apbd }}' disabled 
                                @elseif ($barjas->dana_apbn != '' || $barjas->dana_hibah != '') value='-' disabled @endif>

                            <label for="dana-hibah-barjas" class="form-label">Nominal Dana Hibah</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="dana-hibah-barjas"
                                placeholder="misal. Rp 1.000.000.000 (sepuluh miliar rupiah)" name="dana_hibah"
                                oninput="formatRupiah(this); calculateTotal()"
                                @if ($barjas->dana_hibah != '') value='{{ $barjas->dana_hibah }}' disabled
                                @elseif ($barjas->dana_apbn != '' || $barjas->dana_apbd != '') value='-' disabled @endif>

                            <label for="bentuk-pengadaan" class="form-label">Bentuk Pengadaan</label>
                            @if ($barjas->bentuk_pengadaan != '')
                                <input class="form-control rounded-0 mb-2" id="bentuk-pengadaan" name="bentuk_pengadaan"
                                    value='{{ $barjas->bentuk_pengadaan }}' disabled>
                            @else
                                <select class="form-select rounded-0 mb-2" aria-label="Default select example"
                                    id="bentuk-pengadaan" name="bentuk_pengadaan" required>
                                    <option selected>Pilih Bentuk Pengadaan</option>
                                    <option value="Tender Terbuka">Tender Terbuka</option>
                                    <option value="Tender Terbatas">Tender Terbatas</option>
                                    <option value="Pengadaan Langsung">Pengadaan Langsung</option>
                                    <option value="Penunjukan Langsung">Penunjukan Langsung</option>
                                </select>
                            @endif

                            <label for="nilai-dpa-barjas" class="form-label">Nilai DPA</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="nilai-dpa-barjas"
                                placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)" name="nilai_dpa" readonly
                                required
                                @if ($barjas->nilai_dpa != '') value='{{ $barjas->nilai_dpa }}' disabled @endif>

                            <label class="form-label" for="bukti-dpa">Bukti Dokumen Pengadaan Anggaran</label>
                            @if ($barjas->bukti_dpa)
                                @php
                                    $filePaths = json_decode($barjas->bukti_dpa);
                                @endphp

                                <ul>
                                    @foreach ($filePaths as $filePath)
                                        <li><a href="{{ Storage::url($filePath) }}" target="_blank">Lihat Bukti DPA</a></li>
                                    @endforeach
                                </ul>
                            @else
                                <input class="form-control rounded-0 mb-2" type="file" id="bukti-dpa"
                                    name="bukti_dpa[]" multiple required>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu (Dana APBN / Dana APBD/ Dana
                                    Hibah) atau ketiganya (Dana APBN & Dana APBD & Dana Hibah).</li>
                                <li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah
                                    uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
                                <li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan
                                    penjamin lainnya.</li>
                                <li>Ukuran maksimal setiap file Dokumen Adendum adalah 2 MB.</li>
                            </ol>
                            </p>
                        </div>
                    </div>
                    {{-- tombol kirim dan cancel --}}
                    @if ($barjas->nilai_dpa == '')
                        <div class="col-sm-6 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0"
                                name="submit_sumber_dana_dpa">Kirim</button>
                        </div>
                        <div class="col-sm-6 mt-4 text-end">
                            <button type="button" class="btn bg-third border-primary rounded-0"
                                onclick="window.location.reload();">Reset</button>
                            <button type="button" class="btn btn-danger rounded-0"
                                onclick="window.location.href='{{ url('dashboard') }}';">Kembali</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

	<script>
        document.addEventListener('DOMContentLoaded', function() {
            const tglMulai = document.getElementById('tanggal-mulai-spk-barjas');
            const tglSelesai = document.getElementById('tanggal-selesai-spk-barjas');
            const durasi = document.getElementById('durasi-spk-barjas');

            function calculateDuration() {
                const startDate = new Date(tglMulai.value);
                const endDate = new Date(tglSelesai.value);

                if (startDate && endDate && startDate <= endDate) {
                    const diffTime = Math.abs(endDate - startDate);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    durasi.value = diffDays + ' hari';
                } else {
                    durasi.value = '';
                }
            }

            tglMulai.addEventListener('change', calculateDuration);
            tglSelesai.addEventListener('change', calculateDuration);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const tglMulai = document.getElementById('tanggal-mulai-spk-barjas');
            const tglSelesai = document.getElementById('tanggal-selesai-spk-barjas');
            const durasiHidden = document.getElementById('durasi-spk-hidden');

            function calculateDuration() {
                const startDate = new Date(tglMulai.value);
                const endDate = new Date(tglSelesai.value);

                if (startDate && endDate && startDate <= endDate) {
                    const diffTime = Math.abs(endDate - startDate);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    durasiHidden.value = diffDays + ' hari';
                } else {
                    durasiHidden.value = '';
                }
            }

            tglMulai.addEventListener('change', calculateDuration);
            tglSelesai.addEventListener('change', calculateDuration);
        });


        document.addEventListener('DOMContentLoaded', function() {
            const nilaiKontrak = document.getElementById('nilai-kedua-barjas');

            function formatRupiah(angka, prefix) {
                const numberString = angka.replace(/[^,\d]/g, '').toString();
                const split = numberString.split(',');
                const sisa = split[0].length % 3;
                let rupiah = split[0].substr(0, sisa);
                const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    const separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix === undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
            }

            nilaiKontrak.addEventListener('keyup', function(e) {
                nilaiKontrak.value = formatRupiah(this.value, 'Rp');
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const fileInputs = document.querySelectorAll('input[type="file"]');

            fileInputs.forEach(function(fileInput) {
                fileInput.addEventListener('change', function(event) {
                    const files = event.target.files;
                    for (const file of files) {
                        if (file.type !== 'application/pdf') {
                            alert('Hanya dapat menginputkan PDF file.');
                            fileInput.value = '';
                            break;
                        }
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const provinceSelect = document.getElementById('lokasi-provinsi-modal');
            const regencySelect = document.getElementById('lokasi-kota-modal');

            provinceSelect.addEventListener('change', function() {
                const provinceName = this.value;

                if (provinceName) {
                    fetch(`/get-regencies/${provinceName}`)
                        .then(response => response.json())
                        .then(data => {
                            regencySelect.innerHTML = '<option selected>Kota/Kabupaten</option>';
                            data.forEach(regency => {
                                const option = document.createElement('option');
                                option.value = regency.name;
                                option.text = regency.name;
                                regencySelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching regencies:', error);
                        });
                } else {
                    regencySelect.innerHTML = '<option selected>Kota/Kabupaten</option>';
                }
            });
        });

        function formatRupiah(element) {
            let value = element.value.replace(/[^0-9]/g, '');
            element.value = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(value);
        }

        function parseRupiah(value) {
            return parseInt(value.replace(/[^0-9]/g, ''), 10) || 0;
        }

        function calculateTotal() {
            let danaApbn = parseRupiah(document.getElementById('dana-apbn-barjas').value);
            let danaApbd = parseRupiah(document.getElementById('dana-apbd-barjas').value);
            let danaHibah = parseRupiah(document.getElementById('dana-hibah-barjas').value);
            let total = danaApbn + danaApbd + danaHibah;

            document.getElementById('nilai-dpa-barjas').value = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(total);
        }
    </script>
@endsection
