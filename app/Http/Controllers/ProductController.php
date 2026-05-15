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

            'stok' => $request->stok

        ]);

        return redirect('/products');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit',
            compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $gambar = $product->gambar;

        if($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store('products', 'public');
        }

        $product->update([

            'nama_produk' => $request->nama_produk,

            'harga' => $request->harga,

            'deskripsi' => $request->deskripsi,

            'gambar' => $gambar,

            'stok' => $request->stok

        ]);

        return redirect('/products');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/products');
    }
}