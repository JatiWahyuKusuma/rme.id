<div class="sidebar"> 

    <!-- SidebarSearch Form --> 
    <div class="form-inline mt-2"></div> 

    <!-- Sidebar Menu --> 
    <nav class="mt-2"> 
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 

            <!-- Brand Logo --> 
            <a href="{{ url('/') }}" class="brand-link"> 
                <img src="{{ asset('images/logoSIGputih.png') }}" alt="AdminLTE Logo" 
                class="brand-image elevation-3" style="width: auto; height: 100px;">  <!-- Increased Size and Removed img-circle -->
            </a> 
            <!-- Sidebar user panel (optional) --> 
            <div class="user-panel mt-3 pb-3 mb-3 d-flex"> 
                <div class="image"> 
                    <img src="{{ asset('images/userr.png') }}" class="elevation-2" alt="User Image"> <!-- Removed img-circle -->
                </div> 
                <div class="info"> 
                    <a href="#" class="d-block">Super Admin</a> 
                </div> 
            </div> 

            <!-- Removed the horizontal line after the user panel --> 

            <li class="nav-item"> 
                <a href="{{ url('/') }}" class="nav-link {{ $activeMenu == 'dashboard' ? 'active' : '' }}"> 
                    <i class="nav-icon fas fa-tachometer-alt"></i> 
                    <p>Dashboard</p> 
                </a> 
            </li> 

            <hr style="border: none; border-top: 1px solid rgb(100, 100, 100); margin: 10px 0;"> <!-- Horizontal line after Dashboard --> 

            <li class="nav-header">Data Cadangan dan Potensi</li> 
            <li class="nav-item"> 
                <a href="{{ url('/ghopocad') }}" class="nav-link {{ $activeMenu == 'ghopocad' ? 'active' : '' }}"> 
                    <i class="nav-icon far fa-address-card"></i> 
                    <p>GHOPO Tuban</p> 
                </a> 
            </li> 

            <li class="nav-item"> 
                <a href="{{ url('/sgcad') }}" class="nav-link {{ $activeMenu == 'sgcad' ? 'active' : '' }}"> 
                    <i class="nav-icon far fa-address-card"></i> 
                    <p>SG Rembang</p> 
                </a> 
            </li> 

            <hr style="border: none; border-top: 1px solid rgb(100, 100, 100); margin: 10px 0;"> <!-- Horizontal line after Data Cadangan dan Potensi --> 

            <li class="nav-header">Data Vendor</li> 
            <li class="nav-item"> 
                <a href="{{ url('/ghopoven') }}" class="nav-link {{ $activeMenu == 'ghopoven' ? 'active' : '' }}"> 
                    <i class="nav-icon fas fa-user-friends"></i> 
                    <p>GHOPO Tuban</p> 
                </a> 
            </li> 

            <li class="nav-item"> 
                <a href="{{ url('/sgven') }}" class="nav-link {{ $activeMenu == 'sgven' ? 'active' : '' }}"> 
                    <i class="nav-icon fas fa-user-friends"></i> 
                    <p>SG Rembang</p> 
                </a> 
            </li> 

            <hr style="border: none; border-top: 1px solid rgb(100, 100, 100); margin: 10px 0;"> <!-- Horizontal line after Data Vendor --> 

            <li class="nav-header">Data User</li> 
            <li class="nav-item"> 
                <a href="{{ url('/level') }}" class="nav-link {{ $activeMenu == 'level' ? 'active' : '' }}"> 
                    <i class="nav-icon fas fa-cubes"></i> 
                    <p>Data Level</p> 
                </a> 
            </li> 

            <li class="nav-item"> 
                <a href="{{ url('/user') }}" class="nav-link {{ $activeMenu == 'user' ? 'active' : '' }}"> 
                    <i class="nav-icon fas fa-cash-register"></i> 
                    <p>Data Admin</p> 
                </a> 
            </li> 
        </ul> 
    </nav> 
</div> 
