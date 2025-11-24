<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PenempatanController;
use App\Http\Controllers\AdminTambahSiswaController;
use App\Http\Controllers\AdminPembimbingTugasController;
use App\Http\Controllers\AdminPenempatanBidangController;
use App\Http\Controllers\AdminPenempatanJabatanController;
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
        // Bidang
        Route::get('Admin/daftarbidang/index', [BidangController::class, 'index'])->name('daftarBidang');
        Route::delete('Admin/daftarbidang/destroy/{id}', [BidangController::class, 'destroy'])->name('hapusBidang');
        Route::get('Admin/daftarbidang/edit/{id}', [BidangController::class, 'edit'])->name('editBidang');
        Route::post('Admin/daftarbidang/update/{id}', [BidangController::class, 'update'])->name('updateBidang');
        Route::get('Admin/tambahbidang/create', [BidangController::class, 'create'])->name('tambahBidang');
        Route::post('Admin/tambahbidang/store', [BidangController::class, 'store'])->name('tambahBidangStore');
        
        Route::get('Admin/penempatanbidang/index', [AdminPenempatanBidangController::class, 'index'])->name('penempatanBidang');
        Route::get('Admin/penempatanbidang/create', [AdminPenempatanBidangController::class, 'create'])->name('penempatanBidangCreate');
        Route::post('Admin/penempatanbidang/store', [AdminPenempatanBidangController::class, 'store'])->name('penempatanBidangStore');
        Route::get('admin/penempatanbidang/getPegawai/{nip}', [AdminPenempatanBidangController::class, 'getPegawai']);
        Route::delete('admin/penempatanbidang/destroy/{id}', [AdminPenempatanBidangController::class, 'destroy'])->name('penempatanBidangDestroy');
        // Jabatan
        Route::get('admin/daftarjabatan', [JabatanController::class, 'index'])->name('daftarJabatan');
        Route::get('admin/daftarjabatan/edit/{id}', [JabatanController::class, 'edit'])->name('editJabatan');
        Route::post('admin/daftarjabatan/update/{id}', [JabatanController::class, 'update'])->name('updateJabatan');
        Route::delete('admin/daftarjabatan/destroy/{id}', [JabatanController::class, 'destroy'])->name('jabatanDestroy');
        Route::get('admin/tambahabatan/create', [JabatanController::class, 'create'])->name('tambahJabatan');
        Route::post('admin/tambahjabatan/store', [JabatanController::class, 'store'])->name('tambahJabatanStore');
        
        Route::get('admin/penempatanjabatan/index', [AdminPenempatanJabatanController::class, 'index'])->name('penempatanJabatan');
        Route::get('admin/penempatanjabatan/create', [AdminPenempatanJabatanController::class, 'create'])->name('penempatanJabatanCreate');
        Route::post('admin/penempatanjabatan/store', [AdminPenempatanJabatanController::class, 'store'])->name('penempatanJabatanStore');
        Route::get('admin/penempatanjabatan/getPegawai/{nip}', [AdminPenempatanJabatanController::class, 'getPegawai']);
        Route::delete('admin/penempatanjabatan/destroy/{id}', [AdminPenempatanJabatanController::class, 'destroy'])->name('penempatanJabatanDestroy');
        // data user
        Route::get('admin/user', [UserController::class, 'index'])->name('user');
        Route::get('admin/user/create', [UserController::class, 'create'])->name('userCreate');
        Route::post('admin/user/store', [UserController::class, 'store'])->name('userStore');
        Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('userEdit');
        Route::post('admin/user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
        Route::delete('admin/user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');
        Route::get('admin/user/excel', [UserController::class, 'excel'])->name('userExcel');
        Route::get('admin/user/pdf', [UserController::class, 'pdf'])->name('userPdf');
        Route::resource('users', UserController::class);
        // pengajuan 
        Route::get('admin/pengajuan', [PengajuanController::class, 'index'])->name('adminPengajuan');
        Route::get('admin/pengajuan/create', [PengajuanController::class, 'create'])->name('adminPengajuanCreate');
        Route::post('admin/pengajuan/store', [PengajuanController::class, 'store'])->name('adminPengajuanStore');
        Route::get('admin/pengajuan/{sekolah_id}/edit', [PengajuanController::class, 'edit'])->name('adminPengajuanEdit');
        Route::post('admin/pengajuan/{sekolah_id}/update', [PengajuanController::class, 'update'])->name('adminPengajuanUpdate');
        Route::post('admin/pengajuan/disetujui/{sekolah_id}', [PengajuanController::class, 'disetujui'])->name('adminPengajuanDisetujui');
        Route::post('admin/pengajuan/ditolak/{sekolah_id}', [PengajuanController::class, 'ditolak'])->name('adminPengajuanDitolak');
        Route::post('admin/pengajuan/{sekolah_id}/kirim', [PengajuanController::class, 'kirim'])->name('adminPengajuanKirim');
        Route::delete('admin/pengajuan/destroy/{sekolah_id}', [PengajuanController::class, 'destroy'])->name('adminPengajuanDestroy');
        Route::post('admin/pengajuan/store-ajax', [PengajuanController::class, 'storeAjax'])->name('adminPengajuanStoreAjax');
        Route::get('admin/pengajuan/excel', [PengajuanController::class, 'excel'])->name('adminPengajuanExcel');
        Route::get('admin/pengajuan/pdf', [PengajuanController::class, 'pdf'])->name('adminPengajuanPdf');
        Route::get('admin/pengajuan/showDaftarForm', [PengajuanController::class, 'showDaftarForm'])->name('daftarUserSekolahForm');
        Route::post('admin/pengajuan/daftar', [PengajuanController::class, 'daftar'])->name('daftarUserSekolah');

        Route::get('admin/pengajuan-siswa/showDaftarFormSiswa/{id}', [AdminTambahSiswaController::class, 'showDaftarSiswaForm'])->name('adminPengajuanSiswaForm');
        Route::post('admin/pengajuan-siswa/DaftarSiswa/{id}', [AdminTambahSiswaController::class, 'daftarSiswa'])->name('adminPengajuanDaftarSiswa');

        // penempatan
        Route::get('admin/penempatan/create', [PenempatanController::class, 'create'])->name('penempatanCreate');
        Route::post('admin/penempatan/store', [PenempatanController::class, 'store'])->name('penempatanStore');
        Route::get('admin/penempatan/edit/{id}', [PenempatanController::class, 'edit'])->name('penempatanEdit');
        Route::post('admin/penempatan/update/{id}', [PenempatanController::class, 'update'])->name('tugaspenempatanUpdate');
        Route::delete('admin/penempatan/destroy/{id}', [PenempatanController::class, 'destroy'])->name('penempatanDestroy');
        Route::get('admin/penempatan/excel', [PenempatanController::class, 'excel'])->name('penempatanExcel');
        Route::get('admin/penempatan', [PenempatanController::class, 'index'])->name('penempatan');
        Route::get('admin/penempatan/pdf', [PenempatanController::class, 'pdf'])->name('penempatanPdf');

        Route::get('pembimbing/penilaian', [AdminPembimbingPenilaianController::class, 'penilaian'])->name('pembimbingPenilaian');
        Route::get('/admin/pembimbing/penilaian', [AdminPembimbingPenilaianController::class, 'penilaianIndex'])->name('pembimbing.penilaian');
        Route::post('/admin/pembimbing/penilaian/store', [AdminPembimbingPenilaianController::class, 'penilaianStore'])->name('pembimbing.penilaian.store');


    });

    Route::middleware('isPembimbing')->group(function () {
        // pembimbing
        Route::get('pembimbing/tugas/index', [AdminPembimbingTugasController::class, 'index'])->name('tugas');
        Route::post('pembimbing/tugas', [AdminPembimbingTugasController::class, 'tugasAdmin'])->name('pembimbingTugas');
        Route::get('pembimbing', [PembimbingController::class, 'index'])->name('pembimbing');
        Route::delete('/admin/pembimbing/tugas/delete/{id}', [PembimbingController::class, 'tugasDelete'])->name('pembimbing.tugas.delete');
    });
    

    Route::middleware('isSiswa')->group(function () {
        Route::get('presensi', [SiswaController::class, 'index'])->name('presensi');
        Route::get('presensi/store', [SiswaController::class, 'store'])->name('presensiStore');
        Route::get('presensi/masuk', [SiswaController::class, 'masuk'])->name('presensiMasuk');
        Route::get('presensi/pulang', [SiswaController::class, 'pulang'])->name('presensiPulang');
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