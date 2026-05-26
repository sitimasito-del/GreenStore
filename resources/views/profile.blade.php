<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Profil User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <a href="/dashboard"
       class="btn btn-dark mb-4">

        ← Dashboard

    </a>

    <div class="card shadow border-0 rounded-4 p-5">

        <div class="text-center">

            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png"
                 width="120"
                 class="mb-4">

            <h1 class="fw-bold">

                {{ auth()->user()->name }}

            </h1>

            <p class="text-muted">

                {{ auth()->user()->email }}

            </p>

        </div>

        <hr class="my-4">

        <div class="d-grid gap-3">

            <a href="/riwayat"
               class="btn btn-primary">

                Riwayat Laporan

            </a>

            <a href="/dashboard#gunung"
               class="btn btn-success">

                Buat Laporan

            </a>

            <a href="/logout"
               class="btn btn-danger">

                Logout

            </a>

        </div>

    </div>

</div>

</body>
</html>