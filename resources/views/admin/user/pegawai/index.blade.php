@extends('component/app')
@section('content')
<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
            <a href="{{ route('pegawaiCreate') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-user-check mr-2"></i>Tambah Data Pegawai
                
            </a>
        </div>
    </div>

    <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Bidang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->nama }}</td>
                                <td class="text-center">{{ $item->user->email ?? '-'}}</td>
                                <td class="text-center">{{ $item->jabatan->nama_jabatan ?? '-' }}</td>
                                <td class="text-center">{{ $item->bidang->nama ?? '-' }}</td>
                                <td class=" text-center justify-content-center mb-3">
                                    <a href="{{ route('pegawaiEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#exampleModalInfo{{ $item->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @if ($item->jabatan_id)
                                    <button class="btn btn-sm btn-danger " data-toggle="modal"
                                        data-target="#exampleModal{{ $item->id }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    @endif
                                    @include('admin.user.pegawai.modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection