<?php

namespace App\Http\Controllers;


use App\Exports\UserExport;
use App\Http\Requests\StorePengajuanRequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PengajuanPklmagang;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rules\Password;

class PengajuanController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Pengajuan',
            'menuAdminPengajuan' => 'active',
            'pengajuan' => PengajuanPklmagang::orderBy('id', 'asc')->get(),
        );
        return view('admin.pengajuan.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pengajuan',
            'menuAdminPengajuan' => 'active',
        ];
        return view('admin.pengajuan.create', $data);
    }

    public function store(StorePengajuanRequest $request)
    {
        $validate = $request([
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

        $user = new Pengajuan;
        $user->nama     = $request->nama;
        $user->email    = $request->email;
        $user->role  = $request->role;
        $user->password = Hash::make($request->password);
        $user->is_tugas = false;
        $user->save();

        return redirect()->route('pengajuan')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data User',
            'menuAdminUser' => 'active',
            'user'  => Pengajuan::findOrFail($id),
        ];
        return view('admin/pengajuan/edit', $data);
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

        $user = Pengajuan::with('pengajuan')->findOrFail($id) ;
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

        return redirect()->route('pengajuan')->with('success', 'Data Berhasil Di Edit');
    }

    public function destroy($id)
    {
        $user = Pengajuan::findOrFail($id);
        $user->delete();

        return redirect()->route('pengajuan')->with('success', 'Data Berhasil Di Hapus');

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
            'user' => Pengajuan::get(),
            'tanggal' => now()->format('d-m-y'),
            'jam' => now()->format('H.i.s'),
        );
        $pdf = Pdf::loadView('admin/user/pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataUsers_'.$filename.'.pdf');
    }

}
