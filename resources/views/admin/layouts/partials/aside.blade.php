<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ url('dashboard-admin') }}" class="brand-link">
        <img src="{{ asset('assets/Dashboard/img/SIDIKALogo.png') }}" alt="logo SIDIKA"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">SIDIKA</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('dashboard-admin') }}"
                        class="nav-link {{ Request::is('dashboard-admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard-admin/pengajuan-perjalanan-dinas*') || Request::is('dashboard-admin/pelaporan-perjalanan-dinas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-plane"></i>
                        <p>
                            Perjalanan Dinas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/pengajuan-perjalanan-dinas') }}"
                                class="nav-link {{ Request::is('dashboard-admin/pengajuan-perjalanan-dinas') ? 'active' : '' }}">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Pengajuan Perjadin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/pelaporan-perjalanan-dinas') }}"
                                class="nav-link {{ Request::is('dashboard-admin/pelaporan-perjalanan-dinas') ? 'active' : '' }}">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Pelaporan Perjadin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard-admin/perencanaan-belanja-modal*') || Request::is('dashboard-admin/pengerjaan-belanja-modal*') || Request::is('dashboard-admin/pelaporan-belanja-modal*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>
                            Belanja Modal
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/perencanaan-belanja-modal') }}" class="nav-link">
                                <i class="far fa-calendar-alt nav-icon"></i>
                                <p>Perencanaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/pengerjaan-belanja-modal') }}" class="nav-link">
                                <i class="fas fa-wrench nav-icon"></i>
                                <p>Pengerjaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/pelaporan-belanja-modal') }}" class="nav-link">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Pelaporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard-admin/perencanaan-belanja-barjas*') || Request::is('dashboard-admin/pengerjaan-belanja-barjas*') || Request::is('dashboard-admin/pelaporan-belanja-barjas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            Belanja Barang Jasa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/perencanaan-belanja-barjas') }}" class="nav-link">
                                <i class="far fa-calendar-alt nav-icon"></i>
                                <p>Perencanaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/pengerjaan-belanja-barjas') }}" class="nav-link">
                                <i class="fas fa-wrench nav-icon"></i>
                                <p>Pengerjaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/pelaporan-belanja-barjas') }}" class="nav-link">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Pelaporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard-admin/anggaran-perjalanan-dinas*') || Request::is('dashboard-admin/anggaran-belanja-modal*') || Request::is('dashboard-admin/anggaran-belanja-barang-jasa*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-money-check-alt"></i>
                        <p>
                            Anggaran Biaya
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/anggaran-perjalanan-dinas') }}" class="nav-link">
                                <i class="fas fa-plane nav-icon"></i>
                                <p>Perjalanan Dinas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/anggaran-belanja-modal') }}" class="nav-link">
                                <i class="fas fa-wallet nav-icon"></i>
                                <p>Belanja Modal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-admin/anggaran-belanja-barang-jasa') }}" class="nav-link">
                                <i class="fas fa-box-open nav-icon"></i>
                                <p>Belanja Barang Jasa</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
