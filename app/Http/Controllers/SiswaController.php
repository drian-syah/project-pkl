<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Presensi;
use App\Models\DailyReport;

class SiswaController extends Controller
{
    // 🏠 Halaman dashboard siswa
    public function index()
    {
        $user = auth()->user();
        return view('siswa.dashboard', compact('user'));
    }

    // 📚 Daftar tugas siswa
    public function tugas()
    {
        $user = auth()->user();
        $tugas = Tugas::where('user_id', $user->id)->get();
        return view('siswa.tugas', compact('tugas'));
    }

    // 🕒 Presensi harian siswa
    public function presensi()
    {
        $user = auth()->user();
        $presensi = Presensi::where('siswa_id', $user->id)->orderBy('tanggal', 'desc')->get();
        return view('siswa.presensi', compact('presensi'));
    }

    // ✏️ Tambahkan fitur daily report (opsional)
    public function dailyReport()
    {
        $user = auth()->user();
        $reports = DailyReport::where('siswa_id', $user->id)->get();
        return view('siswa.daily_report', compact('reports'));
    }
}
