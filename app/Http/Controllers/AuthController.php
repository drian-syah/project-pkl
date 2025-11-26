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
            'username' => 'required|string|max:50|unique:users,username',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'role' => 'Sekolah',
            'password' => Hash::make($request->password),
        ]);

        Sekolah::create([
            'nama' => $request->nama,
            'npsn' => $request['npsn'],
            'alamat' => $request['alamat'],
            'kontak' => $request['kontak'],
            'user_id' => $user->id,
            'is_active' => true,
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
            'login' => 'required',
            'password' => 'required'
        ], [
            'login.required' => 'Email atau Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        // Tentukan apakah input email atau username
        $login = $request->login;
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Attempt login
        if (Auth::attempt([$field => $login, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Anda Berhasil Login');
        }

        return back()->with('error', 'Email/Username atau Password salah');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda Berhasil Logout');
    }
}
