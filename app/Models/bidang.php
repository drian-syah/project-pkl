<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bidang extends Model
{
    use HasFactory;

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'bidang_id');
    }
}
