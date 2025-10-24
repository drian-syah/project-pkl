@extends('component/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
            <div class="mb-1 mr-2">
                <a href="{{ route('pengajuanSekolah') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Pengajuan
                </a>
            </div>
            <div>
                <a href="{{ route('pengajuanExcel') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>
                <a href="{{ route('pengajuanPdf') }}" class="btn btn-sm btn-danger" target='__blank'>
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
                            <th>No Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Sekolah</th>
                            <th>Periode Mulai</th>
                            <th>Periode Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->no_surat }}</td>
                                <td>{{ $item->tgl_surat }}</td>
                                <td class="text-center">{{ $item->sekolah->nama ?? 'N/A' }}</td>
                                <td class="text-center">{{ $item->periode_mulai }}</td>
                                <td class="text-center">{{ $item->periode_selesai }}</td>
                                <td class="text-center">
                                    @if ($item->status == true)
                                        <span class="badge badge-danger">Pending</span>
                                    @else
                                        <span class="badge badge-success">Sudah Ditugaskan</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('SekolahPengajuanEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#exampleModal{{ $item->sekolah_id }}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    @include('sekolah.pengajuan.modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
