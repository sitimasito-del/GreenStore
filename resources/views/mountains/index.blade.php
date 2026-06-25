<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pilih Gunung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background-color:#eaf2fb;
        }

        .card-gunung{
            border-radius:15px;
            overflow:hidden;
            transition:0.3s;
        }

        .card-gunung:hover{
            transform:translateY(-5px);
            box-shadow:0 5px 20px rgba(0,0,0,0.2);
        }

        .gambar-gunung{
    height:140px;
    object-fit:cover;
}

    </style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold"
           href="/user/dashboard">

            EcoHike

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

        {{-- GUNUNG 1 --}}
        <div class="col-md-4 mb-4">

            <div class="card card-gunung h-100">

<<<<<<< HEAD
                <div class="card card-gunung h-100 shadow">

                    <img src="{{ asset('storage/' . $mountain->image) }}"
                         class="card-img-top gambar-gunung">
=======
                <img src="https://i.ibb.co.com/d4F80GXY/gunung-arjuno-di-malang.jpg"
                     class="card-img-top gambar-gunung"
                     alt="Arjuno">

                <div class="card-body text-center">
>>>>>>> 2649c0eb5aba5c612d50adbe56020bd9fab984a6

                    <h4 class="fw-bold">
                        Gunung Arjuno
                    </h4>

                    <p>
                        Tinggi: 3.339 mdpl
                    </p>

                    <a href="/laporan/create/1"
                       class="btn btn-primary">

                        Lapor

<<<<<<< HEAD
                        <p>

                            {{ $mountain->description }}

                        </p>

                        <a href="/laporan/create/{{ $mountain->id }}"
                           class="btn btn-primary">

                            Buat Laporan

                        </a>

                    </div>
=======
                    </a>
>>>>>>> 2649c0eb5aba5c612d50adbe56020bd9fab984a6

                </div>

            </div>

        </div>

        {{-- GUNUNG 2 --}}
        <div class="col-md-4 mb-4">

            <div class="card card-gunung h-100">

                <img src="https://i.ibb.co.com/RT7Yb1Tb/Gunung-Lawu.jpg"
                     class="card-img-top gambar-gunung"
                     alt="Lawu">

                <div class="card-body text-center">

                    <h4 class="fw-bold">
                        Gunung Lawu
                    </h4>

                    <p>
                        Tinggi: 3.265 mdpl
                    </p>

                    <a href="/laporan/create/2"
                       class="btn btn-primary">

                        Lapor

                    </a>

                </div>

            </div>

        </div>

        {{-- GUNUNG 3 --}}
        <div class="col-md-4 mb-4">

            <div class="card card-gunung h-100">

                <img src="https://i.ibb.co.com/qYLqnbCF/semeru21.jpg"
                     class="card-img-top gambar-gunung"
                     alt="Semeru">

                <div class="card-body text-center">

                    <h4 class="fw-bold">
                        Gunung Semeru
                    </h4>

                    <p>
                        Tinggi: 3.676 mdpl
                    </p>

                   <a href="/laporan/create/3"
                       class="btn btn-primary">

                        Lapor

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>