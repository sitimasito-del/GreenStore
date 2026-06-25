<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // =========================
    // DAFTAR PRODUK
    // =========================

    public function index()
    {
        if($response = $this->authorizeProductAdmin())
        {
            return $response;
        }

        $products = Product::latest()->get();

        return view(
            'products.index',
            compact('products')
        );
    }

    // =========================
    // SEMUA PRODUK USER
    // =========================

    public function publicIndex(Request $request)
    {
        $search = $request->query('search');

        $products = Product::query()
            ->when($search, function($query, $search) {
                $query->where('nama_produk', 'like', '%' . $search . '%')
                    ->orWhere('kategori', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view(
            'products.all',
            compact('products', 'search')
        );
    }

    // =========================
    // DETAIL PRODUK USER
    // =========================

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view(
            'products.show',
            compact('product')
        );
    }

    // =========================
    // TAMBAH KERANJANG
    // =========================

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        $cart[$product->id] = [
            'product_id' => $product->id,
            'nama_produk' => $product->nama_produk,
            'harga' => $product->harga,
            'gambar' => $product->gambar,
            'jumlah' => ($cart[$product->id]['jumlah'] ?? 0) + 1,
        ];

        session()->put('cart', $cart);

        return back()->with(
            'success',
            'Produk berhasil ditambahkan ke keranjang'
        );
    }

    // =========================
    // KERANJANG
    // =========================

    public function cart()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function($item) {
            return $item['harga'] * $item['jumlah'];
        });

        $message = $this->buildWhatsappMessage($cart, $total);

        return view(
            'products.cart',
            compact('cart', 'total', 'message')
        );
    }

    // =========================
    // UBAH JUMLAH KERANJANG
    // =========================

    public function updateCart(Request $request, $id)
    {
        $data = $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if(!isset($cart[$id]))
        {
            return redirect('/cart')
                ->with('error', 'Produk tidak ditemukan di keranjang');
        }

        $cart[$id]['jumlah'] = $data['jumlah'];

        session()->put('cart', $cart);

        return redirect('/cart')
            ->with('success', 'Jumlah produk berhasil diubah');
    }

    // =========================
    // HAPUS KERANJANG
    // =========================

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return redirect('/cart')
            ->with('success', 'Produk berhasil dihapus dari keranjang');
    }

    private function buildWhatsappMessage(array $cart, int $total): string
    {
        $lines = [
            'Halo Admin GreenStore',
            '',
            'Saya ingin memesan:',
            '',
        ];

        foreach($cart as $item)
        {
            $lines[] = '- ' . $item['nama_produk'] . ' x' . $item['jumlah'];
        }

        $lines[] = '';
        $lines[] = 'Total:';
        $lines[] = 'Rp ' . number_format($total, 0, ',', '.');

        return implode("\n", $lines);
    }

    // =========================
    // FORM TAMBAH PRODUK
    // =========================

    public function create()
    {
        if($response = $this->authorizeProductAdmin())
        {
            return $response;
        }

        return view('products.create');
    }

    // =========================
    // SIMPAN PRODUK
    // =========================

    public function store(Request $request)
    {
        if($response = $this->authorizeProductAdmin())
        {
            return $response;
        }

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
        if($response = $this->authorizeProductAdmin())
        {
            return $response;
        }

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
        if($response = $this->authorizeProductAdmin())
        {
            return $response;
        }

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
    // TAMBAH STOK CEPAT
    // =========================

    public function addStock(Request $request, $id)
    {
        if($response = $this->authorizeProductAdmin())
        {
            return $response;
        }

        $data = $request->validate([
            'jumlah_stok' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);

        $product->increment('stok', $data['jumlah_stok']);

        return redirect('/admin/products')
            ->with(
                'success',
                'Stok produk berhasil ditambahkan'
            );
    }

    // =========================
    // HAPUS PRODUK
    // =========================

    public function destroy($id)
    {
        if($response = $this->authorizeProductAdmin())
        {
            return $response;
        }

        $product = Product::findOrFail($id);

        $product->delete();

        return redirect('/admin/products')
            ->with(
                'success',
                'Produk berhasil dihapus'
            );
    }

    private function authorizeProductAdmin()
    {
        if(!Auth::check())
        {
            return redirect('/login')
                ->with(
                    'error',
                    'Silakan login sebagai admin market terlebih dahulu'
                );
        }

        if(
            Auth::user()->role != 'admin_market' &&
            Auth::user()->role != 'admin_pusat'
        )
        {
            abort(403);
        }

        return null;
    }
}
