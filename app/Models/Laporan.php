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

    // RELASI USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // RELASI GUNUNG
    public function mountain()
    {
        return $this->belongsTo(Mountain::class);
    }
}