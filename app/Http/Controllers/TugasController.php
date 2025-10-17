<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Tugas',
            'menuAdminTugas' => 'active',
            'penempatan' => Tugas::with(['bidang', 'penempatan'])->get(),
        ];

        return view('admin/penempatan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Penempatan',
            'menuAdminTugas' => 'active',
            'bidang' => Bidang::all(),
            'penempatan' => User::where('role', 'tugas')->get(),
        ];

        return view('admin.tugas.create', $data);
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
        foreach ($request->pembimbing_id as $id_pembimbing) {
            Penempatan::create([
                'bidang_id' => $request->bidang_id,
                'pembimbing_id' => $id_pembimbing,
            ]);
        }

        return redirect()->route('pembimbing.index')->with('success', 'Tugas berhasil disimpan.');
    }

    public function destroy($id)
    {
        $penempatan = Penempatan::findOrFail($id);
        $penempatan->delete();

        return redirect()->route('pembimbing.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
