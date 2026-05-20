<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [

        'user_id',
        'mountain_id',
        'jenis_laporan',
        'deskripsi',
        'gambar',
        'status'
    ];

    // RELASI KE GUNUNG
    public function mountain()
    {
        return $this->belongsTo(Mountain::class);
    }

    // RELASI KE USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}