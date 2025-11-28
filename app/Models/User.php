<?php

namespace App\Models;

use App\Models\Tugas;
use App\Models\Pegawai;
use App\Models\Sekolah;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'username',
        'email',
        'role',
        'password',
        'id_bidang',
        'is_active',
    ];

    public function tugas()
    {
        return $this->hasOne(Tugas::class);
    }

    public function pengajuan()
    {
        return $this->hasMany(PengajuanPklmagang::class);
    }

    public function sekolah()
    {
        return $this->hasOne(Sekolah::class, 'user_id');
    }

    public function siswa()
    {
        return $this->hasOne(SiswaProfil::class, 'user_id');
    }

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'user_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang');
    }


    // Tambahkan di sini
    public function isSiswa()
    {
        return $this->role === 'siswa';
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Hapus data sekolah yang terkait
            if ($user->sekolah) {
                $user->sekolah->delete();
            }
        });
    }



}
