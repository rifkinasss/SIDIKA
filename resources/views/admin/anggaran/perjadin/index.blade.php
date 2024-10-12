@extends('admin.layouts.app')

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Anggaran Biaya Perjalanan Dinas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Anggaran Perjalanan Dinas</li>
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
                                <h3 class="card-title">Anggaran Biaya Perjalanan Dinas</h3>
                            </div>
                            <div class="card-body">
                                <a href="#" data-toggle="modal" data-target="#uploadExcelModal"
                                    class="btn btn-primary text-white mb-3">
                                    <i class="bi bi-upload mr-2"></i> Ajukan Anggaran
                                </a>
                                <div class="modal fade" id="uploadExcelModal" tabindex="-1" role="dialog"
                                    aria-labelledby="uploadExcelModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="uploadExcelModalLabel">Anggaran Biaya
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('AjukanPerjadin') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="perjadin">Perjalanan Dinas</label>
                                                        <input type="text" class="form-control" id="perjadin"
                                                            name="anggaran_perjalanan_dinas" oninput="formatCurrency(this)">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tahun">Tahun Anggaran</label>
                                                        <input type="number" class="form-control" name="tahun_anggaran"
                                                            id="tahun" name="year" min="1900" max="2099"
                                                            maxlength="4" placeholder="YYYY">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Ajukan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table id="user" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Anggaran Perjalanan Dinas</th>
                                            <th>Belum digunakan</th>
                                            <th>Telah digunakan</th>
                                            <th>Tahun Anggaran</th>
                                            {{-- <th>Aksi</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($anggaran as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->anggaran_perjalanan_dinas }}</td>
                                                <td>{{ $blmpake }}</td>
                                                <td>{{ $sdhpake }}</td>
                                                <td>{{ $p->tahun_anggaran }}</td>
                                                {{-- <td>
                                                    <a href="{{ route('detail-perencanaan-barmod', $p->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <form action="#" method="POST" style="display:inline;"
                                                        id="deleteForm{{ $p->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger deleteUser btn-sm"
                                                            data-id="{{ $p->id }}">
                                                            <i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Anggaran Perjalanan Dinas</th>
                                            <th>Belum digunakan</th>
                                            <th>Telah digunakan</th>
                                            <th>Tahun Anggaran</th>
                                            {{-- <th>Aksi</th> --}}
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
