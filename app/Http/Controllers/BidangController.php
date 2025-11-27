<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateBidangRequest;
use App\Http\Requests\StoreTambahBidangRequest;

class BidangController extends Controller
{
    public function index ()
    {
        $data = [
        'title' => 'Menu Bidang',
        'menuAdminBidang' => 'active',
        'menuAdminMasterDataShow' => 'active',
        'bidang' => Bidang::orderBy('id', 'asc')->get(),
        ];
        
        return view('admin.data_bidang.daftar_bidang.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Bidang',
            'MenuAdminTambahBidang' => 'active',
        ];
        return view('admin.data_bidang.daftar_bidang.create', $data);
    }

    public function store(StoreTambahBidangRequest $request)
    {
        $validated = $request->validated();
        Bidang::create([
            'nama' => $validated['nama'], 
            'kode' => $validated['kode'], 
        ]);
        return redirect()->route('daftarBidang')->with('success', 'Bidang Berhasil Di Tambahkan.');
    }

    public function destroy($id)
    {
        $bidang = Bidang::where('id', $id)->first();
        $bidang->delete();

        return redirect()->route('daftarBidang')->with('success', 'Data Bidang Berhasil Di Hapus');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit bidang',
            'MenuAdminJabatan' => 'active',
            'bidang' => Bidang::findOrfail($id)
        ];
        return view('admin.data_bidang.daftar_bidang.edit', $data);
    }

    public function update(UpdateBidangRequest $request, $id)
    {
        $bidang = Bidang::findOrFail($id);

        $validated = $request->validated();
        $bidang->update([
            'nama' => $validated['nama'],
            'kode' => $validated['kode'],
        ]);
        return redirect()->route('daftarBidang')->with('success', 'Bidang Berhasil Di Ubah.');
    }

}
