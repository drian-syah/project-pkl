<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AdminPenempatanJabatanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Menu Penempatan Jabatan',
            'menuAdminPenempatanJabatan' => 'active',
            'pegawai' => Pegawai::with('user', 'bidang')->get(),
        ];
        return view('admin.data_jabatan.penempatan_jabatan.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Penempatan Pegawai ke Bidang',
            'menuAdminPenempatanBidang' => 'active',
            'pegawai' => Pegawai::with('user')->get(),  // untuk dropdown NIP
            'jabatan' => Jabatan::all(),                 // dropdown bidang
        ];
    
        return view('admin.data_jabatan.penempatan_jabatan.create', $data);
    }

    public function store(Request $request)
    {
    $request->validate([
        'nip' => 'required|exists:pegawai,nip',
        'nama_jabatan' => 'required|exists:jabatan,nama_jabatan',
    ]);

    // Cari pegawai berdasarkan NIP
    $pegawai = Pegawai::where('nip', $request->nip)->first();
    
    // Update bidang pegawai
    $pegawai->update([
        'jabatan' => $request->jabatan,
    ]);

    return redirect()->route('penempatanJabatan')
                     ->with('success', 'Pegawai berhasil ditempatkan ke bidang.');
    }

    public function getPegawai($nip)
{
    try {
        $pegawai = Pegawai::where('nip', $nip)->first();
        
        if (!$pegawai) {
            return response()->json([
                'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }
        
        return response()->json([
            'nama' => $pegawai->nama,
            'email' => $pegawai->user->email,
            'bidang_id' => $pegawai->bidang_id ?? '-', // Sesuaikan dengan nama kolom
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Terjadi kesalahan',
            'error' => $e->getMessage()
        ], 500);
    }
}
}
