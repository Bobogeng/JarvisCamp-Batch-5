<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
        <img src="{{ asset('assets') }}/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets') }}/img/photo-profile.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Irsal Fathi Farhat</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Manajemen Tugas</li>
                <li class="nav-item">
                    <a href="{{ route('tasks.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Daftar Tugas</p>
                    </a>
                </li>
                <li class="nav-header">Kelola Database</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Daftar Table
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tasks') }}" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Tugas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('categories') }}" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Kategori</p>
                            </a> --}}
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('status') }}" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Status</p>
                            </a> --}}
                        </li>
                        <li class="nav-item">
                            {{-- <a href="{{ route('projects') }}" class="nav-link">
                                <i class="fas fa-table nav-icon"></i>
                                <p>Proyek</p>
                            </a> --}}
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
