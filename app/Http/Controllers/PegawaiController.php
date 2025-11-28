<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPegawaiRequest;
use App\Models\User;
use App\Models\Bidang;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserPegawaiRequest;

class PegawaiController extends Controller
{
    public function index()
    {
        $data = [
            'title'    => 'Data Pegawai',
            'pegawai'  => Pegawai::with('jabatan', 'bidang', 'user')->get(),
            'menuPegawaiActive' => 'active'
        ];
        return view('admin.user.pegawai.index', $data);
    }

    public function create()
    {
        $data = [
            'title'   => 'Tambah Pegawai',
            'jabatan' => Jabatan::all(),
            'bidang'  => Bidang::all(),
            'user'  => User::all(),
            'menuPegawai' => 'active'
        ];
        return view('admin.user.pegawai.create', $data);
    }

    public function store(StoreUserPegawaiRequest $request)
    {
        $validated = $request->validated();
        $user = User::find($validated['user_id']);
        Pegawai::create([
        'user_id' => $user->id,
        'nama' => $user->nama,
        'nip' => $validated['nip'],
        'jabatan_id' => $validated['jabatan_id'],
        'bidang_id' => $validated['bidang_id'],
        ]);

        return redirect()->route('pegawaiIndex')->with('success', 'Pegawai berhasil ditambahkan');
    }

    public function edit($id)
{
    $pegawai = Pegawai::findOrFail($id);

    $data = [
        'title'   => 'Edit Pegawai',
        'pegawai' => $pegawai,
        'user'   => User::all(),
        'bidang'  => Bidang::all(),
        'jabatan' => Jabatan::all(),
    ];

    return view('admin.user.pegawai.edit', $data);
}


public function update(UpdateUserPegawaiRequest $request, $id)
{
    $validated = $request->validated();

    $pegawai = Pegawai::findOrFail($id);

    $pegawai->update([
        'user_id'    => $validated['user_id'],
        'nama'       => $validated['nama'],  // ← pakai nama dari input form
        'nip'        => $validated['nip'],
        'jabatan_id' => $validated['jabatan_id'],
        'bidang_id'  => $validated['bidang_id'],
    ]);

    return redirect()->route('pegawaiIndex')->with('success', 'Pegawai berhasil diperbarui');
}



    public function destroy($id)
    {
        Pegawai::destroy($id);

        return redirect()->route('pegawaiIndex')->with('success', 'Pegawai berhasil dihapus');
    }
}
