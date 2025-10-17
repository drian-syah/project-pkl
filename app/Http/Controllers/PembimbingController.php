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

    
}

