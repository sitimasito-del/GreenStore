<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Artikel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="fw-bold">

            Admin Artikel

        </h1>

        <div>
            <a href="/admin/articles-create"
               class="btn btn-success me-2">

                + Tambah Artikel

            </a>
            <a href="/logout"
               class="btn btn-danger">

                Logout

            </a>
        </div>

    </div>

    <div class="card shadow border-0 rounded-4 p-4 mb-4">

        <div class="row">

    <div class="col-md-3">

        <h5>Total Artikel</h5>

        <h2>{{ $totalArtikel }}</h2>

    </div>

    <div class="col-md-3">

        <h5>Total Klik</h5>

        <h2>{{ $totalKlik }}</h2>

    </div>

    <div class="col-md-3">

        <h5>Artikel Terpopuler</h5>

        <p>

            {{ $artikelTerpopuler->title ?? '-' }}

        </p>

    </div>

    <div class="col-md-3">

        <h5>Kategori Terpopuler</h5>

        <p>

            {{ $kategoriTerpopuler->category ?? '-' }}

        </p>

    </div>

</div>

    </div>

    <div class="card shadow border-0 rounded-4 p-4">

        <table class="table table-bordered align-middle">

            <thead>

                <tr>

                    <th>Gambar</th>

                    <th>Judul</th>

                    <th>Kategori</th>

                    <th>Views</th>

                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($articles as $article)

                    <tr>

                        <td>

                            @if($article->image)
                                <img src="{{ $article->image_url }}"
                                     style="max-width:120px; max-height:80px; object-fit:cover;"
                                     alt="{{ $article->title }}">
                            @else
                                -
                            @endif

                        </td>

                        <td>

                            {{ $article->title }}

                        </td>

                        <td>

                            {{ $article->category }}

                        </td>

                        <td>

                            {{ $article->views }}

                        </td>

                        <td>

                            <a href="/admin/articles-edit/{{ $article->id }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="/admin/articles-delete/{{ $article->id }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus artikel ini?')">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center">

                            Belum ada artikel

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>