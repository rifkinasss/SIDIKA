@extends('admin.layouts.app')

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pengerjaan Belanja Modal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-admin') }}">Home</a></li>
                            <li class="breadcrumb-item">Belanja Modal</li>
                            <li class="breadcrumb-item active">Pengerjaan Belanja Modal</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 style='font-weight: bold;'>1. Perjanjian/Kontrak/SPK</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-6">
                                        <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nama-lengkap"
                                            value="{{ $barmol->user->nama }}" readonly>
                                        
                                        <label for="nomor-spk" class="form-label">Nomor Surat Perijinan Kerja</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nomor-spk"
                                            value="{{ $barmol->nomor_surat_spk }}" readonly> 
                                        
                                        <label for="kota-vendor" class="form-label">Kota Penyedia Barang/ Kontraktor</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="kota-vendor"
                                            value="{{ $barmol->kota }}" readonly> 
                                        
                                        <label for="tgl-mulai-spk" class="form-label">Tanggal Mulai / Tanggal Berakhir Kontrak</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="tgl-mulai-spk"
                                            value="{{ \Carbon\Carbon::parse($barmol->tgl_mulai_spk)->format('d M Y') .' / '. \Carbon\Carbon::parse($barmol->tgl_selesai_spk)->format('d M Y') }}" readonly> 
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="nip" value="{{ $barmol->user->nip }}" readonly>

                                        <label for="nama-vendor" class="form-label">Nama Penyedia Barang / Kontraktor</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nama-vendor"
                                            value="{{ $barmol->nama_vendor }}" readonly>
                                        
                                        <label for="provinsi-vendor" class="form-label">Provinsi Penyedia Barang / Kontraktor</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="provinsi-vendor"
                                            value="{{ $barmol->provinsi }}" readonly>
                                        
                                        <label for="tgl-selesai-spk" class="form-label">Durasi</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="tgl-selesai-spk"
                                            value="{{ $barmol->durasi_spk }}" readonly>
                                    </div>

                                    @php
                                        $filePaths = json_decode($barmol->bukti_spk);
                                    @endphp

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                            <ul>
                                                @foreach ($filePaths as $filePath)
                                                    <li><a href="#" class="view-pdf" data-url="{{ Storage::url($filePath) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti SPK</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4 style='font-weight: bold;'>2. Adendum Kontrak Belanja Modal</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-6">
                                        <label for="nomor-surat-adendum" class="form-label">Nomor Surat Adendum Kontrak</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nomor-surat-adendum"
                                            value="{{ $barmol->nomor_surat_adendum }}" readonly>
                                        
                                        <label for="tgl-mulai-selesai-adendum" class="form-label">Tanggal Mulai / Tanggal Selesai Adendum Kontrak</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="tgl-mulai-selesai-adendum"
                                            value="{{ $barmol->nomor_surat_adendum == '-' ? '-' : \Carbon\Carbon::parse($barmol->tgl_mulai_adendum)->format('d M Y') .' / '. \Carbon\Carbon::parse($barmol->tgl_selesai_adendum)->format('d M Y') }}" readonly> 
                                    </div>
                                    <div class="col-md-6">
                                        <label for="uraian-adendum" class="form-label">Uraian Adendum (Sesuai Kontrak)</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="uraian-adendum"
                                            value="{{ $barmol->nomor_surat_adendum == '-' ? '-' : $barmol->uraian_adendum }}" readonly>

                                        <label for="nilai-kontrak-adendum" class="form-label">Nilai Kontrak Adendum</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nilai-kontrak-adendum"
                                            value="{{ $barmol->nomor_surat_adendum == '-' ? '-' : $barmol->nilai_kontrak_adendum }}" readonly>
                                    </div>

                                    @if ($barmol->nomor_surat_adendum != '-')
                                        @php
                                            $filePaths = json_decode($barmol->bukti_surat_adendum);
                                        @endphp

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                                <ul>
                                                    @foreach ($filePaths as $filePath)
                                                        <li><a href="#" class="view-pdf" data-url="{{ Storage::url($filePath) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Adendum</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <h4 style='font-weight: bold;'>3. Jaminan Pelaksanaan</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-6">
                                        <label for="nilai-bank-garansi-pelaksanaan" class="form-label">Nilai Bank Garansi</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nilai-bank-garansi-pelaksanaan"
                                            value="{{ $barmol->nilai_bank_garansi_pelaksanaan == null ? '-' : $barmol->nilai_bank_garansi_pelaksanaan }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nilai-surety-bond-pelaksanaan" class="form-label">Nilai Surety Bond</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nilai-surety-bond-pelaksanaan"
                                            value="{{ $barmol->nilai_surety_bond_pelaksanaan == null ? '-' : $barmol->nilai_surety_bond_pelaksanaan }}" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                            <ul>
                                                @if ($barmol->nilai_bank_garansi_pelaksanaan != null)
                                                    <li><a href="#" class="view-pdf" data-url="{{ Storage::url($barmol->bukti_bank_garansi_pelaksanaan) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Bank Garansi</a></li>
                                                @endif
                                                @if ($barmol->nilai_surety_bond_pelaksanaan != null)
                                                    <li><a href="#" class="view-pdf" data-url="{{ Storage::url($barmol->bukti_surety_bond_pelaksanaan) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Surety Bond</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4 style='font-weight: bold;'>4. Jaminan Pengadaan</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-6">
                                        <label for="nilai-bank-garansi-pengadaan" class="form-label">Nilai Bank Garansi</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nilai-bank-garansi-pengadaan"
                                            value="{{ $barmol->nilai_bank_garansi_pengadaan == null ? '-' : $barmol->nilai_bank_garansi_pengadaan }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nilai-surety-bond-pengadaan" class="form-label">Nilai Surety Bond</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nilai-surety-bond-pengadaan"
                                            value="{{ $barmol->nilai_surety_bond_pengadaan == null ? '-' : $barmol->nilai_surety_bond_pengadaan }}" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                            <ul>
                                                @if ($barmol->nilai_bank_garansi_pengadaan != null)
                                                    <li><a href="#" class="view-pdf" data-url="{{ Storage::url($barmol->bukti_bank_garansi_pengadaan) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Bank Garansi</a></li>
                                                @endif
                                                @if ($barmol->nilai_surety_bond_pengadaan != null)
                                                    <li><a href="#" class="view-pdf" data-url="{{ Storage::url($barmol->bukti_surety_bond_pengadaan) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Surety Bond</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4 style='font-weight: bold;'>5. Sumber Dana DPA</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-4">
                                        <label for="dana-apbn" class="form-label">Nominal Dana APBN</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="dana-apbn"
                                            value="{{ $barmol->dana_apbn == null ? '-' : $barmol->dana_apbn }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="dana-apbd" class="form-label">Nominal Dana APBD</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="dana-apbd"
                                            value="{{ $barmol->dana_apbd == null ? '-' : $barmol->dana_apbd }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="dana-hibah" class="form-label">Nominal Dana Hibah</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="dana-hibah"
                                            value="{{ $barmol->dana_hibah == null ? '-' : $barmol->dana_hibah }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bentuk_pengadaan" class="form-label">Bentuk Pengadaan</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="bentuk_pengadaan"
                                            value="{{ $barmol->bentuk_pengadaan }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nilai-dpa" class="form-label">Nilai DPA</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nilai-dpa"
                                            value="{{ $barmol->nilai_dpa }}" readonly>
                                    </div>

                                    @php
                                        $filePaths = json_decode($barmol->bukti_dpa);
                                    @endphp

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                            <ul>
                                                @foreach ($filePaths as $filePath)
                                                    <li><a href="#" class="view-pdf" data-url="{{ Storage::url($filePath) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti DPA</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-4 my-4">
                                    <div class="col-sm-6">
                                        <a type="button" href="{{ route('pengerjaan-barmol-lead') }}"
                                            class="btn btn-secondary">Kembali</a>
                                    </div>

                                    <div class="col-sm-6 d-flex justify-content-end">
                                        @if ($barmol->status_pengerjaan == 'Diproses')
                                            <form action="{{ route('update-pengerjaan-barmol-lead', $barmol->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" name="ditolak" value="ditolak">Tolak</button>
                                                <button type="submit" class="btn btn-primary" name="disetujui" value="disetujui">Setujui</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Lampiran Bukti</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <embed id="pdfEmbed" src="" type="application/pdf" width="100%" height="600px" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('pdfModal');
            var pdfEmbed = document.getElementById('pdfEmbed');
            
            document.querySelectorAll('.view-pdf').forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    var url = this.getAttribute('data-url');
                    pdfEmbed.setAttribute('src', url);
                });
            });
    
            // Reset the src of the embed when the modal is hidden (optional)
            modal.addEventListener('hidden.bs.modal', function () {
                pdfEmbed.setAttribute('src', '');
            });
        });
    </script>    
@endsection
