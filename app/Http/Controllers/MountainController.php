<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mountain;
use App\Models\Article;
use App\Models\Product;

class MountainController extends Controller
{
    // ===============================
    // DASHBOARD USER
    // ===============================

    public function dashboard()
    {
        $mountains = Mountain::latest()->get();

        $popularArticles = Article::orderByDesc('views')
            ->take(3)
            ->get();

        $products = Product::latest()
            ->take(3)
            ->get();

        return view(

            'dashboard',

            compact(
                'mountains',
                'popularArticles',
                'products'
            )
        );
    }

    // ===============================
    // DETAIL GUNUNG
    // ===============================

    public function detail($id)
    {
        $mountain = Mountain::findOrFail($id);

        return view(

            'mountain-detail',

            compact('mountain')
        );
    }
}
