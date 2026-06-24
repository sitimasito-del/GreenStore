<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'stok' => 'required|integer|min:0',
        ]);

        $data['gambar'] = $request->file('gambar')
            ->store('products', 'public');

        Product::create($data);

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

        $data = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'stok' => 'required|integer|min:0',
        ]);

        if($request->hasFile('gambar'))
        {
            if($product->gambar)
            {
                Storage::disk('public')->delete($product->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('products', 'public');
        }

        $product->update($data);

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
