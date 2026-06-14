<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Artikel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

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

        <a href="/admin/articles-create"
           class="btn btn-success">

            + Tambah Artikel

        </a>

    </div>

    <div class="card shadow border-0 rounded-4 p-4 mb-4">

        <h4>

            Total Artikel :
            {{ $articles->count() }}

        </h4>

    </div>

    <div class="card shadow border-0 rounded-4 p-4">

        <table class="table table-bordered align-middle">

            <thead>

                <tr>

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