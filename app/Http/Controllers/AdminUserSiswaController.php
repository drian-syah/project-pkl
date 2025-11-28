<?php

namespace App\Http\Controllers;

use App\Models\SiswaProfil;
use Illuminate\Http\Request;

class AdminUserSiswaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Siswa',
            'MenuAdminUserSiswa' => 'active',
            'siswa' => SiswaProfil::with('bidang')->get(),
        ];
        return view('admin.user.siswa.index', $data);
    }
}
