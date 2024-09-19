<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header">Data Cadangan dan Potensi</li>
            <li class="nav-item">
                <a href="{{ url('/ghopo') }}" class="nav-link {{ $activeMenu == 'ghopocad' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>GHOPO Tuban</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/sg') }}" class="nav-link {{ $activeMenu == 'sgcad' ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>SG Rembang</p>
                </a>
            </li>
            <li class="nav-header">Data Vendor</li>
            <li class="nav-item">
                <a href="{{ url('/ghopo') }}" class="nav-link {{ $activeMenu == 'ghopoven' ? 'active' : '' }} ">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>GHOPO Tuban</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/barang') }}" class="nav-link {{ $activeMenu == 'sgven' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-box"></i>
                    <p>SG Rembang</p>
                </a>
            </li>
            <li class="nav-header">Data User</li>
            <li class="nav-item">
                <a href="{{ url('/level') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>Data Level</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/penjualan') }}" class="nav-link {{ $activeMenu == 'admin' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>Data Admin</p>
                </a>
            </li>
        </ul>
    </nav>
</div>
