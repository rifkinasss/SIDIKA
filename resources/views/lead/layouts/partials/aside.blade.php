<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/Dashboard/img/SIDIKALogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">SIDIKA</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('dashboard-pimpinan') }}"
                        class="nav-link {{ Request::is('dashboard-pimpinan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard-pimpinan/pengajuan-perjalanan-dinas*') || Request::is('dashboard-pimpinan/pelaporan-perjalanan-dinas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-plane"></i>
                        <p>
                            Perjalanan Dinas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard-pimpinan/pengajuan-perjalanan-dinas') }}"
                                class="nav-link {{ Request::is('dashboard-pimpinan/pengajuan-perjalanan-dinas') ? 'active' : '' }}">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Pengajuan Perjadin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-pimpinan/pelaporan-perjalanan-dinas') }}"
                                class="nav-link {{ Request::is('dashboard-pimpinan/pelaporan-perjalanan-dinas') ? 'active' : '' }}">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Pelaporan Perjadin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard-pimpinan/perencanaan-belanja-modal*') || Request::is('dashboard-pimpinan/pengerjaan-belanja-modal*') || Request::is('dashboard-pimpinan/pelaporan-belanja-modal*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>
                            Belanja Modal
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard-pimpinan/perencanaan-belanja-modal') }}" class="nav-link">
                                <i class="far fa-calendar-alt nav-icon"></i>
                                <p>Perencanaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-pimpinan/pengerjaan-belanja-modal') }}" class="nav-link">
                                <i class="fas fa-wrench nav-icon"></i>
                                <p>Pengerjaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-pimpinan/pelaporan-belanja-modal') }}" class="nav-link">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Pelaporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ Request::is('dashboard-pimpinan/perencanaan-belanja-barjas*') || Request::is('dashboard-pimpinan/pengerjaan-belanja-barjas*') || Request::is('dashboard-pimpinan/pelaporan-belanja-barjas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            Belanja Barang Jasa
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('dashboard-pimpinan/perencanaan-belanja-barjas') }}" class="nav-link">
                                <i class="far fa-calendar-alt nav-icon"></i>
                                <p>Perencanaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-pimpinan/pengerjaan-belanja-barjas') }}" class="nav-link">
                                <i class="fas fa-wrench nav-icon"></i>
                                <p>Pengerjaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('dashboard-pimpinan/pelaporann-belanja-barjas') }}" class="nav-link">
                                <i class="far fa-file-alt nav-icon"></i>
                                <p>Pelaporan</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
