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
            'title' => 'Penempatan Jabatan Pegawai',
            'menuAdminPenempatanJabatan' => 'active',
            'pegawai' => Pegawai::with('user')->whereNull('jabatan_id')->get(),  // untuk dropdown NIP
            'jabatan' => Jabatan::all(),
        ];
    
        return view('admin.data_jabatan.penempatan_jabatan.create', $data);
    }

    public function store(Request $request)
    {
    $request->validate([
        'nip' => 'required|exists:pegawai,nip',
        'jabatan_id' => 'required|exists:jabatans,id',
    ]);

    // Cari pegawai berdasarkan NIP
    $pegawai = Pegawai::where('nip', $request->nip)->firstOrFail();
    
    // Update bidang pegawai
    $pegawai->update([
        'jabatan_id' => $request->jabatan_id,
    ]);

    return redirect()->route('penempatanJabatan')
                     ->with('success', 'Pegawai berhasil ditempatkan ke jabatan.');
    }

    public function getPegawai($nip)
    {
    try {
        $pegawai = Pegawai::with('user', 'bidang')->where('nip', $nip)->first();
        
        if (!$pegawai) {
            return response()->json([
                'message' => 'Pegawai tidak ditemukan'
            ], 404);
        }
        
        return response()->json([
            'nama' => $pegawai->nama,
            'email' => $pegawai->user->email,
            'bidang_id' => $pegawai->bidang->nama ?? '-', // Sesuaikan dengan nama kolom
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Terjadi kesalahan',
            'error' => $e->getMessage()
        ], 500);
    }
    }

    public function destroy($id)
    {
    $pegawai = Pegawai::findOrFail($id);

    $pegawai->update([
        'jabatan_id' => null,
        'bidang_id' => null,
    ]);

    return redirect()->back()->with('success', 'Penempatan berhasil dihapus.');
    }

}
