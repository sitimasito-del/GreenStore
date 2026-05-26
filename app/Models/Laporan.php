<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'mountain_id',
        'user_id',
        'judul',
        'deskripsi',
        'foto'
    ];

    public function mountain()
    {
        return $this->belongsTo(Mountain::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}