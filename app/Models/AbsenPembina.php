<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenPembina extends Model
{
    use HasFactory;

     protected $table = 'absen_pembina';

    protected $fillable = [
        'pembina_id',
        'tanggal',
        'status_absensi',
        'status_verifikasi',
    ];

     public function pembina()
    {
        return $this->belongsTo(Pembina::class);
    }
}
