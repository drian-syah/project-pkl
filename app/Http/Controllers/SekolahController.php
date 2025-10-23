<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengajuanPklmagang;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePengajuanRequest;

class SekolahController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Menu Pengajuan',
            'menuSekolah' => 'active',
            'pengajuan' => PengajuanPklmagang::OrderBy('id', 'asc')->get()
        ];
        return view('sekolah.pengajuan.index', $data);
    }

    public function create()
    {
        $data = array(
            'title' => 'Pengajuan Pkl Magang',
            'menuPengajuan' => 'active',
        );
        return view('sekolah.pengajuan.create', $data);
    }

    public function store(StorePengajuanRequest $request)
    {
        $validated = $request->validated();
        PengajuanPklmagang::create([
            'sekolah_id' => auth()->user()->id,
            'no_surat' => $validated['no_surat'],
            'tgl_surat' => $validated['tgl_surat'],
            'jumlah_siswa' => $validated['jumlah_siswa'],
            'periode_mulai' => $validated['periode_mulai'],
            'periode_selesai' => $validated['periode_selesai'],
            'status' => 'pending',
        ]);
        return redirect()->route('sekolah.pengajuan.create')->with('success', 'Pengajuan berhasil dikirim dan sedang menunggu persetujuan admin.');

    }

}
