@extends('component/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i>
    {{ $title }}</h1>

<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('daftarBidang') }}" class="btn text-white">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali</a>
    </div>
        <div class="card-body">

            <form action="{{ route('updateBidang', $bidang->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ $bidang->nama }}" placeholder="Masukkan nama">
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Kode</label>
                    <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror"
                        value="{{ $bidang->kode }}" placeholder="Masukkan kode">
                    @error('kode')
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

@endsection