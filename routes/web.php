<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PenempatanController;
use App\Http\Controllers\AdminPembimbingTugasController;
use App\Http\Controllers\AdminPembimbingPenilaianController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('isLogin')->group(function () {
    // login 
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');
});


// logout

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('checkLogin')->group(function () {

    // dashboard 
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware('auth')->group(function () {
        Route::get('profil/setting', [SettingController::class, 'index'])->name('index');
        Route::put('profil/setting', [SettingController::class, 'update'])->name('updateSetting');
    });
    
    



    Route::middleware('isAdmin')->group(function () {



        // data user
        Route::get('user', [UserController::class, 'index'])->name('user');
        Route::get('user/create', [UserController::class, 'create'])->name('userCreate');
        Route::post('user/store', [UserController::class, 'store'])->name('userStore');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
        Route::delete('user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');
        Route::get('user/excel', [UserController::class, 'excel'])->name('userExcel');
        Route::get('user/pdf', [UserController::class, 'pdf'])->name('userPdf');
        Route::resource('users', UserController::class);
        // pengajuan 
        Route::get('pengajuan', [PengajuanController::class, 'index'])->name('adminPengajuan');
        Route::get('pengajuan/create', [PengajuanController::class, 'create'])->name('adminPengajuanCreate');
        Route::post('pengajuan/store', [PengajuanController::class, 'store'])->name('adminPengajuanStore');
        Route::get('pengajuan/edit/{sekolah_id}', [PengajuanController::class, 'edit'])->name('adminPengajuanEdit');
        Route::post('pengajuan/update/{sekolah_id}', [PengajuanController::class, 'update'])->name('adminPengajuanUpdate');
        Route::post('pengajuan/disetujui/{sekolah_id}', [PengajuanController::class, 'disetujui'])->name('adminPengajuanDisetujui');
        Route::post('pengajuan/ditolak/{sekolah_id}', [PengajuanController::class, 'ditolak'])->name('adminPengajuanDitolak');
        Route::delete('pengajuan/destroy/{sekolah_id}', [PengajuanController::class, 'destroy'])->name('adminPengajuanDestroy');
        Route::get('pengajuan/excel', [PengajuanController::class, 'excel'])->name('adminPengajuanExcel');
        Route::get('pengajuan/pdf', [PengajuanController::class, 'pdf'])->name('adminPengajuanPdf');
        Route::resource('users', PengajuanController::class);



        // penempatan
        Route::get('penempatan/create', [PenempatanController::class, 'create'])->name('penempatanCreate');
        Route::post('penempatan/store', [PenempatanController::class, 'store'])->name('penempatanStore');
        Route::get('penempatan/edit/{id}', [PenempatanController::class, 'edit'])->name('penempatanEdit');
        Route::post('penempatan/update/{id}', [PenempatanController::class, 'update'])->name('tugaspenempatanUpdate');
        Route::delete('penempatan/destroy/{id}', [PenempatanController::class, 'destroy'])->name('penempatanDestroy');
        Route::get('penempatan/excel', [PenempatanController::class, 'excel'])->name('penempatanExcel');
        Route::get('penempatan', [PenempatanController::class, 'index'])->name('penempatan');
        Route::get('penempatan/pdf', [PenempatanController::class, 'pdf'])->name('penempatanPdf');


    });

    Route::middleware('isPembimbing')->group(function () {
        // pembimbing
        // Menu Tugas
        Route::get('pembimbing/tugas/index', [AdminPembimbingTugasController::class, 'index'])->name('tugas');
        Route::post('pembimbing/tugas', [AdminPembimbingTugasController::class, 'tugasAdmin'])->name('pembimbingTugas');
        Route::get('pembimbing', [PembimbingController::class, 'index'])->name('pembimbing');


        // penilaian
        Route::get('pembimbing/penilaian', [AdminPembimbingPenilaianController::class, 'penilaian'])->name('pembimbingPenilaian');
    });

    Route::middleware('isSiswa')->group(function(){
        // siswa
    Route::get('presensi', [SiswaController::class, 'index'])->name('presensi');
    Route::post('presensi/store', [SiswaController::class, 'store'])->name('presensiStore');
    // form presensi masuk
    Route::get('presensi/masuk', [SiswaController::class, 'masuk'])->name('presensiMasuk');

    // Form presensi pulang
    Route::get('presensi/pulang', [SiswaController::class, 'pulang'])->name('presensiPulang');

    // Submit presensi pulang
    Route::post('presensi/pulang', [SiswaController::class, 'pulangStore'])->name('presensiPulangStore');

    });

    Route::middleware('isSekolah')->group(function () {
        // sekolah
        Route::get('sekolah', [SekolahController::class, 'index'])->name('sekolah');
        Route::get('sekolah/pengajuan/create', [SekolahController::class, 'create'])->name('pengajuanSekolah');
        Route::post('sekolah/pengajuan/store', [SekolahController::class, 'store'])->name('SekolahPengajuan');
        Route::post('sekolah/pengajuan/{sekolah_id}/kirim', [SekolahController::class, 'kirim'])->name('SekolahPengajuanKirim');
        Route::get('pengajuan/{sekolah_id}/edit', [SekolahController::class, 'edit'])->name('SekolahPengajuanEdit');
        Route::post('sekolah/pengajuan/{sekolah_id}/update', [SekolahController::class, 'update'])->name('SekolahPengajuanUpdate');
        Route::delete('sekolah/pengajuan/{sekolah_id}/destroy', [SekolahController::class, 'destroy'])->name('SekolahPengajuanDestroy');
        Route::get('sekolah/pengajuan/pdf', [SekolahController::class, 'pdf'])->name('SekolahPengajuanPdf');
        Route::get('sekolah/pengajuan/excel', [SekolahController::class, 'excel'])->name('SekolahPengajuanExcel');
    });

});