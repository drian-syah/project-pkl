<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SiswaProfil;
use Illuminate\Http\Request;
use App\Models\PengajuanPklmagang;
use App\Http\Requests\daftarSiswaStoreRequest;

class AdminTambahSiswaController extends Controller
{
    public function showDaftarSiswaForm($id)
    {
        $data = [
            'title' => 'Daftar User Siswa',
            'pengajuan' => PengajuanPklmagang::findOrFail($id),
        ];
        return view('admin.pengajuan.pengajuansiswa', $data);
    }

    private function generateUniqueEmail($nama, $nisn)
{
    $base = strtolower(str_replace(' ', '.', $nama));
    $kode = substr($nisn, -1) . rand(10, 99);
    $email = $base . $kode . '@gmail.com';

    // cek apakah sudah ada
    while (User::where('email', $email)->exists()) {
        $kode = substr($nisn, -1) . rand(10, 99);
        $email = $base . $kode . '@gmail.com';
    }

    return $email;
}


    public function daftarSiswa(daftarSiswaStoreRequest $request)
    {
        $email = $this->generateUniqueEmail($request->nama, $request->nisn);
        
        $user = User::create([
            'nama' => $request->nama,
            'email' => $this->generateUniqueEmail($request->nama, $request->nisn),
            'password' => bcrypt($request->nisn),
            'role' => 'siswa'
        ]);
        
        $validated = $request->validated();
        $foto = $request->file('foto')->store('foto_siswa', 'public');

        SiswaProfil::create([
            'user_id' => $user->id,
            'pengajuan_id' => $request->pengajuan_id,
            'nama' => $request['nama'],
            'nisn' => $request['nisn'],
            'kelas' => $request['kelas'],
            'jurusan' => $request['jurusan'],
            'foto' => $foto
        ]);
        return redirect()->route('pengajuan', $request->pengajuan_id)->with('success', 'Siswa berhasil didaftarkan.');
    }
}
