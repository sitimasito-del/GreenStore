<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = [
        'gambar_url',
    ];

    protected $fillable = [
        'nama_produk',
        'kategori',
        'harga',
        'deskripsi',
        'gambar',
        'stok'
    ];

    public function getGambarUrlAttribute()
    {
        $gambar = $this->gambar;

        if(!$gambar)
        {
            return asset('images/product-placeholder.svg');
        }

        if(str_starts_with($gambar, 'http'))
        {
            return $gambar;
        }

        if(str_starts_with($gambar, 'data:image'))
        {
            return $gambar;
        }

        if(str_starts_with($gambar, 'products/'))
        {
            return asset('storage/' . $gambar);
        }

        $normalizedGambar = preg_replace('/\s+/', '', $gambar);

        if(base64_decode($normalizedGambar, true) !== false)
        {
            return 'data:image/jpeg;base64,' . $normalizedGambar;
        }

        return 'data:image/jpeg;base64,' . base64_encode($gambar);
    }
}
