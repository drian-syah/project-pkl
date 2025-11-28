@extends('component/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-user mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-primary text-white">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Id User</th>
                        <th>Id Pengajuan</th>
                        <th>Nama</th>
                        <th>NISN</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Foto Siswa</th>
                        {{-- <th><i class="fas fa-cog"></i></th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->pengajuan_id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td><img src="{{ asset('storage/' . $item->foto) }}" width="120">

                           </td>
                            
                            {{-- <td class="text-center">
                                <a href="{{ route('userEdit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @include('admin/user/modal')
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
