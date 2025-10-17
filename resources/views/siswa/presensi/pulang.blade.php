@extends('component/app')
@section('content')

<div class="card p-3 shadow-sm">
    <h4>Presensi Pulang Hari Ini</h4>

    <form action="{{ route('presensiPulangStore') }}" method="POST">
        @csrf
        <p>Tekan tombol di bawah untuk mencatat jam pulang Anda.</p>

        <button type="submit" class="btn btn-primary">Presensi Pulang</button>
    </form>
</div>

@endsection