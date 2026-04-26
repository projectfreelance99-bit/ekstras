<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;
    protected $table='ekstrakurikuler';

    public function pembina()
    {
        return $this->belongsTo(Pembina::class);
    }
    public function penjadwalan()
    {
        return $this->hasMany(Penjadwalan::class);
    }

}
