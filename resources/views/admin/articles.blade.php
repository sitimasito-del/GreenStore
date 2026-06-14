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

    <div class="d-flex justify-content-between align-items-center">

    <h1 class="fw-bold">
        Admin Artikel
    </h1>

    <a href="/admin/articles/create"
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

        <table class="table">

            <thead>

                <tr>

                    <th>Judul</th>

                    <th>Kategori</th>

                    <th>Views</th>

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

                    </tr>

                @empty

                    <tr>

                        <td colspan="3"
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