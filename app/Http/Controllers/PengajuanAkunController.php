<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanAkunController extends Controller
{
    public function index()
    {
        $title = 'Persetujuan Akun Sekolah';

        // Tampilkan akun sekolah yang belum aktif
        $sekolah = Sekolah::whereHas('user', function ($q) {
            $q->where('is_active', false);
        })->get();

        return view('admin.pengajuan_akun.index', [
            'title' => $title,
            'sekolah' => $sekolah,
            'menuAdminPengajuanAkun' => 'active',
        ]);
    }

    public function approve($id)
    {
        // Cari sekolah
        $sekolah = Sekolah::findOrFail($id);

        // Cek apakah user terkait sudah aktif
        $user = $sekolah->user;
        if ($user->is_active) {
            return redirect()->back()->with('error', 'Akun ini sudah disetujui sebelumnya');
        }

        // Set user & sekolah menjadi aktif
        $user->update([
            'is_active' => true,
        ]);

        $sekolah->update([
            'is_active' => true,
        ]);

        return redirect()->back()->with('success', 'Akun berhasil disetujui');
    }

    public function reject(Request $request, $id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $user = $sekolah->user;

        if ($user->is_active) {
            return redirect()->back()->with('error', 'Akun ini sudah disetujui sebelumnya');
        }

        // Optional: simpan catatan alasan ditolak
        $request->validate([
            'catatan_approval' => 'nullable|max:500',
        ]);

        // Hapus user & sekolah yang ditolak
        $user->delete();
        $sekolah->delete();

        return redirect()->back()->with('success', 'Akun berhasil ditolak dan dihapus');
    }

    public function show($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $user = $sekolah->user;

        return view('admin.pengajuan_akun.show', compact('sekolah', 'user'));
    }
}
