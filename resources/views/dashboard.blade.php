<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>GreenStore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>

        body{
            background:#eef5fb;
            font-family:Arial;
        }

        .sidebar{
            width:90px;
            height:100vh;
            background:white;
            position:fixed;
            left:0;
            top:0;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            padding-top:20px;
            z-index:999;
        }

        .sidebar a{
            width:60px;
            height:60px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:50%;
            margin:15px auto;
            background:#f3f3f3;
            color:#333;
            text-decoration:none;
            font-size:25px;
        }

        .sidebar a:hover{
            background:#2d8cff;
            color:white;
        }

        .main{
            margin-left:100px;
        }

        .hero{
            height:100vh;
            background:linear-gradient(
                rgba(255,255,255,0.6),
                rgba(255,255,255,0.6)
            ),
            url('https://images.unsplash.com/photo-1464822759023-fed622ff2c3b');

            background-size:cover;
            background-position:center;
            display:flex;
            align-items:center;
        }

        .hero-text{
            padding-left:80px;
        }

        .hero-text h1{
            font-size:90px;
            font-weight:bold;
            color:#2f3b52;
        }

        .hero-text h3{
            color:#1673ff;
            letter-spacing:3px;
        }

        .section{
            padding:80px 50px;
        }

        .card{
            border:none;
            border-radius:25px;
        }

        .mountain-img{
            height:250px;
            object-fit:cover;
            border-radius:25px 25px 0 0;
        }

    </style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

    <a href="/dashboard">

        <i class="fa-solid fa-house"></i>

    </a>

    <a href="#gunung">

        <i class="fa-solid fa-mountain"></i>

    </a>

    <a href="#market">

        <i class="fa-solid fa-store"></i>

    </a>

    <a href="#artikel">

        <i class="fa-solid fa-newspaper"></i>

    </a>

    @if(Auth::check())

        <a href="/profile">

            <i class="fa-solid fa-user"></i>

        </a>

    @else

        <a href="/login">

            <i class="fa-solid fa-user"></i>

        </a>

    @endif

</div>

<!-- MAIN -->

<div class="main">

    <!-- HERO -->

    <section class="hero">

        <div class="hero-text">

            <h1>

                GREENSTORE

            </h1>

            <h3>

                PLATFORM PENDAKIAN & MARKET OUTDOOR

            </h3>

            <div class="mt-4">

                <a href="#gunung"
                   class="btn btn-primary btn-lg">

                    Jelajahi Gunung

                </a>

            </div>

        </div>

    </section>

    <!-- GUNUNG -->

    <section class="section"
             id="gunung">

        <h2 class="fw-bold mb-5">

            Pilihan Gunung

        </h2>

        <div class="row">

            @foreach($mountains as $mountain)

            <div class="col-md-6 mb-4">

                <div class="card shadow">

                    <img src="{{ asset('storage/' . $mountain->image) }}"
                         class="mountain-img">

                    <div class="card-body p-4">

                        <h3 class="fw-bold">

                            {{ $mountain->name }}

                        </h3>

                        <p>

                            {{ $mountain->description }}

                        </p>

                        <div class="d-flex gap-2 mt-3">

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

                            <a href="/mountain/{{ $mountain->id }}"
                               class="btn btn-outline-dark">

                                Lihat Selengkapnya

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </section>

    <!-- MARKET -->

    <section class="section"
             id="market">

        <h2 class="fw-bold mb-5">

            Market Outdoor

        </h2>

        <div class="row">

            <div class="col-md-3 mb-4">

                <div class="card shadow p-4">

                    <h4>Tenda</h4>

                    <p>Peralatan camping terbaik.</p>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card shadow p-4">

                    <h4>Carrier</h4>

                    <p>Tas gunung berkualitas.</p>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card shadow p-4">

                    <h4>Sleeping Bag</h4>

                    <p>Nyaman untuk pendakian.</p>

                </div>

            </div>

            <div class="col-md-3 mb-4">

                <div class="card shadow p-4">

                    <h4>Kompor</h4>

                    <p>Peralatan outdoor modern.</p>

                </div>

            </div>

        </div>

    </section>

    <!-- ARTIKEL -->

    <section class="section"
             id="artikel">

        <h2 class="fw-bold mb-5">

            Artikel Pendakian

        </h2>

        <div class="row">

            <div class="col-md-4 mb-4">

                <div class="card shadow p-4">

                    <h4>

                        Tips Mendaki Aman

                    </h4>

                    <p>

                        Persiapkan fisik dan logistik sebelum mendaki.

                    </p>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card shadow p-4">

                    <h4>

                        Etika Pendaki

                    </h4>

                    <p>

                        Jangan meninggalkan sampah di gunung.

                    </p>

                </div>

            </div>

            <div class="col-md-4 mb-4">

                <div class="card shadow p-4">

                    <h4>

                        Cek Cuaca

                    </h4>

                    <p>

                        Selalu cek cuaca sebelum pendakian.

                    </p>

                </div>

            </div>

        </div>

    </section>

</div>

</body>
</html>