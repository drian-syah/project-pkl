<?php

namespace App\Http\Controllers;

use App\Models\Penempatan;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;

class PenempatanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Penempatan',
            'menuAdminPenempatan' => 'active',
            'penempatan' => Penempatan::with(['pengajuan', 'bidang'])->get(),
        ];

        return view('admin.penempatan.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Penempatan',
            'menuAdminPenempatan' => 'active',
            'bidang' => Bidang::all(),
            'penempatan' => User::where('role', 'Penempatan')->get(),
        ];

        return view('admin.penempatan.create', $data);
    }

    public function store(Request $request)
    {
        // validasi dulu
        $request->validate([
            'bidang_id' => 'required|exists:bidang,id',
            'pembimbing_id' => 'required|array',
            'pembimbing_id.*' => 'exists:users,id',
        ],[
            'bidang_id.required' => 'Bidang harus dipilih',
            'pembimbing_id.required' => 'Pilih minimal satu pembimbing',
        ]);

        // Simpan relasi banyak pembimbing ke bidang
            Penempatan::create([
                'bidang_id' => $request->bidang_id,
                'pembimbing_id' => $pembimbing_id,
            ]);

        return redirect()->route('penempatan.index')->with('success', 'Penempatan berhasil disimpan.');
    }

    public function destroy($id)
    {
        $penempatan = Penempatan::findOrFail($id);
        $penempatan->delete();

        return redirect()->route('penempatan.index')->with('success', 'Penempatan berhasil dihapus.');
    }
}
