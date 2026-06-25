<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>GreenStore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eaf2fb;
        }

        .card-custom{
            border:none;
            border-radius:25px;
        }

        .mountain-img{
            height:220px;
            object-fit:cover;
            border-radius:20px 20px 0 0;
        }

    </style>

</head>

<body>

<nav class="navbar navbar-dark bg-primary px-5">

    <a class="navbar-brand fw-bold">

        GreenStore

    </a>

    <a href="/logout"
       class="btn btn-light">

        Logout

    </a>

</nav>

<div class="container py-5">

    <h1 class="fw-bold mb-5">

        Selamat Datang,
        {{ auth()->user()->name }}

    </h1>

    <div class="row">

        @foreach($mountains as $mountain)

        <div class="col-md-6 mb-4">

            <div class="card shadow card-custom">

                <img src="{{ $mountain->image_url }}"
                     class="mountain-img">

                <div class="card-body p-4">

                    <h2 class="fw-bold">

                        {{ $mountain->name }}

                    </h2>

                    <p class="text-muted">

                        {{ $mountain->description }}

                    </p>

                    <a href="/laporan/create/{{ $mountain->id }}"
                       class="btn btn-primary w-100">

                        Buat Laporan

                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

    <div class="card shadow mt-5 p-4 card-custom">

        <h2 class="fw-bold mb-3">

            Riwayat Laporan

        </h2>

        <p>

            Lihat status laporan Anda.

        </p>

        <a href="/riwayat"
           class="btn btn-success">

            Lihat Riwayat

        </a>

    </div>

</div>

</body>
</html>
