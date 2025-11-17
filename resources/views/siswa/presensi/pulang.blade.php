@extends('component.app')

@section('content')

<form action="{{ route('presensiStore') }}" method="POST">
    @csrf

    <div class="card p-3 shadow-sm">
        <h4>Presensi Pulang Hari Ini</h4>
        @include('component.kamera')

        <button type="submit" class="btn btn-success">Kirim Presensi</button>
    </div>

    <a href="{{ route('presensi') }}" class="btn btn-secondary mt-2">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

</form>

@endsection
