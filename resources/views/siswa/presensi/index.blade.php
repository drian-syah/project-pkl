@extends('component/app')
@section('content')

<div class="container mt-4">
    <div class="card p-4 shadow-sm " align="center">
        <!-- Foto Profil -->
        <div>
            <img class="img-profile rounded-circle mb-2" 
                 src="{{ asset('sbadmin2/img/undraw_profile.svg') }}" 
                 width="70" height="70" alt="User Profile">
            <h5 class="mt-2 mb-0 text-gray-800">{{ auth()->user()->nama }}</h5>
            <small class="text-muted">Siswa PKL / Magang</small>
        </div>

        <!-- Menu Presensi -->
        <div class="row justify-content-center mt-4">
            <!-- Presensi Masuk -->
            <div class="col-12 col-md-5 mb-3">
                <a href="{{ route('presensiMasuk') }}" class="text-decoration-none text-dark">

                    <div class=" h-100 border-0 shadow-sm hover-shadow transition">

                    <div class="card h-100 border-0 shadow-sm hover-shadow transition">

                        <div class="card-body">
                            <h5 class="card-title fw-bold">Presensi Masuk</h5>
                            <p class="card-text mb-0">Presensi masuk untuk siswa PKL dan Magang</p>
                            <small class="text-muted">pada pukul 06.00 WIB</small>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Presensi Pulang -->
            <div class="col-12 col-md-5 mb-3">
                <a href="{{ route('presensiPulang') }}" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Presensi Pulang</h5>
                            <p class="card-text mb-0">Presensi keluar untuk siswa PKL dan Magang</p>
                            <small class="text-muted">pada pukul 16.00 WIB</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan sedikit CSS agar efek hover lebih halus -->
<style>
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        transform: translateY(-2px);
        transition: all 0.2s ease-in-out;
    }
    .transition {
        transition: all 0.2s ease-in-out;
    }
</style>

@endsection
