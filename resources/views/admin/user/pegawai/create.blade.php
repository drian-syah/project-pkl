@extends('component.app')

@section('content')
<div class="card-header bg-primary">
    <a href="{{ route('pegawaiIndex') }}" class="text-white">
        <i class="fas fa-arrow-left mr-2"></i>
        Kembali</a>
    </div>
<div class="card p-4 shadow-sm">
    <h4>{{ $title }}</h4>

    <form action="{{ route('pegawaiStore') }}" method="POST">
        @csrf

        <select name="user_id" id="userSelect" class="form-control">
            <option value="">-- Pilih User --</option>
            @foreach ($user as $u)
                <option value="{{ $u->id }}" data-nama="{{ $u->nama }}">{{ $u->nama }}</option>
            @endforeach
        </select>
        
        <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" id="namaInput" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>NIP</label>
            <input type="number" class="form-control" name="nip" required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                <span class="text-danger">*</span> Bidang
            </label>
            <select name="bidang_id" class="form-control @error('bidang_id') is-invalid @enderror">
                <option selected disabled>-- Pilih Bidang --</option>
                @foreach ($bidang as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
            @error('bidang_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">
                <span class="text-danger">*</span> Jabatan
            </label>
            <select name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                <option selected disabled>-- Pilih Jabatan --</option>
                @foreach ($jabatan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                @endforeach
            </select>

            @error('jabatan_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    document.getElementById('userSelect').addEventListener('change', function() {
        let selected = this.options[this.selectedIndex];
        let nama = selected.getAttribute('data-nama');
    
        document.getElementById('namaInput').value = nama ?? '';
    });
    </script>
    

@endsection
