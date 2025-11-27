<?php

namespace App\Models;

use App\Models\Bidang;
use Illuminate\Database\Eloquent\Model;

class SiswaProfil extends Model
{
    protected $table = 'siswa_profile';

    public function presensi()
    {
    return $this->hasMany(Presensi::class, 'siswa_id');
    }
    protected $fillable = [
        'user_id',
        'pengajuan_id',
        'nama',
        'nisn',
        'kelas',
        'jurusan',
        'foto',
        'created_id',
        'created_date',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanPklmagang::class, 'pengajuan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}
