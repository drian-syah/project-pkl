<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    // Relasi Many-to-Many ke Pengajuan melalui Pembimbing
    public function pengajuans()
    {
        return $this->belongsToMany(PengajuanPklMagang::class, 'pembimbing', 'pegawai_id', 'pengajuan_id')
                    ->withPivot(['tahun', 'is_active'])
                    ->withTimestamps();
    }
}
