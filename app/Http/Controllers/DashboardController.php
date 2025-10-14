<?php

namespace App\Http\Controllers;
use App\Models\User;
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
            'jumlahDitugaskan' => User::where('role', 'Karyawan')->where('is_tugas', true)->count(),
            'jumlahBelumDitugaskan' => User::where('role', 'Karyawan')->where('is_tugas', false)->count(),
        );
        return view('dashboard', $data);   
    }
}
