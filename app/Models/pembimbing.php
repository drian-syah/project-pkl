<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembimbing extends Model
{
    public function pegawai()
{
    return $this->belongsTo(Pegawai::class, 'pegawai_id');
}

public function pengajuan()
{
    return $this->belongsTo(PengajuanPklMagang::class, 'pengajuan_id');
}

}
