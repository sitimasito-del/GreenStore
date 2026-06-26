<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Artikel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <h1 class="fw-bold mb-4">
        Tambah Artikel
    </h1>

    <div class="card p-4 shadow border-0 rounded-4">

        <form action="/admin/articles-store"
              method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Judul Artikel
                </label>

                <input type="text"
                       name="title"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Kategori
                </label>

                <select name="category"
                        class="form-select">

                    <option value="Keselamatan">
                        Keselamatan
                    </option>

                    <option value="Lingkungan">
                        Lingkungan
                    </option>

                    <option value="Cuaca">
                        Cuaca
                    </option>

                    <option value="Peralatan">
                        Peralatan
                    </option>

                    <option value="Kesehatan">
                        Kesehatan
                    </option>

                </select>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Link Artikel
                </label>

                <input type="url"
                       name="link"
                       class="form-control"
                       required>

            </div>

            <button class="btn btn-success">

                Simpan Artikel

            </button>

        </form>

    </div>

</div>

</body>
</html>