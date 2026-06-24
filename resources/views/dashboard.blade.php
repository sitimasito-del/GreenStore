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
            transition:0.3s;
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
            overflow:hidden;
            transition:0.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }

        .mountain-img{
            width:100%;
            height:250px;
            object-fit:cover;
        }

        .product-img{
            width:100%;
            height:210px;
            object-fit:cover;
            background:#eef5fb;
        }

        .search-box{
            max-width:400px;
            margin-bottom:40px;
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

                GreenStore

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

        <h2 class="fw-bold mb-4">

            Pilihan Gunung

        </h2>

        <!-- SEARCH -->

        <div class="search-box">

            <input type="text"
                   id="searchGunung"
                   class="form-control form-control-lg"
                   placeholder="Cari gunung...">

        </div>

        <div class="row"
             id="gunungContainer">

            @foreach($mountains as $mountain)

            <div class="col-md-6 mb-4 gunung-item">

                <div class="card shadow h-100">

                    <!-- GAMBAR -->

                    <img src="data:image/jpeg;base64,{{ $mountain->image }}"
                         class="mountain-img">

                    <div class="card-body p-4">

                        <h3 class="fw-bold mountain-name">

                            {{ $mountain->name }}

                        </h3>

                        <p>

                            {{ $mountain->description }}

                        </p>

                        <div class="mt-3">

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

                </div>

            </div>

            @endforeach

        </div>

    </section>

    <!-- MARKET -->

    <section class="section"
             id="market">

        <div class="d-flex justify-content-between align-items-center mb-5">

            <h2 class="fw-bold mb-0">

                Market

            </h2>

            <a href="/products"
               class="btn btn-success">

                Semua Produk

            </a>

        </div>

        <div class="row">

            @forelse($products as $product)

                <div class="col-md-4 mb-4">

                    <div class="card shadow h-100">

                        <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : asset('images/product-placeholder.svg') }}"
                             class="product-img"
                             alt="{{ $product->nama_produk }}">

                        <div class="card-body p-4">

                            <h4 class="fw-bold">

                                {{ $product->nama_produk }}

                            </h4>

                            <p class="text-muted mb-2">

                                {{ $product->kategori }}

                            </p>

                            <p class="fw-bold mb-2">

                                Rp {{ number_format($product->harga) }}

                            </p>

                            <p class="mb-3">

                                Stok: {{ $product->stok }}

                            </p>

                            <a href="/product/{{ $product->id }}"
                               class="btn btn-primary">

                                Detail Produk

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">

                    <div class="alert alert-info">

                        Belum ada produk.

                    </div>

                </div>

            @endforelse

        </div>

    </section>

    <!-- Yuuk Membaca -->

    <section class="section"
             id="artikel">

        <h2 class="fw-bold mb-5">

             Yuuk MemBaca

        </h2>

        <div class="row">

    @forelse($popularArticles as $article)

        <div class="col-md-4 mb-4">

            <div class="card shadow p-4 h-100">

                <h4>

                    {{ $article->title }}

                </h4>

                <p class="text-muted">

                    {{ $article->category }}

                </p>

                <p>

                    👁 {{ $article->views }} Views

                </p>

                <a href="/artikel/baca/{{ $article->id }}"
                   target="_blank"
                   class="btn btn-success">

                    Baca Artikel

                </a>

            </div>

        </div>

    @empty

        <div class="col-12">

            <div class="alert alert-info">

                Belum ada artikel.

            </div>

        </div>

    @endforelse

</div>

    </section>

</div>

<!-- SEARCH -->

<script>

    const searchInput = document.getElementById('searchGunung');

    searchInput.addEventListener('keyup', function(){

        let keyword = this.value.toLowerCase();

        let items = document.querySelectorAll('.gunung-item');

        items.forEach(item => {

            let name = item.querySelector('.mountain-name')
                           .innerText
                           .toLowerCase();

            if(name.includes(keyword))
            {
                item.style.display = 'block';
            }
            else
            {
                item.style.display = 'none';
            }

        });

    });

</script>

</body>
</html>
