<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserPegawaiController extends Controller
{
    public function index()
    {
        return view('admin.user.pegawai.index', [
            'title'    => 'Data Pegawai',
            'pegawai'  => Pegawai::with('jabatan', 'bidang')->get(),
            'menuPegawai' => 'active'
        ]);
    }

    public function create()
    {
        return view('admin.user.pegawai.create', [
            'title'   => 'Tambah Pegawai',
            'jabatan' => Jabatan::all(),
            'bidang'  => Bidang::all(),
            'menuPegawai' => 'active'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required|string|max:255',
            'nip'         => 'required|numeric|unique:pegawai,nip',
            'jabatan_id'  => 'required|exists:jabatan,id',
            'bidang_id'   => 'required|exists:bidang,id',
        ]);

        // 1. Buat user dulu
        $user = User::create([
            'username' => strtolower(str_replace(' ', '', $request->nama)),
            'nama'     => $request->nama,
            'email'    => strtolower(str_replace(' ', '', $request->nama)) . '@gmail.com',
            'password' => Hash::make($request->nip),
            'role'     => 'pegawai',
        ]);

        // 2. Simpan data pegawai
        Pegawai::create([
            'user_id'     => $user->id,
            'nama'        => $request->nama,
            'nip'         => $request->nip,
            'jabatan_id'  => $request->jabatan_id,
            'bidang_id'   => $request->bidang_id,
        ]);

        return redirect()->route('pegawaiIndex')->with('success', 'Pegawai berhasil ditambahkan.');
    }
}
