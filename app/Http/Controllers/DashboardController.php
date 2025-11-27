<?php

namespace App\Http\Controllers;
use App\Models\PengajuanPklmagang;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = array(
            "title" => "Dashboard",
            "menuDashboard" => "active",
            'jumlahUser' => User::count(),
            'jumlahAdmin' => User::where('role', 'Admin')->count(),
            'jumlahPembimbing' => User::where('role', 'Pembimbing')->count(),
            'jumlahPegawai' => Pegawai::where('is_active')->count(),
            'jumlahSiswa' => User::where('role', 'Siswa')->count(),
            'jumlahPengajuanPKLMagang' => PengajuanPklmagang::where('is_active', 'Siswa')->count(),
        );
        return view('dashboard', $data);   
    }
}
