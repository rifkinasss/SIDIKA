@extends('admin.layouts.app')

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pengajuan Perjalanan Dinas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-admin') }}">Home</a></li>
                            <li class="breadcrumb-item">Perjalanan Dinas</li>
                            <li class="breadcrumb-item active">Pengajuan Perjalanan Dinas</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Pengajuan Perjalanan Dinas</h3>
                            </div>
                            <div class="card-body">
                                <form action="#">
                                    @csrf
                                    <div class="row mx-4 my-4 align-items-start">
                                        <div class="col-md-6">
                                            <label for="namalengkap" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control rounded-0 mb-2" id="namalengkap"
                                                value="{{ $detail_perjalanandinas->user->nama }}" readonly>
                                            <label for="nip" class="form-label">NIP</label>
                                            <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                                id="nip" value="{{ $detail_perjalanandinas->user->nip }}" readonly>
                                            <label for="tanggal-berangkat" class="form-label">Tanggal Berangkat -
                                                Kembali</label>
                                            <input class="form-control rounded-0 mb-2" type="text" id="tanggal-kembali"
                                                readonly
                                                value="{{ \Carbon\Carbon::parse($detail_perjalanandinas->tgl_berangkat)->format('d F') }} - {{ \Carbon\Carbon::parse($detail_perjalanandinas->tgl_kembali)->format('d F Y') }}" />
                                            <label for="jumlah-hari" class="form-label">Jumlah Hari</label>
                                            <input class="form-control rounded-0 mb-2" type="text"
                                                value="{{ $detail_perjalanandinas->jumlah_hari }} Hari" id="jumlah-hari"
                                                readonly />
                                            <label for="uang-harian" class="form-label">Uang Harian</label>
                                            <input class="form-control rounded-0 mb-2" type="text" id="uang-harian"
                                                value="{{ $detail_perjalanandinas->uang_harian }}" readonly />
                                            <label for="jumlah-uang-harian" class="form-label">Jumlah Uang Harian</label>
                                            <input class="form-control rounded-0 mb-2" type="text"
                                                id="jumlah-uang-harian"
                                                value="{{ $detail_perjalanandinas->jmlh_uang_harian }}" readonly />
                                            <label for="biaya-akomodasi" class="form-label">Biaya Akomodasi</label>
                                            <input class="form-control rounded-0 mb-2" type="text" id="biaya-akomodasi"
                                                value="{{ $detail_perjalanandinas->biaya_akomodasi }}" readonly />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jenis-perjadin" class="form-label">Jenis Perjalanan Dinas</label>
                                            <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                                id="jenis-perjadin" value="{{ $detail_perjalanandinas->jns_perjadin }}"
                                                readonly>
                                            <label for="keperluan" class="form-label">Keperluan Perjalanan Dinas</label>
                                            <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                                id="keperluan" value="{{ $detail_perjalanandinas->keperluan_perjadin }}"
                                                readonly>
                                            <label for="tujuan" class="form-label">Tujuan Perjalanan Dinas</label><br>
                                            <input type="text" class="form-control rounded-0 mb-2" maxlength="18"
                                                id="keperluan"
                                                value="{{ $detail_perjalanandinas->regency->name }} , {{ $detail_perjalanandinas->province->name }}"
                                                readonly>
                                            <label for="biaya-lain" class="form-label">Biaya lain /Kontribusi /Bantuan
                                                Transport
                                                (Jika
                                                ada)</label>
                                            <input class="form-control rounded-0 mb-2" type="text" id="biaya-lain"
                                                value="{{ $detail_perjalanandinas->biaya_lain }}" readonly />
                                            <label for="biaya-tiket-pp" class="form-label">Biaya Tiket Pulang-Pergi</label>
                                            <input class="form-control rounded-0 mb-2" type="text" id="biaya-tiket-pp"
                                                value="{{ $detail_perjalanandinas->biaya_tiket_pp }}" readonly />
                                            <label for="uang-representasi" class="form-label">Uang Representasi (jika
                                                ada)</label>
                                            <input class="form-control rounded-0 mb-2" type="text"
                                                id="uang-representasi"
                                                value="{{ $detail_perjalanandinas->uang_representasi }}" readonly />
                                            <label for="jumlah-biaya" class="form-label">Jumlah Biaya</label>
                                            <input class="form-control rounded-0 mb-2" type="text" id="jumlah-biaya"
                                                value="{{ $detail_perjalanandinas->jumlah_biaya }}" readonly />
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="bukti-surat-tugas" class="form-label">Bukti Surat
                                                    Tugas</label>
                                                <embed src="{{ asset($detail_perjalanandinas->bukti_surat_tugas) }}"
                                                    type="application/pdf" width="100%" height="600px" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mx-4 my-4">
                                        <div class="col-sm-6">
                                            <a type="button" href="{{ route('pengajuan') }}"
                                                class="btn btn-secondary">kembali</a>
                                        </div>
                                        <div class="col-sm-6 d-flex justify-content-end">
                                            @if ($detail_perjalanandinas->status == 'Diproses')
                                                <form
                                                    action="{{ route('perjadin.kirimNotifPimpinan', ['id' => $detail_perjalanandinas->id]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-warning"
                                                        name="kirim_notif">Kirim Notifikasi</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
