<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';

    protected $fillable = [
        'siswa_id',
        'status',
        'keterangan',
        'foto',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
    ];

    public function siswa()
    {
        return $this->belongsTo(SiswaProfil::class, 'siswa_id');
    }
}
