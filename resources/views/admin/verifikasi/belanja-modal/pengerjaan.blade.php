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
                            <div class="card-header">
                                <h3 class="card-title">Pengerjaan Belanja Modal</h3>
                            </div>
                            <div class="card-body">
                                <table id="user" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Nama</th>
                                            <th>Jenis Belanja</th>
                                            <th>Estimasi Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barmol as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                @if ($p->nomor_surat == '')
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $p->nomor_surat }}</td>
                                                @endif
                                                <td>{{ $p->user->nama }}</td>
                                                @if ($p->jns_belanja == 'Belanja Modal Lainnya')
                                                    <td>{{ $p->lainnya }}</td>
                                                @else
                                                    <td>{{ $p->jns_belanja }}</td>
                                                @endif
                                                <td>{{ $p->estimasi_biaya }}</td>
                                                <td>{{ $p->status }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm viewButton"
                                                        data-id="{{ $p->id }}"
                                                        data-nomor-surat="{{ $p->nomor_surat }}"
                                                        data-nama="{{ $p->user->nama }}"
                                                        data-latar-belakang="{{ $p->latar_belakang }}"
                                                        data-jns-belanja="{{ $p->jns_belanja }}"
                                                        data-lainnya="{{ $p->lainnya }}"
                                                        data-estimasi-biaya="{{ $p->estimasi_biaya }}"
                                                        data-tujuan="{{ $p->tujuan }}"
                                                        data-deskripsi-kebutuhan="{{ $p->deskripsi_kebutuhan }}"
                                                        data-tgl-mulai="{{ $p->tgl_mulai }}"
                                                        data-tgl-selesai="{{ $p->tgl_selesai }}"
                                                        data-durasi="{{ $p->durasi }}"
                                                        data-deskripsi-spesifikasi="{{ $p->deskripsi_spesifikasi }}">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    <form action="#{{-- route('perjadin.destroy', ['id' => $p->id]) --}}" method="POST"
                                                        style="display:inline;" id="deleteForm{{ $p->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger deleteUser btn-sm"
                                                            data-id="{{ $p->id }}">
                                                            <i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Nama</th>
                                            <th>Jenis Belanja</th>
                                            <th>Estimasi Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
