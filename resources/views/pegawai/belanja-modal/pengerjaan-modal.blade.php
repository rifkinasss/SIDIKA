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
                <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Pengerjaan Belanja
                            Modal</u></span></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid bg-transparent mb-4">
        <div class="card bg-light rounded-0">
            <div class="row pt-4 ps-4">
                <h5>Pengerjaan Belanja Modal</h5>
            </div>
            <hr>
            <div class="row py-2 ps-4">
                <p>Lengkapi form dibawah ini beserta deskripsi yang jelas yang dapat menjadi pendukung untuk membuat
                    Surat-surat Pengerjaan Belanja Modal.</p>
                <p>
                    Formulir akan ditinjau dan balasan Pengerjaan akan dikirimkan minimal <span class="h5"><b>2
                            hari</b></span> setelah Pengerjaan dilakukan.<br>
                    Jika terjadi kendala saat Pengerjaan dan belum menerima balasan klik <a href="#"
                        class="text-first"><u>link bantuan</u></a>. <br>
                    Pada Pengerjaan Belanja Modal ini bersifat progresif dimana halaman dapat dibuka kembali sampai semua
                    form terisi(termasuk adendum kontrak).
                </p>
            </div>
            <div class="row my-2 mx-4">
                <div class="card bg-warning border border-warning rounded-0 pt-4 px-4">
                    <p><i class="bi bi-exclamation-square-fill"></i> Pastikan anda telah membaca seluruh ketentuan Belanja
                        Modal. <br>
                    <ul>
                        <li>Kesalahan data pada dokumen berakibat penolakan</li>
                        <li>Pemalsuan dokumen berakibat masuk ke daftar blacklist</li>
                    </ul>
                    </p>
                </div>
            </div>
            <hr>
            {{-- Pengerjaan Belanja Modal --}}
            <div class="row mx-4 my-4 align-items-start">
                <h4>0. Data Proposal Belanja Modal</h4>
                <div class="col-md-6">
                    <label for="nomor-proposal-modal" class="form-label">Nomor Surat</label>
                    <input type="text" class="form-control rounded-0 mb-2" id="nomor-proposal-modal"
                        value="{{ $barmod->nomor_surat }}" disabled>

                    <label for="latar-belakang-modal" class="form-label">Latar Belakang</label>
                    <textarea class="form-control rounded-0 mb-2" id="latar-belakang-modal" rows="4" disabled>{{ $barmod->latar_belakang }}</textarea>

                    <label for="tujuan-perencanaan-modal" class="form-label">Tujuan Belanja Modal</label>
                    <textarea class="form-control rounded-0 mb-2" id="tujuan-perencanaan-modal" rows="4" disabled>{{ $barmod->tujuan }}</textarea>

                    <label for="deskripsi-modal" class="form-label">Deskripsi Kebutuhan</label>
                    <textarea class="form-control rounded-0 mb-2" id="deskripsi-modal" rows="4" disabled>{{ $barmod->deskripsi_kebutuhan }}</textarea>

                    <label for="estimasi-Pengerjaan-modal" class="form-label">Estimasi Biaya (Rp.)</label>
                    <input type="text" class="form-control rounded-0 mb-2" id="estimasi-Pengerjaan-modal"
                        value="{{ $barmod->estimasi_biaya }}" disabled>

                    <label for="jenis-belanja-modal" class="form-label">Jenis Belanja Modal</label>
                    <input type="text" class="form-control rounded-0 mb-2" id="jenis-belanja-modal"
                        value="{{ $barmod->jns_belanja }}" disabled>

                    @if ($barmod->jns_belanja == 'Belanja Modal Lainnya')
                        <label for="belanja-modal-lainnya" class="form-label">Belanja Modal Lainnya </label>
                        <input type="text" class="form-control rounded-0 mb-2" id="belanja-modal-lainnya"
                            value="{{ $barmod->lainnya }}" disabled>
                    @endif

                    <label for="tanggal-mulai-modal" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-modal"
                        value="{{ $barmod->tgl_mulai }}" disabled>

                    <label for="tanggal-selesai-modal" class="form-label">Tanggal Selesai (Tenggat)</label>
                    <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-modal"
                        value="{{ $barmod->tgl_selesai }}" disabled>

                    <label for="durasi-perencanaan-modal" class="form-label">Durasi</label>
                    <input type="text" class="form-control rounded-0 mb-2" id="durasi-perencanaan-modal"
                        value="{{ $barmod->durasi }}" disabled>

                    <label for="deskripsi-spesifikasi-modal" class="form-label">Deskripsi dan Spesifikasi (detail)</label>
                    <textarea class="form-control rounded-0 mb-2" id="deskripsi-spesifikasi-modal" rows="20" disabled>{{ $barmod->deskripsi_spesifikasi }}</textarea>
                </div>

                <div class="col-md-6">
                    <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                        <p><i class="bi bi-info-square-fill"></i> Info
                        <ol>
                            <li>Nomor Surat akan terisi otomatis jika form disetujui oleh admin.</li>
                            <li>Setelah Form ini disetujui akan keluar sebagai <b>Surat digital Permohonan Perencanaan
                                    Belanja Modal dan Proposal digital Proposal Belanja Modal</b> yang dapat diunduh</li>
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
    <form action="{{ route('pengerjaan-belanja-modal.update', $barmod->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid bg-transparent mb-4">
            <div class="card bg-light rounded-0">
                <div class="row mx-4 my-4 align-items-start">
                    <h4>1. Perjanjian/Kontrak/SPK</h4>
                    <div class="col-md-6">
                        <label for="nomor-spk-modal" class="form-label">Nomor Surat Perijinan Kerja</label>
                        <input type="text" class="form-control rounded-0 mb-2" id="nomor-spk-modal"
                            name="nomor_surat_spk"
                            @if ($barmod->nomor_surat_spk != '') value="{{ $barmod->nomor_surat_spk }}" disabled @endif
                            required>

                        <label for="penyedia-spk-modal" class="form-label">Nama Penyedia Barang / Kontraktor</label>
                        <input type="text" class="form-control rounded-0 mb-2" id="penyedia-spk-modal"
                            placeholder="misal. PT.Deka Sari Perkasa" name="nama_vendor"
                            @if ($barmod->nama_vendor != '') value="{{ $barmod->nama_vendor }}" disabled @endif required>

                        <label for="lokasi" class="form-label">Lokasi Penyedia Barang/ Kontraktor</label><br>
                        <label for="lokasi-provinsi-modal" class="form-label">Provinsi</label>
                        @if ($barmod->provinsi != '')
                            <input class="form-control rounded-0 mb-2" id="lokasi-provinsi-modal" name="provinsi"
                                value="{{ $barmod->provinsi }}" disabled>
                        @else
                            <select class="form-select rounded-0 mb-2" aria-label="Default select example"
                                id="lokasi-provinsi-modal" name="provinsi">
                                <option selected>Provinsi</option>
                                @foreach ($provinces as $provinsi)
                                    <option value="{{ $provinsi->name }}">{{ $provinsi->name }}</option>
                                @endforeach
                            </select>
                        @endif


                        <label for="lokasi-kota-modal" class="form-label">Kota/Kabupaten</label>
                        @if ($barmod->kota != '')
                            <input class="form-control rounded-0 mb-2" id="lokasi-kota-modal" name="kota"
                                value="{{ $barmod->kota }}" disabled>
                        @else
                            <select class="form-select rounded-0 mb-2" aria-label="Default select example"
                                id="lokasi-kota-modal" name="kota">
                                <option selected>Kota/Kabupaten</option>
                            </select>
                        @endif

                        <label for="tanggal-mulai-spk-modal" class="form-label">Tanggal Mulai Kontrak</label>
                        <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-spk-modal"
                            placeholder="DD/MM/YYYY" name="tgl_mulai_spk"
                            @if ($barmod->tgl_mulai_spk != '') value="{{ $barmod->tgl_mulai_spk }}" disabled @endif
                            required>

                        <label for="tanggal-selesai-spk-modal" class="form-label">Tanggal Berakhir Kontrak
                            (tenggat)</label>
                        <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-spk-modal"
                            placeholder="DD/MM/YYYY" name="tgl_selesai_spk"
                            @if ($barmod->tgl_selesai_spk != '') value="{{ $barmod->tgl_selesai_spk }}" disabled @endif
                            required>

                        <label for="durasi-spk-modal" class="form-label">Durasi</label>
                        <input type="text" class="form-control rounded-0 mb-2" id="durasi-spk-modal"
                            name="durasi_spk"
                            @if ($barmod->durasi_spk != '') value="{{ $barmod->durasi_spk }}" disabled @endif disabled>
                        <input type="hidden" id="durasi-spk-hidden" name="durasi_spk">

                        <label for="nilai-kedua-modal" class="form-label">Nilai Kontrak</label>
                        <input type="text" class="form-control rounded-0 mb-4" id="nilai-kedua-modal"
                            placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)" name="nilai_kontrak_spk"
                            @if ($barmod->nilai_kontrak_spk != '') value="{{ $barmod->nilai_kontrak_spk }}" disabled @endif
                            onkeyup="formatRupiah(this)" required>

                        <label for="uraian-pengadaan-modal" class="form-label">Uraian Pengadaan (Sesuai Kontrak)</label>
                        <textarea class="form-control rounded-0 mb-4" id="uraian-pengadaan-modal"
                            placeholder="Contoh: Pembayaran Belanja Modal Pembangunan Gedung Kantor 5 Lantai lengkap dengan fasilitas umum, listrik, dan air."
                            rows="4" name="uraian_pengadaan" @if ($barmod->uraian_pengadaan != '') disabled @endif required>
