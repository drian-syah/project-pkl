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

                <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" href="#masterdata" role="button">
                        <i class="fas fa-database"></i> User Management
                    </a>
                    <div class="collapse {{ $menuAdminUserShow ?? '' ? 'show' : ''}}" id="masterdata">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item {{ $menuAdminUser ?? '' }}">
                                <a class="nav-link" href="{{ route('user') }}">
                                    <i class="fas fa-user"></i> User
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="fas fa-user-tie"></i> Pegawai
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="">
                                    <i class="fas fa-user-graduate"></i> Siswa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="fas fa-user-check"></i> Pembimbing
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                

                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#bidang" role="button">
                        <i class="fas fa-database"></i>Master Data
                    </a>
                    <div class="collapse {{ $menuAdminPenempatanMasterDataShow ?? ''}}" id="bidang">
                        <ul class="nav flex-column ml-3">
                
                            <li class="nav-item {{ $menuAdminBidang ?? '' }}">
                                <a class="nav-link " href="{{ route ('daftarBidang') }}">
                                    <i class="fas fa-layer-group"></i> Daftar Bidang
                                </a>
                            </li>
                
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <i class="fas fa-plus-circle"></i> Tambah Bidang
                                </a>
                            </li>
                
                            <li class="nav-item {{ $menuAdminPenempatanBidang ?? '' }}">
                                <a class="nav-link" href="{{ route('penempatanBidang') }}">
                                    <i class="fas fa-briefcase"></i> Penempatan Bidang
                                </a>
                            </li>
                
                            <li class="nav-item {{ $MenuAdminJabatan ?? '' }}">
                                <a class="nav-link" href="{{ route('daftarJabatan') }}">
                                    <i class="fas fa-briefcase"></i> Jabatan
                                </a>
                            </li>
                
                            <li class="nav-item {{ $MenuAdminTambahJabatan ?? '' }}">
                                <a class="nav-link" href="{{ route('tambahJabatan') }}">
                                    <i class="fas fa-briefcase"></i> Tambah Jabatan
                                </a>
                            </li>
                
                            <li class="nav-item {{ $menuAdminPenempatanJabatan ?? '' }}">
                                <a class="nav-link" href="{{ route('penempatanJabatan') }}">
                                    <i class="fas fa-briefcase"></i> Penempatan Jabatan
                                </a>
                            </li>
                
                        </ul>
                    </div>
                </li>
                


                <li class="nav-item {{ $menuAdminPengajuan ?? '' }}">
                    <a class="nav-link" href="{{ route('adminPengajuan') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <span>PENGAJUAN PKL MAGANG</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item {{ $menuAdminPenempatan ?? '' }}">
                    <a class="nav-link" href="{{ route('penempatan') }}">
                        <i class="fas fa-fw fa-tasks"></i>
                        <span>MENU PENEMPATAN</span></a>

                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    MENU PEMBIMBING
                </div>


                <!-- Nav Item - Tables -->
                <li class="nav-item {{ $menuAdminPembimbingTugas ?? '' }}">
                    <a class="nav-link" href="{{ route('tugas') }}">
                        <i class="fas fa-fw fa-tasks"></i>
                        <span>MENU TUGAS</span>
                    </a>
                </li>

                <li class="nav-item {{ $menuAdminPembimbingPenilaian ?? '' }}">
                    <a class="nav-link" href="{{ route('pembimbingPenilaian') }}">
                        <i class="fas fa-fw fa-tasks"></i>
                        <span>MENU PENILAIAN</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    MENU SISWA
                </div>


                <!-- Nav Item - Tables -->
                <li class="nav-item {{ $menuAdminSiswaPresensi ?? '' }}">
                    <a class="nav-link" href="{{ route('tugas') }}">
                        <i class="fas fa-fw fa-tasks"></i>
                        <span>MENU TUGAS</span>
                    </a>
                </li>

                <li class="nav-item {{ $menuAdminPembimbingPenilaian ?? '' }}">
                    <a class="nav-link" href="{{ route('pembimbingPenilaian') }}">
                        <i class="fas fa-fw fa-tasks"></i>
                        <span>MENU PENILAIAN</span>
                    </a>
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
                {{-- <li class="nav-item {{ $menuSiswaPresensi ?? '' }}">
                        <a class="nav-link" href="{{ route('presensi') }}">
                            <i class="fas fa-user"></i>
                            <span>Presensi</span></a> --}}
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

                @can('isSekolah')
                    <div class="sidebar-heading">
                        MENU SEKOLAH
                    </div>

                <li class="nav-item {{ $menuSekolah ?? '' }}">
                    <a class="nav-link" href="{{ route('sekolah') }}">
                        <i class="fas fa-user"></i>
                        <span>Pengajuan</span></a>
                @endcan

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

        </ul>
        <!-- End of Sidebar -->
