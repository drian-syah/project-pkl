<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTambahJabatanRequest;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Menu Jabatan',
            'MenuAdminJabatan' => 'active',
            'jabatan' => Jabatan::orderBy('id', 'asc')->get(),
        ];
        return view('admin.data_jabatan.daftar_jabatan.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Jabatan',
            'MenuAdminTambahJabatan' => 'active',
        ];
        return view('admin.data_jabatan.tambah_jabatan.index', $data);
    }

    public function store(StoreTambahJabatanRequest $request)
    {
        $validated = $request->validated();
        Jabatan::create([
            'nama_jabatan' => $validated['nama_jabatan'],
        ]);
        return redirect()->route('tambahJabatan')->with('success', 'Pengajuan berhasil dikirim dan sedang menunggu persetujuan admin.');
    }

}
