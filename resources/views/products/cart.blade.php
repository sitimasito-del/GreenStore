<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Keranjang - GreenStore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eef5fb;
            font-family:Arial;
        }

        .cart-box{
            background:white;
            border-radius:18px;
            padding:28px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        }

        .product-img{
            width:90px;
            height:75px;
            object-fit:cover;
            border-radius:12px;
            background:#eef5fb;
        }

        .qty-input{
            width:90px;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="fw-bold mb-1">

                Keranjang

            </h1>

            <p class="text-muted mb-0">

                Atur produk sebelum checkout

            </p>

        </div>

        <a href="/products"
           class="btn btn-secondary">

            Lanjut Belanja

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="cart-box">

        @if(count($cart) > 0)

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($cart as $id => $item)

                            <tr>

                                <td>

                                    <div class="d-flex align-items-center gap-3">

                                        <img src="{{ ($item['gambar'] ?? null) ? asset('storage/' . $item['gambar']) : asset('images/product-placeholder.svg') }}"
                                             class="product-img"
                                             alt="{{ $item['nama_produk'] }}">

                                        <strong>

                                            {{ $item['nama_produk'] }}

                                        </strong>

                                    </div>

                                </td>

                                <td>

                                    Rp {{ number_format($item['harga'], 0, ',', '.') }}

                                </td>

                                <td>

                                    <form action="/cart/update/{{ $id }}"
                                          method="POST"
                                          class="d-flex gap-2">

                                        @csrf

                                        <input type="number"
                                               name="jumlah"
                                               class="form-control qty-input"
                                               min="1"
                                               value="{{ $item['jumlah'] }}"
                                               required>

                                        <button type="submit"
                                                class="btn btn-primary btn-sm">

                                            Ubah

                                        </button>

                                    </form>

                                </td>

                                <td>

                                    <strong>

                                        Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}

                                    </strong>

                                </td>

                                <td>

                                    <form action="/cart/remove/{{ $id }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus produk ini dari keranjang?')">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap gap-3">

                <h3 class="fw-bold mb-0">

                    Total: Rp {{ number_format($total, 0, ',', '.') }}

                </h3>

                <a href="https://wa.me/6281345469594?text={{ urlencode($message) }}"
                   target="_blank"
                   class="btn btn-success btn-lg">

                    Checkout WhatsApp

                </a>

            </div>

        @else

            <div class="alert alert-info mb-0">

                Keranjang masih kosong.

            </div>

        @endif

    </div>

</div>

</body>
</html>
