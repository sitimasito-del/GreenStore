<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index',
            compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $gambar = null;

        if($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store('products', 'public');
        }

        Product::create([

            'nama_produk' => $request->nama_produk,

            'harga' => $request->harga,

            'deskripsi' => $request->deskripsi,

            'gambar' => $gambar,

            'stok' => $request->stok,

            'nomor_wa' => $request->nomor_wa

        ]);

        return redirect('/products');
    }
}