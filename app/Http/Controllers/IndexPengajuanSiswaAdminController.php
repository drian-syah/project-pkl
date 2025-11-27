<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\SiswaProfil;
use Illuminate\Http\Request;

class IndexPengajuanSiswaAdminController extends Controller
{
    public function index($sekolah_id)
    {
        $sekolah = Sekolah::findOrFail($sekolah_id);
        $siswa = SiswaProfil::whereHas('pengajuan', function ($q) use ($sekolah_id) {
            $q->where('sekolah_id', $sekolah_id);
        })->get();

        $data = [
            'title' => 'Data Siswa ' . $sekolah->nama,
            'sekolah' => $sekolah,
            'siswa' => $siswa,
        ];
        return view('admin.pengajuan.siswaindex', $data);
    }
}
