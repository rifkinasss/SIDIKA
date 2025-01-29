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
                <li class="breadcrumb-item"><a href="{{ route('pegawai') }}" class="text-decoration-none text-dark">Home</a></li>
                <li class="breadcrumb-item">Belanja Modal</li>
                <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Pelaporan Belanja
                            Modal</u></span></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid bg-transparent mb-4">
        <div class="card bg-light rounded-0">
            <div class="row pt-4 ps-4">
                <h5>Pelaporan Belanja Modal</h5>
            </div>
            <hr>
            <div class="row py-2 ps-4">
                <p>Lengkapi form dibawah ini beserta deskripsi yang jelas yang dapat menjadi pendukung untuk melengkapi
                    Dokumen-dokumen Pelaporan Belanja Modal.</p>
                <p>
                    Formulir akan ditinjau dan balasan Pelaporan akan dikirimkan minimal
                    <span class="h5"><b>2 hari</b></span> setelah Pelaporan dilakukan.<br>
                    Jika terjadi kendala saat Pelaporan dan belum menerima balasan klik 
					<a href="#" class="text-first"><u>link bantuan</u></a>. <br>
                    Pada Pelaporan Belanja Modal ini bersifat progresif dimana halaman dapat dibuka kembali sampai semua
                    form terisi.
                </p>
            </div>
            <div class="row my-2 mx-4">
                <div class="card bg-warning border border-warning rounded-0 pt-4 px-4">
                    <p><i class="bi bi-exclamation-square-fill"></i> Pastikan anda telah membaca seluruh ketentuan Belanja
                        Modal. <br>
                    <ul>
                        <li>Kesalahan data pada dokumen berakibat penolakan</li>
                        <li>Pemalsuan dokumen berakibat masuk ke daftar blacklist</li>
                    </ul>
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Perjanjian SPMK --}}
	<form action="{{ route('pelaporan-belanja-modal.update', $barmod->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="container-fluid bg-transparent mb-4">
			<div class="card bg-light rounded-0">
				<div class="row mx-4 my-4 align-items-start">
					<h4>1. Sistem Pelaporan Monitoring Kontrak (SPMK)</h4>
					<div class="col-md-6">
						<label for="nomor-spmk-modal" class="form-label">Nomor Dokumen SPMK</label>
						<input type="text" class="form-control rounded-0 mb-2" id="nomor-spmk-modal" name="nomor_spmk"
							@if ($barmod->nomor_spmk != '') value="{{ $barmod->nomor_spmk }}" disabled @endif
							required>

						<label for="tanggal-spmk-modal" class="form-label">Tanggal</label>
						<input type="date" class="form-control rounded-0 mb-2" id="tanggal-spmk-modal"
							placeholder="DD/MM/YYYY" name="tgl_spmk" 
							@if ($barmod->tgl_spmk != '') value="{{ $barmod->tgl_spmk }}" disabled @endif
							required>

						<label for="bukti-spmk-modal" class="form-label">Bukti Dokumen Sistem Pelaporan Monitoring Kontrak
							(.pdf)</label>
						@if ($barmod->bukti_spmk != '')
							<ul>
								<li><a href="{{ Storage::url($barmod->bukti_spmk) }}"
										target="_blank">Lihat File</a></li>
							</ul>
						@else
							<input class="form-control rounded-0 mb-4" type="file" id="bukti-spmk-modal"
								name="bukti_spmk" required>
						@endif
					</div>
					<div class="col-md-6">
						<div class="card bg-third border border-primary rounded-0 pt-4 px-4">
							<p><i class="bi bi-info-square-fill"></i> Info
							<ol>
								<li>Pastikan Nomor Surat sama dengan nomor Surat Perijinan Kerja.</li>
								<li>Nilai kontrak masukkan angka saja tanpa (,)</li>
								<li>Jika ada Surat Perijinan Kerja lebih dari satu(misal. sub-SPK milik Kontraktor) harap
									dimasukkan</li>
							</ol>
							</p>
						</div>
					</div>
					{{-- tombol kirim dan cancel --}}
					@if ($barmod->nomor_spmk == '')
						<div class="col-sm-6 mt-4">
							<button type="submit" class="btn btn-primary rounded-0" name="submit_spmk">Kirim</button>
						</div>
						<div class="col-sm-6 mt-4 text-end">
							<button type="button" class="btn bg-third border-primary rounded-0" 
								onclick="window.location.reload();">Reset</button>
							<button type="button" class="btn btn-danger rounded-0"
								onclick="window.location.href='{{ url('dashboard') }}';">kembali</button>
						</div>
					@endif
				</div>
			</div>
		</div>
	</form>

    {{-- Provisional Hand Over (PHO) --}}
	<form action="{{ route('pelaporan-belanja-modal.update', $barmod->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="container-fluid bg-transparent mb-4">
			<div class="card bg-light rounded-0">
				<div class="row mx-4 my-4 align-items-start">
					<h4>2. Provisional Hand Over (PHO)</h4>
					<div class="col-md-6">
						<label for="nomor-pho-modal" class="form-label">Nomor Dokumen PHO</label>
						<input class="form-control rounded-0 mb-2" type="text" id="nomor-pho-modal" name="nomor_pho" 
							@if ($barmod->nomor_pho != '') value='{{ $barmod->nomor_pho }}' disabled @endif
							required>

						<label for="tanggal-pho-modal" class="form-label">Tanggal PHO</label>
						<input type="date" class="form-control rounded-0 mb-2" id="tanggal-pho-modal"
							placeholder="DD/MM/YYYY" name="tgl_pho" 
							@if ($barmod->tgl_pho != '') value='{{ $barmod->tgl_pho }}' disabled @endif
							required>

						<label for="bukti-pho-modal" class="form-label">Bukti Dokumen PHO (.pdf)</label>
						@if ($barmod->bukti_pho != '')
							<ul>
								<li><a href="{{ Storage::url($barmod->bukti_pho) }}"
										target="_blank">Lihat File</a></li>
							</ul>
						@else
							<input class="form-control rounded-0 mb-4" type="file" id="bukti-pho-modal"
								name="bukti_pho" required>
						@endif
					</div>
					<div class="col-md-6">
						<div class="card bg-third border border-primary rounded-0 pt-4 px-4">
							<p><i class="bi bi-info-square-fill"></i> Info
							<ol>
								<li>Adendum Kontrak tidak wajib diisi</li>
								<li>File Dokumen Adendum Kontrak bisa diisi lebih dari 1</li>
							</ol>
							</p>
						</div>
					</div>
					{{-- tombol kirim dan cancel --}}
					@if ($barmod->nomor_pho == '')
						<div class="col-sm-6 mt-4">
							<button type="submit" class="btn btn-primary rounded-0" name="submit_pho">Kirim</button>
						</div>
						<div class="col-sm-6 mt-4 text-end">
							<button type="button" class="btn bg-third border-primary rounded-0" 
								onclick="window.location.reload();">Reset</button>
							<button type="button" class="btn btn-danger rounded-0"
								onclick="window.location.href='{{ url('dashboard') }}';">kembali</button>
						</div>
					@endif
				</div>
			</div>
		</div>
	</form>

    {{-- Berita Acara Serah Terima (BAST) --}}
	<form action="{{ route('pelaporan-belanja-modal.update', $barmod->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="container-fluid bg-transparent mb-4">
			<div class="card bg-light rounded-0">
				<div class="row mx-4 my-4 align-items-start">
					<h4>3. Berita Acara Serah Terima (BAST)</h4>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="nomor-bast-modal" class="form-label">Nomor Dokumen BAST</label>
							<input class="form-control rounded-0 mb-2" type="text" id="nomor-bast-modal" name="nomor_bast" 
								@if ($barmod->nomor_bast != '') value='{{ $barmod->nomor_bast }}' disabled @endif
								required>

							<label for="tanggal-bast-modal" class="form-label">Tanggal BAST</label>
							<input type="date" class="form-control rounded-0 mb-2" id="tanggal-bast-modal"
								placeholder="DD/MM/YYYY" name="tgl_bast" 
								@if ($barmod->tgl_bast != '') value='{{ $barmod->tgl_bast }}' disabled @endif
								required> 

							<label for="nilai-bast-modal" class="form-label">Nilai BAST</label>
							<input class="form-control rounded-0 mb-2" type="text" id="nilai-bast-modal" name="nilai_bast"
								oninput="formatRupiah(this);"
								@if ($barmod->nilai_bast != '') value='{{ $barmod->nilai_bast }}' disabled @endif
								required>

							<label for="bukti-bast-modal" class="form-label">Bukti Dokumen BAST (.pdf)</label>
							@if ($barmod->bukti_bast != '')
								<ul>
									<li><a href="{{ Storage::url($barmod->bukti_bast) }}"
											target="_blank">Lihat File</a></li>
								</ul>
							@else
								<input class="form-control rounded-0 mb-4" type="file" id="bukti-bast-modal"
									name="bukti_bast" required>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="card bg-third border border-primary rounded-0 pt-4 px-4">
							<p><i class="bi bi-info-square-fill"></i> Info
							<ol>
								<li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu(Bank Garansi / Surety Bond) atau
									dua-duanya(Bank Garansi & Surety Bond)</li>
								<li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah
									uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
								<li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan
									penjamin lainnya.</li>
							</ol>
							</p>
						</div>
					</div>
					{{-- tombol kirim dan cancel --}}
					@if ($barmod->nomor_bast == '')
						<div class="col-sm-6 mt-4">
							<button type="submit" class="btn btn-primary rounded-0" name="submit_bast">Kirim</button>
						</div>
						<div class="col-sm-6 mt-4 text-end">
							<button type="button" class="btn bg-third border-primary rounded-0" 
								onclick="window.location.reload();">Reset</button>
							<button type="button" class="btn btn-danger rounded-0"
								onclick="window.location.href='{{ url('dashboard') }}';">kembali</button>
						</div>
					@endif
				</div>
			</div>
		</div>
	</form>

    {{-- Final Hand Over (FHO) --}}
	<form action="{{ route('pelaporan-belanja-modal.update', $barmod->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="container-fluid bg-transparent mb-4">
			<div class="card bg-light rounded-0">
				<div class="row mx-4 my-4 align-items-start">
					<h4>4. Final Hand Over (FHO)</h4>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="nomor-fho-modal" class="form-label">Nomor Dokumen FHO</label>
							<input class="form-control rounded-0 mb-2" type="text" id="nomor-fho-modal" name="nomor_fho" 
								@if ($barmod->nomor_fho != '') value='{{ $barmod->nomor_fho }}' disabled @endif
								required>

							<label for="tanggal-fho-modal" class="form-label">Tanggal FHO</label>
							<input type="date" class="form-control rounded-0 mb-2" id="tanggal-fho-modal"
								placeholder="DD/MM/YYYY" name="tgl_fho" 
								@if ($barmod->tgl_fho != '') value='{{ $barmod->tgl_fho }}' disabled @endif
								required>

							<label for="bukti-fho-modal" class="form-label">Bukti Dokumen FHO (.pdf)</label>
							@if ($barmod->bukti_fho != '')
								<ul>
									<li><a href="{{ Storage::url($barmod->bukti_fho) }}"
											target="_blank">Lihat File</a></li>
								</ul>
							@else
								<input class="form-control rounded-0 mb-4" type="file" id="bukti-fho-modal"
									name="bukti_fho" required>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="card bg-third border border-primary rounded-0 pt-4 px-4">
							<p><i class="bi bi-info-square-fill"></i> Info
							<ol>
								<li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu(Bank Garansi / Surety Bond) atau
									keduanya (Bank Garansi & Surety Bond)</li>
								<li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah
									uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
								<li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan
									penjamin lainnya.</li>
							</ol>
							</p>
						</div>
					</div>
					{{-- tombol kirim dan cancel --}}
					@if ($barmod->nomor_fho == '')
						<div class="col-sm-6 mt-4">
							<button type="submit" class="btn btn-primary rounded-0" name="submit_fho">Kirim</button>
						</div>
						<div class="col-sm-6 mt-4 text-end">
							<button type="button" class="btn bg-third border-primary rounded-0" 
								onclick="window.location.reload();">Reset</button>
							<button type="button" class="btn btn-danger rounded-0"
								onclick="window.location.href='{{ url('dashboard') }}';">kembali</button>
						</div>
					@endif
				</div>
			</div>
		</div>
	</form>

    {{-- Surat Perintah Pencairan Dana (SP2D) --}}
	<form action="{{ route('pelaporan-belanja-modal.update', $barmod->id) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="container-fluid bg-transparent mb-4">
			<div class="card bg-light rounded-0">
				<div class="row mx-4 my-4 align-items-start">
					<h4>5. Surat Perintah Pencairan Dana (SP2D)</h4>
					<div class="col-md-6">
						<div class="mb-3">
							<label for="nomor-sp2d-modal" class="form-label">Nomor Dokumen SP2D</label>
							<input class="form-control rounded-0 mb-2" type="text" id="nomor-sp2d-modal" name="nomor_sp2d" 
								@if ($barmod->nomor_sp2d != '') value='{{ $barmod->nomor_sp2d }}' disabled @endif
								required>

							<label for="tanggal-sp2d-modal" class="form-label">Tanggal SP2D</label>
							<input type="date" class="form-control rounded-0 mb-2" id="tanggal-sp2d-modal"
								placeholder="DD/MM/YYYY" name="tgl_sp2d"
								@if ($barmod->tgl_sp2d != '') value='{{ $barmod->tgl_sp2d }}' disabled @endif
								required>

							<label for="nilai-sp2d-modal" class="form-label">Nilai SP2D</label>
							<input class="form-control rounded-0 mb-2" type="text" id="nilai-sp2d-modal" name="nilai_sp2d" 
								oninput="formatRupiah(this);"
								@if ($barmod->nilai_sp2d != '') value='{{ $barmod->nilai_sp2d }}' disabled @endif
								required>

							<label for="bukti-sp2d-modal" class="form-label">Bukti Dokumen SP2D (.pdf)</label>
							@if ($barmod->bukti_sp2d != '')
								<ul>
									<li><a href="{{ Storage::url($barmod->bukti_sp2d) }}"
											target="_blank">Lihat File</a></li>
								</ul>
							@else
								<input class="form-control rounded-0 mb-4" type="file" id="bukti-sp2d-modal"
									name="bukti_sp2d" required>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="card bg-third border border-primary rounded-0 pt-4 px-4">
							<p><i class="bi bi-info-square-fill"></i> Info
							<ol>
								<li>Pada Bagian ini Bentuk Jaminan Pelaksanaan bisa salah satu (Dana APBN / Dana APBD/ Dana
									Hibah) atau ketiganya (Dana APBN & Dana APBD & Dana Hibah)</li>
								<li>Bank Garansi: Surat jaminan yang dikeluarkan oleh bank yang menjamin pembayaran sejumlah
									uang tertentu jika pihak yang dijamin tidak dapat memenuhi kewajibannya.</li>
								<li>Surety Bond: Surat jaminan yang dikeluarkan oleh perusahaan asuransi atau perusahaan
									penjamin lainnya.</li>
							</ol>
							</p>
						</div>
					</div>
					{{-- tombol kirim dan cancel --}}
					@if ($barmod->nomor_sp2d == '')
						<div class="col-sm-6 mt-4">
							<button type="submit" class="btn btn-primary rounded-0" name="submit_sp2d">Kirim</button>
						</div>
						<div class="col-sm-6 mt-4 text-end">
							<button type="button" class="btn bg-third border-primary rounded-0" 
								onclick="window.location.reload();">Reset</button>
							<button type="button" class="btn btn-danger rounded-0"
								onclick="window.location.href='{{ url('dashboard') }}';">kembali</button>
						</div>
					@endif
				</div>
			</div>
		</div>
	</form>

	<script>
		function formatRupiah(element) {
			let value = element.value.replace(/[^,\d]/g, '').toString();
			let split = value.split(',');
			let sisa = split[0].length % 3;
			let rupiah = split[0].substr(0, sisa);
			let ribuan = split[0].substr(sisa).match(/\d{3}/gi);
	
			if (ribuan) {
				let separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
	
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			element.value = 'Rp ' + rupiah;
		}
	</script>	
@endsection
