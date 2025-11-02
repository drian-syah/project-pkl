{{-- @extends('component/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>


    <div class="card">
        <div class="card-header bg-primary text-white">
            <a href="{{ route('sekolah') }}" class="btn text-white">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('SekolahPengajuan') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">
                            <span class="text-danger">*</span> No Surat
                        </label>
                        <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror"
                            value="{{ old('no_surat') }}" required>
                        @error('no_surat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">
                            <span class="text-danger">*</span> Tanggal Surat
                        </label>
                        <input type="date" name="tgl_surat" class="form-control @error('tgl_surat') is-invalid @enderror"
                            value="{{ old('tgl_surat') }}" required>
                        @error('tgl_surat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <input type="hidden" name="sekolah_id" value="{{ auth()->user()->sekolah->id }}">


                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">
                            <span class="text-danger">*</span> Periode Mulai
                        </label>    x
                        <input type="date" name="periode_mulai"
                            class="form-control @error('periode_mulai') is-invalid @enderror" required>
                        @error('periode_mulai')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">
                            <span class="text-danger">*</span> Periode Selesai
                        </label>
                        <input type="date" name="periode_selesai"
                            class="form-control @error('periode_selesai') is-invalid @enderror" required>
                        @error('periode_selesai')
                            <small class="text-danger">{{ $message }}<small>
                                @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">
                            <span class="text-danger">*</span> Jumlah Siswa
                        </label>
                        <input type="number" name="jumlah_siswa"
                            class="form-control @error('jumlah_siswa') is-invalid @enderror" required>
                        @error('jumlah_siswa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">
                            <span class="text-danger">*</span> File Surat Pengajuan
                        </label>
                        <input type="file" name="file_surat"
                            class="form-control @error('file_surat') is-invalid @enderror" required>
                        @error('file_surat')
                            <small class="text-danger">{{ $message }}<small>
                                @enderror
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


{{-- @extends('component/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span><i class="fas fa-file-alt mr-2"></i> Form Pengajuan PKL/Magang</span>
        <a href="{{ route('pengajuanSekolah') }}" class="btn btn-light btn-sm">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('SekolahPengajuan') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> No Surat</label>
                    <input type="text" name="no_surat"
                        class="form-control @error('no_surat') is-invalid @enderror"
                        value="{{ old('no_surat') }}" required>
                    @error('no_surat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Tanggal Surat</label>
                    <input type="date" name="tgl_surat"
                        class="form-control @error('tgl_surat') is-invalid @enderror"
                        value="{{ old('tgl_surat') }}" required>
                    @error('tgl_surat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <input type="hidden" name="sekolah_id" value="{{ auth()->user()->sekolah->id }}">

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Periode Mulai</label>
                    <input type="date" name="periode_mulai"
                        class="form-control @error('periode_mulai') is-invalid @enderror"
                        value="{{ old('periode_mulai') }}" required>
                    @error('periode_mulai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> Periode Selesai</label>
                    <input type="date" name="periode_selesai"
                        class="form-control @error('periode_selesai') is-invalid @enderror"
                        value="{{ old('periode_selesai') }}" required>
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
                        value="{{ old('jumlah_siswa') }}" required>
                    @error('jumlah_siswa')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label"><span class="text-danger">*</span> File Surat Pengajuan</label>
                    <input type="file" name="file_surat"
                        class="form-control @error('file_surat') is-invalid @enderror" required>
                    @error('file_surat')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save mr-1"></i> Simpan Sebagai Draft
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
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <span><i class="fas fa-file-alt mr-2"></i> Form Pengajuan PKL/Magang</span>
            <a href="{{ route('pengajuanSekolah') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('SekolahPengajuan') }}" method="post" enctype="multipart/form-data" id="formPengajuan">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label"><span class="text-danger">*</span> No Surat</label>
                        <input type="text" name="no_surat" class="form-control @error('no_surat') is-invalid @enderror"
                            value="{{ old('no_surat') }}" placeholder="Masukkan nomor surat" required>
                        @error('no_surat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"><span class="text-danger">*</span> Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="form-control @error('tgl_surat') is-invalid @enderror"
                            value="{{ old('tgl_surat') }}" required>
                        @error('tgl_surat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <input type="hidden" name="sekolah_id" value="{{ auth()->user()->sekolah->id }}">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label"><span class="text-danger">*</span> Periode Mulai</label>
                        <input type="date" name="periode_mulai"
                            class="form-control @error('periode_mulai') is-invalid @enderror"
                            value="{{ old('periode_mulai') }}" required>
                        @error('periode_mulai')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"><span class="text-danger">*</span> Periode Selesai</label>
                        <input type="date" name="periode_selesai"
                            class="form-control @error('periode_selesai') is-invalid @enderror"
                            value="{{ old('periode_selesai') }}" required>
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
                            value="{{ old('jumlah_siswa') }}" placeholder="Masukkan jumlah siswa" required>
                        @error('jumlah_siswa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label"><span class="text-danger">*</span> File Surat Pengajuan</label>
                        <input type="file" name="file_surat"
                            class="form-control @error('file_surat') is-invalid @enderror" required>
                        @error('file_surat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-end gap-2">
                    {{-- Simpan sebagai Draft --}}

                    {{-- Kirim ke Admin --}}
                    <button type="submit" name="action" value="kirim" class="btn btn-primary btn-sm">
                        <i class="fas fa-paper-plane mr-1"></i> Kirim ke Admin Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Optional konfirmasi kirim --}}
    <script>
        document.getElementById('formPengajuan').addEventListener('submit', function (e) {
            const action = e.submitter.value;
            if (action === 'kirim') {
                const confirmSend = confirm('Yakin ingin langsung mengirim pengajuan ke admin?');
                if (!confirmSend) e.preventDefault();
            }
        });
    </script>
@endsection


