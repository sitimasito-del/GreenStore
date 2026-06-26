<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $appends = [
        'image_url',
    ];

    protected $fillable = [
        'title',
        'category',
        'link',
        'views',
        'image'
    ];

    public function getImageUrlAttribute()
    {
        $image = $this->image;

        if (!$image) {
            return asset('images/article-placeholder.png');
        }

        if (str_starts_with($image, 'http')) {
            return $image;
        }

        if (str_starts_with($image, 'data:image')) {
            return $image;
        }

        if (str_starts_with($image, 'articles/')) {
            return asset('storage/' . $image);
        }

        $normalizedImage = preg_replace('/\s+/', '', $image);

        if (base64_decode($normalizedImage, true) !== false) {
            return 'data:image/jpeg;base64,' . $normalizedImage;
        }

        return 'data:image/jpeg;base64,' . base64_encode($image);
    }
}