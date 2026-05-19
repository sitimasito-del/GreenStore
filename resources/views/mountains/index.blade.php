<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Pilih Gunung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

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

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold"
           href="/user/dashboard">

            GreenStore

        </a>

    </div>

</nav>

<div class="container mt-5">

    <h1 class="fw-bold mb-3">

        Pilih Gunung

    </h1>

    <p class="mb-5">

        Silakan pilih gunung untuk membuat laporan.

    </p>

    <div class="row">

        @foreach($mountains as $mountain)

            <div class="col-md-4 mb-4">

                <div class="card card-gunung h-100">

                    <img src="{{ asset($mountain->image) }}"
                         class="card-img-top gambar-gunung">

                    <div class="card-body text-center">

                        <h4 class="fw-bold">

                            {{ $mountain->name }}

                        </h4>

                        <p>

                            {{ $mountain->description }}

                        </p>

                        <a href="#"
                           class="btn btn-primary">

                            Buat Laporan

                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

</body>
</html>