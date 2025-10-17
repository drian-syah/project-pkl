<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPembimbingTugasController extends Controller
{
     public function tugas()
    {
        $data = [
            'title' => 'Data Pengajuan',
            'menuPembimbingTugas' => 'active',
        ];

        return view('admin.pembimbing.tugas.index', $data);
    }

    public function tugasAdmin()
    {
        return view('admin.pembimbing.tugas.index', [
            'menuPembimbingTugas' => 'active',
            'title' => 'Daftar Tugas'
        ]);
    }

    public function penilaian()
    {
        return view('admin.pembimbing.penilaian.index', [
            'menuPembimbingPenilaian' => 'active',
            'title' => 'Penilaian Tugas Siswa'
        ]);
    }
}
