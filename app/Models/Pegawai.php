<?php

namespace App\Models;

use App\Models\User;
use App\Models\Bidang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'jabatan',
        'user_id',
        'bidang_id',
    ];

    protected $table = 'pegawai';

    // Relasi Many-to-Many ke Pengajuan melalui Pembimbing
    public function pengajuans()
    {
        return $this->belongsToMany(PengajuanPklMagang::class, 'pembimbing', 'pegawai_id', 'pengajuan_id')
                    ->withPivot(['tahun', 'is_active'])
                    ->withTimestamps();
    }

    public $timestamps = false;

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', );
    }
}
