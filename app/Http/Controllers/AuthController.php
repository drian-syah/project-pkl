<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'npsn' => 'required|string|max:50|unique:sekolahs,npsn',
            'alamat' => 'required|string|max:150',
            'kontak' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $sekolah = Sekolah::create([
            'nama' => $request['nama'],
            'npsn' => $request['npsn'],
            'alamat' => $request['alamat'],
            'kontak' => $request['kontak'],
            'is_active' => true,
        ]);

        User::create([
            'nama' => $request->nama,
            'npsn' => $request->npsn,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'email' => $request->email,
            'role' => 'sekolah', // default role
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat, silakan login.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProses(Request $request)
    {   
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
        ]);

        $data = array(

            'email' => $request->email,
            'password' => $request->password,   

        );

        if(Auth::attempt($data)){

            return redirect()->route('dashboard')->with('success', 'Anda Berhasil Login');

        }else{
            return redirect()->back()->with('error', 'Email atau Password Salah');
        }

    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
    }
}   
