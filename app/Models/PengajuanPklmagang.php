<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanPklmagang extends Model
{
    protected $table = 'pengajuan_pklmagang'; // kalau nama tabel kamu tanpa "s"

    protected $fillable = [
        'no_surat',
        'tgl_surat',
        'tgl_surat',
        'sekolah_id',
        'jumlah_siswa',
        'periode_mulai',
        'periode_selesai',
        'status',
        'file_surat_path',
        'catatan',
    ];
}
