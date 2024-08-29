@extends('pegawai.layouts.app')

@section('content')
    <div class="container-fluid bg-third">
        <div class="row">
            <div class="col align-self-center">
                <h2 class="text-first m-4"><b>PERJALANAN DINAS LEBIH MUDAH DENGAN SIDIKA</b></h2>
                <p class="m-4"><span class="text-second inknut-antiqua">SIDIKA</span> adalah website khusus yang dibuat
                    untuk membantu melayani perjalanan dinas, belanja modal, dan belanja barang dan jasa.</p>
            </div>
            <div class="col-sm-6 align-self-end">
                <img src="{{ asset('assets/img/perjadin-landscape2.jpeg ') }}" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <div class="container-fluid bg-second text-center">
        <div class="p-4">
            <h2 class="text-third">
                PANDUAN PENGGUNAAN WEBSITE
            </h2>
        </div>
    </div>
    <div class="container-fluid bg-first text-third">
        <div class="row">
            <div class="col py-4 my-4">
                <h3 class="text-third mx-4 mt-4">Apa yang SIDIKA bisa bantu?</h3>
                <p class="text-third mx-4 my-4">di bagian ini anda dapat mengakses informasi mengenai ketentuan, panduan,
                    dan bantuan jika terjadi kendala selama menggunakan website SIDIKA.</p>
            </div>
            <div class="col-lg-7 my-4">
                <div class="my-4">
                    <div class="mx-4">
                        <a href="{{ route('ketentuan-perjalanan-dinas') }}"
                            class="mx-2 my-4 h-5 text-third text-decoration-none">Ketentuan Perjalanan Dinas
                            <div class="float-end"><i class="bi bi-chevron-right"></i></div>
                        </a>
                        <hr>
                    </div>
                    <div class="mx-4">
                        <a href="#" class="mx-2 my-4 h-5 text-third text-decoration-none">Ketentuan Belanja Modal<div
                                class="float-end"><i class="bi bi-chevron-right"></i></div></a>
                        <hr>
                    </div>
                    <div class="mx-4">
                        <a href="#" class="mx-2 my-4 h-5 text-third text-decoration-none">Ketentuan Belanja Barang
                            Jasa<div class="float-end"><i class="bi bi-chevron-right"></i></div></a>
                        <hr>
                    </div>
                    <div class="mx-4">
                        <a href="#" class="mx-2 my-4 h-5 text-third text-decoration-none">Bantuan Pengguna<div
                                class="float-end"><i class="bi bi-chevron-right"></i></div></a>
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
                <p class="text-first mx-4 my-4">Disini anda dapat melihat layanan-layanan yang telah anda ajukan, disetujui,
                    ditolak, serta yang harus anda laporkan progressnya lebih lanjut.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card rounded-0 mx-4">
                    <div class="card-header rounded-0 bg-first">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link rounded-0 active" data-bs-toggle="tab"
                                    href="#perjalanan-dinas"><b>Perjalanan
                                        Dinas</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0" data-bs-toggle="tab"
                                    href="#pelaporan-perjalanan-dinas"><b>Pelaporan Perjalanan Dinas</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0" data-bs-toggle="tab" href="#belanja-modal"><b>Belanja
                                        Modal</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0" data-bs-toggle="tab" href="#belanja-barang-jasa"><b>Belanja
                                        Barang Jasa</b></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body tab-content">
                            <div id="perjalanan-dinas" class="tab-pane fade show active">
                                <table id="user" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Keperluan</th>
                                            <th>Tujuan</th>
                                            <th>Jumlah Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perjadin as $perjadins)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $perjadins->keperluan_perjadin }}</td>
                                                <td>{{ $perjadins->province->name }}, {{ $perjadins->regency->name }}</td>
                                                <td>{{ $perjadins->jumlah_biaya }}</td>
                                                <td>{{ $perjadins->status }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Keperluan</th>
                                            <th>Tujuan</th>
                                            <th>Jumlah Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div id="pelaporan-perjalanan-dinas" class="tab-pane fade">
                                <table id="user" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Keperluan</th>
                                            <th>Tujuan</th>
                                            <th>Jumlah Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pelaporan as $pelaporans)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pelaporans->keperluan_perjadin }}</td>
                                                <td>{{ $pelaporans->kota_kab }}</td>
                                                <td>{{ $pelaporans->jumlah_dibayarkan }}</td>
                                                <td>{{ $pelaporans->status }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Keperluan</th>
                                            <th>Tujuan</th>
                                            <th>Jumlah Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- Belanja Modal Tab -->
                            <div id="belanja-modal" class="tab-pane fade">
                                <table id="user" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Jenis Belanja</th>
                                            <th>Estimasi Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barmol as $barmols)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $barmols->nomor_surat }}</td>
                                                @if ($barmols->jns_belanja == 'Belanja Modal Lainnya')
                                                    <td>{{ $barmols->lainnya }}</td>
                                                @else
                                                    <td>{{ $barmols->jns_belanja }}</td>
                                                @endif
                                                <td>{{ $barmols->estimasi_biaya }}</td>
                                                <td>{{ $barmols->status }}</td>
                                                <td>
                                                    @if ($barmols->status == 'Disetujui' && $barmols->status_pengerjaan != 'Disetujui')
                                                        <a href="{{ route('pengerjaan-belanja-modal', $barmols->id) }}"
                                                            type="submit" class="btn btn-warning btn-sm">
                                                            <i class="bi bi-pencil-square"></i> Pengerjaan <span
                                                                class="badge text-bg-light">{{ $barmols->persentase }}%</span>
                                                        </a>
                                                    @elseif ($barmols->persentase == 100)
                                                        <a href="{{ route('pelaporan-belanja-modal', $barmols->id) }}"
                                                            type="submit" class="btn btn-warning btn-sm">
                                                            <i class="bi bi-pencil-square"></i> Pelaporan <span
                                                            class="badge text-bg-light">{{ $barmols->persentase_lapor }}%</span>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Jenis Belanja</th>
                                            <th>Estimasi Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- Belanja Barang Jasa Tab -->
                            <div id="belanja-barang-jasa" class="tab-pane fade">
                                <table id="user" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Jenis Belanja</th>
                                            <th>Estimasi Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barjas as $barjass)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $barjass->nomor_surat }}</td>
                                                @if ($barjass->jns_belanja == 'Belanja Barang Jasa Lainnya')
                                                    <td>{{ $barjass->lainnya }}</td>
                                                @else
                                                    <td>{{ $barjass->jns_belanja }}</td>
                                                @endif
                                                <td>{{ $barjass->estimasi_biaya }}</td>
                                                <td>{{ $barjass->status }}</td>
                                                <td>
                                                    @if ($barjass->status == 'Disetujui')
                                                        <a href="{{ route('pengerjaan-belanja-barjas', $barjass->id) }}"
                                                            type="submit" class="btn btn-warning btn-sm">
                                                            <i class="bi bi-pencil-square"></i> Pengerjaan <span
                                                                class="badge text-bg-light">{{ $barjass->persentase }}%</span>
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Jenis Belanja</th>
                                            <th>Estimasi Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
        $(document).ready(function() {
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
