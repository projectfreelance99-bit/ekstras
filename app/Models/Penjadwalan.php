<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    use HasFactory;
    protected $table='jadwals';
    protected $fillable = [
        'ekstrakurikuler_id',
        'hari',
        'jam',
    ];

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class);
    }
}
