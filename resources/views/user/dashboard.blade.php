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
            background:
                radial-gradient(circle at 14% 8%, rgba(255,255,255,0.92), transparent 16rem),
                radial-gradient(circle at 78% 2%, rgba(174,219,250,0.55), transparent 26rem),
                linear-gradient(180deg, #f7fcff 0%, #e8f6ff 48%, #edf8ff 100%);
            color:#24384a;
        }

        .card-custom{
            border:none;
            border-radius:25px;
            background:rgba(255,255,255,0.88);
            box-shadow:0 14px 34px rgba(73,145,193,0.12);
            backdrop-filter:blur(10px);
        }

        .mountain-img{
            height:220px;
            object-fit:cover;
            border-radius:20px 20px 0 0;
        }

        .navbar{
            background:#66afe4 !important;
            box-shadow:0 10px 26px rgba(73,145,193,0.16);
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
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
