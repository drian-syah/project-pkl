<?php

namespace App\Models;

use App\Models\Tugas;
use App\Models\Sekolah;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'email',
        'role',
        'password',
    ];

    public function tugas()
    {
        return $this->hasOne(Tugas::class);
    }

    public function sekolah()
    {
    return $this->belongsTo(Sekolah::class, 'sekolah_id');
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
