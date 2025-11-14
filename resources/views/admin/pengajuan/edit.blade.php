@extends('component/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i>
    {{ $title }}</h1>

<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('adminPengajuan') }}" class="btn text-white">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali</a>
    </div>
        <div class="card-body">

            <form action="{{ route('adminPengajuanUpdate', $pengajuan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> No Surat</label>
                    <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror"
                        value="{{ $pengajuan->no_surat }}" placeholder="Masukkan nomor surat">
                    @error('no_surat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Tanggal Surat</label>
                    <input type="date" name="tgl_surat" class="form-control @error('tgl_surat') is-invalid @enderror"
                        value="{{ $pengajuan->tgl_surat }}">
                    @error('tgl_surat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <input type="hidden" name="sekolah_id" value="{{ old('sekolah_id', $pengajuan->sekolah_id) }}">


            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Periode Mulai</label>
                    <input type="date" name="periode_mulai"
                        class="form-control @error('periode_mulai') is-invalid @enderror"
                        value="{{ $pengajuan->periode_mulai }}">
                    @error('periode_mulai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Periode Selesai</label>
                    <input type="date" name="periode_selesai"
                        class="form-control @error('periode_selesai') is-invalid @enderror"
                        value="{{ $pengajuan->periode_selesai }}">
                    @error('periode_selesai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Jumlah Siswa</label>
                    <input type="number" name="jumlah_siswa"
                        class="form-control @error('jumlah_siswa') is-invalid @enderror"
                        value="{{ $pengajuan->jumlah_siswa }}" placeholder="Masukkan jumlah siswa">
                    @error('jumlah_siswa')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> File Surat Pengajuan</label>
                    <input type="file" name="file_surat_path"
                        class="form-control @error('file_surat_path') is-invalid @enderror">
                    @error('file_surat_path')
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