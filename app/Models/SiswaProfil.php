<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaProfil extends Model
{
    protected $table = 'siswa_profile';

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
}
