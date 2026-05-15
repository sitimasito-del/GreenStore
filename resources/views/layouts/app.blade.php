<!DOCTYPE html>
<html>
<head>

    <title>GreenStore</title>

    <style>

        body{
            margin:0;
            font-family:Arial;
            background:#E3F2FD;
            color:#0D1B2A;
        }

        .navbar{
            background:#1565C0;
            padding:20px;
            display:flex;
            gap:25px;
            align-items:center;
        }

        .navbar a{
            color:white;
            text-decoration:none;
            font-weight:bold;
            font-size:20px;
        }

        .navbar a:hover{
            color:#BBDEFB;
        }

        .container{
            width:90%;
            margin:auto;
            margin-top:30px;
        }

        .hero{
            background:#90CAF9;
            padding:120px;
            text-align:center;
            border-radius:25px;
            margin-bottom:30px;
        }

        .hero h1{
            font-size:60px;
            margin-bottom:10px;
        }

        .hero h2{
            font-size:40px;
        }

        .hero p{
            font-size:22px;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:20px;
            margin-bottom:25px;
            box-shadow:0 4px 10px rgba(0,0,0,0.1);
        }

        .btn{
            background:#1E88E5;
            color:white;
            padding:12px 22px;
            border:none;
            border-radius:12px;
            text-decoration:none;
            cursor:pointer;
            font-size:16px;
            font-weight:bold;
        }

        .btn:hover{
            background:#0D47A1;
        }

        input, textarea, select{
            width:100%;
            padding:12px;
            border-radius:10px;
            border:1px solid #90CAF9;
            margin-bottom:15px;
        }

        img{
            border-radius:15px;
            margin-bottom:15px;
            width:100%;
            max-width:350px;
        }

        .grid{
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(300px,1fr));
            gap:20px;
        }

    </style>

</head>

<body>

<div class="navbar">

    <a href="/">GreenStore</a>

    <a href="/mountains">Gunung</a>

    <a href="/laporans">Laporan</a>

    <a href="/articles">Edukasi</a>

    <a href="/products">Marketplace</a>

    <a href="/dashboard">Dashboard</a>

</div>

<div class="container">

    @yield('content')

</div>

</body>
</html>