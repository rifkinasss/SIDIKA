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
                <li class="breadcrumb-item">Profile</li>
                <li class="breadcrumb-item active" aria-current="page"><span class="text-first"><u>Settings</u></span></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid bg-transparent">
        <div class="card bg-light rounded-0 mb-4">
            <div class="row py-4 px-4">
                <h2>Profile's Settings</h2>
                <hr>
                <div class="col-md-4 text-center mt-4">
                    <h5>Foto Profile</h5>
                    <img src="{{ Auth::user()->profile_photo_url ?? asset('assets/img/user.jpg') }}" alt="Profile"
                        class="rounded-5" style="width: 30%;" id="profile-img">
                    <p class="mt-4 text-muted">
                        <a type="button" class="btn btn-primary mx-2" id="change-profile-btn">
                            Ganti Profile
                        </a>
                    </p>
                    <div class="card bg-third border border-primary rounded-3 pt-3 px-4">
                        <p><i class="bi bi-info-square-fill"></i> Ketentuan Foto Profile :
                            <br>
                        <ul class="text-start">
                            <li>Skala Foto 1x1(persegi)</li>
                            <li>Menggunakan foto formal</li>
                            <li>File foto format jpeg, jpg, png</li>
                            <li class="text-danger">Dilarang menggunakan foto selfie</li>
                        </ul>
                        </p>
                    </div>
                    </p>
                    {{-- Preview Img --}}
                    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imagePreviewModalLabel">Preview Gambar</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="" id="preview-img" class="img-fluid rounded-5" alt="Preview">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" id="delete-image">Hapus</button>
                                    <input type="file" class="form-control" id="upload-image" style="display: none;">
                                    <button type="button" class="btn btn-success" id="upload-btn">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="upload-form" action="{{ route('uploadfoto', $user->id) }}" method="POST"
                        enctype="multipart/form-data" style="display: none;">
                        @csrf
                        <input type="file" name="profile_image" id="hidden-upload-image" style="display: none;">
                    </form>
                </div>
                <div class="col-md-8 mt-4">
                    <h5>Data Diri</h5>
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input class="form-control rounded-0 mb-2" type="text" id="nama_lengkap"
                        value="{{ Auth::user()->nama }}" required />
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control rounded-0 mb-2" type="email" id="email"
                        value="{{ Auth::user()->email }}" required />
                    <label for="nip" class="form-label">Nomor Induk Pegawai (NIP)</label>
                    <input class="form-control rounded-0 mb-2" type="text" id="nip" value="{{ Auth::user()->nip }}"
                        disabled />
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input class="form-control rounded-0 mb-2" type="text" id="jabatan"
                        value="{{ Auth::user()->jabatan }}" disabled />
                    <label for="instansi" class="form-label">Instansi/Unit</label>
                    <input class="form-control rounded-0 mb-2" type="text" id="instansi"
                        value="{{ Auth::user()->unit_kerja }}" disabled />
                </div>
            </div>
        </div>
        {{-- ganti password --}}
        <div class="card bg-light rounded-0 my-4">
            <div class="row py-4 px-4">
                <h2>Ganti Password</h2>
                <hr>
                <div class="col-md-4 mt-4">
                    <div class="card bg-third border border-primary rounded-0 pt-4 px-4">
                        <p><i class="bi bi-info-square-fill"></i> harap catat dan ingat password yang telah anda ganti.
                            jika
                            anda lupa password hubungi <a href=""> admin SIDIKA.</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-8 mt-4">
                    {{-- Route Ganti Pass --}}
                    <form action="#" method="POST">
                        @csrf
                        <label for="password-lama" class="form-label">Password Lama</label>
                        <div class="input-group">
                            <input class="form-control rounded-0 mb-2" type="password" id="Password" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="togglePassword"></i>
                                </span>
                            </div>
                        </div>
                        <label for="password-baru" class="form-label">Password Baru</label>
                        <div class="input-group">
                            <input class="form-control rounded-0 mb-2" type="password" id="Password" name="password" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="togglePassword"></i>
                                </span>
                            </div>
                        </div>
                        <label for="konfirmasi-password" class="form-label">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <input class="form-control rounded-0 mb-2" type="password" id="Password" name="password" />
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" id="togglePassword"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary rounded-0">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        const passwordInput = document.getElementById("Password");
        const togglePassword = document.getElementById("togglePassword");

        togglePassword.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePassword.classList.remove("fa-eye");
                togglePassword.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                togglePassword.classList.remove("fa-eye-slash");
                togglePassword.classList.add("fa-eye");
            }
        });
    </script>
    {{-- Preview Image --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var profileImg = document.getElementById('profile-img');
            var changeProfileBtn = document.getElementById('change-profile-btn');
            var previewImg = document.getElementById('preview-img');
            var imagePreviewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));

            var deleteImageBtn = document.getElementById('delete-image');
            var uploadImageInput = document.getElementById('upload-image');
            var uploadBtn = document.getElementById('upload-btn');
            var hiddenUploadImage = document.getElementById('hidden-upload-image');
            var uploadForm = document.getElementById('upload-form');

            function openModal() {
                previewImg.src = profileImg.src;
                imagePreviewModal.show();
            }

            profileImg.addEventListener('click', openModal);
            changeProfileBtn.addEventListener('click', openModal);

            deleteImageBtn.addEventListener('click', function() {
                // Logika untuk menghapus gambar profil
                alert('Hapus gambar');
            });

            uploadBtn.addEventListener('click', function() {
                uploadImageInput.click();
            });

            uploadImageInput.addEventListener('change', function(event) {
                var file = event.target.files[0];
                var formData = new FormData();
                formData.append('profile_image', file);
                formData.append('_token', '{{ csrf_token() }}');

                fetch(uploadForm.action, {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            previewImg.src = data.image_url;
                            profileImg.src = data.image_url;
                            alert('Image uploaded successfully');
                        } else {
                            alert('Failed to upload image');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to upload image');
                    });
            });
        });
    </script>
@endsection
