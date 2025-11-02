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
            'pengajuan' => PengajuanPklmagang::where('status', '!=', 'draft')
                        ->orderBy('created_at', 'desc')
                        ->get()
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
        $validated = $request->validated();
        PengajuanPklmagang::create([
            'sekolah_id' => auth()->user()->id,
            'no_surat' => $validated['no_surat'],
            'tgl_surat' => $validated['tgl_surat'],
            'jumlah_siswa' => $validated['jumlah_siswa'],
            'periode_mulai' => $validated['periode_mulai'],
            'periode_selesai' => $validated['periode_selesai'],
        ]);
        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan berhasil dikirim dan sedang menunggu persetujuan admin.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data User',
            'menuAdminUser' => 'active',
            'user'  => Pengajuan::findOrFail($id),
        ];
        return view('admin.pengajuan.edit', $data);
    }

    public function update(StorePengajuanRequest $request, $id)
    {
        $validated = $request->validated();
        PengajuanPklmagang::update([
            'sekolah_id' => auth()->user()->id,
            'no_surat' => $validated['no_surat'],
            'tgl_surat' => $validated['tgl_surat'],
            'jumlah_siswa' => $validated['jumlah_siswa'],
            'periode_mulai' => $validated['periode_mulai'],
            'periode_selesai' => $validated['periode_selesai'],
        ]);
        return redirect()->route('admin.pengajuan')->with('success', 'Pengajuan berhasil dikirim dan sedang menunggu persetujuan admin.');
    }

    public function show($sekolah_id)
    {
        $pengajuan = PengajuanPklmagang::findOrFail($sekolah_id);
        return view('admin.pengajuan');
    }

    public function disetujui($sekolah_id)
    {
        $pengajuan = PengajuanPklmagang::where('sekolah_id', $sekolah_id)->where('status', 'diproses');
        $pengajuan->update(['status' => 'diterima']);
        return back()->with('success', 'Pengajuan Sudah Diterima');
    }

    public function ditolak($sekolah_id)
    {
        $pengajuan = PengajuanPklmagang::where('sekolah_id', $sekolah_id)->where('status', 'diproses');
        $pengajuan->update(['status' => 'ditolak']);
        return back()->with('success', 'Pengajuan Ditolak');
    }

    public function destroy($sekolah_id)
    {
        $pengajuan = PengajuanPklmagang::where('sekolah_id', $sekolah_id)->first();
        $pengajuan->delete();

        return redirect()->route('admin.pengajuan')->with('success', 'Data Berhasil Di Hapus');

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
