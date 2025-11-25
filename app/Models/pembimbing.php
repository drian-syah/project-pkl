<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    protected $table = 'pembimbing';
    protected $fillable = [
        'pengajuan_id',
        'pegawai_id',
        'tahun',
        'created_date',
        'created_id',
        'updated_date',
        'updated_id',
        'deleted_date',
        'deleted_id',
    ];



    public function pegawai()
    {   
    return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function pengajuan()
{

    return $this->belongsTo(PengajuanPklMagang::class, 'pengajuan_id');
    }


}
