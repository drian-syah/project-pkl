@extends('component.app')

@section('content')

<div class="card p-4 shadow-sm">
    <h4>Tambah Pegawai</h4>

    <form action="{{ route('pegawaiStore') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>id User</label>
            <input type="text" class="form-control" name="user_id" required>
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" required>
        </div>

        <div class="mb-3">
            <label>NIP</label>
            <input type="email" class="form-control" name="nip" required>
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" class="form-control" name="jabatan_id" required>
        </div>
        <div class="mb-3">
            <label>Bidang</label>
            <input type="text" class="form-control" name="Bidang_id" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

@endsection
