@extends('./.admin.layouts.app')

@section('content-wrapper')
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
                            <li class="breadcrumb-item">Perjalanan Dinas</li>
                            <li class="breadcrumb-item active">Pelaporan Perjalanan Dinas</li>
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
@endsection

<thead>
    <tr>
        <th>
            <b>No</b>
        </th>
        <th>
            <b>Nama Lengkap</b>
        </th>
        <th>
            <b>Jenis Belanja Barang</b>
        </th>
        <th>
            <b>Nilai Kontrak</b>
        </th>
        <th class="text-center">
            <b>Status</b>
        </th>
        <th class="text-center">
            <b>Status Pekerjaan</b>
        </th>
        <th class="text-center">
            <b>Masa Berlaku</b>
        </th>
        <th>
            <b>Action</b>
        </th>
    </tr>
</thead>
