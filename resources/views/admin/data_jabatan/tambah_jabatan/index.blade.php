@extends('component/app')

@section('content')

<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>
    {{ $title }}</h1>


<div class="card">
    <div class="card-body">
        <form action="{{ route('tambahJabatanStore') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control @error('nama_jabatan') is-invalid @enderror"
                        value="{{ old('nama_jabatan') }}" placeholder="Masukkan nama jabatan" required>
                    @error('nama_jabatan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    Tambah
                </button>

        </form>
    </div>
</div>
@endsection