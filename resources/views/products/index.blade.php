@extends('layouts.app')

@section('content')

<h1>Marketplace GreenStore</h1>

<br>

<a href="/products/create"
   class="btn">

   Tambah Produk

</a>

<br><br>

<div class="grid">

@foreach($products as $product)

<div class="card">

    @if($product->gambar)

        <img src="{{ asset('storage/' . $product->gambar) }}"
             width="100%"
             style="height:200px; object-fit:cover; border-radius:10px;">

    @endif

    <br><br>

    <h2>{{ $product->nama_produk }}</h2>

    <h3>
        Rp {{ number_format($product->harga) }}
    </h3>

    <p>{{ $product->deskripsi }}</p>

    <p>
        Stok:
        {{ $product->stok }}
    </p>

    <br>

    <a href="/products/{{ $product->id }}/edit"
       class="btn">

       Edit

    </a>

    <br><br>

    <form action="/products/{{ $product->id }}"
          method="POST">

        @csrf
        @method('DELETE')

        <button class="btn-delete">

            Hapus

        </button>

    </form>

</div>

@endforeach

</div>

@endsection