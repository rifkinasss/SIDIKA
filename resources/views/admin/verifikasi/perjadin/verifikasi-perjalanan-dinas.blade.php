@extends('admin.layouts.app')

@section('content-wrapper')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-5">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-7">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Perjalanan Dinas</li>
              <li class="breadcrumb-item active">Pengajuan Perjalanan Dinas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Pengajuan Perjalanan Dinas</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Nama Lengkap</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                @for ($i = 1; $i <= 20; $i++)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>NS{{ sprintf('%04d', $i) }}</td>
                    <td>Nama Lengkap {{ $i }}</td>
                    <td class="text-center">
                      @if ($i % 4 == 1)
                        <button type="button" class="btn btn-warning btn-sm">Pending</button>  
                      @elseif ($i % 4 == 2)
                        <button type="button" class="btn btn-success btn-sm">Approved</button>
                      @elseif ($i % 4 == 3)
                        <button type="button" class="btn btn-danger btn-sm">Declined</button>
                      @else
                        <button type="button" class="btn btn-secondary btn-sm">Unvalid Status</button>
                      @endif
                    </td>
                    <td>
                      <a href="#" class="btn btn-primary btn-sm">View</a>
                      <a href="#" class="btn btn-warning btn-sm">Edit</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                @endfor
              </tbody>
              <tfoot>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>

      </div>
    </section>
  </div>

@endsection
