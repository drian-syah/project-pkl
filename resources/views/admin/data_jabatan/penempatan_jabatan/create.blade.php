@extends('component/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user-check mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header bg-primary text-white">
        <a href="{{ route('penempatanJabatan') }}" class="text-white">
            <i class="fas fa-arrow-left mr-2"></i> Kembali
        </a>
    </div>

    <div class="card-body">
        <form action="{{ route('penempatanJabatanStore') }}" method="POST">
            @csrf

            {{-- NIP --}}
            <div class="mb-3">
                <label class="form-label">
                    <span class="text-danger">*</span> NIP
                </label>
                <select name="nip" id="nip" class="form-control @error('nip') is-invalid @enderror">
                    <option selected disabled>-- Pilih Nomor Induk Pegawai --</option>
                    @foreach ($pegawai as $item)
                        <option value="{{ $item->nip }}">{{ $item->nip }} - {{ $item->nama }}</option>
                    @endforeach
                </select>
                @error('nip')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Nama --}}
            <div class="mb-3">
                <label class="form-label">Nama Pegawai</label>
                <input type="text" id="nama" class="form-control" disabled>
            </div>

            {{-- Email & Jabatan --}}
            <div class="row">
                <div class="col-xl-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" id="email" class="form-control" disabled>
                </div>

                <div class="col-xl-6 mb-3">
                    <label class="form-label">Bidang</label>
                    <input type="text" id="bidang_id" class="form-control" disabled>
                </div>
            </div>

            {{-- Bidang --}}
            <div class="mb-3">
                <label class="form-label">
                    <span class="text-danger">*</span> Jabatan
                </label>
                <select name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                    <option selected disabled>-- Pilih Jabatan --</option>
                    @foreach ($jabatan as $jbtn)
                        <option value="{{ $jbtn->id }}">{{ $jbtn->nama_jabatan }}</option>
                    @endforeach
                </select>
                @error('jabatan_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="mt-3 d-flex">
                <button type="submit" class="btn btn-primary btn-sm mr-2">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
            </div>

        </form>
    </div>
</div>

{{-- Script Autofill Data --}}
<script>
document.getElementById('nip').addEventListener('change', function() {
    const nip = this.value;
    
    // Reset fields jika tidak ada NIP dipilih
    if (!nip) {
        document.getElementById('nama').value = '';
        document.getElementById('email').value = '';
        document.getElementById('bidang_id').value = '';
        return;
    }

    // Fetch data pegawai
    fetch('/admin/penempatanjabatan/getPegawai/' + nip)
        .then(res => res.json())
        .then(data => {
            document.getElementById('nama').value = data.nama ?? '';
            document.getElementById('email').value = data.email ?? '';
            document.getElementById('bidang_id').value = data.bidang_id ?? 'N/A';
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal mengambil data pegawai');
        });
});
</script>
@endsection