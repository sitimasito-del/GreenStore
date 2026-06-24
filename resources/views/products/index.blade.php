<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Market GreenStore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>

        body{
            background:#eef5fb;
            font-family:Arial;
        }

        .card-box{
            border:none;
            border-radius:20px;
            padding:25px;
            color:white;
        }

        .table-box{
            background:white;
            border-radius:20px;
            padding:25px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        }

        .product-img{
            width:120px;
            height:90px;
            object-fit:cover;
            border-radius:12px;
        }

        .stock-form{
            display:inline-flex;
            gap:6px;
            align-items:center;
            margin-right:6px;
        }

        .stock-input{
            width:72px;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="fw-bold">

                Admin Market GreenStore

            </h1>

            <p class="text-muted">

                Kelola produk marketplace GreenStore

            </p>

        </div>

        <div>

            <a href="/admin/products/create"
               class="btn btn-success">

                <i class="fa-solid fa-plus"></i>
                Tambah Produk

            </a>

            <a href="/logout"
               class="btn btn-danger">

                Logout

            </a>

        </div>

    </div>

    <div class="row mb-5">

        <div class="col-md-6">

            <div class="card-box bg-primary">

                <h5>Total Produk</h5>

                <h1 class="fw-bold">

                    {{ $products->count() }}

                </h1>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card-box bg-success">

                <h5>Total Stok</h5>

                <h1 class="fw-bold">

                    {{ $products->sum('stok') }}

                </h1>

            </div>

        </div>

    </div>

    <div class="table-box">

        <h2 class="fw-bold mb-4">

            Daftar Produk

        </h2>

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

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

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($products as $product)

                    <tr>

                        <td>

                            <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : asset('images/product-placeholder.svg') }}"
                                 class="product-img"
                                 alt="{{ $product->nama_produk }}">

                        </td>

                        <td>

                            <strong>

                                {{ $product->nama_produk }}

                            </strong>

                        </td>

                        <td>

                            {{ $product->kategori }}

                        </td>

                        <td>

                            Rp {{ number_format($product->harga) }}

                        </td>

                        <td>

                            <span class="badge bg-primary">

                                {{ $product->stok }}

                            </span>

                        </td>

                        <td>

                            <form action="/admin/products/add-stock/{{ $product->id }}"
                                  method="POST"
                                  class="stock-form">

                                @csrf

                                <input type="number"
                                       name="jumlah_stok"
                                       class="form-control form-control-sm stock-input"
                                       min="1"
                                       value="1"
                                       required>

                                <button type="submit"
                                        class="btn btn-success btn-sm">

                                    +Stock

                                </button>

                            </form>

                            <a href="/admin/products/edit/{{ $product->id }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="/admin/products/delete/{{ $product->id }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus produk ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="text-center">

                            Belum ada produk

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>
