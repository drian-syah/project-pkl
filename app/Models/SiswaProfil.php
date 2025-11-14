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
        'created_date',
    ];
}
