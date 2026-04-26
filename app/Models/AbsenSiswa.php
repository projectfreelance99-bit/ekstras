<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenSiswa extends Model
{
    use HasFactory;

    protected $table = 'absen_siswa';

    protected $fillable = [
        'siswa_id',
        'masuk',
        'izin',
        'sakit',
        'ekstrakurikuler_id',
        'tanggal_absensi',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class);
    }
}
