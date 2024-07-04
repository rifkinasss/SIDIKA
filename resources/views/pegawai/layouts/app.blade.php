<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- font cdn --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Inknut+Antiqua:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- data tables cdn css --}}
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-third sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><img src="{{ asset('/images/SIDIKA_rpl.png') }}" style="width: 140px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Perjalanan Dinas
            </a>
            <ul class="dropdown-menu rounded-0">
              <li><a class="dropdown-item" href="#">Ketentuan Perjalanan Dinas</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/perjadin">Pengajuan Perjalanan Dinas</a></li>
              <li><a class="dropdown-item" href="/pelaporan-perjadin">Pelaporan Perjalanan Dinas</a></li> 
              {{-- nanti kalau tabel udah ada di home gaperlu nav pelaporan --}}
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Belanja Modal
            </a>
            <ul class="dropdown-menu rounded-0">
              <li><a class="dropdown-item" href="#">Ketentuan Belanja Modal</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/perencanaan-belanja-modal">Perencanaan Belanja Modal</a></li>
              <li><a class="dropdown-item" href="/pengerjaan-belanja-modal">Pengerjaan Belanja Modal</a></li>
              <li><a class="dropdown-item" href="/pelaporan-belanja-modal">Pelaporan Belanja Modal</a></li>
              {{-- nanti kalau tabel udah ada di home gaperlu nav pengerjaan dan pelaporan --}}
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Barang Jasa
            </a>
            <ul class="dropdown-menu rounded-0">
              <li><a class="dropdown-item" href="#">Ketentuan Barang Jasa</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="/perencanaan-belanja-barjas">Pengajuan Barang Jasa</a></li>
              <li><a class="dropdown-item" href="/pengerjaan-belanja-modal">Pengerjaan Barang Jasa</a></li>
              <li><a class="dropdown-item" href="/pelaporan-belanja-modal">Pelaporan Barang Jasa</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/pegawai/bantuan">Bantuan</a>
          </li>
        </ul>
        <div id="profile" class="profile-large dropstart">
          <a class="btn dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
            <img src="{{ asset('images/miles1x1.jpeg') }}" alt="Profile" class="rounded-0" style="width: 50px; border-radius: 50%;">
          </a>
          <ul class="dropdown-menu dropdown-menu-start rounded-0">
            <li><a class="dropdown-item" href="/pegawai/profile"><i class="bi bi-gear-fill"></i> Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </div>
        <div id="profile-small" class="profile-small">
          <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('images/miles1x1.jpeg') }}" alt="Profile" class="rounded-0" style="width: 30px; border-radius: 50%;">
          </a>
          <ul class="dropdown-menu rounded-0">
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear-fill"></i> Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </div>      
      </div>
    </div>
  </nav>

  
  {{-- isi content --}}
  @yield('content')
  
  {{-- footer --}}
  <footer class="bg-light text-dark py-4 mt-4">
    <div class="container">
        <div class="row">
            <!-- Informasi Kontak -->
            <div class="col-md-6">
              <a class="navbar-brand my-4" href="https://disdik.jakarta.go.id"><img src="{{ asset('/images/dinas_pendidikan_jakarta.png') }}" style="width: 200px"></a>
              <h5>Dinas Pendidikan Provinsi DKI Jakarta</h5>
              <p>Jln. Jendral Gatot Subroto, Kav. 40-41, Jakarta Selatan<br>
                Telp. (021) 5255385</p>
              <!-- Peta Lokasi -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.62277719948!2d106.82517431530814!3d-6.208763695503848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1e3c5b4ed01b%3A0x17b2d637e1c0b9a8!2sJl.%20Contoh%20No.123%2C%20Jakarta!5e0!3m2!1sid!2sid!4v1615003956324!5m2!1sid!2sid" width="100%" height="125" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-md-2"></div>
            <!-- Link Eksternal -->
            <div class="col-md-4 mt-2">
                <h5>Link Eksternal :</h5>
                <ul class="list-unstyled">
                    <li><a href="https://id-id.facebook.com/disdikdkijakarta" class="text-first text-decoration-none"><i class="bi bi-facebook"></i> @disdikdkijakarta</a></li>
                    <li><a href="https://twitter.com/disdik_dki?lang=en" class="text-first text-decoration-none"><i class="bi bi-twitter"></i> @disdik_dki</a></li>
                    <li><a href="https://www.instagram.com/disdikdki/?hl=en" class="text-first text-decoration-none"><i class="bi bi-instagram"></i> @disdikdki</a></li>
                </ul>
                <p>Hak Cipta &copy; 2024 Dinas Pendidikan dan Kebudayaan Provinsi DKI Jakarta</p>
            </div>
        </div>
      </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  {{-- data tables cdn js --}}
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
</body>
</html>
