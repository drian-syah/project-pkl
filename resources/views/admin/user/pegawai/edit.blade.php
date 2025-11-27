@extends('component.app')

@section('content')

<div class="card p-4 shadow-sm">
    <h4>Edit Pegawai</h4>

    <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $pegawai->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ $pegawai->email }}" required>
        </div>

        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" class="form-control" name="jabatan" value="{{ $pegawai->jabatan }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
