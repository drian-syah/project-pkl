@extends('component/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i>
    {{ $title }}</h1>

<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('daftarJabatan') }}" class="btn text-white">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali</a>
    </div>
        <div class="card-body">

            <form action="{{ route('updateJabatan', $jabatan->id ) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control @error('nama_jabatan') is-invalid @enderror"
                        value="{{ $jabatan->nama_jabatan }}" placeholder="Masukkan nama jabatan">
                    @error('nama_jabatan')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
    
            <div class="d-flex justify-content-end gap-2">
                {{-- Simpan sebagai Draft --}}

                {{-- Kirim ke Admin --}}
                <button type="submit" class="btn btn-primary btn-sm">
                    Edit
                </button>
            </div>
        </div>
    </div>

@endsection