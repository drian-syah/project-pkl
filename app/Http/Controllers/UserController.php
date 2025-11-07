<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Sekolah;
use App\Exports\UserExport;
use App\Models\SiswaProfil;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'menuAdminUser' => 'active',
            'user' => User::orderBy('id', 'asc')->get(),
        );
        return view('admin/user/index', $data);
    }

    public function create(Request $request)
    {
        $role = $request->query('role');
        $data = array(
            'title' => 'Tambah Data User',
            'menuAdminUser' => 'active',
            'role' => $request->get('role'),
        );
        return view('admin.user.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|unique:users,email',
            'role'  => 'required',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase(),],
        ],[
            'nama.required'     => 'Nama Tidak Boleh Kosong',
            'email.required'    => 'Email Tidak Boleh Kosong',
            'email.unique'      => 'Email Sudah Ada',
            'role.required'  => 'Status Anda Harus Dipilih',
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.confirmed'=> 'Password Konfirmasi Tidak Sama',
            'password.min'      => 'Password Minimal 8 Karakter',
            'password.mixed' => 'Password Minimal Harus Mengandung Huruf Besar dan Kecil'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        switch ($user->role) {
            case 'Siswa':
                SiswaProfil::create([
                    'user_id' => $user->id,
                    'nisn' => $request->nisn,
                    'kelas' => $request->kelas,
                    'jurusan' => $request->jurusan,
                ]);
                break;
            case 'Pembimbing':
                Pegawai::create([
                    'user_id' => $user->id,
                    'nip' => $request->nip,
                    'jabatan' => $request->jabatan,
                ]);
                break;
            case 'Sekolah':
                Sekolah::create([
                    'user_id' => $user->id,
                    'npsn' => $request->npsn,
                    'nama_sekolah' => $request->nama_sekolah,
                    'alamat' => $request->alamat,
                ]);
                break;
            }

        $user = new User;
        $user->nama     = $request->nama;
        $user->email    = $request->email;
        $user->role  = $request->role;
        $user->password = Hash::make($request->password);
        $user->is_tugas = false;
        $user->save();

        return redirect()->route('user')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data User',
            'menuAdminUser' => 'active',
            'user'  => User::findOrFail($id),
        ];
        return view('admin/user/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'     => 'required',
            'email'    => 'required|unique:users,email,' .$id,
            'role'  => 'required',
            'password' => ['nullable', 'confirmed', Password::min(8)->mixedCase()],
        ],[
            'nama.required'     => 'Nama Tidak Boleh Kosong',
            'email.required'    => 'Email Tidak Boleh Kosong',
            'email.unique'      => 'Email Sudah Ada',
            'role.required'  => 'Status Anda Harus Dipilih',
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.confirmed'=> 'Password Konfirmasi Tidak Sama',
            'password.min'      => 'Password Minimal 8 Karakter',
            'password.mixed' => 'Password Minimal Harus Mengandung Huruf Besar dan Kecil' 
        ]);

        $user = User::with('sekolah')->findOrFail($id) ;
        $user->nama     = $request->nama;
        $user->email    = $request->email;
        $user->role  = $request->role;
        if ($request->role == 'Admin') {
            $user->is_tugas = false;
            $user->tugas()->delete();
        }

        if($request->filled('password'))
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('edit')->with('success', 'Data Berhasil Di Edit');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Data Berhasil Di Hapus');

    }

    public function excel()
    {
        $filename = now()->format('d-m-Y H.i.s');
        return Excel::download(new UserExport, 'DataUsers_'.$filename.'.xlsx');
    }

    public function pdf()
    {
        $filename = now()->format('d-m-Y H.i.s');
        $data = array(
            'user' => User::get(),
            'tanggal' => now()->format('d-m-y'),
            'jam' => now()->format('H.i.s'),
        );
        $pdf = Pdf::loadView('admin/user/pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataUsers_'.$filename.'.pdf');
    }

}
