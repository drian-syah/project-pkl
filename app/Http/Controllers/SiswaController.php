<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\SiswaProfil;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = array(
        'title' => 'Dashboard Siswa',
        'menuSiswaPresensi' => 'active',
        'siswa' => SiswaProfil::orderBy('id', 'asc')->get(),
        );
        return view('siswa/presensi/index', $data);
    }

    public function masuk()
    {
        $data = array(
            'title' => 'Menu Presensi Masuk'
        );
        return view('siswa.presensi.masuk', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:hadir,izin,sakit',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:10000',
        ]);

        $path = $request->file('foto')->store('foto_presensi', 'public');

        Presensi::create([
            'siswa_id' => auth()->user()->id,
            'status' => $request->status,
            'foto' => '$path',
            'tanggal' => now()->toDateString(),
            'jam_masuk' => now()->toTimeString(),
        ]);
        
        return redirect()->back()->with('success', 'Presensi Berhasil Dikkirim!');
    }

    public function pulang()
    {
    $data = [
        'title' => 'Presensi Pulang',
        'menuSiswaPresensi' => 'active',
    ];

    return view('siswa.presensi.pulang', $data);
    }

    public function pulangStore(Request $request)
    {
    // Cari record presensi hari ini untuk siswa login
    $presensi = Presensi::where('siswa_id', auth()->id())
                        ->where('tanggal', now()->toDateString())
                        ->first();

    if (!$presensi) {
        return redirect()->back()->with('error', 'Belum melakukan presensi masuk!');
    }

    // Update jam_keluar
    $presensi->update([
        'jam_keluar' => now()->toTimeString(),
    ]);

    return redirect()->back()->with('success', 'Presensi pulang berhasil dicatat!');
}


}
