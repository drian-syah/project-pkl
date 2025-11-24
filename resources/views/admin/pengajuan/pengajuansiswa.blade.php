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
        <form action="{{ route('adminPengajuanDaftarSiswa', $pengajuan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id()}}">
            <input type="hidden" name="pengajuan_id" value="{{ old('pengajuan_id', $pengajuan->id) }}">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}" placeholder="Masukkan Nama" required>
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> NISN</label>
                    <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror"
                        value="{{ old('nisn') }}" placeholder="Masukkan NISN" required>
                    @error('nisn')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Kelas</label>
                    <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror"
                        value="{{ old('kelas') }}" placeholder="Masukkan Kelas" required>
                    @error('kelas')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Jurusan</label>
                    <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror"
                        value="{{ old('jurusan') }}" placeholder="Masukkan Jurusan" required>
                    @error('jurusan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-md-14 mb-3">
                <label class="form-label"><span class="text-danger">*</span> Foto</label>
                    <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                        value="{{ old('foto') }}" placeholder="Masukkan Foto" required>
                    @error('foto')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    Kirim
                </button>

        </form>
    </div>
</div>
@endsection