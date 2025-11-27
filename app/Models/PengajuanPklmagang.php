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
        'created_by_role',
        'created_date',
        'created_id',
        'updated_id',
        'updated_date',
        'deleted_id',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function createdBy()
    {
    return $this->belongsTo(User::class, 'created_id');
    }

    public function updatedBy()
    {
    return $this->belongsTo(User::class, 'updated_id');
    }

    // Relasi ke Sekolah
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function siswa()
    {
        return $this->hasMany(SiswaProfil::class, 'pengajuan_id');
    }

    public function penempatan()
    {
        return $this->hasMany(Penempatan::class, 'pengajuan_id');
    }
}
