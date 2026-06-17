<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // =========================
    // DAFTAR PRODUK
    // =========================

    public function index()
    {
        $products = Product::latest()->get();

        return view(
            'products.index',
            compact('products')
        );
    }

    // =========================
    // FORM TAMBAH PRODUK
    // =========================

    public function create()
    {
        return view('products.create');
    }

    // =========================
    // SIMPAN PRODUK
    // =========================

    public function store(Request $request)
    {
        dd($request->all());

        $gambar = null;

        if($request->hasFile('gambar'))
        {
            $gambar = $request->file('gambar')
                ->store('products', 'public');
        }

        Product::create([

            'nama_produk' => $request->nama_produk,

            'kategori' => $request->kategori,

            'harga' => $request->harga,

            'deskripsi' => $request->deskripsi,

            'gambar' => $gambar,

            'stok' => $request->stok

        ]);

        return redirect('/admin/products')
            ->with(
                'success',
                'Produk berhasil ditambahkan'
            );
    }

    // =========================
    // FORM EDIT PRODUK
    // =========================

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view(
            'products.edit',
            compact('product')
        );
    }

    // =========================
    // UPDATE PRODUK
    // =========================

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $gambar = $product->gambar;

        if($request->hasFile('gambar'))
        {
            $gambar = $request->file('gambar')
                ->store('products', 'public');
        }

        $product->update([

            'nama_produk' => $request->nama_produk,

            'kategori' => $request->kategori,

            'harga' => $request->harga,

            'deskripsi' => $request->deskripsi,

            'gambar' => $gambar,

            'stok' => $request->stok

        ]);

        return redirect('/admin/products')
            ->with(
                'success',
                'Produk berhasil diperbarui'
            );
    }

    // =========================
    // HAPUS PRODUK
    // =========================

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/admin/products')
            ->with(
                'success',
                'Produk berhasil dihapus'
            );
    }
}