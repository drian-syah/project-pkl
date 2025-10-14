<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penempatan extends Model
{
    use HasFactory;

    protected $table = 'penempatan';
    public $timestamps = false;

    protected $fillable = [
        'pengajuan_id',
        'bidang_id',
        'created_date',
        'created_id',
        'updated_id',
        'updated_date',
        'deleted_id',
        'deleted_date',
        'is_active',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanPklMagang::class, 'pengajuan_id');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}

