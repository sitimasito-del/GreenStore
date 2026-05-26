<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>

        {{ $mountain->name }}

    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eef5fb;
        }

        .hero-img{
            width:100%;
            height:500px;
            object-fit:cover;
            border-radius:25px;
        }

        .card{
            border:none;
            border-radius:25px;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <a href="/dashboard"
       class="btn btn-dark mb-4">

        ← Kembali

    </a>

    <div class="card shadow p-4">

        <img src="{{ asset('storage/' . $mountain->image) }}"
             class="hero-img mb-4">

        <h1 class="fw-bold">

            {{ $mountain->name }}

        </h1>

        <p class="mt-3">

            {{ $mountain->description }}

        </p>

        <hr>

        <h4 class="fw-bold">

            Informasi Gunung

        </h4>

        <ul>

            <li>

                Status Gunung : Aman

            </li>

            <li>

                Admin Gunung :
                {{ $mountain->admin->name ?? '-' }}

            </li>

            <li>

                No WA Admin :
                {{ $mountain->admin->nomor_wa ?? '-' }}

            </li>

            <li>

                Email Admin :
                {{ $mountain->admin->email ?? '-' }}

            </li>

        </ul>

        <div class="mt-4">

            @if(Auth::check())

                <a href="/laporan/create/{{ $mountain->id }}"
                   class="btn btn-primary">

                    Buat Laporan

                </a>

            @else

                <a href="/login"
                   class="btn btn-primary">

                    Login Untuk Lapor

                </a>

            @endif

        </div>

    </div>

    <!-- ARTIKEL -->

    <div class="card shadow p-4 mt-5">

        <h2 class="fw-bold mb-4">

            Artikel Pendakian

        </h2>

        <div class="row">

            <div class="col-md-4">

                <div class="card shadow-sm p-3">

                    <h5>

                        Tips Mendaki Aman

                    </h5>

                    <p>

                        Persiapkan fisik dan logistik sebelum mendaki.

                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card shadow-sm p-3">

                    <h5>

                        Etika Pendaki

                    </h5>

                    <p>

                        Jangan meninggalkan sampah di gunung.

                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card shadow-sm p-3">

                    <h5>

                        Cek Cuaca

                    </h5>

                    <p>

                        Selalu cek cuaca sebelum pendakian.

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>