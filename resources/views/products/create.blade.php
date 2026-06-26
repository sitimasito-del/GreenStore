<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Produk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <div class="card shadow border-0 rounded-4 p-4">

        <h2 class="fw-bold mb-4">

            Tambah Produk

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

        <form action="/admin/products/store"
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
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Kategori

                </label>

                <select name="kategori"
                        class="form-select">

                    <option value="Penyimpanan">Penyimpanan</option>
                    <option value="Alat Tidur">Alat Tidur</option>
                    <option value="Tempat Tinggal">Tempat Tinggal</option>
                    <option value="Pakaian">Pakaian</option>
                    <option value="Navigasi">Navigasi</option>
                    <option value="Keselamatan">Keselamatan</option>
                    <option value="Alat Masak">Alat Masak</option>
                    <option value="Logistik">Logistik</option>
                    <option value="Alat Bantu">Alat Bantu</option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Harga

                </label>

                <input type="number"
                       name="harga"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Stok

                </label>

                <input type="number"
                       name="stok"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Deskripsi

                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="4"></textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Gambar Produk

                </label>

                <input type="file"
                       name="gambar"
                       class="form-control"
                       accept="image/jpeg,image/png,image/webp"
                       required>

            </div>

            <button class="btn btn-success">

                Simpan Produk

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
