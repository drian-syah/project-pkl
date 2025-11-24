<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPenempatanBidangController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pengajuan',
            'menuAdminPenempatanBidang' => 'active',
            'menuAdminPenempatanBidangShow' => 'active',
            'pegawai' => Pegawai::with('user', 'bidang')->get(),
        ];
        return view('admin.data_bidang.penempatan_bidang.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Penempatan Pegawai ke Bidang',
            'menuAdminPenempatanBidang' => 'active',
            'pegawai' => Pegawai::with('user')->whereNull('bidang_id')->get(),  // untuk dropdown NIP
            'bidang' => Bidang::all(),                 // dropdown bidang
        ];
    
        return view('admin.data_bidang.penempatan_bidang.create', $data);
    }

    public function store(Request $request)
    {
    $request->validate([
        'nip' => 'required|exists:pegawai,nip',
        'bidang_id' => 'required|exists:bidangs,id',
    ]);

    // Cari pegawai berdasarkan NIP
    $pegawai = Pegawai::where('nip', $request->nip)->first();
    
    // Update bidang pegawai
    $pegawai->update([
        'bidang_id' => $request->bidang_id,
    ]);

    return redirect()->route('penempatanBidang')
                     ->with('success', 'Pegawai berhasil ditempatkan ke bidang.');
    }

    public function getPegawai($nip)
    {
    try {
        $pegawai = Pegawai::with('user', 'jabatan')->where('nip', $nip)->first();
        
        if (!$pegawai) {
            return response()->json([
                'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }
        
        return response()->json([
            'nama' => $pegawai->nama,
            'email' => $pegawai->user->email,
            'jabatan_id' => $pegawai->jabatan->nama_jabatan ?? '-', // Sesuaikan dengan nama kolom
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Terjadi kesalahan',
            'error' => $e->getMessage()
        ], 500);
    }
    }
}
