@extends('pegawai.layouts.app')

@section('content')
    {{-- Breadcrumb --}}
    <div class="container-fluid px-4 py-4 bg-transparent">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item">Perjalanan Dinas</li>
                <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Ketentuan Perjalanan
                            Dinas</u></span></li>
            </ol>
        </nav>
        <div class="row">
            <h1>Ketentuan Perjalanan Dinas Dalam Negeri</h1>
            <div class="col-md-8 mt-2 align-self-start">
                <section class="ms-4 mt-4">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <!-- Pengertian -->
                        <div class="accordion-item rounded-0">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    <b>1. Pengertian</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <p><b>Perjalanan Dinas Dalam Negeri</b> yang selanjutnya disebut Perjalanan Dinas adalah
                                        perjalanan ke luar Tempat
                                        Kedudukan yang dilakukan dalam wilayah Republik Indonesia untuk kepentingan negara.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Dasar Hukum -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                    <b>2. Dasar Hukum</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <ol>
                                        <li>Peraturan Menteri Keuangan Nomor <a
                                                href="https://jdih.kemenkeu.go.id/FullText/2012/113~PMK.05~2012Per.HTML">113/PMK.05/2012</a>
                                            tentang Perjalanan Dinas dalam Negeri Bagi Pejabat Negara, Pegawai Negeri, dan
                                            Pegawai Tidak Tetap.</li>
                                        <li>Peraturan Dirjen Perbendaharaan Nomor <a
                                                href="https://docs.google.com/file/d/0B4SmxalHHKKdcjZEb0JaZXEteHc/edit?resourcekey=0-aE2Bi_prwJv71qlBcYs3fw">PER-22/PB/2013</a>
                                            tentang Ketentuan Lebih Lanjut Pelaksanaan Perjalanan Dinas Dalam Negeri bagi
                                            Pejabat Negara, Pegawai Negeri, dan Pegawai Tidak Tetap.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Jenis Perjalanan Dinas -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                    <b>3. Jenis Perjalanan Dinas</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <ol>
                                        <li><b>Perjalanan Dinas Jabatan</b> adalah Perjalanan Dinas melewati batas Kota
                                            dan/atau dalam Kota dari tempat kedudukan ke tempat yang dituju, melaksanakan
                                            tugas, dan kembali ke tempat kedudukan semula di dalam negeri.</li>
                                        <li><b>Perjalanan Dinas Pindah</b> adalah Perjalanan Dinas dari tempat kedudukan
                                            yang lama ke tempat kedudukan yang baru berdasarkan surat keputusan pindah.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Prinsip Perjadin -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseFour">
                                    <b>4. Prinsip Perjadin</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingFour">
                                <div class="accordion-body">
                                    <ol>
                                        <li>kepastian tidak terdapat pelaksanaan Perjalanan Dinas yang tumpang tindih atau
                                            rangkap;</li>
                                        <li>tidak terdapat pelaksanaan Perjalanan Dinas yang dipecah-pecah apabila suatu
                                            kegiatan dapat dilaksanakan secara sekaligus dengan sasaran peserta, tempat
                                            tujuan, dan kinerja yang dihasilkan sama;</li>
                                        <li>Perjalanan Dinas hanya dilaksanakan oleh Pelaksana SPD yang memang benar-benar
                                            diharapkan memberikan kontribusi nyata dalam hasil yang akan dicapai;</li>
                                        <li>tidak terdapat Perjalanan Dinas keluar kantor untuk kegiatan yang seharusnya
                                            dapat dilakukan di kantor;</li>
                                        <li>mengutamakan pencapaian kinerja dengan pagu anggaran yang telah tersedia.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Ketentuan Penggantian Biaya Perjadin -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseFive">
                                    <b>5. Ketentuan Penggantian Biaya Perjadin</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingFive">
                                <div class="accordion-body">
                                    <ol>
                                        <li>Secara Filosofis, Perjalanan Dinas merupakan salah satu wujud belanja negara
                                            yang memerlukan mobilitas pegawai dalam pencapaian output suatu kegiatan,
                                            sehingga negara berkewajiban <b>mengganti apa yang dikeluarkan</b> oleh pegawai
                                            selama mobilisasi dalam mencapai output dimaksud, <b>bukan sebagai unsur
                                                penambah penghasilan (pelaksana SPD tidak harus diuntungkan namun tidak
                                                dirugikan)</b>.</li>
                                        <li>Setiap penggantian biaya seyogyanya didukung bukti yang sah untuk menjaga
                                            prinsip akuntabilitas.</li>
                                        <li>Peran <b>PPK</b> dalam justifikasi penggantian biaya perjadin sangat diperlukan
                                            dalam menjaga prinsip-prinsip yang disebutkan di atas, terutama pada komponen
                                            SPPD yang <b>terpaksa</b> tanpa bukti.</li>
                                        <li>Setiap biaya yang tidak tersedia buktinya, pelaksana perjadin harus paham atas
                                            risiko temuan auditor yang menyebabkan pengembalian ke kas negara jika bukti
                                            untuk justifikasi PPK dimaksud tidak cukup kuat.</li>
                                        <li><b>PPK berwenang untuk menilai kesesuaian dan kewajaran atas biaya-biaya yang
                                                tercantum dalam daftar pengeluaran. Pasal 35 (2) PMK 113/2012</b></li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Komponen Perjadin -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseSix">
                                    <b>6. Komponen Perjadin</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingSix">
                                <div class="accordion-body">
                                    <ol>
                                        <li><b>uang harian</b>: Terdiri atas u.makan, u.transpor lokal, u.saku dan
                                            dibayarkan secara lumpsum dan merupakan batas tertinggi sebagaimana diatur dalam
                                            PMK SBM</li>
                                        <li><b>biaya transpor</b>: dibayarkan sesuai dengan Biaya Riil. (Khusus transpor
                                            kegiatan dalam kab/kota dapat dibayarkan lumpsum sesuai SBM)</li>
                                        <li><b>biaya penginapan</b>: dibayarkan sesuai dengan Biaya Riil dan berpedoman pada
                                            PMK SBM</li>
                                        <li><b>uang representasi</b>: dapat diberikan kepada Pejabat Negara, Pejabat Eselon
                                            I, dan Pejabat Eselon II selama melakukan Perjalanan Dinas dalam rangka
                                            pelaksanaan tugas dan fungsi yang melekat pada jabatan</li>
                                        <li><b>sewa kendaraan dalam Kota</b>: dibayarkan sesuai dengan Biaya Riil dan
                                            berpedoman pada PMK SBM (<b><i>Syarat pada PMK SBM</i></b>: Pejabat Negara atau
                                            Pelaksanaan kegiatan yang membutuhkan mobilitas tinggi, berskala besar, dan
                                            tidak tersedia kendaraan dinas serta dilakukan secara selektif dan efisien)</li>
                                        <li><b>biaya menjemput/mengantar jenazah</b>: Pemetian dan Pengangkutan jenazah
                                            termasuk yang berhubungan dengan pengruktian/pengurusan jenazah dibayarkan
                                            sesuai dengan Biaya Riil</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Biaya Tol Perjadin -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseSeven">
                                    <b>7. Biaya Tol Perjadin</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingSeven">
                                <div class="accordion-body">
                                    <ol>
                                        <li>Sesuai dengan PMK nomor 113/PMK.05/2012, perjalanan dinas yang menggunakan moda
                                            transportasi <b>Kendaraan Dinas</b> tidak diberikan biaya transportasi</li>
                                        <li>Untuk biaya yang timbul dari perjalanan dinas menggunakan kendaraan dinas
                                            tersebut (biaya bahan bakar minyak, dan biaya tol) <b>dapat dibebankan kepada
                                                biaya perawatan kendaraan dinas (523112)</b></li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Penggantian Biaya Penginapan -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseEight">
                                    <b>8. Penggantian Biaya Penginapan</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingEight">
                                <div class="accordion-body">
                                    <ol>
                                        <li>Dalam hal Pelaksana SPD tidak menggunakan biaya penginapan, diberikan biaya
                                            penginapan sebesar <b>30% (tiga puluh persen) dari tarif hotel di Kota Tempat
                                                Tujuan</b>.</li>
                                        <li>Biaya penginapan <b>dapat diberikan</b> sebesar 30% dari SBM tarif hotel di Kota
                                            Tempat Tujuan, dengan ketentuan:
                                            <ol type="a">
                                                <li>tidak terdapat hotel atau tempat menginap lainnya, sehingga Pelaksana
                                                    SPD menginap di tempat menginap yang tidak menyediakan kuitansi/bukti
                                                    biaya penginapan;</li>
                                                <li>terdapat hotel atau tempat menginap lainnya, namun Pelaksana SPD tidak
                                                    menginap di hotel atau tempat menginap lainnya tersebut.</li>
                                            </ol>
                                        </li>
                                        <li>Sesuai Pasal 13 ayat (3) Per-22/PB/2013, Biaya penginapan sebesar 30% <b>tidak
                                                diberikan untuk</b>:
                                            <ol type="a">
                                                <li>Perjalanan Dinas Jabatan dalam Kota lebih dari 8 (delapan) jam yang
                                                    dilaksanakan pergi dan pulang dalam hari yang sama;</li>
                                                <li>Perjalanan Dinas Jabatan untuk mengikuti rapat, seminar, dan sejenisnya
                                                    yang dilaksanakan dengan paket meeting fullboard; dan</li>
                                                <li>Perjadin Jabatan untuk mengikuti pendidikan dan pelatihan.</li>
                                            </ol>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <!-- Pelaksanaan Perjadin -->
                        <div class="accordion-item rounded-0">
                            <h2 class="accordion-header" id="panelsStayOpen-headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseNine">
                                    <b>9. Pelaksanaan Perjadin</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingNine">
                                <div class="accordion-body">
                                    <ol>
                                        <li>Dalam hal pelaksanaan Perjalanan Dinas diselenggarakan dalam rangka rapat,
                                            seminar, dan sejenisnya dengan beban biaya oleh satuan kerja penyelenggara,
                                            penerbitan SPD dapat dibuat secara kolektif dengan melampirkan daftar peserta
                                            yang telah disahkan oleh PPK pada satuan kerja penyelenggara.</li>
                                        <li>Uang saku rapat dapat diberikan kepada peserta rapat yang diselenggarakan di
                                            dalam kantor di luar jam kerja sebagaimana dimaksud dalam Pasal 6 ayat (2) huruf
                                            c.</li>
                                        <li>Uang saku rapat sebagaimana dimaksud pada ayat (1), diberikan sesuai ketentuan
                                            dalam Peraturan Menteri Keuangan mengenai Standar Biaya.</li>
                                        <li>Pemberian uang saku rapat sebagaimana dimaksud pada ayat (1), selain mengikuti
                                            ketentuan dalam Peraturan Menteri Keuangan mengenai Standar Biaya, diberikan
                                            sepanjang memenuhi ketentuan sebagai berikut: dilaksanakan minimal 4 (empat) jam
                                            di luar jam kerja tidak diberikan uang lembur dan uang makan lembur.</li>
                                        <li>Satu orang peserta rapat hanya berhak mendapatkan uang saku rapat satu kali
                                            dalam satu hari.</li>
                                        <li>Uang saku rapat hanya dapat dibayarkan untuk rapat yang diselenggarakan diluar
                                            jam kerja pada hari kerja satuan kerja bersangkutan.</li>
                                    </ol>
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
                                <li class="list-group-item bg-transparent">Ketentuan Belanja Modal <div class="float-end">
                                        <i class="bi bi-chevron-right"></i>
                                    </div>
                                </li>
                            </a>
                            <a href="" class="text-decoration-none">
                                <li class="list-group-item bg-transparent">Ketentuan Belanja Barang Jasa <div
                                        class="float-end"><i class="bi bi-chevron-right"></i></div>
                                </li>
                                </li>
                            </a>
                            <a href="" class="text-decoration-none">
                                <li class="list-group-item bg-transparent">Bantuan Pengguna <div class="float-end"><i
                                            class="bi bi-chevron-right"></i></div>
                                </li>
                                </li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
