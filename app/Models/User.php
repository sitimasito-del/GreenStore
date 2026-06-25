<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [

        'name',

        'email',

        'password',

        'foto',

        'nomor_wa',

        'role',

        'mountain_id'

    ];

    protected $hidden = [

        'password',

        'remember_token',

    ];

    protected function casts(): array
    {
        return [

            'email_verified_at' => 'datetime',

            'password' => 'hashed',

        ];
    }

    // RELASI KE GUNUNG
    public function mountain()
    {
        return $this->belongsTo(Mountain::class);
    }

    // RELASI KE LAPORAN
    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }
}
