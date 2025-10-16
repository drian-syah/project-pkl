<?php

namespace App\Models;

use App\Models\Tugas;
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
        'is_tugas',
        'password',
    ];

    public function tugas()
    {
        return $this->hasOne(Tugas::class);
    }

    // 🔽 Tambahkan di sini
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
}
