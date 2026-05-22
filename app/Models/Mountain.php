<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    protected $fillable = [
        'nama',
        'foto',
        'tinggi'
    ];

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }
}