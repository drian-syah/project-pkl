<?php

namespace App\Http\Controllers;


use App\Http\Requests\daftarSiswaStoreRequest;
use App\Http\Requests\UpdatePengajuanRequest;
use App\Models\SiswaProfil;
use App\Models\User;
use App\Models\Sekolah;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\PengajuanPklmagang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\StorePengajuanRequest;

class PengajuanController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Pengajuan',
            'menuAdminPengajuan' => 'active',
            'modal'=> 'Pengajuan',
            'pengajuan' => PengajuanPklmagang::with('sekolah')->where(function($q) {
                $q->where('status', '!=', 'draft')
                  ->orWhere('created_id', auth()->id());
            })
            ->orderBy('created_at', 'desc')
            ->get()
        );
        return view('admin.pengajuan.index', $data);
    }

    public function showDaftarForm()
    {
        $data = [
            'title' => 'Daftar User Sekolah',
        ];
        return view('admin.pengajuan.tambah_user_sekolah', $data);
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'npsn' => 'required|string|max:50|unique:sekolahs,npsn',
            'alamat' => 'required|string|max:150',
            'kontak' => 'required|string|max:100',
        ]);

        Sekolah::create([
            'nama' => $request['nama'],
            'npsn' => $request['npsn'],
            'alamat' => $request['alamat'],
            'kontak' => $request['kontak'],
            'is_active' => true,
        ]);

        return redirect()->route('adminPengajuanCreate')->with('success', 'Sekolah berhasil didaftarkan.');
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Pengajuan',
            'menuAdminPengajuan' => 'active',
            'sekolah' => Sekolah::all(),
        ];
        return view('admin.pengajuan.create', $data);
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
        return redirect()->route('adminPengajuan')->with('success', 'Pengajuan berhasil dikirim dan sedang menunggu persetujuan admin.');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data User',
            'menuAdminUser' => 'active',
            'pengajuan'  => PengajuanPklmagang::findOrFail($id),
        ];
        return view('admin.pengajuan.edit', $data);
    }

    public function update(UpdatePengajuanRequest $request, $id)
{
    $pengajuan = PengajuanPklmagang::findOrFail($id);

    $validated = $request->validated();

    // Jika file diupload → simpan
    if ($request->hasFile('file_surat_path')) {
        $filePath = $request->file('file_surat_path')->store('surat', 'public');
    } else {
        $filePath = $pengajuan->file_surat_path; // tetap pakai file lama
    }

    $pengajuan->update([
        'sekolah_id' => $validated['sekolah_id'],
        'no_surat' => $validated['no_surat'],
        'tgl_surat' => $validated['tgl_surat'],
        'jumlah_siswa' => $validated['jumlah_siswa'],
        'periode_mulai' => $validated['periode_mulai'],
        'periode_selesai' => $validated['periode_selesai'],
        'file_surat_path' => $filePath,
        'status' => 'draft',
        'updated_id' => auth()->id(),
    ]);

    return redirect()->route('adminPengajuan')->with('success', 'Pengajuan berhasil diupdate.');
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

    public function destroy($sekolah_id)
    {
        $pengajuan = PengajuanPklmagang::where('sekolah_id', $sekolah_id)->first();
        $pengajuan->delete();

        return redirect()->route('adminPengajuan')->with('success', 'Data Berhasil Di Hapus');

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
            'user' => PengajuanPklmagang::get(),
            'tanggal' => now()->format('d-m-y'),
            'jam' => now()->format('H.i.s'),
        );
        $pdf = Pdf::loadView('admin/user/pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataUsers_'.$filename.'.pdf');
    }

}
