@extends('component/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-file-alt mr-2"></i>
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
                <a href="{{ route('SekolahPengajuanExcel') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-file-excel mr-2"></i>
                    Excel
                </a>
                <a href="{{ route('SekolahPengajuanPdf') }}" class="btn btn-sm btn-danger" target='__blank'>
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
                            <th>File Pengajuan</th>
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
                                <td>
                                    @if ($item->file_surat_path)
                                        <a href="{{ asset('storage/' . $item->file_surat_path) }}" target="_blank">
                                           <i class="fas fa-file-pdf"></i> Lihat File
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak ada file</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status == 'draft')
                                        <span class="badge bg-secondary text-white">Draft</span>
                                    @elseif ($item->status == 'diproses')
                                        <span class="badge bg-warning text-white">Sedang Diproses</span>
                                    @elseif ($item->status == 'diterima')
                                        <span class="badge bg-success text-white">Diterima</span>
                                    @elseif ($item->status == 'ditolak')
                                        <span class="badge bg-danger text-white">Ditolak</span>
                                    @else
                                        <span class="badge bg-light">Tidak Diketahui</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->status === 'draft')
                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalInfo{{ $item->sekolah_id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <form action="{{ route('SekolahPengajuanKirim', $item->sekolah_id) }}" method="POST" class="d-inline mb-1">
                                            @csrf
                                            <a href="{{ route('SekolahPengajuanEdit', $item->id) }}" class="btn btn-sm btn-warning mb-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#exampleModal{{ $item->sekolah_id }}">
                                                <i class="fas fa-times mb-1"></i>
                                                </button>
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fas fa-paper-plane mr-1"></i> Kirim ke Admin
                                            </button>
                                        </form>
                                    @elseif ($item->status === 'diproses')
                                        <button class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#exampleModal{{ $item->sekolah_id }}">
                                        <i class="fas fa-times"></i>
                                        </button>
                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalInfo{{ $item->sekolah_id }}">
                                        <i class="fas fa-eye"></i>
                                        </button>
                                    @elseif ($item->status === 'diterima')
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalInfo{{ $item->sekolah_id }}">
                                        <i class="fas fa-eye"></i>
                                        </button>
                                    @endif
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
