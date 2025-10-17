<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
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
}
