<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Semua Produk GreenStore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eef5fb;
            font-family:Arial;
        }

        .product-img{
            width:100%;
            height:230px;
            object-fit:cover;
            background:#eef5fb;
        }

        .card{
            border:none;
            border-radius:18px;
            overflow:hidden;
        }

        .search-box{
            max-width:520px;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="fw-bold mb-1">

                Semua Produk

            </h1>

            <p class="text-muted mb-0">

                Perlengkapan outdoor GreenStore

            </p>

        </div>

        <div class="d-flex gap-2">

            <a href="/cart"
               class="btn btn-success">

                Keranjang

            </a>

            <a href="/dashboard#market"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

    <form action="/products"
          method="GET"
          class="search-box mb-4">

        <div class="input-group input-group-lg">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Cari Produk..."
                   value="{{ $search }}">

            <button type="submit"
                    class="btn btn-primary">

                Cari

            </button>

            @if($search)

                <a href="/products"
                   class="btn btn-outline-secondary">

                    Reset

                </a>

            @endif

        </div>

    </form>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="row">

        @forelse($products as $product)

            <div class="col-md-4 mb-4">

                <div class="card shadow h-100">

                    <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : asset('images/product-placeholder.svg') }}"
                         class="product-img"
                         alt="{{ $product->nama_produk }}">

                    <div class="card-body p-4">

                        <h4 class="fw-bold">

                            {{ $product->nama_produk }}

                        </h4>

                        <p class="text-muted mb-2">

                            {{ $product->kategori }}

                        </p>

                        <p class="fw-bold mb-2">

                            Rp {{ number_format($product->harga) }}

                        </p>

                        <p>

                            Stok: {{ $product->stok }}

                        </p>

                        <div class="d-flex gap-2 flex-wrap">

                            <a href="/product/{{ $product->id }}"
                               class="btn btn-primary">

                                Detail Produk

                            </a>

                            <form action="/cart/add/{{ $product->id }}"
                                  method="POST">

                                @csrf

                                <button type="submit"
                                        class="btn btn-success"
                                        @if($product->stok < 1) disabled @endif>

                                    Tambah

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info">

                    Tidak ada produk yang cocok.

                </div>

            </div>

        @endforelse

    </div>

</div>

</body>
</html>
