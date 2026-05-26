<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    protected $fillable = [
<<<<<<< HEAD

        'name',
        'description',
        'image',
        'admin_id'
    ];
=======
        'nama',
        'foto',
        'tinggi'
    ];

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }
>>>>>>> 2649c0eb5aba5c612d50adbe56020bd9fab984a6
}