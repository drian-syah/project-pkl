@extends('component/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i>
    {{ $title }}</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-header bg-primary">
       
    </div>
    <div class="card-body">

        <form action="{{ route('updateSetting') }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="row mb-2">
                <div class="col-xl-6 mb-1">
                    <label class="form-label">
                        <span class="text-danger">*</span> Nama :
                    </label>
                    <input type="text" 
                           name="nama" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('nama', $user->nama) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="col-xl-6">
                    <label class="form-label mb-1">
                        <span class="text-danger">*</span> Email :
                    </label>
                    <input type="email" 
                           name="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           value="{{ old('email', $user->email) }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- Jabatan (optional, kalau memang mau ikut diubah) --}}
            <div class="row mb-2">
                <div class="col-xl-12 mb-1">
                    <label class="form-label">
                        Jabatan :
                    </label>
                    <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" disabled>
                        <option disabled>--Pilih Jabatan--</option>
                        <option value="Admin" {{ old('jabatan', $user->jabatan) == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Karyawan" {{ old('jabatan', $user->jabatan) == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                    </select>
                    @error('jabatan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror 
                </div>
            </div>

            {{-- Password --}}
            <div class="row mb-2">
                <div class="col-xl-6 mb-1">
                    <label class="form-label">
                        Password (opsional) :
                    </label>
                    <input type="password" 
                           name="password" 
                           class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-xl-6">
                    <label class="form-label">
                        Konfirmasi Password :
                    </label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>


            <div class="d-flex justify-content-between">
                <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            <button type="submit" class="btn btn-sm btn-primary mr-2">
                <i class="fas fa-edit"></i> Simpan
            </button>
            </div>
        </form>
    </div>
</div>
@endsection
