<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background-color: #eaf2fb;
        }

        .menu-card{
            border-radius: 15px;
            transition: 0.3s;
        }

        .menu-card:hover{
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold"
           href="#">

            GreenStore

        </a>

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

    <h2 class="fw-bold mb-4">

        Selamat Datang,
        {{ auth()->user()->name }}

    </h2>

    <div class="row">

        <!-- MENU LAPOR -->
        <div class="col-md-4 mb-4">

            <div class="card p-4 menu-card">

                <h4>

                    Sistem Laporan

                </h4>

                <p>

                    Laporkan kondisi gunung,
                    sampah, jalur, atau kejadian.

                </p>

                <a href="/mountains"
                   class="btn btn-primary">

                    Buat Laporan

                </a>

            </div>

        </div>

        <!-- MENU RIWAYAT -->
        <div class="col-md-4 mb-4">

            <div class="card p-4 menu-card">

                <h4>

                    Riwayat Laporan

                </h4>

                <p>

                    Lihat status laporan Anda.

                </p>

                <a href="/riwayat-laporan"
                class="btn btn-success">

                    Lihat Riwayat

                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>