<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Pengaturan',
            'setting' => 'active',
            'user'  => Auth::user(),
        ];
        return view('fitur/profil/setting', $data);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed', 
        ]);

        $user->nama  = $request->nama;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // contoh kalau kamu simpan dark mode di session (bisa juga di db settings)
       

        return redirect()->route('updateSetting')->with('success', 'Pengaturan berhasil diperbarui!');
    }

}
