@extends('pegawai.layouts.app')

@section('content')
  {{-- Breadcrumb --}}
  <div class="container-fluid px-4 py-4 bg-transparent">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Home</a></li>
            <li class="breadcrumb-item">Belanja Modal</li>
            <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Ketentuan Belanja Modal</u></span></li>
        </ol>
    </nav>
    <div class="row">
      <h1>Ketentuan Belanja Modal</h1>
      <span>07/07/2024 16:01 WITA</span>
      <div class="col-md-8 mt-2 align-self-start">
        <div class="row">
          <div class="col-1">
            <img src="{{ asset('assets/img/miles1x1.jpeg') }}" alt="Profile" class="rounded-circle" style="width: 50px;">
          </div>
          <div class="col">
            <span><b>Faiq Athari</b></span>
            <p>Admin</p>
          </div>
        </div>
        <div class="text-center">
          <img src="{{ asset('assets/img/belanja-modal.jpeg ') }}" class="img-fluid rounded-0 mt-4">
        </div>
        <h6 class="mt-2 text-center"><i>gambar 1. ilustrasi belanja modal</i></h6>
        <section class="ms-4 mt-4">
          <div class="accordion" id="accordionPanelsStayOpenExample">
            <!-- Pengertian -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                  Pengertian
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                  <p>Belanja Modal adalah pengeluaran anggaran yang digunakan untuk memperoleh aset tetap dan aset lainnya yang memberikan manfaat lebih dari satu periode akuntansi.</p>
                </div>
              </div>
            </div>
            
            <!-- Dasar Hukum -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                  Dasar Hukum
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                  <ol>
                    <li>Undang-Undang Nomor 1 Tahun 2004 tentang Perbendaharaan Negara.</li>
                    <li>Peraturan Pemerintah Nomor 71 Tahun 2010 tentang Standar Akuntansi Pemerintahan.</li>
                    <li>Peraturan Menteri Keuangan Nomor 213/PMK.05/2013 tentang Sistem Akuntansi dan Pelaporan Keuangan Pemerintah Pusat.</li>
                  </ol>
                </div>
              </div>
            </div>
            
            <!-- Jenis Belanja Modal -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                  Jenis Belanja Modal
                </button>
              </h2>
              <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                  <ol>
                    <li>Belanja Modal Tanah: Pengeluaran untuk pembelian tanah.</li>
                    <li>Belanja Modal Peralatan dan Mesin: Pengeluaran untuk pembelian alat dan mesin yang bernilai tinggi.</li>
                    <li>Belanja Modal Gedung dan Bangunan: Pengeluaran untuk pembangunan gedung dan bangunan baru.</li>
                    <li>Belanja Modal Jalan, Irigasi, dan Jaringan: Pengeluaran untuk pembangunan infrastruktur.</li>
                    <li>Belanja Modal Aset Tetap Lainnya: Pengeluaran untuk pembelian aset tetap lainnya yang tidak termasuk dalam kategori di atas.</li>
                  </ol>
                </div>
              </div>
            </div>
            
            <!-- Proses Penganggaran -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                  Proses Penganggaran
                </button>
              </h2>
              <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                <div class="accordion-body">
                  <p>Proses penganggaran belanja modal melibatkan beberapa tahapan, yaitu:</p>
                  <ol>
                    <li>Perencanaan: Menyusun rencana kebutuhan dan pengadaan aset.</li>
                    <li>Penganggaran: Mengalokasikan dana untuk pengadaan aset dalam APBN/APBD.</li>
                    <li>Pelaksanaan: Melaksanakan pengadaan aset sesuai dengan anggaran yang telah ditetapkan.</li>
                    <li>Pelaporan: Melaporkan penggunaan dana dan aset yang telah diperoleh.</li>
                  </ol>
                </div>
              </div>
            </div>
            
            <!-- Manfaat Belanja Modal -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                  Manfaat Belanja Modal
                </button>
              </h2>
              <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
                <div class="accordion-body">
                  <p>Belanja modal memiliki beberapa manfaat, antara lain:</p>
                  <ul>
                    <li>Meningkatkan kualitas pelayanan publik.</li>
                    <li>Meningkatkan efisiensi dan efektivitas operasional pemerintah.</li>
                    <li>Mendukung pembangunan infrastruktur yang berkelanjutan.</li>
                    <li>Mendorong pertumbuhan ekonomi daerah dan nasional.</li>
                  </ul>
                </div>
              </div>
            </div>
            
            <!-- Pemantauan dan Evaluasi -->
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                  Pemantauan dan Evaluasi
                </button>
              </h2>
              <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingSix">
                <div class="accordion-body">
                  <p>Pemantauan dan evaluasi belanja modal dilakukan untuk memastikan bahwa:</p>
                  <ul>
                    <li>Pengadaan aset dilakukan sesuai dengan peraturan yang berlaku.</li>
                    <li>Aset yang diperoleh memberikan manfaat sesuai dengan tujuan penganggaran.</li>
                    <li>Tidak terjadi pemborosan atau penyalahgunaan anggaran.</li>
                  </ul>
                  <p>Proses ini melibatkan berbagai pihak, termasuk auditor internal dan eksternal, serta masyarakat sebagai penerima manfaat.</p>
                </div>
              </div>
            </div>
          </div>
                  </section>


      </div>
      <div class="col-md-4 align-self-start">
        <div class="card rounded-0">
          <a href="/">
            <img src="{{ asset('assets/img/SIDIKA_Landscape.png') }}" class="card-img-top" alt="Logo SIDIKA">
          </a>
          <div class="card-body bg-third">
            <h5 class="card-title">Layanan Lainnya</h5>
            <p class="card-text">Cari tahu ketentuan layanan lainnya melalui akses link-link di bawah ini:</p>
            <ul class="list-group list-group-flush">
              <a href="" class="text-decoration-none">
              <li class="list-group-item bg-transparent">Ketentuan Perjalanan Dinas <div class="float-end"><i class="bi bi-chevron-right"></i></div></li></a>
              <a href="" class="text-decoration-none"><li class="list-group-item bg-transparent">Ketentuan Belanja Barang Jasa <div class="float-end"><i class="bi bi-chevron-right"></i></div></li></li></a>
              <a href="" class="text-decoration-none"><li class="list-group-item bg-transparent">Bantuan Pengguna <div class="float-end"><i class="bi bi-chevron-right"></i></div></li></li></a>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection