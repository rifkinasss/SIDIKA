@extends('admin.layouts.app')

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-admin') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $jmlhperjadin }}</h3>
                                <p>Perjalanan Dinas</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-airplane"></i>
                            </div>
                            <a href="{{ url('dashboard-admin/pengajuan-perjalanan-dinas') }}" class="small-box-footer">More
                                info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $jmlhpelaporan }}</h3>
                                <p>Pelaporan Perjalanan Dinas</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-file-earmark-text"></i>
                            </div>
                            <a href="{{ url('dashboard-admin/pelaporan-perjalanan-dinas') }}" class="small-box-footer">More
                                info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $jmlhbarmol }}</h3>
                                <p>Barang Modal</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-box-seam"></i>
                            </div>
                            <a href="{{ url('dashboard-admin/perencanaan-belanja-modal') }}" class="small-box-footer">More
                                info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $jmlhbarjas }}</h3>
                                <p>Barang Jasa</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-bag-check"></i>
                            </div>
                            <a href="{{ url('dashboard-admin/perencanaan-belanja-barjas') }}" class="small-box-footer">More
                                info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
