@extends('component.app')
 @include('component.kamera')
@section('content')
<form action="{{ route('presensiStore') }}">
    @csrf
    <div class="card p-3 shadow-sm">
        <h4>Presensi Pulang Hari Ini</h4>
        
    
        <div class="mt-3">
            <label>Upload Foto (bukti/selfie)</label>
            <input type="file" name="foto" accept="image/*" capture="camera" class="form-control"required>
            <small class="text-muted">Gunakan kamera depan untuk selfie (sebagai bentuk bukti bahwa sudah jam pulang)</small>
        </div>
        <button type="submit" class="btn btn-success">Kirim Presensi</button>

    </div>
    <a href="{{ route('presensi') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Kembali </a>
    

</form>
@endsection