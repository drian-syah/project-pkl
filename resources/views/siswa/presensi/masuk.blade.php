@extends('component.app')
@section('content')
<form action="{{ route('presensiStore') }}">
    @csrf
    <div class="card p-3 shadow-sm">
        <h4>Presensi Hari Ini</h4>
        <div class="mt-3">
            <label>Status Presensi</label><br>
            <label class="mr-1"><input type="radio" name="status" value="hadir"required> Hadir</label>
            <label class="mr-1"><input type="radio" name="status" value="hadir"> Izin</label>
            <label><input type="radio" name="status" value="hadir"> Sakit</label>
        </div>

        @include('component.kamera')
        
        
        <button type="submit" class="btn btn-success">Kirim Presensi</button>
    </div>
    <a href="{{ route('presensi') }}" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Kembali
</a>

</form>
@endsection