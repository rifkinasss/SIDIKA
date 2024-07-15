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
                <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Perencanaan Belanja
                            Modal</u></span></li>
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
                <p>Lengkapi form dibawah ini beserta deskripsi yang jelas yang dapat menjadi pendukung untuk membuat
                    Proposal Perencanaan Belanja Modal.</p>
                <p>
                    Formulir akan ditinjau dan balasan perencanaan akan dikirimkan minimal <span class="h5"><b>2
                            hari</b></span> setelah perencanaan dilakukan.<br>
                    Jika terjadi kendala saat pengajuan dan belum menerima balasan klik <a href="#"
                        class="text-first"><u>link bantuan</u></a>.
                </p>
            </div>
            <div class="row my-2 mx-4">
                <div class="card bg-warning border border-warning rounded-0 pt-4 px-4">
                    <p><i class="bi bi-exclamation-square-fill"></i> Pastikan anda telah membaca seluruh ketentuan
                        Belanja Modal. <br>
                    <ul>
                        <li>Kesalahan data pada dokumen berakibat penolakan</li>
                        <li>Pemalsuan dokumen berakibat masuk ke daftar blacklist</li>
                    </ul>
                    </p>
                </div>
            </div>
            <hr>
            {{-- Perencanaan Belanja Modal --}}
            <form action="{{ route('perencanaan-belanja-modal.store') }}" method="POST" enctype="multipart/form-data" onsubmit="copyDurasiToHiddenInput()">
                @csrf
                <div class="row mx-4 my-4 align-items-start">
                    <h4>1. Proposal & Surat Permohonan Belanja Modal</h4>
                    <div class="col-md-6">
                        <label for="nomor-proposal-modal" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control rounded-0 mb-2" id="nomor-proposal-modal"
                            name="nomor_surat" disabled>

                        <label for="latar-belakang-modal" class="form-label">Latar Belakang</label>
                        <textarea class="form-control rounded-0 mb-2" id="latar-belakang-modal" name="latar_belakang"
                            placeholder="Contoh: Dalam rangka meningkatkan kinerja dan pelayanan, diperlukan pembangunan gedung kantor baru yang memadai."
                            rows="4" required></textarea>

                        <label for="tujuan-perencanaan-modal" class="form-label">Tujuan Belanja Modal</label>
                        <textarea class="form-control rounded-0 mb-2" id="tujuan-perencanaan-modal" name="tujuan"
                            placeholder="Contoh: Membangun gedung kantor baru yang mampu menampung kebutuhan operasional dan memberikan kenyamanan bagi pegawai."
                            rows="4" required></textarea>

                        <label for="deskripsi-modal" class="form-label">Deskripsi Kebutuhan</label>
                        <textarea class="form-control rounded-0 mb-2" id="deskripsi-modal" name="deskripsi_kebutuhan"
                            placeholder="Contoh: Belanja Modal Pembangunan Gedung Kantor 5 Lantai lengkap dengan fasilitas umum, listrik, dan air."
                            rows="4" required></textarea>

                        <label for="estimasi-perencanaan-modal" class="form-label">Estimasi Biaya (Rp.)</label>
                        <input type="text" class="form-control rounded-0 mb-2" id="estimasi-perencanaan-modal" name="estimasi_biaya" required
                            onkeyup="formatRupiah(this)">

                        <label for="jenis-belanja-modal" class="form-label">Jenis Belanja Modal</label>
                        <select class="form-select rounded-0 mb-2" aria-label="Default select example"
                            id="jenis-belanja-modal" name="jns_belanja" required onchange="toggleBelanjaLainnya(this)">
                            <option selected>Pilih Jenis Belanja Modal</option>
                            <option value="Pembelian Tanah">Pembelian Tanah</option>
                            <option value="Pembangunan Gedung">Pembangunan Gedung</option>
                            <option value="Pengadaan Peralatan dan Mesin">Pengadaan Peralatan dan Mesin</option>
                            <option value="Pembangunan Infrastruktur">Pembangunan Infrastruktur</option>
                            <option value="Renovasi dan Perbaikan">Renovasi dan Perbaikan</option>
                            <option value="Pembelian Kendaraan">Pembelian Kendaraan</option>
                            <option value="Pengembangan Teknologi Informasi">Pengembangan Teknologi Informasi</option>
                            <option value="Belanja Modal Jalan, Irigasi dan Jaringan">Belanja Modal Jalan, Irigasi dan Jaringan</option>
                            <option value="Belanja Modal Lainnya">Belanja Modal Lainnya</option>
                        </select>

                        <label for="belanja-modal-lainnya" class="form-label">Belanja Modal Lainnya </label>
                        <input type="text" class="form-control rounded-0 mb-2" id="belanja-modal-lainnya" name="lainnya"
                            placeholder="misal. belanja inventaris kantor" disabled>

                        <label for="tanggal-mulai-modal" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control rounded-0 mb-2" id="tanggal-mulai-modal" name="tgl_mulai"
                            placeholder="DD/MM/YYYY" required onchange="calculateDurasi()">

                        <label for="tanggal-selesai-modal" class="form-label">Tanggal Selesai (Tenggat)</label>
                        <input type="date" class="form-control rounded-0 mb-2" id="tanggal-selesai-modal" name="tgl_selesai"
                            placeholder="DD/MM/YYYY" required onchange="calculateDurasi()">

                        <label for="durasi" class="form-label">Durasi</label>
                        <input type="text" class="form-control rounded-0 mb-2" id="durasi" disabled>
                        <input type="hidden" id="hidden-durasi" name="durasi">

                        <label for="deskripsi-spesifikasi-modal" class="form-label">Deskripsi dan Spesifikasi
                            (detail)</label>
                        <textarea class="form-control rounded-0 mb-2" id="deskripsi-spesifikasi-modal" name="deskripsi_spesifikasi"
                            placeholder="Spesifikasi:
