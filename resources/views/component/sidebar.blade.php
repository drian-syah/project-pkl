        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('welcome') }}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="font-size: 13px">Aplikasi Pengajuan Pkl Magang</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $menuDashboard ?? '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            
            @can('isAdmin')
                <!-- Heading -->
                <div class="sidebar-heading">
                    MENU Admin
                </div>
            
            <!-- Nav Item - Charts -->

            
            <li class="nav-item {{ $menuAdminPengajuan ?? '' }}">
                <a class="nav-link" href="{{ route('pengajuan') }}">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Pengajuan Pkl Magang</span></a>
                </li>
                
                <!-- Nav Item - Tables -->
                <li class="nav-item {{ $menuAdminPenempatan ?? '' }}">
                    <a class="nav-link" href="{{ route('penempatan') }}">
                        <i class="fas fa-fw fa-tasks"></i>
                        <span>Menu Penempatan</span></a>

                    </li>
            @endcan
            @can('isPembimbing')
                     <!-- Heading -->
            <div class="sidebar-heading">
                MENU PEMBIMBING
            </div>

            
            <!-- Nav Item - Tables -->
            <li class="nav-item {{ $menuPembimbingTugas ?? '' }}">
                <a class="nav-link" href="{{ route('pembimbing') }}">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Data Tugas</span></a>
            </li>

            @endcan

            @can('isSiswa')
            <div class="sidebar-heading">
                MENU SISWA
            </div>

            <li class="nav-item {{ $menuSiswaPresensi ?? '' }}">
                <a class="nav-link" href="{{ route('presensi') }}">
                    <i class="fas fa-user"></i>
                    <span>Presensi</span></a>
            @endcan




            
                    

           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->