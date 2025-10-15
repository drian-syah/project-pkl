<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;

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
    Route::get('tugas', [TugasController::class, 'index'])->name('tugas');
    Route::get('tugas/pdf', [TugasController::class, 'pdf'])->name('tugasPdf');
   
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



// tugas
Route::get('tugas/create', [TugasController::class, 'create'])->name('tugasCreate');
Route::post('tugas/store', [TugasController::class, 'store'])->name('tugasStore');
Route::get('tugas/edit/{id}', [TugasController::class, 'edit'])->name('tugasEdit');
Route::post('tugas/update/{id}', [TugasController::class, 'update'])->name('tugasUpdate');
Route::delete('tugas/destroy/{id}', [TugasController::class, 'destroy'])->name('tugasDestroy');
Route::get('tugas/excel', [TugasController::class, 'excel'])->name('tugasExcel');

});
});