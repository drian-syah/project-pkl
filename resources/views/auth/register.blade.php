<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Sekolah</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,900" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">

        <div class="card o-hidden border-0 shadow-lg" style="max-width: 500px; width: 100%;">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h1 class="h4 text-gray-900">Register Sekolah</h1>
                    <p class="text-muted">Silakan isi data sekolah Anda dengan benar</p>
                </div>

                <form class="user" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="nama" name="nama"
                            placeholder="Nama Sekolah" value="{{ old('nama') }}">
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="npsn" name="npsn"
                            placeholder="NPSN" value="{{ old('npsn') }}">
                        @error('npsn')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat"
                            placeholder="Alamat Sekolah" value="{{ old('alamat') }}">
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" class="form-control form-control-user" id="kontak" name="kontak"
                            placeholder="Kontak Sekolah" value="{{ old('kontak') }}">
                        @error('kontak')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="email" class="form-control form-control-user" id="email" name="email"
                            placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" class="form-control form-control-user" id="password" name="password"
                            placeholder="Password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <input type="password" class="form-control form-control-user" id="password_confirmation"
                            name="password_confirmation" placeholder="Ulangi Password">
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        <i class="fas fa-user-plus mr-1"></i> Register Account
                    </button>

                    <hr>

                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Sudah punya akun? Login!</a>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
