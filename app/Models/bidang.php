<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'created_date',
        'created_id',
        'update_date',
        'update_id',
        'deleted_id',
        'deleted_date',
        'is_active',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'bidang_id');
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
