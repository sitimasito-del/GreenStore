@extends('layouts.app')

@section('content')

<h1>User Dashboard</h1>

<br>

<div class="grid">

<div class="card">

    <h2>Buat Laporan</h2>

    <a href="/laporans"
       class="btn">

       Buka Laporan

    </a>

</div>

<div class="card">

    <h2>Marketplace</h2>

    <a href="/products"
       class="btn">

       Lihat Produk

    </a>

</div>

<div class="card">

    <h2>Edukasi</h2>

    <a href="/articles"
       class="btn">

       Baca Artikel

    </a>

</div>

</div>

@endsection