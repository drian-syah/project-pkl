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
}
