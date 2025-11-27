<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPegawaiRequest;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class AdminUserPegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::with('user')->get();

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
        $validated = $request->validated();

        // user_id TIDAK dipakai di sini!
        Pegawai::create([
            'nama'       => $validated['nama'],
            'nip'        => $validated['nip'],
            'jabatan_id' => $validated['jabatan_id'],
            'bidang_id'  => $validated['bidang_id'],
            'user_id'    => null, // dipastikan null
        ]);

        return redirect()->route('pegawaiIndex')->with('success', 'Pegawai berhasil ditambahkan tanpa user');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        return view('admin.user.pegawai.edit', [
            'title' => 'Edit Pegawai',
            'pegawai' => $pegawai
        ]);
    }

    public function update(StoreUserPegawaiRequest $request, $id)
    {
        $validated = $request->validated();

        $pegawai = Pegawai::findOrFail($id);

        // Tidak menyentuh user_id
        $pegawai->update([
            'nama'       => $validated['nama'],
            'nip'        => $validated['nip'],
            'jabatan_id' => $validated['jabatan_id'],
            'bidang_id'  => $validated['bidang_id'],
        ]);

        return redirect()->route('pegawaiIndex')->with('success', 'Pegawai berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        if ($pegawai->user_id !== null) {
            return redirect()->route('pegawaiIndex')
                ->with('error', 'Pegawai memiliki akun user, hapus user terlebih dahulu.');
        }

        $pegawai->delete();

        return redirect()->route('pegawaiIndex')->with('success', 'Pegawai berhasil dihapus');
    }
}
