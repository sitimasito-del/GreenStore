<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Artikel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <div class="card shadow border-0 rounded-4 p-4">

        <h2 class="fw-bold mb-4">

            Edit Artikel

        </h2>

        <form action="/admin/articles-update/{{ $article->id }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Judul

                </label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ $article->title }}"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Kategori

                </label>

                <input type="text"
                       name="category"
                       class="form-control"
                       value="{{ $article->category }}"
                       required>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Link Artikel

                </label>

                <input type="text"
                       name="link"
                       class="form-control"
                       value="{{ $article->link }}"
                       required>

            </div>

            <button class="btn btn-primary">

                Simpan Perubahan

            </button>

            <a href="/admin/articles"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>

</body>
</html>