<aside class="main-sidebar sidebar-light-primary elevation-4">
    <a href="{{ route('superadmin') }}" class="brand-link">
        <img src="{{ asset('assets/Dashboard/img/SIDIKALogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">SIDIKA</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('dashboard-superadmin') }}"
                        class="nav-link {{ Request::is('dashboard-superadmin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard-superadmin/user-management') }}"
                        class="nav-link {{ Request::is('dashboard-superadmin/user-management*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User Management
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