1. Struktur Bangunan:
   - Pondasi beton bertulang dengan kualitas K-300.
   - Dinding menggunakan bata ringan dengan finishing cat eksterior anti-jamur.
   - Atap menggunakan baja ringan dengan penutup genteng metal.dst."
                            rows="20" required></textarea>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                            <p><i class="bi bi-info-square-fill"></i> Info
                            <ol>
                                <li>Nomor Surat akan terisi otomatis jika form disetujui oleh admin.</li>
                                <li>Setelah Form ini disetujui akan keluar sebagai <b>Surat digital Permohonan Perencanaan
                                        Belanja Modal dan Proposal digital Proposal Belanja Modal</b> yang dapat diunduh
                                </li>
                                <li>Latar Belakang dan tujuan harap menggunakan kalimat <b>baku dan formal</b>.</li>
                                <li>Deskripsi Kebutuhan diisi singkat, padat, dan jelas.</li>
                                <li>Deskripsi Spesifikasi berisi kebutuhan mendetail.</li>
                                <li>Perbedaan Estimasi Biaya saat pengajuan dan pelaporan harap diberikan catatan tambahan
                                    nanti saat pelaporan.</li>
                            </ol>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- tombol kirim dan cancel --}}
                <div class="row my-4 mx-4">
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-primary rounded-0">Kirim</button>
                    </div>
                    <div class="col-sm-6 text-end">
                        <button type="button" class="btn bg-third border-primary rounded-0" onclick="window.location.reload();">Reset</button>
                        <button type="button" class="btn btn-danger rounded-0" onclick="window.location.href='{{ route('home') }}';">Kembali</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function formatRupiah(input) {
            let value = input.value.replace(/[^,\d]/g, '').toString();
            let split = value.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            input.value = 'Rp. ' + rupiah;
        }

        function toggleBelanjaLainnya(select) {
            const belanjaLainnyaInput = document.getElementById('belanja-modal-lainnya');
            if (select.value == 'Belanja Modal Lainnya') { // value for "Belanja Modal Lainnya"
                belanjaLainnyaInput.disabled = false;
            } else {
                belanjaLainnyaInput.disabled = true;
                belanjaLainnyaInput.value = ''; // clear the input
            }
        }

        function calculateDurasi() {
            const tglMulai = document.getElementById('tanggal-mulai-modal').value;
            const tglSelesai = document.getElementById('tanggal-selesai-modal').value;
            const durasiInput = document.getElementById('durasi');

            if (tglMulai && tglSelesai) {
                const startDate = new Date(tglMulai);
                const endDate = new Date(tglSelesai);
                const timeDiff = endDate - startDate;
                const dayDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                if (dayDiff >= 0) {
                    durasiInput.value = dayDiff + ' hari';
                } else {
                    durasiInput.value = '';
                }
            } else {
                durasiInput.value = '';
            }
        }

        function copyDurasiToHiddenInput() {
            const durasiInput = document.getElementById('durasi');
            const hiddenDurasiInput = document.getElementById('hidden-durasi');
            hiddenDurasiInput.value = durasiInput.value;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const jenisBelanjaModal = document.getElementById('jenis-belanja-modal');
            toggleBelanjaLainnya(jenisBelanjaModal); // Initial check
            jenisBelanjaModal.addEventListener('change', function () {
                toggleBelanjaLainnya(this);
            });
        });
    </script>
@endsection
