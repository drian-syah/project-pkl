<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatans';

    protected $fillable = [
        'nama_jabatan',
        'created_id',
        'created_date',
        'updated_id',
        'updated_date',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'jabatan');
    }

    public function createdBy()
    {
    return $this->belongsTo(User::class, 'created_id');
    }

    public function updatedBy()
    {
    return $this->belongsTo(User::class, 'updated_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
