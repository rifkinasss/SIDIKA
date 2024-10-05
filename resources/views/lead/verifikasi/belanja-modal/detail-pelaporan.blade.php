@extends('lead.layouts.app')

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pelaporan Belanja Modal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('pimpinan') }}">Home</a></li>
                            <li class="breadcrumb-item">Belanja Modal</li>
                            <li class="breadcrumb-item active">Pelaporan Belanja Modal</li>
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
                                <h4 style='font-weight: bold;'>1. Sistem Pelaporan Monitoring Kontrak (SPMK)</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-6">
                                        <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nama-lengkap"
                                            value="{{ $barmol->user->nama }}" readonly>
                                        
                                        <label for="nomor-spmk" class="form-label">Nomor Dokumen SPMK</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nomor-spmk"
                                            value="{{ $barmol->nomor_spmk }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="nip" value="{{ $barmol->user->nip }}" readonly>
                                        
                                        <label for="tanggal-spmk" class="form-label">Tanggal</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="tanggal-spmk" value="{{ \Carbon\Carbon::parse($barmol->tgl_spmk)->format('d M Y') }}" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                            <ul>
                                                <li><a href="#" class="view-pdf" data-url="{{ Storage::url($barmol->bukti_spmk) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Laporan SPMK</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <h4 style='font-weight: bold;'>2. Provisional Hand Over (PHO)</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-6">
                                        <label for="nomor-pho" class="form-label">Nomor Dokumen PHO</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nomor-pho"
                                            value="{{ $barmol->nomor_pho }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="tanggal" value="{{ \Carbon\Carbon::parse($barmol->tgl_pho)->format('d M Y') }}" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                            <ul>
                                                <li><a href="#" class="view-pdf" data-url="{{ Storage::url($barmol->bukti_pho) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Laporan PHO</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4 style='font-weight: bold;'>3. Berita Acara Serah Terima (BAST)</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-4">
                                        <label for="nomor-bast" class="form-label">Nomor Dokumen BAST</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nomor-bast"
                                            value="{{ $barmol->nomor_bast }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="tanggal" value="{{ \Carbon\Carbon::parse($barmol->tgl_bast)->format('d M Y') }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nilai-bast" class="form-label">Nilai BAST</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="nilai-bast" value="{{ $barmol->nilai_bast }}" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                            <ul>
                                                <li><a href="#" class="view-pdf" data-url="{{ Storage::url($barmol->bukti_bast) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Laporan BAST</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4 style='font-weight: bold;'>4. Final Hand Over (FHO)</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-6">
                                        <label for="nomor-fho" class="form-label">Nomor Dokumen FHO</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nomor-fho"
                                            value="{{ $barmol->nomor_fho }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="tanggal" value="{{ \Carbon\Carbon::parse($barmol->tgl_fho)->format('d M Y') }}" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                            <ul>
                                                <li><a href="#" class="view-pdf" data-url="{{ Storage::url($barmol->bukti_fho) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Laporan FHO</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <h4 style='font-weight: bold;'>5. Surat Perintah Pencairan Dana (SP2D)</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-4">
                                        <label for="nomor-sp2d" class="form-label">Nomor Dokumen SP2D</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nomor-sp2d"
                                            value="{{ $barmol->nomor_sp2d }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="tanggal" value="{{ \Carbon\Carbon::parse($barmol->tgl_sp2d)->format('d M Y') }}" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nilai-sp2d" class="form-label">Nilai SP2D</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="nilai-sp2d" value="{{ $barmol->nilai_sp2d }}" readonly>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                            <ul>
                                                <li><a href="#" class="view-pdf" data-url="{{ Storage::url($barmol->bukti_sp2d) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Laporan SP2D</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-4 my-4">
                                    <div class="col-sm-6">
                                        <a type="button" href="{{ route('pelaporan-barmol-lead') }}"
                                            class="btn btn-secondary">Kembali</a>
                                    </div>

                                    <div class="col-sm-6 d-flex justify-content-end">
                                        @if ($barmol->status_lapor == 'Diproses')
                                            <form action="{{ route('update-pelaporan-barmol-lead', $barmol->id) }}" method="POST" style="display:inline;">
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
