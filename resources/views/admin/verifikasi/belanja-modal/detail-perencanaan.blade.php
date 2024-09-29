@extends('admin.layouts.app')

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Perencanaan Belanja Modal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-admin') }}">Home</a></li>
                            <li class="breadcrumb-item">Belanja Modal</li>
                            <li class="breadcrumb-item active">Perencanaan Belanja Modal</li>
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
                                <h4 style='font-weight: bold;'>1. Proposal & Surat Permohonan Belanja Modal</h4>
                                <div class="row mx-4 my-4 align-items-start">
                                    <div class="col-md-6">
                                        <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="nama-lengkap"
                                            value="{{ $barmol->user->nama }}" readonly>
                                        
                                        <label for="latar-belakang" class="form-label">Latar Belakang</label>
                                        <textarea type="text" class="form-control rounded-0 mb-2" id="latar-belakang" rows="4" readonly>{{ $barmol->latar_belakang }}</textarea>
                                        
                                        <label for="deskripsi-kebutuhan" class="form-label">Deskripsi Kebutuhan</label>
                                        <textarea type="text" class="form-control rounded-0 mb-2" id="deskripsi-kebutuhan" rows="4" readonly>{{ $barmol->deskripsi_kebutuhan }}</textarea>

                                        <label for="estimasi-biaya" class="form-label">Estimasi Biaya</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="estimasi-biaya"
                                            value="{{ $barmol->estimasi_biaya }}" readonly>

                                            <label for="estimasi-biaya" class="form-label">Estimasi Biaya</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="estimasi-biaya"
                                            value="{{ $barmol->estimasi_biaya }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                            id="nip" value="{{ $barmol->user->nip }}" readonly>

                                        <label for="tujuan" class="form-label">Tujuan</label>
                                        <textarea type="text" class="form-control rounded-0 mb-2" id="tujuan" rows="4" readonly>{{ $barmol->tujuan }}</textarea>
                                        
                                        <label for="deskripsi-spesifikasi" class="form-label">Deskripsi dan Spesifikasi</label>
                                        <textarea type="text" class="form-control rounded-0 mb-2" id="deskripsi-spesifikasi" rows="4" readonly>{{ $barmol->deskripsi_spesifikasi }}</textarea>

                                        <label for="jns-belanja-modal" class="form-label">Jenis Belanja Modal</label>
                                        <input type="text" class="form-control rounded-0 mb-2" id="jns-belanja-modal"
                                            value="{{ $barmol->jns_belanja != 'Belanja Modal Lainnya' ? $barmol->jns_belanja : $barmol->lainnya }}" readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="bukti-surat-tugas" class="form-label">Bukti Surat
                                                Tugas</label>
                                            <embed src=""
                                                type="application/pdf" width="100%" height="600px" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mx-4 my-4">
                                    <div class="col-sm-6">
                                        <a type="button" href="{{ route('perencanaan-barang-modal') }}"
                                            class="btn btn-secondary">Kembali</a>
                                    </div>

                                    <div class="col-sm-6 d-flex justify-content-end">
                                        @if ($barmol->status == 'Diproses')
                                            <form
                                                action="{{-- route('perjadin.kirimNotifPimpinan', ['id' => $barmol->id]) --}}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-warning"
                                                    name="kirim_notif">Kirim Notifikasi</button>
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
@endsection
