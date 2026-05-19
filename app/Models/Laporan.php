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
}