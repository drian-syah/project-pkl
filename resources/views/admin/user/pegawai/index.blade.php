@extends('component.app')

@section('content')

<div class="card p-4 shadow-sm">
    <h4>Data Pegawai</h4>
<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
            <a href="{{ route('pegawaiCreate') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="text-center bg-primary text-white">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pegawai as $key => $row)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->jabatan }}</td>
                <td>
                    @if ($row->status == 'Aktif')
                        <span class="badge bg-success">{{ $row->status }}</span>
                    @else
                        <span class="badge bg-danger">{{ $row->status }}</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('pegawai.edit', $row->id) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-edit"></i>
                    </a>

                    <form action="{{ route('pegawai.destroy', $row->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection
