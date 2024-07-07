@extends('pegawai.layouts.app')

@section('content')
  {{-- Breadcrumb --}}
  <div class="container-fluid py-4 px-4 pb-2 bg-transparent">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Home</a></li>
            <li class="breadcrumb-item">Perjalanan Dinas</li>
            <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Ketentuan Perjalanan
                        Dinas</u></span></li>
        </ol>
    </nav>
  </div>

  <div class="container-fluid px-4">
    <div class="card p-4 rounded-0">
      <div class="row align-items-center">
        <h1>KETENTUAN PERJALANAN DINAS DALAM NEGERI</h1>
        <span class="text-muted">06/07/2024 18:04 WITA</span>
        <div class="col-md-8 align-self-start">
          <div>
            <img src="{{ asset('assets/img/miles1x1.jpeg') }}" alt="Profile" class="rounded-circle"
            style="width: 50px;">
            <span class="ms-4">Faiq Athari</span>
          </div>
          <img src="{{ asset('assets/img/perjadin-landscape.jpeg ') }}" class="img-fluid rounded-0 mt-4">
          <h6 class="mt-2 text-center"><i>gambar 1. ilustrasi perjalanan dinas</i></h6>
          <p>Perjalanan Dinas Dalam Negeri yang selanjutnya disebut Perjalanan Dinas adalah perjalanan ke luar Tempat
            Kedudukan yang dilakukan dalam wilayah Republik Indonesia untuk kepentingan negara.</p>
        </div>
        <div class="col-md-4 align-self-start">
          <img src="{{ asset('assets/img/perjadin-landscape.jpeg ') }}" class="img-fluid rounded-0 mt-4">
        </div>
      </div>
    </div>
  </div>
@endsection