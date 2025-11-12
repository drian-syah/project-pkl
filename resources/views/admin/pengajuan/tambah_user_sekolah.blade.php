@extends('component/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>
    {{ $title }}</h1>


<div class="card">
    <div class="card-header bg-primary text-white">
        <a href="{{ route('adminPengajuanCreate') }}" class="btn text-white">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali</a>
</div>

<div class="card-body">
<form class="user" action="{{ route('daftarUserSekolah') }}" method="POST">
    @csrf

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label"><span class="text-danger">*</span> Nama Sekolah</label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                value="{{ old('nama') }}" placeholder="Masukkan nama sekolah" required>
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="col-md-6">
            <label class="form-label"><span class="text-danger">*</span> NPSN</label>
            <input type="text" name="npsn" class="form-control @error('npsn') is-invalid @enderror"
                value="{{ old('npsn') }}" placeholder="Masukkan NPSN" required>
            @error('npsn')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label"><span class="text-danger">*</span> Alamat Sekolah</label>
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                value="{{ old('alamat') }}" placeholder="Masukkan alamat sekolah" required>
            @error('alamat')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label"><span class="text-danger">*</span> Kontak Sekolah</label>
            <input type="text" name="kontak"
                class="form-control @error('kontak') is-invalid @enderror"
                value="{{ old('kontak') }}" placeholder="Masukkan kontak sekolah" required>
            @error('kontak')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
        <button type="submit" class="btn btn-primary btn-sm">
            Daftar  
        </button>
    </div>
</form>
</div>
@endsection