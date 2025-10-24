<?php

namespace App\Models;

use App\Models\PengajuanPklmagang;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolahs';
    protected $fillable = [
        'nama',
        'npsn',
        'alamat',
        'kontak',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function pengajuan()
    {
        return $this->hasMany(PengajuanPklmagang::class, 'sekolah_id');
    }

}
