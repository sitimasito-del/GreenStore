<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eaf2fb;
        }

        .card-menu{
            border-radius:20px;
            transition:0.3s;
        }

        .card-menu:hover{
            transform:translateY(-5px);
            box-shadow:0 5px 20px rgba(0,0,0,0.2);
        }

    </style>

</head>

<body>

<nav class="navbar navbar-dark bg-primary">

    <div class="container">

        <span class="navbar-brand fw-bold">

            EcoHike

        </span>

        <form action="/logout"
              method="POST">

            @csrf

            <button class="btn btn-light">

                Logout

            </button>

        </form>

    </div>

</nav>

<div class="container mt-5">

    {{-- ADMIN PUSAT --}}
    @if(Auth::user()->role == 'admin_pusat')

        <h1 class="fw-bold mb-5">

            Selamat Datang, Admin Pusat

        </h1>

        <div class="row">

            {{-- RIWAYAT LAPORAN --}}
            <div class="col-md-6 mb-4">

                <div class="card shadow card-menu p-4 h-100">

                    <h2 class="fw-bold mb-3">

                        Riwayat Laporan

                    </h2>

                    <p>

                        Pantau seluruh laporan gunung.

                    </p>

                    <a href="/admin/dashboard"
                       class="btn btn-primary btn-lg">

                        Buka Dashboard

                    </a>

                </div>

            </div>

            {{-- KELOLA GUNUNG --}}
            <div class="col-md-6 mb-4">

                <div class="card shadow card-menu p-4 h-100">

                    <h2 class="fw-bold mb-3">

                        Kelola Gunung

                    </h2>

                    <p>

                        Tambahkan gunung baru dan admin gunung.

                    </p>

                    <a href="/admin/mountains"
                       class="btn btn-success btn-lg">

                        Kelola Gunung

                    </a>

                </div>

            </div>

        </div>

    {{-- USER BIASA --}}
    @else

        <h1 class="fw-bold mb-5">

            Selamat Datang,
            {{ Auth::user()->name }}

        </h1>

        <div class="row">

            {{-- BUAT LAPORAN --}}
            <div class="col-md-6 mb-4">

                <div class="card shadow card-menu p-4 h-100">

                    <h2 class="fw-bold mb-3">

<<<<<<< HEAD
                        Sistem Laporan
=======
                <a href="/riwayat-laporan"
                class="btn btn-success">
>>>>>>> 2649c0eb5aba5c612d50adbe56020bd9fab984a6

                    </h2>

                    <p>

                        Laporkan kondisi gunung, sampah, jalur, atau kejadian.

                    </p>

                    <a href="/mountains"
                       class="btn btn-primary btn-lg">

                        Buat Laporan

                    </a>

                </div>

            </div>

            {{-- RIWAYAT USER --}}
            <div class="col-md-6 mb-4">

                <div class="card shadow card-menu p-4 h-100">

                    <h2 class="fw-bold mb-3">

                        Riwayat Laporan

                    </h2>

                    <p>

                        Lihat status laporan Anda.

                    </p>

                    <a href="/riwayat-laporan"
                       class="btn btn-success btn-lg">

                        Lihat Riwayat

                    </a>

                </div>

            </div>

        </div>

    @endif

</div>

</body>
</html>