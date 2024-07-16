@extends('admin.layouts.app')

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Perencanaan Belanja Modal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-admin') }}">Home</a></li>
                            <li class="breadcrumb-item">Belanja Modal</li>
                            <li class="breadcrumb-item active">Perencanaan Belanja Modal</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Perencanaan Belanja Modal</h3>
                            </div>
                            <div class="card-body">
                                <table id="user" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Nama</th>
                                            <th>Jenis Belanja</th>
                                            <th>Jumlah Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($barmol as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                @if ($p->nomor_surat == '')
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $p->nomor_surat }}</td>
                                                @endif
                                                <td>{{ $p->user->nama }}</td>
                                                @if ($p->jns_belanja == 'Belanja Modal Lainnya')
                                                    <td>{{ $p->lainnya }}</td>
                                                @else
                                                    <td>{{ $p->jns_belanja }}</td>
                                                @endif
                                                <td>{{ $p->estimasi_biaya }}</td>
                                                <td>{{ $p->status }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm viewButton"
                                                        data-id="{{ $p->id }}"
                                                        data-nomor-surat="{{ $p->nomor_surat }}"
                                                        data-nama="{{ $p->user->nama }}"
                                                        data-latar-belakang="{{ $p->latar_belakang }}"
                                                        data-jns-belanja="{{ $p->jns_belanja }}"
                                                        data-lainnya="{{ $p->lainnya }}"
                                                        data-estimasi-biaya="{{ $p->estimasi_biaya }}"
                                                        data-tujuan="{{ $p->tujuan }}"
                                                        data-deskripsi-kebutuhan="{{ $p->deskripsi_kebutuhan }}"
                                                        data-tgl-mulai="{{ $p->tgl_mulai }}"
                                                        data-tgl-selesai="{{ $p->tgl_selesai }}"
                                                        data-durasi="{{ $p->durasi }}"
                                                        data-deskripsi-spesifikasi="{{ $p->deskripsi_spesifikasi }}">
                                                        <i class="bi bi-eye"></i>
                                                    </button>
                                                    <form action="#{{-- route('perjadin.destroy', ['id' => $p->id]) --}}" method="POST"
                                                        style="display:inline;" id="deleteForm{{ $p->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger deleteUser btn-sm"
                                                            data-id="{{ $p->id }}">
                                                            <i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Nama</th>
                                            <th>Jenis Belanja</th>
                                            <th>Jumlah Biaya</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Detail Perencanaan Belanja Modal</h5>
                    <button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="view-nomor-surat" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" id="view-nomor-surat" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="view-nama" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-latar-belakang" class="form-label">Latar Belakang</label>
                        <textarea class="form-control" id="view-latar-belakang" rows="4" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="view-jns-belanja" class="form-label">Jenis Belanja Modal</label>
                        <input type="text" class="form-control" id="view-jns-belanja" readonly>
                    </div>
                    <div class="mb-3" id="view-lainnya-wrapper">
                        <label for="view-lainnya" class="form-label">Belanja Modal Lainnya</label>
                        <input type="text" class="form-control" id="view-lainnya" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-estimasi-biaya" class="form-label">Estimasi Biaya</label>
                        <input type="text" class="form-control" id="view-estimasi-biaya" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-tujuan" class="form-label">Tujuan</label>
                        <textarea class="form-control" id="view-tujuan" rows="4" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="view-deskripsi-kebutuhan" class="form-label">Deskripsi Kebutuhan</label>
                        <textarea class="form-control" id="view-deskripsi-kebutuhan" rows="4" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="view-tgl-mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="view-tgl-mulai" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-tgl-selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="view-tgl-selesai" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-durasi" class="form-label">Durasi</label>
                        <input type="text" class="form-control" id="view-durasi" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-deskripsi-spesifikasi" class="form-label">Deskripsi dan Spesifikasi</label>
                        <textarea class="form-control" id="view-deskripsi-spesifikasi" rows="10" readonly></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @if ($p->status == 'Diproses')
                    <form action="{{ route('perencanaan-belanja-modal.verif', ['id' => $p->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger" name="ditolak">Tolak</button>
                        <button type="submit" class="btn btn-primary" name="disetujui">Setujui</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var viewModal = document.getElementById('viewModal');
            var viewButtons = document.querySelectorAll('.viewButton');

            viewButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var nomorSurat = button.getAttribute('data-nomor-surat');
                    var nama = button.getAttribute('data-nama');
                    var latarBelakang = button.getAttribute('data-latar-belakang');
                    var jnsBelanja = button.getAttribute('data-jns-belanja');
                    var lainnya = button.getAttribute('data-lainnya');
                    var estimasiBiaya = button.getAttribute('data-estimasi-biaya');
                    var tujuan = button.getAttribute('data-tujuan');
                    var deskripsiKebutuhan = button.getAttribute('data-deskripsi-kebutuhan');
                    var tglMulai = button.getAttribute('data-tgl-mulai');
                    var tglSelesai = button.getAttribute('data-tgl-selesai');
                    var durasi = button.getAttribute('data-durasi');
                    var deskripsiSpesifikasi = button.getAttribute('data-deskripsi-spesifikasi');

                    document.getElementById('view-nomor-surat').value = nomorSurat;
                    document.getElementById('view-nama').value = nama;
                    document.getElementById('view-latar-belakang').value = latarBelakang;
                    document.getElementById('view-jns-belanja').value = jnsBelanja;
                    document.getElementById('view-lainnya').value = lainnya;
                    document.getElementById('view-estimasi-biaya').value = estimasiBiaya;
                    document.getElementById('view-tujuan').value = tujuan;
                    document.getElementById('view-deskripsi-kebutuhan').value = deskripsiKebutuhan;
                    document.getElementById('view-tgl-mulai').value = tglMulai;
                    document.getElementById('view-tgl-selesai').value = tglSelesai;
                    document.getElementById('view-durasi').value = durasi;
                    document.getElementById('view-deskripsi-spesifikasi').value =
                        deskripsiSpesifikasi;

                    var lainnyaWrapper = document.getElementById('view-lainnya-wrapper');
                    if (jnsBelanja === 'Belanja Modal Lainnya') {
                        lainnyaWrapper.style.display = 'block';
                    } else {
                        lainnyaWrapper.style.display = 'none';
                    }

                    var modal = new bootstrap.Modal(viewModal);
                    modal.show();
                });
            });
        });
    </script>
@endsection
