@extends('admin.layouts.app')

@section('content-wrapper')
<<<<<<< HEAD
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pengerjaan Belanja Barang Jasa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-admin') }}">Home</a></li>
                            <li class="breadcrumb-item">Belanja Barang Jasa</li>
                            <li class="breadcrumb-item active">Pengerjaan Belanja Barang Jasa</li>
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
                                <h3 class="card-title">Pengerjaan Belanja Barang Jasa</h3>
                            </div>
                            <div class="card-body">
                                <table id="user" class="table table-bordered table-hover">
                                    <thead>
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
                                    </thead>
                                    <tbody>
                                        @foreach ($barjas as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $p->nomor_surat }}</td>
                                                <td>{{ $p->user->nama }}</td>
                                                <td>{{ $p->keperluan_perjadin }}</td>
                                                <td>{{ $p->jumlah_dibayarkan }}</td>
                                                <td>{{ $p->kota_kab }}</td>
                                                <td>{{ $p->status }}</td>
                                                <td>
                                                    <a href="{{ route('perjadin.edit', ['id' => $p->id]) }}"
                                                        class="btn btn-warning btn-sm"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <form action="{{ route('perjadin.destroy', ['id' => $p->id]) }}"
                                                        method="POST" style="display:inline;"
                                                        id="deleteForm{{ $p->id }}">
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
=======
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Belanja Barang Barang Jasa</li>
              <li class="breadcrumb-item active">Pengerjaan Belanja Barang Barang Jasa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      </div>
    </section>
  </div>
>>>>>>> 5e4032ed4a40664b5d8cfdb1bcee999cd326c77a
@endsection
