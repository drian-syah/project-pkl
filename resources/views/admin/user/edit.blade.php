@extends('component/app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i>
    {{ $title }}</h1>

<div class="card">
    <div class="card-header bg-primary">
        <a href="{{ route('user') }}" class="btn text-white">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali</a>
    </div>
        <div class="card-body">

            <form action="{{ route('userUpdate', $user->id) }}" method="post">
            @csrf
            <div class="row mb-2">
                <div class="col-xl-6 mb-1">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Nama :</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $user->nama }}">
                    @error('nama')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
                </div>
                <div class="col-xl-6">
                    <label class="form-label mb-1">
                        <span class="text-danger">*</span>
                        Email :</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                    @error('email')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-xl-12 mb-1">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Role :</label>
                        <select name="role" class="form-control @error('role') is-invalid @enderror">
                        <option disabled>--Pilih Role--</option>
                        <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="Karyawan" {{ $user->role == 'Pembimbing' ? 'selected' : '' }}>Pembimbing</option>
                        <option value="Karyawan" {{ $user->role == 'Siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="Karyawan" {{ $user->role == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                    </select>
                    @error('role')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror 
                </div>
      
            </div>

            <div class="row mb-2">
                <div class="col-xl-6 mb-1">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Password :</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="col-xl-6">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Password Konfirmasi :</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" >
                </div>
            </div>

            <div class="d-flex justify-content-between">
           
            <button type="submit" class="btn btn-sm btn-primary mr-2">
                <i class="fas fa-edit"></i>
                Edit
            </button>
             </div> 
            </form>
         </div>
    
</div>

@endsection