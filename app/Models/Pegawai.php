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
        'jabatan_id',
        'user_id',
        'bidang_id',
    ];

    protected $table = 'pegawai';


    public function pengajuans()
    {
        return $this->belongsToMany(PengajuanPklMagang::class, 'pembimbing', 'pegawai_id', 'pengajuan_id')
                    ->withPivot(['tahun', 'is_active'])
                    ->withTimestamps();
    }

    public $timestamps = false;

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', );
    }
}
