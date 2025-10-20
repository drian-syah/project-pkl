<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\SiswaProfil;
use Illuminate\Http\Request;

class AdminPembimbingTugasController extends Controller
{
     public function index()
    {
        $data = [
            'title' => 'Data Pengajuan',
            'menuAdminPembimbingTugas' => 'active',
        ];

        return view('admin.pembimbing.tugas.index', $data);
    }
}
