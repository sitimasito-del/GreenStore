<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    protected $fillable = [

        'name',

        'description',

        'image',

        'admin_id'
    ];

    public function admin()
    {
        return $this->belongsTo(
            User::class,
            'admin_id'
        );
    }
}