@extends('component/app')
@section('content')

<form action="{{ route('presensiStore') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="card p-3 shadow-sm">
    <h4>Presensi Hari Ini</h4>
    <div class="d-flex">

    <div>
    <img class="img-profile rounded-circle" src="{{ asset('sbadmin2/img/undraw_profile.svg ') }}" width="50">
    </div>

    <div class="mt-2 ml-2">
    <span class="d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nama }}</span>
    </div>
    
    </div>
    <div class="mt-3">
        <label>Status Presensi</label><br>
        <label class="mr-1"><input type="radio" name="status" value="hadir"required> Hadir</label>
        <label class="mr-1"><input type="radio" name="status" value="hadir"> Izin</label>
        <label><input type="radio" name="status" value="hadir"> Sakit</label>
    </div>



    <div class="mt-3">
        <label>Upload Foto (bukti/selfie)</label>
        <input type="file" name="foto" accept="image/*" capture="camera" class="form-control"required>
        <small class="text-muted">Gunakan kamera depan untuk selfie (jika presensi hadir)</small>
    </div>
    <button type="submit" class="btn btn-success">Kirim Presensi</button>
</div>
</form>

@endsection