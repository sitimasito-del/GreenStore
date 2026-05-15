<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                              ->store('products', 'public');
        }

        Product::create([

            'nama_produk' => $request->nama_produk,

            'harga' => $request->harga,

            'stok' => $request->stok,

            'deskripsi' => $request->deskripsi,

            'gambar' => $gambar
        ]);

        return redirect('/products');
    }
}