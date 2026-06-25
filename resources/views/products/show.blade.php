<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>{{ $product->nama_produk }} - GreenStore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eef5fb;
            font-family:Arial;
        }

        .detail-box{
            background:white;
            border-radius:18px;
            padding:30px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        }

        .product-img{
            width:100%;
            max-height:520px;
            object-fit:cover;
            border-radius:16px;
            background:#eef5fb;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="d-flex gap-2 mb-4">

        <a href="/products"
           class="btn btn-secondary">

            Kembali ke Semua Produk

        </a>

        <a href="/cart"
           class="btn btn-success">

            Keranjang

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="detail-box">

        <div class="row align-items-center">

            <div class="col-md-6 mb-4 mb-md-0">

                <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : asset('images/product-placeholder.svg') }}"
                     class="product-img"
                     alt="{{ $product->nama_produk }}">

            </div>

            <div class="col-md-6">

                <p class="text-muted mb-2">

                    {{ $product->kategori }}

                </p>

                <h1 class="fw-bold mb-3">

                    {{ $product->nama_produk }}

                </h1>

                <h3 class="fw-bold text-success mb-3">

                    Rp {{ number_format($product->harga) }}

                </h3>

                <p class="mb-3">

                    Stok: <strong>{{ $product->stok }}</strong>

                </p>

                <p class="mb-4">

                    {{ $product->deskripsi ?? 'Belum ada deskripsi produk.' }}

                </p>

                <form action="/cart/add/{{ $product->id }}"
                      method="POST">

                    @csrf

                    <button type="submit"
                            class="btn btn-success btn-lg"
                            @if($product->stok < 1) disabled @endif>

                        Tambah Keranjang

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>
