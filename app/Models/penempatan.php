<?php

namespace App\Models;

use App\Models\Bidang;
use App\Models\PengajuanPklmagang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penempatan extends Model
{
    use HasFactory;

    protected $table = 'penempatan';
    public $timestamps = false;

    protected $fillable = [
        'pengajuan_id',
        'id_bidang',
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
        return $this->belongsTo(PengajuanPklmagang::class, 'pengajuan_id');
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}

