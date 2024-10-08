@extends('lead.layouts.app')

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
                            <li class="breadcrumb-item"><a href="{{ url('pimpinan') }}">Home</a></li>
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
                                            <th>Progres</th>
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
                                                <td class="text-center">{{ $p->persentase }}%</td>
                                                <td>{{ $p->status_pengerjaan }}</td>
                                                <td>
                                                    @if ($p->persentase == 100)
                                                        <a href="{{ route('detail-pengerjaan-barmol-lead', $p->id) }}"
                                                            class="btn btn-warning btn-sm">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>
                                                        <form action="#{{-- route('perjadin.destroy', ['id' => $p->id]) --}}" method="POST"
                                                            style="display:inline;" id="deleteForm{{ $p->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger deleteUser btn-sm"
                                                                data-id="{{ $p->id }}">
                                                                <i class="bi bi-trash"></i></button>
                                                        </form>
                                                    @endif
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
                                            <th>Progres</th>
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
