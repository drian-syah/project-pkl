@extends('component/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>
    {{ $title }}</h1>


<div class="card">
    <div class="card-header bg-primary text-white">
        <a href="{{ route('adminPengajuan') }}" class="btn text-white">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('adminPengajuanStore') }}" method="post">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> No Surat
                    </label>
                    <input type="number" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror" value="{{ old('no_surat') }}">
                    @error('no_surat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">
                        <span class="text-danger">*</span> Sekolah
                    </label>
                    <input type="text" name="sekolah" class="form-control @error('sekolah') is-invalid @enderror" value="{{ old('sekolah') }}">
                    @error('sekolah')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    <span class="text-danger">*</span> Jabatan
                </label>
                <select name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                    <option selected disabled>--Pilih Jabatan--</option>
                    <option value="Admin" {{ old('jabatan') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="Karyawan" {{ old('jabatan') == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                </select>
                @error('jabatan')
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
@endsection
