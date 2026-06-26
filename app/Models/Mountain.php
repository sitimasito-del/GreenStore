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
        $image = $this->image;

        if(!$image)
        {
            return asset('images/product-placeholder.svg');
        }

        if(str_starts_with($image, 'http'))
        {
            return $image;
        }

        if(str_starts_with($image, 'data:image'))
        {
            return $image;
        }

        if(str_starts_with($image, 'mountains/'))
        {
            return asset('storage/' . $image);
        }

        $normalizedImage = preg_replace('/\s+/', '', $image);

        if(base64_decode($normalizedImage, true) !== false)
        {
            return 'data:image/jpeg;base64,' . $normalizedImage;
        }

        return 'data:image/jpeg;base64,' . base64_encode($image);
    }
}
