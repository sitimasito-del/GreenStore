<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <div class="card shadow border-0 rounded-4 p-4">

        <h2 class="fw-bold mb-4">

            Edit Produk

        </h2>

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="/admin/products/update/{{ $product->id }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Nama Produk

                </label>

                <input type="text"
                       name="nama_produk"
                       class="form-control"
                       value="{{ $product->nama_produk }}"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Kategori

                </label>

                <input type="text"
                       name="kategori"
                       class="form-control"
                       value="{{ $product->kategori }}">

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Harga

                </label>

                <input type="number"
                       name="harga"
                       class="form-control"
                       value="{{ $product->harga }}"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Stok

                </label>

                <input type="number"
                       name="stok"
                       class="form-control"
                       value="{{ $product->stok }}"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Deskripsi

                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="4">{{ $product->deskripsi }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Gambar Baru (Opsional)

                </label>

                <input type="file"
                       name="gambar"
                       class="form-control"
                       accept="image/jpeg,image/png,image/webp">

            </div>

            <div class="mb-4">

                <img src="{{ $product->gambar_url }}"
                     width="200"
                     class="rounded shadow"
                     alt="{{ $product->nama_produk }}">

            </div>

            <button class="btn btn-primary">

                Simpan Perubahan

            </button>

            <a href="/admin/products"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

</body>
</html>
