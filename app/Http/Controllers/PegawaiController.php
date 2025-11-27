<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPegawaiRequest;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();

        return view('admin.user.pegawai.index', [
            'title' => 'Data Pegawai',
            'pegawai' => $pegawai
        ]);
    }

    public function create()
    {
        return view('admin.user.pegawai.create', [
            'title' => 'Tambah Pegawai'
        ]);
    }

    public function store(StoreUserPegawaiRequest $request)
    {
        // $request->validate([
        //     'nama' => 'required',
        //     'email' => 'required|email|unique:pegawai,email',
        //     'jabatan' => 'required'
        // ]);
        $validated = $request->validated();
        Pegawai::create([
        'user_id' => null,
        'nama' => $validated['nama'],
        'nip' => $validated['nip'],
        'jabatan_id' => $validated['jabatan_id'],
        'bidang_id' => $validated['bidang_id'],
        ]);

        return redirect()->route('pegawaiIndex')->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        return view('admin.pegawai.edit', [
            'title' => 'Edit Pegawai',
            'pegawai' => $pegawai
        ]);
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $pegawai->update($request->all());

        return redirect()->route('pegawaiIndex')->with('success', 'Pegawai berhasil diperbarui');
    }

    public function destroy($id)
    {
        Pegawai::destroy($id);

        return redirect()->route('pegawaiIndex')->with('success', 'Pegawai berhasil dihapus');
    }
}
