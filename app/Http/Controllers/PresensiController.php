<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    // tampilkan data presensi (untuk pembimbing)
    public function index()
    {
        $data = [
            'title' => 'Data Presensi',
            'presensi' => Presensi::with('siswa')->orderBy('tanggal', 'desc')->get(),
        ];

        return view('pembimbing.presensi', $data);
    }

    // simpan presensi dari siswa
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required', // hadir / pulang / izin / sakit
            'keterangan' => 'required|string',
        ]);

        Presensi::create([
            'siswa_id' => Auth::user()->id,  // ambil dari user login (siswa)
            'tanggal' => now()->toDateString(),
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'foto'
        ]);

        return redirect()->back()->with('success', 'Presensi berhasil dikirim ke pembimbing.');
    }
}
