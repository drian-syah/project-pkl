@extends('component/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
            <a href="{{ route('userPembimbingCreate') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a>
        </div>
        <div>
            <a href="{{ route('userExcel') }}" class="btn btn-sm btn-success">
                <i class="fas fa-file-excel mr-2"></i>
                Excel
            </a>
            <a href="{{ route('userPdf') }}" class="btn btn-sm btn-danger" target='__blank'>
                <i class="fas fa-file-pdf mr-2"></i>
                PDF
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Jabatan</th>
                        <th>Bidang</th>
                        <th>Id Pengajuan</th>
                        <th>Id Pegawai</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td class="text-center">{{ $item->role }}</td>
                            <td class="text-center">{{ $item->jabatan->nama_jabatan ?? '-' }}</td>
                            <td class="text-center">{{ $item->bidang->nama ?? '-' }}</td>
                            <td class="text-center">{{ $item->pengajuan_id ?? '-' }}</td>
                            <td class="text-center">{{ $item->pegawai_id ?? '-' }}</td>
                            
                            <td class="text-center">
                                <a href="{{ route('userEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @include('admin/user/modal')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
