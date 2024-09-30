@extends('lead.layouts.app')

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
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-pimpinan') }}">Home</a></li>
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
                                <table id="user" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Nama</th>
                                            <th>Keperluan</th>
                                            <th class="text-center">Jumlah Biaya</th>
                                            <th class="text-center">Tujuan</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perjadin as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->nomor_surat }}</td>
                                                <td>{{ $p->user->nama }}</td>
                                                <td>{{ $p->keperluan_perjadin }}</td>
                                                <td>{{ $p->jumlah_biaya }}</td>
                                                <td class="text-center">{{ $p->regency->name }} , {{ $p->province->name }}</td>
                                                <td>
                                                    @if($p->status == 'Diproses')
                                                        <span class="badge badge-warning">Diproses</span>
                                                    @elseif($p->status == 'Disetujui')
                                                        <span class="badge badge-success">Disetujui</span>
                                                    @elseif($p->status == 'Ditolak')
                                                        <span class="badge badge-danger">Ditolak</span>
                                                    @else
                                                        <span class="badge badge-secondary">{{ $p->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div style="display: flex; justify-content: space-between;">
                                                        <!-- Tombol Edit di sebelah kiri -->
                                                        <a href="{{ url('dashboard-pimpinan/pengajuan-perjalanan-dinas/' . $p->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        
                                                        <!-- Form Delete di sebelah kanan -->
                                                        <form action="#" method="POST" style="display:inline;" id="deleteForm{{ $p->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger deleteUser btn-sm" data-id="{{ $p->id }}">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Nama</th>
                                            <th>Keperluan</th>
                                            <th>Jumlah Biaya</th>
                                            <th>Tujuan</th>
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
