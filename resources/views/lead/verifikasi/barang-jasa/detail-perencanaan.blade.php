@extends('admin.layouts.app')

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Perencanaan Belanja Barang Jasa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-admin') }}">Home</a></li>
                            <li class="breadcrumb-item">Belanja Barang Jasa</li>
                            <li class="breadcrumb-item active">Perencanaan Belanja Barang Jasa</li>
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
                                <h4 style='font-weight: bold;'>1. Proposal & Surat Permohonan Belanja Barang Jasa</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-6">
                                        <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nama-lengkap"
                                            value="{{ $barjas->user->nama }}" readonly>
                                        
                                        <label for="latar-belakang" class="form-label">Latar Belakang</label>
                                        <textarea type="text" class="form-control rounded-0 mb-2" id="latar-belakang" rows="4" readonly>{{ $barjas->latar_belakang }}</textarea>
                                        
                                        <label for="deskripsi-kebutuhan" class="form-label">Deskripsi Kebutuhan</label>
                                        <textarea type="text" class="form-control rounded-0 mb-2" id="deskripsi-kebutuhan" rows="4" readonly>{{ $barjas->deskripsi_kebutuhan }}</textarea>

                                        <label for="jns-belanja-modal" class="form-label">Jenis Belanja Modal</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="jns-belanja-modal"
                                            value="{{ $barjas->jns_belanja != 'Belanja Barang Jasa Lainnya' ? $barjas->jns_belanja : $barjas->lainnya }}" readonly> 

                                        <label for="estimasi-biaya" class="form-label">Tanggal Mulai / Tanggal Selesai</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="estimasi-biaya"
                                            value="{{ \Carbon\Carbon::parse($barjas->tgl_mulai)->format('d M Y') .' / ' .\Carbon\Carbon::parse($barjas->tgl_selesai)->format('d M Y') }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="nip" value="{{ $barjas->user->nip }}" readonly>

                                        <label for="tujuan" class="form-label">Tujuan</label>
                                        <textarea type="text" class="form-control rounded-0 mb-2" id="tujuan" rows="4" readonly>{{ $barjas->tujuan }}</textarea>
                                        
                                        <label for="deskripsi-spesifikasi" class="form-label">Deskripsi dan Spesifikasi</label>
                                        <textarea type="text" class="form-control rounded-0 mb-2" id="deskripsi-spesifikasi" rows="4" readonly>{{ $barjas->deskripsi_spesifikasi }}</textarea>

                                        <label for="estimasi-biaya" class="form-label">Estimasi Biaya</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="estimasi-biaya"
                                            value="{{ $barjas->estimasi_biaya }}" readonly>

                                        <label for="estimasi-biaya" class="form-label">Durasi</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="estimasi-biaya"
                                        value="{{ $barjas->durasi }}" readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="lampiran-bukti" class="form-label">Lampiran Bukti</label>
                                            <ul>
                                                <li><a href="#" class="view-pdf" data-url="{{ Storage::url($barjas->dokumen_rab) }}" data-bs-toggle="modal" data-bs-target="#pdfModal">Lihat Bukti Dokkumen RAB</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-4 my-4">
                                    <div class="col-sm-6">
                                        <a type="button" href="{{ route('perencanaan-barjas-lead') }}"
                                            class="btn btn-secondary">Kembali</a>
                                    </div>

                                    <div class="col-sm-6 d-flex justify-content-end">
                                        @if ($barjas->status == 'Diproses')
                                            <form action="{{ route('update-perencanaan-barjas-lead', $barjas->id) }}" method="POST" style="display:inline;">
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
