<nav class="navbar navbar-expand-lg bg-third sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('dashboard') }}">
            <img src="{{ asset('assets/Dashboard/img/SIDIKA_rpl.png') }}" style="width: 140px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 center-navbar">
                <li class="nav-item">
                    <a class="nav-link active text-dark" aria-current="page" href="{{ url('dashboard') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Perjalanan Dinas
                    </a>
                    <ul class="dropdown-menu rounded-0">
                        <li><a class="dropdown-item" href="{{ url('ketentuan-perjalanan-dinas') }}">Ketentuan
                                Perjalanan Dinas</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ url('pengajuan-perjalanan-dinas') }}">Pengajuan Perjalanan
                                Dinas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Belanja Modal
                    </a>
                    <ul class="dropdown-menu rounded-0">
                        <li><a class="dropdown-item" href="{{ url('ketentuan-belanja-modal') }}">Ketentuan Belanja
                                Modal</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ url('perencanaan-belanja-modal') }}">Perencanaan Belanja
                                Modal</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Barang Jasa
                    </a>
                    <ul class="dropdown-menu rounded-0">
                        <li><a class="dropdown-item" href="{{ url('ketentuan-belanja-barang-jasa') }}">Ketentuan Barang
                                Jasa</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ url('perencanaan-belanja-barjas') }}">Pengajuan Belanja
                                Barang Jasa</a>
                        </li>
                        {{-- <li><a class="dropdown-item" href="/pengerjaan-belanja-barjas">Pengerjaan Belanja Barang Jasa</a>
                        </li>
                        <li><a class="dropdown-item" href="/pelaporan-belanja-barjas">Pelaporan Belanja Barang Jasa</a></li> --}}
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ url('bantuan') }}">Bantuan</a>
                </li>
            </ul>
            <div id="profile" class="profile-large dropstart">
                <a class="btn dropdown" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                    <div style="display: flex; align-items: center;">
                        <!-- Nama pengguna di sebelah kiri -->
                        <span>{{ Auth::user()->nama }}</span>

                        <!-- Foto profil di sebelah kanan -->
                        <img src="{{ Auth::user()->profile_photo_url ?? asset('assets/Dashboard/img/user.svg') }}"
                            alt="Profile" class="rounded-5"
                            style="width: 50px; height: 50px; border-radius: 50%; margin-left: 10px;">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-start rounded-0">
                    <li><a class="dropdown-item" href="{{ route('profile', Auth::user()->id) }}"><i
                                class="bi bi-gear-fill"></i>
                            Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="bi bi-box-arrow-right"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </li>
                </ul>
            </div>
            <div id="profile-small" class="profile-small">
                <a class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <span>{{ Auth::user()->nama }}</span>
                    <img src="{{ Auth::user()->profile_photo_url ?? asset('assets/Dashboard/img/user.jpg') }}"
                        alt="Profile" class="rounded-0" style="width: 30px; border-radius: 50%;">
                </a>
                <ul class="dropdown-menu rounded-0">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile', Auth::user()->id) }}"><i
                                class="bi bi-gear-fill mr-2"></i>
                            Profile</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bi bi-box-arrow-right mr-2"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
