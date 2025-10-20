<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPembimbingPenilaianController extends Controller
{
    public function penilaian()
    {
        $data = [
            'title' => 'Data Penilaian',
            'menuAdminPembimbingPenilaian' => 'active',
        ];
        return view('admin.pembimbing.penilaian.index', $data);
    }
}
