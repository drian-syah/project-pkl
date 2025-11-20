@extends('component/app')
@section('content')
<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
            <a href="{{ route('penempatanBidangCreate') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-user-check mr-2"></i>Tambah Bidang Pegawai
                
            </a>
        </div>
        <div>
            <a href="{{ route('adminPengajuanExcel') }}" class="btn btn-sm btn-success">
                <i class="fas fa-file-excel mr-2"></i>
                Excel
            </a>
            <a href="{{ route('adminPengajuanPdf') }}" class="btn btn-sm btn-danger" target='__blank'>
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
                                <td class="text-center">{{ $item->jabatan }}</td>
                                <td class="text-center">{{ $item->bidang->nama ?? '-' }}</td>
                                <td class=" text-center justify-content-center mb-3">
                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#exampleModalInfo">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @include('admin.data_jabatan.penempatan_jabatan.modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection