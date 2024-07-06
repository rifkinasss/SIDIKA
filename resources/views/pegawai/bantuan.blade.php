<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.62277719948!2d106.82517431530814!3d-6.208763695503848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1e3c5b4ed01b%3A0x17b2d637e1c0b9a8!2sJl.%20Contoh%20No.123%2C%20Jakarta!5e0!3m2!1sid!2sid!4v1615003956324!5m2!1sid!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
@extends('pegawai.layouts.app')

@section('content')
<style>
  body {
    background-color: #E6F4F1;
  }
</style>
  <div class="container-fluid py-4 px-4 pb-2 bg-transparent">
    {{-- breadcrumb --}}
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Bantuan</u></span></li>
      </ol>
    </nav>
  </div>

  <div class="container-fluid bg-transparent">
    <div class="card bg-light rounded-0 mb-4">
      <div class="row py-4 px-4">
        <h2>Hubungi Kami</h2>
        <hr>
        <p class="mt-4">
            Anda punya pertanyaan atau keluhan terkait kendala pada layanan aplikasi SIDIKA? Hubungi kami melalui
            email dan call center di bawah ini!
          </p>
          <ul style="list-style-type: none;">
              <li>
                <a href="mailto:bantuan.sidika@dinaspendidikan.go.id" class="text-decoration-none">
                      <i class="bi bi-envelope-at-fill"></i>
                      Email : bantuan.sidika@dinaspendidikan.go.id
                </a>
              </li>
              <li>
                <a href="tel:+0215255385" class="text-decoration-none">
                  <i class="bi bi-telephone-forward-fill"></i>
                  Telp. : (021) 5255385
                </a>
              </li>
          </ul>
        <p class="mt-4">
            Anda juga bisa mendapatkan lebih banyak informasi mengenai SIDIKA dari akun resmi media sosial SIDIKA
            berikut!
        </p>
        <ul style="list-style-type: none;">
            <li>
                <a href="https://id-id.facebook.com/disdikdkijakarta" class="text-decoration-none">
                    <i class="bi bi-twitter me-2"></i>
                    Twitter: @disdikdkijakarta</a>
            </li>
            <li>
                <a href="https://twitter.com/disdik_dki?lang=en" class="text-decoration-none">
                    <i class="bi bi-facebook me-2"></i>
                    Facebook: @disdik_dki</a>
            </li>
            <li>
                <a href="https://www.instagram.com/disdikdki/?hl=en" class="text-decoration-none">
                    <i class="bi bi-instagram me-2"></i>
                    Instagram: @disdikdki</a>
            </li>
        </ul>
    </div>
</div>

    {{-- Kantor --}}
    <div class="card bg-light rounded-0 my-4">
      <div class="row py-4 px-4">
        <h2>Alamat Kantor</h2>
        <hr>
        <h5 class="mb-2"><b>Dinas Pendidikan</b></h5>
        <h6><b>Pemerintah Provinsi DKI Jakarta</b></h6>
        <p>
            Jln. Jendral Gatot Subroto, Kav. 40-41,<br>
            Jakarta Selatan
        </p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.62277719948!2d106.82517431530814!3d-6.208763695503848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1e3c5b4ed01b%3A0x17b2d637e1c0b9a8!2sJl.%20Contoh%20No.123%2C%20Jakarta!5e0!3m2!1sid!2sid!4v1615003956324!5m2!1sid!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </div>
@endsection