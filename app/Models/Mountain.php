<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    protected $fillable = [
        'nama_gunung',
        'lokasi',
        'gambar',
        'deskripsi'
    ];

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}