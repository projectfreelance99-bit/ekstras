<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;

    protected $table= 'nilai_siswas';

    protected $fillable = ['siswa_id', 'ekstrakurikuler', 'nilai'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