@if ($barmod->uraian_pengadaan != '')
{{ $barmod->uraian_pengadaan }}
@endif
</textarea>

                        <label for="bukti-spk" class="form-label">Bukti Surat Perijinan Kerja (.pdf)</label>
                        @if ($barmod->bukti_spk)
                            @php
                                $filePaths = json_decode($barmod->bukti_spk);
                            @endphp

                            <ul>
                                @foreach ($filePaths as $filePath)
                                    <li><a href="{{ Storage::url($filePath) }}" target="_blank">Lihat File</a></li>
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
                                <li>Batas maksimal ukuran satu file Surat Perijinan Kerja adalah 2 MB</li>
                            </ol>
                            </p>
                        </div>
                    </div>

                    {{-- tombol kirim dan cancel --}}
                    @if ($barmod->nomor_surat_spk == '')
                        <div class="col-sm-6 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0" name="submit_spk">Kirim</button>
                        </div>
                        <div class="col-sm-6 mt-4 text-end">
                            <button type="button" class="btn bg-third border-primary rounded-0"
                                onclick="window.location.reload();">Reset</button>
                            <button type="button" class="btn btn-danger rounded-0"
                                onclick="window.location.href='{{ url('dashboard') }}';">kembali</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    {{-- Adendum Kontrak Belanja Modal --}}
    <form action="{{ route('pengerjaan-belanja-modal.update', $barmod->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid bg-transparent mb-4">
            <div class="card bg-light rounded-0">
                <div class="row mx-4 my-4 align-items-start">
                    <h4>2. Adendum Kontrak Belanja Modal</h4>
                    <div class="col-md-6">
                        <label for="nomor-adendum-modal" class="form-label">Nomor Surat Adendum Kontrak</label>
                        <input class="form-control rounded-0 mb-2" type="text" id="nomor-adendum-modal"
                            name="nomor_surat_adendum" required
                            @if ($barmod->nomor_surat_adendum != '') value='{{ $barmod->nomor_surat_spk }}' disabled @endif>

                        <label for="uraian-adendum-modal" class="form-label">Uraian Adendum (Sesuai Kontrak)</label>
                        <textarea class="form-control rounded-0 mb-4" id="uraian-adendum-modal"
                            placeholder="Contoh: Pembayaran Belanja Modal Pembangunan Gedung Kantor 5 Lantai lengkap dengan fasilitas umum, listrik, dan air."
                            rows="4" name="uraian_adendum" required @if ($barmod->uraian_adendum != '') disabled @endif>
