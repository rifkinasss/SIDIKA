@extends('pegawai.layouts.app')

@section('content')
  {{-- hero section --}}
  <div class="container-fluid bg-third">
    <div class="row">
      <div class="col align-self-center">
        <h2 class="text-first m-4"><b>PERJALANAN DINAS LEBIH MUDAH DENGAN SIDIKA</b></h2>
        <p class="m-4"><span class="text-second inknut-antiqua">SIDIKA</span> adalah website khusus yang dibuat untuk membantu melayani perjalanan dinas, belanja modal, dan belanja barang dan jasa.</p>
      </div>
      <div class="col-sm-7 align-self-end">
        <img src="{{ asset('images/perjadin-landscape2.jpeg ')}}" class="img-fluid">
      </div>
    </div>
  </div>

  {{-- heading divider --}}
  <div class="container-fluid bg-second text-center">
    <div class="p-4">
      <h2 class="text-third">
        PANDUAN PENGGUNAAN WEBSITE
      </h2>
    </div>
  </div>

  {{-- website usage guide section --}}
  <div class="container-fluid bg-first text-third">
    <div class="row">
      <div class="col py-4 my-4">
        <h3 class="text-third mx-4 mt-4">Apa yang SIDIKA bisa bantu?</h3>
        <p class="text-third mx-4 my-4">di bagian ini anda dapat mengakses informasi mengenai ketentuan, panduan, dan bantuan jika terjadi kendala selama menggunakan website SIDIKA.</p>
      </div>
      <div class="col-lg-7 my-4">
        <div class="my-4">
          <div class="mx-4">
            <a href="#" class="mx-2 my-4 h-5 text-third text-decoration-none">Ketentuan Perjalanan Dinas<div class="float-end"><i class="bi bi-chevron-right"></i></div></a>
            <hr>
          </div>
          <div class="mx-4">
            <a href="#" class="mx-2 my-4 h-5 text-third text-decoration-none">Ketentuan Belanja Modal<div class="float-end"><i class="bi bi-chevron-right"></i></div></a>
            <hr>
          </div>
          <div class="mx-4">
            <a href="#" class="mx-2 my-4 h-5 text-third text-decoration-none">Ketentuan Belanja Barang Jasa<div class="float-end"><i class="bi bi-chevron-right"></i></div></a>
            <hr>
          </div>
          <div class="mx-4">
            <a href="#" class="mx-2 my-4 h-5 text-third text-decoration-none">Bantuan Pengguna<div class="float-end"><i class="bi bi-chevron-right"></i></div></a>
            <hr>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid bg-third pb-4">
    <div class="row">
      <div class="col py-4 mt-4">
        <h2 class="text-dark mx-4 mt-4"><b>TABEL RIWAYAT</b></h2>
        <p class="text-first mx-4 my-4">Disini anda dapat melihat layanan-layanan yang telah anda ajukan, disetujui, ditolak, serta yang harus anda laporkan progressnya lebih lanjut.</p>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card rounded-0 mx-4">
          <div class="card-header rounded-0 bg-first">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link rounded-0" data-bs-toggle="tab" href="#perjalanan-dinas"><b>Perjalanan Dinas</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded-0" data-bs-toggle="tab" href="#pelaporan-perjalanan-dinas"><b>Pelaporan Perjalanan Dinas</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded-0" data-bs-toggle="tab" href="#belanja-modal"><b>Belanja Modal</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link rounded-0" data-bs-toggle="tab" href="#belanja-barang-jasa"><b>Belanja Barang Jasa</b></a>
              </li>
            </ul>
          </div>
          <div class="card">
            <div class="card-body tab-content">
              <!-- Perjalanan Dinas Tab -->
              <div id="perjalanan-dinas" class="tab-pane fade show active">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Rendering engine</th>
                      <th>Browser</th>
                      <th>Platform(s)</th>
                      <th>Engine version</th>
                      <th>CSS grade</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Your table rows here -->
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
              <!-- Pelaporan Perjalanan Dinas Tab -->
              <div id="pelaporan-perjalanan-dinas" class="tab-pane fade">
                <!-- Content for Pelaporan Perjalanan Dinas -->
                <p>Content for Pelaporan Perjalanan Dinas.</p>
              </div>
              <!-- Belanja Modal Tab -->
              <div id="belanja-modal" class="tab-pane fade">
                <!-- Content for Belanja Modal -->
                <p>Content for Belanja Modal.</p>
              </div>
              <!-- Belanja Barang Jasa Tab -->
              <div id="belanja-barang-jasa" class="tab-pane fade">
                <!-- Content for Belanja Barang Jasa -->
                <p>Content for Belanja Barang Jasa.</p>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div>
  
  <script>
    $(document).ready(function () {
      $('#example2').DataTable({
        "paging": true,
        "pageLength": 5,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true
      });
    });
  </script>
@endsection