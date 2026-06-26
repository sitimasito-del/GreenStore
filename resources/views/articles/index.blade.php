<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Artikel Edukasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <h1 class="fw-bold mb-4">

        Artikel Edukasi

    </h1>

    <form method="GET"
          action="/artikel"
          class="row mb-4">

        <div class="col-md-5">

            <input type="text"
                   name="search"
                   class="form-control"
                   placeholder="Cari artikel..."
                   value="{{ request('search') }}">

        </div>

        <div class="col-md-4">

            <select name="category"
                    class="form-select">

                <option value="">
                    Semua Kategori
                </option>

                @foreach($categories as $category)

                    <option value="{{ $category }}"
                        {{ request('category') == $category ? 'selected' : '' }}>

                        {{ $category }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="col-md-3">

            <button class="btn btn-success w-100">

                Cari

            </button>

        </div>

    </form>

    <div class="row">

        @forelse($articles as $article)

            <div class="col-md-4 mb-4">

                <div class="card shadow border-0 rounded-4 h-100">

                    <div class="card-body">

                        <h5 class="fw-bold">

                            {{ $article->title }}

                        </h5>

                        <p class="text-muted">

                            {{ $article->category }}

                        </p>

                        <p>

                            👁 {{ $article->views }} Views

                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">

                        <a href="/artikel/baca/{{ $article->id }}"
                           class="btn btn-success w-100">

                            Baca Artikel

                        </a>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning">

                    Artikel tidak ditemukan

                </div>

            </div>

        @endforelse

    </div>

</div>

</body>
</html>