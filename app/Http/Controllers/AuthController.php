<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'siswa', // default role
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
            'password' => 'required|min:8'
        ],[
            'email.required' => 'Email Tidak Boleh Kosong',
            'password.required' => 'Password Tidak Boleh Kosong',
            'password.min' => 'Password Minimal 8 Karakter',
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
