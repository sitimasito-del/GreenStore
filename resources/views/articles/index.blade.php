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
    <style>
        body{
            background:#eef5fb;
            font-family:Arial, sans-serif;
        }

        .card{
            border:none;
            border-radius:18px;
            overflow:hidden;
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-3px);
            box-shadow:0 15px 35px rgba(0,0,0,0.08);
        }

        .article-img{
            width:100%;
            height:230px;
            object-fit:cover;
            background:#eef5fb;
        }

        .search-box{
            max-width:520px;
            margin-bottom:30px;
        }
    </style>
</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-start mb-4 flex-column flex-md-row gap-3">

        <div>

            <h1 class="fw-bold mb-1">

                Artikel Edukasi

            </h1>

            <p class="text-muted mb-0">

                Temukan tips, berita, dan edukasi outdoor terbaru.

            </p>

        </div>

        <form method="GET"
              action="/artikel"
              class="search-box w-100">

            <div class="input-group">

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Cari artikel..."
                       value="{{ request('search') }}">

                <button class="btn btn-success">

                    Cari

                </button>

            </div>

        </form>

    </div>

    <div class="row mb-4">

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

                <div class="card shadow h-100">

                    @if($article->image)
                        <img src="{{ $article->image_url }}"
                             class="article-img"
                             alt="{{ $article->title }}">
                    @endif

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">

                            {{ $article->title }}

                        </h5>

                        <p class="text-muted mb-2">

                            {{ $article->category }}

                        </p>

                        <p class="fw-bold mb-3">

                            👁 {{ $article->views }} Views

                        </p>

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