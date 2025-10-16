<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PenempatanController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware('isLogin')->group(function(){
    // login 
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginProses'])->name('loginProses');
});


// logout

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('checkLogin')->group(function(){

    // dashboard 
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::middleware('auth')->group(function(){
    Route::get('profil/setting', [SettingController::class, 'index'])->name('index');
    Route::put('profil/setting', [SettingController::class, 'update'])->name('updateSetting');
});
    Route::get('penempatan', [PenempatanController::class, 'index'])->name('penempatan');
    Route::get('penempatan/pdf', [PenempatanController::class, 'pdf'])->name('penempatanPdf');

    Route::get('pembimbing', [PembimbingController::class, 'index'])->name('pembimbing');
   
Route::middleware('isAdmin')->group(function(){



// pengajuan 
Route::get('pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
Route::get('pengajuan/create', [PengajuanController::class, 'create'])->name('pengajuanCreate');
Route::post('pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuanStore');
Route::get('pengajuan/edit/{id}', [PengajuanController::class, 'edit'])->name('pengajuanEdit');
Route::post('pengajuan/update/{id}', [PengajuanController::class, 'update'])->name('pengajuanUpdate');
Route::delete('pengajuan/destroy/{id}', [PengajuanController::class, 'destroy'])->name('pengajuanDestroy');
Route::get('pengajuan/excel', [PengajuanController::class, 'excel'])->name('pengajuanExcel');
Route::get('pengajuan/pdf', [PengajuanController::class, 'pdf'])->name('pengajuanPdf');
Route::resource('users', PengajuanController::class);



// penempatan
Route::get('penempatan/create', [PenempatanController::class, 'create'])->name('penempatanCreate');
Route::post('penempatan/store', [PenempatanController::class, 'store'])->name('penempatanStore');
Route::get('penempatan/edit/{id}', [PenempatanController::class, 'edit'])->name('penempatanEdit');
Route::post('penempatan/update/{id}', [PenempatanController::class, 'update'])->name('tugaspenempatanUpdate');
Route::delete('penempatan/destroy/{id}', [PenempatanController::class, 'destroy'])->name('penempatanDestroy');
Route::get('penempatan/excel', [PenempatanController::class, 'excel'])->name('penempatanExcel');

});

Route::middleware(['auth', 'siswa'])->group(function () {
    Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.dashboard');
    Route::get('/siswa/tugas', [SiswaController::class, 'tugas'])->name('siswa.tugas');
    Route::get('/siswa/presensi', [SiswaController::class, 'presensi'])->name('siswa.presensi');
});

});

