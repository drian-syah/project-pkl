<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PengajuanPklmagang;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePengajuanRequest;

class SekolahController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Menu Pengajuan',
            'modal' => 'Pengajuan',
            'menuSekolah' => 'active',
            'pengajuan' => PengajuanPklmagang::where('sekolah_id', Auth::user()->sekolah->id)->get(),

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
        $filePath = $request->file('file_surat_path')->store('surat', 'public');
        PengajuanPklmagang::create([
            'sekolah_id' => $validated['sekolah_id'],
            'no_surat' => $validated['no_surat'],
            'tgl_surat' => $validated['tgl_surat'],
            'jumlah_siswa' => $validated['jumlah_siswa'],
            'periode_mulai' => $validated['periode_mulai'],
            'periode_selesai' => $validated['periode_selesai'],
            'file_surat_path' => $filePath,
            'created_id' => auth()->id(),
            'created_by_role' => 'Admin',
            'status' => 'draft',
        ]);
        return redirect()->route('sekolah')->with('success', 'Pengajuan berhasil dikirim dan sedang menunggu persetujuan admin.');
    }

    public function kirim($sekolah_id)
    {
    $pengajuan = PengajuanPklmagang::where('sekolah_id', $sekolah_id)
        ->where('status', 'draft')
        ->first();

        if ($pengajuan->status !== 'draft') {
            return back()->with('error', 'Pengajuan ini sudah dikirim atau sudah diproses.');
        }
    
        $pengajuan->update(['status' => 'diproses']);
    
        return back()->with('success', 'Pengajuan berhasil dikirim dan sedang diproses oleh admin.');
    }

    public function edit()
    {
        $data = array(
            'title' => 'Edit Pengajuan',
            'menuEditPengajuanSekolah' => 'active',
            'pengajuan' => PengajuanPklmagang::where('sekolah_id', Auth::user()->sekolah->id)->first()
        );
        return view('sekolah.pengajuan.edit', $data);
    }

    public function update(StorePengajuanRequest $request, $sekolah_id)
    {
        $validated = $request->validated();
        $filePath = $request->file('file_surat_path')->store('surat', 'public');
        PengajuanPklmagang::where('id', $sekolah_id)->update([
            'sekolah_id' => Auth::user()->id,
            'no_surat' => $validated['no_surat'],
            'tgl_surat' => $validated['tgl_surat'],
            'jumlah_siswa' => $validated['jumlah_siswa'],
            'periode_mulai' => $validated['periode_mulai'],
            'periode_selesai' => $validated['periode_selesai'],
            'file_surat_path' => $filePath,
        ]);
        return redirect()->route('sekolah')->with('success', 'Pengajuan berhasil dikirim dan sedang menunggu persetujuan admin.');
    }

    public function destroy($sekolah_id)
    {
        $pengajuan = PengajuanPklmagang::where('sekolah_id', $sekolah_id)->first();
        $pengajuan->delete();

        return redirect()->route('sekolah')->with('success', 'Data Berhasil Di Hapus');

    }

    public function pdf()
    {
        $filename = now()->format('d-m-Y H.i.s');
        $data = array(
            'pengajuan' => PengajuanPklmagang::get(),
            'tanggal' => now()->format('d-m-y'),
            'jam' => now()->format('H.i.s'),
        );
        $pdf = Pdf::loadView('sekolah/pengajuan/pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataUsers_'.$filename.'.pdf');
    }

}