@if ($barmod->uraian_adendum != '')
{{ $barmod->uraian_adendum }}
@endif
</textarea>

                        <label for="tanggal-mulai-adendum-modal" class="form-label">Tanggal Mulai Adendum Kontrak</label>
                        <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-adendum-modal"
                            placeholder="DD/MM/YYYY" name="tgl_mulai_adendum" required
                            @if ($barmod->tgl_mulai_adendum != '') value='{{ $barmod->tgl_mulai_adendum }}' disabled @endif>

                        <label for="tanggal-selesai-adendum-modal" class="form-label">Tanggal Berakhir Adendum Kontrak
                            (tenggat)</label>
                        <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-adendum-modal"
                            placeholder="DD/MM/YYYY" name="tgl_selesai_adendum" required
                            @if ($barmod->tgl_selesai_adendum != '') value='{{ $barmod->tgl_selesai_adendum }}' disabled @endif>

                        <label for="nilai-adendum-modal" class="form-label">Nilai Kontrak Adendum</label>
                        <input type="text" class="form-control rounded-0 mb-4" id="nilai-adendum-modal"
                            placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)" name="nilai_kontrak_adendum"
                            onkeyup="formatRupiah(this)" required
                            @if ($barmod->nilai_kontrak_adendum != '') value='{{ $barmod->nilai_kontrak_adendum }}' disabled @endif>

                        <label for="bukti-adendum-modal" class="form-label">Bukti Surat Adendum Kerja (.pdf)</label>
                        @if ($barmod->bukti_surat_adendum)
                            @php
                                $filePaths = json_decode($barmod->bukti_surat_adendum);
                            @endphp

                            <ul>
                                @foreach ($filePaths as $filePath)
                                    <li><a href="{{ Storage::url($filePath) }}" target="_blank">Lihat File</a></li>
                                @endforeach
                            </ul>
                        @else
                            <input class="form-control rounded-0 mb-2" type="file" id="bukti-adendum-modal"
                                name="bukti_surat_adendum[]" multiple required>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Adendum Kontrak tidak wajib diisi</li>
                                <li>File Dokumen Adendum Kontrak bisa diisi lebih dari 1</li>
                                <li>Batas maksimal ukuran satu file Dokumen Adendum adalah 2 MB</li>
                            </ol>
                            </p>
                        </div>
                    </div>

                    {{-- tombol kirim dan cancel --}}
                    @if ($barmod->nomor_surat_adendum == '')
                        <div class="col-sm-6 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0" name="submit_adendum">Kirim</button>
                        </div>
                        <div class="col-sm-6 mt-4 text-end">
                            <button type="button" class="btn bg-third border-primary rounded-0"
                                onclick="window.location.reload();">Reset</button>
                            <button type="button" class="btn btn-danger rounded-0"
                                onclick="window.location.href='{{ url('dashboard') }}';">kembali</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    {{-- Jaminan pelaksanaan --}}
    <form action="{{ route('pengerjaan-belanja-modal.update', $barmod->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid bg-transparent mb-4">
            <div class="card bg-light rounded-0">
                <div class="row mx-4 my-4 align-items-start">
                    <h4>3. Jaminan Pelaksanaan</h4>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Bukti Jaminan Pelaksanaan</label> <br>

                            <label for="nilai-bank-pelaksanaan-modal" class="form-label">Nilai Bank Garansi</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="nilai-bank-pelaksanaan-modal"
                                placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)"
                                name="nilai_bank_garansi_pelaksanaan" onkeyup="formatRupiah(this)"
                                @if ($barmod->nilai_bank_garansi_pelaksanaan != '') value='{{ $barmod->nilai_bank_garansi_pelaksanaan }}' disabled 
                                @elseif ($barmod->nilai_surety_bond_pelaksanaan != '') value='-' disabled @endif>

                            <label for="bank-garansi-pelaksanaan-modal" class="form-label">Bank Garansi (.pdf)</label>
                            @if ($barmod->bukti_bank_garansi_pelaksanaan != '')
                                <ul>
                                    <li><a href="{{ Storage::url($barmod->bukti_bank_garansi_pelaksanaan) }}"
                                            target="_blank">Lihat File</a></li>
                                </ul>
                            @elseif ($barmod->bukti_surety_bond_pelaksanaan != '')
                                <input type="text" class="form-control rounded-0 mb-2" id="bukti-bank-garansi-modal"
                                    value="-" disabled>
                            @else
                                <input class="form-control rounded-0 mb-4" type="file" id="bukti-bank-garansi-modal"
                                    name="bukti_bank_garansi_pelaksanaan">
                            @endif

                            <label for="nilai-surety-modal" class="form-label">Nilai Surety Bond</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="nilai-surety-modal"
                                placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)"
                                name="nilai_surety_bond_pelaksanaan" onkeyup="formatRupiah(this)"
                                @if ($barmod->nilai_surety_bond_pelaksanaan != '') value='{{ $barmod->nilai_surety_bond_pelaksanaan }}' disabled 
                                @elseif ($barmod->nilai_bank_garansi_pelaksanaan != '') value='-' disabled @endif>

                            <label for="surety-bond-pelaksanaan-modal" class="form-label">Surety Bond (.pdf)</label>
                            @if ($barmod->bukti_surety_bond_pelaksanaan != '')
                                <ul>
                                    <li><a href="{{ Storage::url($barmod->bukti_surety_bond_pelaksanaan) }}"
                                            target="_blank">Lihat File</a></li>
                                </ul>
                            @elseif ($barmod->bukti_bank_garansi_pelaksanaan != '')
                                <input type="text" class="form-control rounded-0 mb-2" id="bukti-surety-bond-modal"
                                    value="-" disabled>
                            @else
                                <input class="form-control rounded-0 mb-2" type="file"
                                    id="surety-bond-pelaksanaan-modal" name="bukti_surety_bond_pelaksanaan">
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu(Bank Garansi / Surety Bond)
                                    atau
                                    dua-duanya(Bank Garansi & Surety Bond)</li>
                                <li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah
                                    uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
                                <li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan
                                    penjamin lainnya.</li>
                                <li>Batas maksimal ukuran file yang dapat diupload adalah 2 MB</li>
                            </ol>
                            </p>
                        </div>
                    </div>

                    {{-- tombol kirim dan cancel --}}
                    @if ($barmod->nilai_bank_garansi_pelaksanaan == '' && $barmod->nilai_surety_bond_pelaksanaan == '')
                        <div class="col-sm-6 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0"
                                name="submit_jaminan_pelaksanaan">Kirim</button>
                        </div>
                        <div class="col-sm-6 mt-4 text-end">
                            <button type="button" class="btn bg-third border-primary rounded-0"
                                onclick="window.location.reload();">Reset</button>
                            <button type="button" class="btn btn-danger rounded-0"
                                onclick="window.location.href='{{ url('dashboard') }}';">kembali</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    {{-- Jaminan pengadaan --}}
    <form action="{{ route('pengerjaan-belanja-modal.update', $barmod->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid bg-transparent mb-4">
            <div class="card bg-light rounded-0">
                <div class="row mx-4 my-4 align-items-start">
                    <h4>4. Jaminan Pengadaan</h4>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Bukti Jaminan Pengadaan</label> <br>
                            <label for="nilai-bank-pengadaan-modal" class="form-label">Nilai Bank Garansi</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="nilai-bank-pengadaan-modal"
                                placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)"
                                name="nilai_bank_garansi_pengadaan" onkeyup="formatRupiah(this)"
                                @if ($barmod->nilai_bank_garansi_pengadaan != '') value='{{ $barmod->nilai_bank_garansi_pengadaan }}' disabled
                                @elseif ($barmod->nilai_surety_bond_pengadaan != '') value='-' disabled @endif>

                            <label for="bank-garansi-Pengadaan-modal" class="form-label">Bank Garansi</label>
                            @if ($barmod->bukti_bank_garansi_pengadaan != '')
                                <ul>
                                    <li><a href="{{ Storage::url($barmod->bukti_bank_garansi_pengadaan) }}"
                                            target="_blank">Lihat File</a></li>
                                </ul>
                            @elseif ($barmod->bukti_surety_bond_pengadaan != '')
                                <input type="text" class="form-control rounded-0 mb-2" id="bukti-bank-pengadaan-modal"
                                    value="-" disabled>
                            @else
                                <input class="form-control rounded-0 mb-4" type="file" id="bukti-bank-pengadaan-modal"
                                    name="bukti_bank_garansi_pengadaan">
                            @endif

                            <label for="nilai-surety-pengadaan-modal" class="form-label">Nilai Surety Bond</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="nilai-surety-pengadaan-modal"
                                placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)"
                                name="nilai_surety_bond_pengadaan" onkeyup="formatRupiah(this)"
                                @if ($barmod->nilai_surety_bond_pengadaan != '') value='{{ $barmod->nilai_surety_bond_pengadaan }}' disabled
                                @elseif ($barmod->nilai_bank_garansi_pengadaan != '') value='-' disabled @endif>

                            <label for="surety-bond-Pengadaan-modal" class="form-label">Surety Bond</label>
                            @if ($barmod->bukti_surety_bond_pengadaan != '')
                                <ul>
                                    <li><a href="{{ Storage::url($barmod->bukti_surety_bond_pengadaan) }}"
                                            target="_blank">Lihat File</a></li>
                                </ul>
                            @elseif ($barmod->bukti_bank_garansi_pengadaan != '')
                                <input type="text" class="form-control rounded-0 mb-2" id="bukti-surety_bond-modal"
                                    value="-" disabled>
                            @else
                                <input class="form-control rounded-0 mb-2" type="file"
                                    id="surety-bond-pelaksanaan-modal" name="bukti_surety_bond_pengadaan">
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu(Bank Garansi / Surety Bond)
                                    atau
                                    keduanya (Bank Garansi & Surety Bond)</li>
                                <li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah
                                    uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
                                <li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan
                                    penjamin lainnya.</li>
                                <li>Batas maksimal ukuran file yang dapat diupload adalah 2 MB</li>
                            </ol>
                            </p>
                        </div>
                    </div>

                    {{-- tombol kirim dan cancel --}}
                    @if ($barmod->nilai_bank_garansi_pelaksanaan == '' && $barmod->nilai_surety_bond_pelaksanaan == '')
                        <div class="col-sm-6 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0"
                                name="submit_jaminan_pengadaan">Kirim</button>
                        </div>
                        <div class="col-sm-6 mt-4 text-end">
                            <button type="button" class="btn bg-third border-primary rounded-0"
                                onclick="window.location.reload();">Reset</button>
                            <button type="button" class="btn btn-danger rounded-0"
                                onclick="window.location.href='{{ url('dashboard') }}';">kembali</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    {{-- Sumber Dana DPA --}}
    <form action="{{ route('pengerjaan-belanja-modal.update', $barmod->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <div class="container-fluid bg-transparent mb-4">
            <div class="card bg-light rounded-0">
                <div class="row mx-4 my-4 align-items-start">
                    <h4>5. Sumber Dana DPA (Dokumen Pengadaan Anggaran) Belanja Modal</h4>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nilai Pengadaan Anggaran</label> <br>
                            <label for="dana-apbn-modal" class="form-label">Nominal Dana APBN</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="dana-apbn-modal"
                                placeholder="misal. Rp 10.000.000.000 (sepuluh miliar rupiah)" name="dana_apbn"
                                oninput="formatRupiah(this); calculateTotal()"
                                @if ($barmod->dana_apbn != '') value='{{ $barmod->dana_apbn }}' disabled
                                @elseif ($barmod->dana_apbd != '' || $barmod->dana_hibah != '') value='-' disabled @endif>

                            <label for="dana-apbd-modal" class="form-label">Nominal Dana APBD</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="dana-apbd-modal"
                                placeholder="misal. Rp 5.000.000.000 (sepuluh miliar rupiah)" name="dana_apbd"
                                oninput="formatRupiah(this); calculateTotal()"
                                @if ($barmod->dana_apbd != '') value='{{ $barmod->dana_apbd }}' disabled 
                                @elseif ($barmod->dana_apbn != '' || $barmod->dana_hibah != '') value='-' disabled @endif>

                            <label for="dana-hibah-modal" class="form-label">Nominal Dana Hibah</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="dana-hibah-modal"
                                placeholder="misal. Rp 1.000.000.000 (sepuluh miliar rupiah)" name="dana_hibah"
                                oninput="formatRupiah(this); calculateTotal()"
                                @if ($barmod->dana_hibah != '') value='{{ $barmod->dana_hibah }}' disabled
                                @elseif ($barmod->dana_apbn != '' || $barmod->dana_apbd != '') value='-' disabled @endif>

                            <label for="bentuk-pengadaan" class="form-label">Bentuk Pengadaan</label>
                            @if ($barmod->bentuk_pengadaan != '')
                                <input class="form-control rounded-0 mb-2" id="bentuk-pengadaan" name="bentuk_pengadaan"
                                    value='{{ $barmod->bentuk_pengadaan }}' disabled>
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

                            <label for="nilai-dpa-modal" class="form-label">Nilai DPA</label>
                            <input type="text" class="form-control rounded-0 mb-2" id="nilai-dpa-modal"
                                placeholder="misal. Rp 10.000.000.000 (satu miliar rupiah)" name="nilai_dpa" readonly
                                required
                                @if ($barmod->nilai_dpa != '') value='{{ $barmod->nilai_dpa }}' disabled @endif>

                            <label class="form-label" for="bukti-dpa">Bukti Dokumen Pengadaan Anggaran</label>
                            @if ($barmod->bukti_dpa)
                                @php
                                    $filePaths = json_decode($barmod->bukti_dpa);
                                @endphp

                                <ul>
                                    @foreach ($filePaths as $filePath)
                                        <li><a href="{{ Storage::url($filePath) }}" target="_blank">Lihat File</a></li>
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
                                    Hibah) atau ketiganya (Dana APBN & Dana APBD & Dana Hibah)</li>
                                <li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah
                                    uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
                                <li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan
                                    penjamin lainnya.</li>
                            </ol>
                            </p>
                        </div>
                    </div>
                    {{-- tombol kirim dan cancel --}}
                    @if ($barmod->nilai_dpa == '')
                        <div class="col-sm-6 mt-4">
                            <button type="submit" class="btn btn-primary rounded-0"
                                name="submit_sumber_dana_dpa">Kirim</button>
                        </div>
                        <div class="col-sm-6 mt-4 text-end">
                            <button type="button" class="btn bg-third border-primary rounded-0"
                                onclick="window.location.reload();">Reset</button>
                            <button type="button" class="btn btn-danger rounded-0"
                                onclick="window.location.href='{{ url('dashboard') }}';">kembali</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tglMulai = document.getElementById('tanggal-mulai-spk-modal');
            const tglSelesai = document.getElementById('tanggal-selesai-spk-modal');
            const durasi = document.getElementById('durasi-spk-modal');

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
            const tglMulai = document.getElementById('tanggal-mulai-spk-modal');
            const tglSelesai = document.getElementById('tanggal-selesai-spk-modal');
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
            const nilaiKontrak = document.getElementById('nilai-kedua-modal');

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
            let danaApbn = parseRupiah(document.getElementById('dana-apbn-modal').value);
            let danaApbd = parseRupiah(document.getElementById('dana-apbd-modal').value);
            let danaHibah = parseRupiah(document.getElementById('dana-hibah-modal').value);
            let total = danaApbn + danaApbd + danaHibah;

            document.getElementById('nilai-dpa-modal').value = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(total);
        }
    </script>
@endsection
