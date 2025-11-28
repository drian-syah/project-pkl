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
        $countSiswa = SiswaProfil::where('pengajuan_id', $id)->count();
        $data = [
            'title' => 'Daftar User Siswa',
            'pengajuan' => PengajuanPklmagang::findOrFail($id),
            'countSiswa' => $countSiswa,  // ← kirim ke blade
        ];
        return view('admin.pengajuan.pengajuansiswa', $data);
    }

    private function generateUniqueUsername($nisn)
    {
    $username = $nisn;
    $count = 1;

    while (User::where('username', $username)->exists()) {
        $username = $nisn . $count;
        $count++;
    }

    return $username;
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

        $pengajuan = PengajuanPklmagang::findOrFail($request->pengajuan_id);

        $current = SiswaProfil::where('pengajuan_id', $pengajuan->id)->count();

        if ($current >= $pengajuan->jumlah_siswa) {
        return back()->with('error', 'Jumlah siswa sudah mencapai batas maksimal.');
        }

        $email = $this->generateUniqueEmail($request->nama, $request->nisn);
         $username = $this->generateUniqueUsername($request->nisn);
        
        $user = User::create([
            'username' => $username,
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
        return redirect()->route('adminPengajuan', $request->pengajuan_id)->with('success', 'Siswa berhasil didaftarkan.');
    }
}
