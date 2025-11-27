<?php

namespace App\Http\Controllers;

use App\Models\PengajuanPklmagang;
use App\Models\User;
use App\Models\Pembimbing;
use Illuminate\Http\Request;

class AdminUserPembimbingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Pembimbing',
            'MenuAdminUserPembimbing' => 'active',
            'user' => User::with('bidang', 'jabatan')->where('role', 'Pembimbing')->get(),
        ];
        return view('admin.user.pembimbing.index', $data);
    }
}
