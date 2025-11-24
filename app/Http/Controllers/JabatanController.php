<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTambahJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;
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
            'created_id' => auth()->id(),
        ]);
        return redirect()->route('tambahJabatan')->with('success', 'Jabatan Berhasil Ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Jabatan',
            'MenuAdminJabatan' => 'active',
            'jabatan' => Jabatan::findOrFail($id)
        ];
        return view('admin.data_jabatan.daftar_jabatan.edit', $data);
    }

    public function update(UpdateJabatanRequest $request, $id)
    {

        $jabatan = Jabatan::findOrFail($id);

        $validated = $request->validated();
        $jabatan->update([
            'nama_jabatan' => $validated['nama_jabatan'],
            'updated_id' => auth()->id(),
        ]);
        return redirect()->route('daftarJabatan')->with('success', 'Jabatan Berhasil Diubah.');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::where('id', $id)->first();
        $jabatan->delete();

        return redirect()->route('daftarJabatan')->with('success', 'Data Berhasil Di Hapus');

    }

}
