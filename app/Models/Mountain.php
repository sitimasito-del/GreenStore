<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    protected $appends = [
        'image_url',
    ];

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

    public function getImageUrlAttribute()
    {
        if(!$this->image)
        {
            return asset('images/product-placeholder.svg');
        }

        if(str_starts_with($this->image, 'http'))
        {
            return $this->image;
        }

        if(str_starts_with($this->image, 'data:image'))
        {
            return $this->image;
        }

        if(str_starts_with($this->image, 'mountains/'))
        {
            return asset('storage/' . $this->image);
        }

        return 'data:image/jpeg;base64,' . $this->image;
    }
}
