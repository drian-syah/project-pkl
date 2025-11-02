<?php

namespace App\Models;

use App\Models\Sekolah;
use Illuminate\Database\Eloquent\Model;

class PengajuanPklmagang extends Model
{
    protected $table = 'pengajuan_pklmagang'; // kalau nama tabel kamu tanpa "s"

    protected $fillable = [
        'no_surat',
        'tgl_surat',
        'sekolah_id',
        'jumlah_siswa',
        'periode_mulai',
        'periode_selesai',
        'status',
        'file_surat_path',
    ];

    // Relasi ke Sekolah
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
