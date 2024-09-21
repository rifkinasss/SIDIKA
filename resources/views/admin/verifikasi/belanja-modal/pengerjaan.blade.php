@extends('admin.layouts.app')

@section('content-wrapper')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pengerjaan Belanja Modal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('dashboard-admin') }}">Home</a></li>
                            <li class="breadcrumb-item">Belanja Modal</li>
                            <li class="breadcrumb-item active">Pengerjaan Belanja Modal</li>
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
                                <h3 class="card-title">Pengerjaan Belanja Modal</h3>
                            </div>
                            <div class="card-body">
                                <table id="user" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Surat</th>
                                            <th>Nama</th>
                                            <th>Jenis Belanja</th>
                                            <th>Estimasi Biaya</th>
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
                                                <td>{{ $p->status_pengerjaan }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm viewButton"
                                                        data-id="{{ $p->id }}">
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
                                            <th>Estimasi Biaya</th>
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
                    <h5 class="modal-title" id="viewModalLabel">Detail Pengerjaan Belanja Modal</h5>
                    <button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close"><i
                            class="bi bi-x-lg"></i></button>
                </div>
                <div class="modal-body">
                    <h5>1. Perjanjian/Kontrak/SPK</h5>
                    <div class="mb-3">
                        <label for="view-nomor-surat-spk" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" id="view-nomor-surat-spk" value="{{ $p->nomor_surat_spk }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-nama-vendor" class="form-label">Nama Vendor</label>
                        <input type="text" class="form-control" id="view-nama-vendor" value="{{ $p->nama_vendor }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="view-provinsi" value="{{ $p->provinsi }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-kota" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="view-kota" value="{{ $p->kota }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-tgl-mulai-spk" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="view-tgl-mulai-spk" value="{{ $p->tgl_mulai_spk }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-tgl-selesai-spk" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="view-tgl-selesai-spk" value="{{ $p->tgl_selesai_spk }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-durasi" class="form-label">Durasi</label>
                        <input type="text" class="form-control" id="view-durasi" value="{{ $p->durasi }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-nilai-kontrak-spk" class="form-label">Nilai Kontrak</label>
                        <input type="text" class="form-control" id="view-nilai-kontrak-spk" value="{{ $p->nilai_kontrak_spk }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-uraian-pengadaan" class="form-label">Uraian Pengadaan</label>
                        <textarea class="form-control" id="view-uraian-pengadaan" rows="4" readonly>{{ $p->uraian_pengadaan }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="view-bukti-spk" class="form-label">Bukti Dokumen</label>
                        @if ($p->bukti_spk)
                            @php
                                $filePaths = json_decode($p->bukti_spk);
                            @endphp

                            <ul>
                                @foreach ($filePaths as $filePath)
                                    <li><a href="{{ Storage::url($filePath) }}" target="_blank">Lihat File</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <hr>
                    <h5>2. Adendum Kontrak Belanja Modal</h5>
                    <div class="mb-3">
                        <label for="view-nomor-surat-adendum" class="form-label">Nomor Surat</label>
                        <input type="text" class="form-control" id="view-nomor-surat-adendum" value="{{ $p->nomor_surat_adendum }}" readonly>
                    </div>
                    @if ($p->nomor_surat_adendum != '-')
                        <div class="mb-3">
                            <label for="view-uraian-adendum" class="form-label">Uraian Adendum</label>
                            <textarea class="form-control" id="view-uraian-adendum" rows="4" readonly>{{ $p->uraian_adendum }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="view-tgl-mulai-adendum" class="form-label">Tanggal Mulai Adendum</label>
                            <input type="date" class="form-control" id="view-tgl-mulai-adendum" value="{{ $p->tgl_mulai_adendum }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view-tgl-selesai-adendum" class="form-label">Tanggal Selesai Adendum</label>
                            <input type="date" class="form-control" id="view-tgl-selesai-adendum" value="{{ $p->tgl_selesai_adendum }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view-nilai-kontrak-adendum" class="form-label">Nilai Kontrak Adendum</label>
                            <input type="text" class="form-control" id="view-nilai-kontrak-adendum" value="{{ $p->nilai_kontrak_adendum }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="view-bukti-kontrak-adendum" class="form-label">Bukti Dokumen</label>
                            @if ($p->bukti_surat_adendum)
                                @php
                                    $filePaths = json_decode($p->bukti_surat_adendum);
                                @endphp

                                <ul>
                                    @foreach ($filePaths as $filePath)
                                        <li><a href="{{ Storage::url($filePath) }}" target="_blank">Lihat File</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    @endif
                    <hr>
                    <h5>3. Jaminan Pelaksanaan</h5>
                    <div class="mb-3">
                        <label for="view-nilai-bank-garansi" class="form-label">Nilai Bank Garansi</label>
                        <input type="text" class="form-control" id="view-nilai-bank-garansi" value="{{ $p->nilai_bank_garansi_pelaksanaan == '' ? '-' : $p->nilai_bank_garansi_pelaksanaan }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-bukti-garansi" class="form-label">Bukti Garansi</label>
                        @if ($p->nilai_bank_garansi_pelaksanaan != '')
                            <ul>
                                <li><a href="{{ Storage::url($p->bukti_bank_garansi_pelaksanaan) }}" target="_blank">Lihat File</a></li>
                            </ul>
                        @else
                            <input type="text" class="form-control" id="view-bukti-garansi" value="-" readonly>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="view-nilai-surety-bond" class="form-label">Nilai Surety Bond</label>
                        <input type="text" class="form-control" id="view-nilai-surety-bond" value="{{ $p->nilai_surety_bond_pelaksanaan == '' ? '-' : $p->nilai_surety_bond_pelaksanaan }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-surety-bond" class="form-label">Surety Bond</label>
                        @if ($p->nilai_surety_bond_pelaksanaan != '')
                            <ul>
                                <li><a href="{{ Storage::url($p->bukti_surety_bond_pelaksanaan) }}" target="_blank">Lihat File</a></li>
                            </ul>
                        @else
                            <input type="text" class="form-control" id="view-surety-bond" value="-" readonly>
                        @endif
                    </div>
                    <hr>
                    <h5>4. Jaminan Pengadaan</h5>
                    <div class="mb-3">
                        <label for="view-nilai-bank-garansi-pengadaan" class="form-label">Nilai Bank Garansi</label>
                        <input type="text" class="form-control" id="view-nilai-bank-garansi-pengadaan" value="{{ $p->nilai_bank_garansi_pengadaan == '' ? '-' : $p->nilai_bank_garansi_pengadaan }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-bukti-garansi-pengadaan" class="form-label">Bukti Garansi</label>
                        @if ($p->nilai_bank_garansi_pengadaan != '')
                            <ul>
                                <li><a href="{{ Storage::url($p->bukti_bank_garansi_pengadaan) }}" target="_blank">Lihat File</a></li>
                            </ul>
                        @else
                            <input type="text" class="form-control" id="view-bukti-garansi-pengadaan" value="-" readonly>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="view-nilai-surety-bond-pengadaan" class="form-label">Nilai Surety Bond</label>
                        <input type="text" class="form-control" id="view-nilai-surety-bond-pengadaan" value="{{ $p->nilai_surety_bond_pengadaan == '' ? '-' : $p->nilai_surety_bond_pengadaan }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-surety-bond-pengadaan" class="form-label">Surety Bond</label>
                        @if ($p->nilai_surety_bond_pengadaan != '')
                            <ul>
                                <li><a href="{{ Storage::url($p->bukti_surety_bond_pengadaan) }}" target="_blank">Lihat File</a></li>
                            </ul>
                        @else
                            <input type="text" class="form-control" id="view-surety-bond-pengadaan" value="-" readonly>
                        @endif
                    </div>
                    <hr>
                    <h5>5. Sumber Dana DPA Belanja Modal</h5>
                    <div class="mb-3">
                        <label for="view-nominal-dana-apbn" class="form-label">Nominal Dana APBN</label>
                        <input type="text" class="form-control" id="view-nominal-dana-apbn" value="{{ $p->dana_apbn == '' ? '-' : $p->dana_apbn }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-nominal-dana-apbd" class="form-label">Nominal Dana APBD</label>
                        <input type="text" class="form-control" id="view-nominal-dana-apbd" value="{{ $p->dana_apbd == '' ? '-' : $p->dana_apbd }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-nominal-dana-hibah" class="form-label">Nominal Dana Hibah</label>
                        <input type="text" class="form-control" id="view-nominal-dana-hibah" value="{{ $p->dana_hibah == '' ? '-' : $p->dana_hibah }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-bentuk-pengadaan" class="form-label">Bentuk Pengadaan</label>
                        <input type="text" class="form-control" id="view-bentuk-pengadaan" value="{{ $p->bentuk_pengadaan }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-nilai-dpa" class="form-label">Nilai DPA</label>
                        <input type="text" class="form-control" id="view-nilai-dpa" value="{{ $p->nilai_dpa }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="view-bukti-kontrak-adendum" class="form-label">Bukti Dokumen</label>
                        @if ($p->bukti_dpa)
                            @php
                                $filePaths = json_decode($p->bukti_dpa);
                            @endphp
    
                            <ul>
                                @foreach ($filePaths as $filePath)
                                    <li><a href="{{ Storage::url($filePath) }}" target="_blank">Lihat File</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @if ($p->status_pengerjaan == 'Diproses')
                        <form action="{{ route('pengerjaan-belanja-modal.verif', ['id' => $p->id]) }}" method="POST" style="display:inline;">
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
                    // var nomorSuratSPK = button.getAttribute('data-nomor-surat-spk');
                    // document.getElementById('view-nomor-surat-spk').value = nomorSuratSPK;

                    var modal = new bootstrap.Modal(viewModal);
                    modal.show();
                });
            });
        });
    </script>
@endsection
