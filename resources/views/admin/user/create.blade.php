{{-- @extends('component/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>
    {{ $title }}</h1>


<div class="card">
    <div class="card-header bg-primary text-white">
        <a href="{{ route('user') }}" class="btn text-white">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('userStore') }}" method="post">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Nama
                    </label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Email
                    </label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    <span class="text-danger">*</span> Role
                </label>
                <select name="role" class="form-control @error('role') is-invalid @enderror">
                    <option selected disabled>--Pilih Role--</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Pembimbing" {{ old('role') == 'Pembimbing' ? 'selected' : '' }}>Pembimbing</option>
                    <option value="Siswa" {{ old('role') == 'Siswa' ? 'selected' : '' }}>Siswa</option>
                    <option value="Siswa" {{ old('role') == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                </select>
                @error('role')
                    <small class="text-danger">{{ $message }}</small>
                @enderror 
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Password
                    </label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>

            <div class="mr-2">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save mr-2"></i> Simpan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection --}}

@extends('component/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary text-white">
        <a href="{{ route('user') }}" class="btn text-white">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('userStore') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Username
                    </label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Id Pegawai
                    </label>
                    <input type="text" name="pegawai_id" class="form-control @error('pegawai_id') is-invalid @enderror" value="{{ old('pegawai_id') }}">
                    @error('pegawai_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Nama
                    </label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Email
                    </label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- Role --}}
            <div class="mb-3">
                <label class="form-label">
                    <span class="text-danger">*</span> Role
                </label>
                <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}">
                    <option selected disabled>--Pilih Role--</option>
                    <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Pembimbing" {{ old('role') == 'Pembimbing' ? 'selected' : '' }}>Pembimbing</option>
                    <option value="Siswa" {{ old('role') == 'Siswa' ? 'selected' : '' }}>Siswa</option>
                    <option value="Sekolah" {{ old('role') == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                </select>
                @error('role')
                    <small class="text-danger">{{ $message }}</small>
                @enderror 
            </div>
            {{-- Password --}}
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Password
                    </label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>

            <div class="mr-2">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save mr-2"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
