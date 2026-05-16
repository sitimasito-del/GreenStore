<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Gunung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background-color: #eaf2fb;
        }

        .card-gunung{
            border-radius: 15px;
            overflow: hidden;
            transition: 0.3s;
        }

        .card-gunung:hover{
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        .gambar-gunung{
            height: 220px;
            object-fit: cover;
        }

    </style>

</head>
<body>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

            <a class="navbar-brand fw-bold" href="#">
                GreenStore
            </a>
        </div>
    </nav>

    <div class="container mt-5">

        <h1 class="fw-bold mb-3">
            Pilih Gunung
        </h1>

        <p class="mb-5">
            Silakan pilih salah satu gunung untuk membuat laporan.
        </p>

        <div class="row">

            <!-- Gunung Semeru -->

            <div class="col-md-3 mb-4">

                <div class="card card-gunung h-100">

                    <img src="{{ asset('images/semeru.jpg') }}"
                         class="card-img-top gambar-gunung">

                    <div class="card-body text-center">

                        <h4 class="fw-bold">
                            Gunung Semeru
                        </h4>

                        <p>
                            Laporkan kondisi, aktivitas,
                            atau kejadian di Gunung Semeru.
                        </p>

                        <a href="/laporan/create"
                           class="btn btn-outline-primary">

                            Buat Laporan

                        </a>

                    </div>

                </div>

            </div>

            <!-- Gunung Arjuno -->

            <div class="col-md-3 mb-4">

                <div class="card card-gunung h-100">

                    <img src="{{ asset('images/arjuno.jpg') }}"
                         class="card-img-top gambar-gunung">

                    <div class="card-body text-center">

                        <h4 class="fw-bold">
                            Gunung Arjuno
                        </h4>

                        <p>
                            Laporkan kondisi, aktivitas,
                            atau kejadian di Gunung Arjuno.
                        </p>

                        <a href="/laporan/create"
                           class="btn btn-outline-warning">

                            Buat Laporan

                        </a>

                    </div>

                </div>

            </div>

        </body>

</html>