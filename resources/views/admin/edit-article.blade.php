<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Artikel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <div class="card shadow border-0 rounded-4 p-4">

        <h2 class="fw-bold mb-4">

            Edit Artikel

        </h2>

        <form action="/admin/articles-update/{{ $article->id }}"
              method="POST"
              enctype="multipart/form-data">

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

                    Gambar Artikel

                </label>

                @if($article->image)
                    <img src="{{ $article->image_url }}"
                         class="img-fluid mb-3"
                         style="max-height:200px; object-fit:cover; width:100%;"
                         alt="{{ $article->title }}">
                @endif

                <input type="file"
                       name="image"
                       class="form-control"
                       accept="image/jpeg,image/png,image/webp">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti gambar.
                </small>

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