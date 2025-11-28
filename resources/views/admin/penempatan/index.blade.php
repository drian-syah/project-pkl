@extends('component/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-tasks mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-center justify-content-xl-between">
        <div class="mb-1 mr-2">
            {{-- <a href="{{ route('penempatanCreate') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus mr-2"></i>
                Tambah Data
            </a> --}}
        </div>
        {{-- <div>
            <a href="{{ route('penempatanExcel') }}" class="btn btn-sm btn-success">
                <i class="fas fa-file-excel mr-2"></i>
                Excel
            </a>
            <a href="{{ route('penempatanPdf') }}" class="btn btn-sm btn-danger">
                <i class="fas fa-file-pdf mr-2"></i>
                PDF
            </a>
        </div> --}}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>Sekolah</th>
                        <th>Bidang</th>
                        <th>Tanggal Penempatan</th>
                        <th><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penempatan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->pengajuan->no_surat }}</td>
                        <td>{{ $item->pengajuan->sekolah->nama ?? '-' }}</td>
                        <td>{{ $item->bidang->nama_bidang ?? '-' }}</td>
                        <td>{{ $item->created_at}}</td>
                        <td>
                        @php
                                    $countSiswa = \App\Models\SiswaProfil::where('pengajuan_id', $item->id)->count();
                                    @endphp
                                    <a href="{{ route('adminPengajuanSiswaForm', $item->id) }}" class="btn btn-sm btn-success mb-1">
                                        <i class="fas fa-user-plus"></i>
                                    </a>
                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                    data-target="#exampleModalInfo{{ $item->sekolah_id }}">
                                    <i class="fas fa-eye"></i>
                                    </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection