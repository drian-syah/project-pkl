<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Presensi;
use App\Models\SiswaProfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Siswa',
            'menuSiswaPresensi' => 'active',
            'siswa' => SiswaProfil::orderBy('id', 'asc')->get(),
        ];

        return view('siswa.presensi.index', $data);
    }

    public function masuk()
    {
        $data = [
            'title' => 'Menu Presensi Masuk',
            'menuSiswaPresensi' => 'active',
        ];

        return view('siswa.presensi.masuk', $data);
    }

    public function store(Request $request)
    {
        $siswa = SiswaProfil::where('user_id', Auth::id())->first();

    if (!$siswa) {
    return back()->with('error', 'Profil siswa tidak ditemukan!');
    }

        $request->validate([
            'status' => 'required|in:hadir,izin,sakit',
            'foto'   => 'required',  // BUKAN image lagi
        ]);

        // Decode base64
        $base64 = $request->foto;
        list($type, $data) = explode(';', $base64);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        // Nama file
        $fileName = 'masuk_' . time() . '.jpg';

        // Simpan
        Storage::put('public/foto_presensi/' . $fileName, $data);

        // Cek apakah sudah presensi
        $cek = Presensi::where('siswa_id', Auth::id())
                        ->where('tanggal', now()->toDateString())
                        ->first();

        if ($cek) {
            return back()->with('error', 'Kamu sudah presensi masuk hari ini!');
        }

        // Simpan database
        Presensi::create([
            'siswa_id'   => $siswa->id,
            'status'     => $request->status,
            'foto'       => 'foto_presensi/' . $fileName,
            'tanggal'    => now()->toDateString(),
            'jam_masuk'  => now()->toTimeString(),
        ]);
        
        return back()->with('success', 'Presensi masuk berhasil dikirim!');
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
        $siswa = SiswaProfil::where('user_id', Auth::id())->first();

    if (!$siswa) {
    return back()->with('error', 'Profil siswa tidak ditemukan!');
    }

        $request->validate([
            'foto' => 'required'
        ]);

        // Cari record presensi hari ini
        $presensi = Presensi::where('siswa_id', Auth::id())
                            ->where('tanggal', now()->toDateString())
                            ->first();

        if (!$presensi) {
            return back()->with('error', 'Kamu belum presensi masuk!');
        }

        if ($presensi->jam_keluar) {
            return back()->with('error', 'Kamu sudah presensi pulang!');
        }

        // Decode base64 untuk foto pulang
        $base64 = $request->foto;
        list($type, $data) = explode(';', $base64);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);

        $fileName = 'pulang_' . time() . '.jpg';

        Storage::put('public/foto_pulang/' . $fileName, $data);

        // Update
        $presensi->update([
            'jam_keluar'   => now()->toTimeString(),
            'foto_pulang'  => 'foto_pulang/' . $fileName,
        ]);

        return back()->with('success', 'Presensi pulang berhasil dicatat!');
    }
}
