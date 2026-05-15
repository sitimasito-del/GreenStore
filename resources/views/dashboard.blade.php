@extends('layouts.app')

@section('content')

<div class="card">

    <h1>Dashboard GreenStore</h1>

    @auth

        <h3>
            Selamat datang,
            {{ auth()->user()->name }}
        </h3>

    @else

        <h3>
            Selamat datang di GreenStore
        </h3>

    @endauth

</div>

<div class="grid">

    <div class="card">

        <h2>Gunung</h2>

        <a href="/mountains" class="btn">
            Lihat Data
        </a>

    </div>

    <div class="card">

        <h2>Laporan</h2>

        <a href="/laporans" class="btn">
            Lihat Laporan
        </a>

    </div>

    <div class="card">

        <h2>Edukasi</h2>

        <a href="/articles" class="btn">
            Buka Edukasi
        </a>

    </div>

    <div class="card">

        <h2>Marketplace</h2>

        <a href="/products" class="btn">
            Buka Marketplace
        </a>

    </div>

</div>

<br>

@auth

<form action="/logout" method="POST">

    @csrf

    <button class="btn">
        Logout
    </button>

</form>

@endauth

@endsection