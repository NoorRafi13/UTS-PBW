<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPkl extends Model
{
    protected $guarded = ['id'];
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function pembimbing()
    {
        return $this->belongsTo(Pembimbing::class);
    }

    // Tambahkan relasi lain jika diperlukan, misalnya dengan model PenilaianPkl
}
