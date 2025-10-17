<?php

namespace App\Http\Controllers;

use App\Models\Pembimbing;
use Illuminate\Http\Request;

class PembimbingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pengajuan',
            'menuPembimbingTugas' => 'active',
            'pembimbing' => Pembimbing::orderBy('id', 'asc')->get(),
        ];

        return view('pembimbing.tugas.index', $data);
    }

    public function tugas()
    {
        $data = [
            'title' => 'Data Pengajuan',
            'menuPembimbingTugas' => 'active',
            'pembimbing' => Pembimbing::orderBy('id', 'asc')->get(),
        ];

        return view('admin.pembimbing.tugas.index', $data);
    }

    public function tugasAdmin()
    {
        return view('admin/pembimbing/tugas.index', [
            'menuPembimbingTugas' => 'active',
            'title' => 'Daftar Tugas'
        ]);
    }

    public function penilaian()
    {
        return view('admin/pembimbing/penilaian/index', [
            'menuPembimbingPenilaian' => 'active',
            'title' => 'Penilaian Tugas Siswa'
        ]);
    }
}

