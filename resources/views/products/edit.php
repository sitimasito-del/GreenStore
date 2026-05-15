@extends('layouts.app')

@section('content')

<div class="card">

<h1>Edit Produk</h1>

<form action="/products/{{ $product->id }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <input type="text"
           name="nama_produk"
           value="{{ $product->nama_produk }}">

    <br><br>

    <input type="number"
           name="harga"
           value="{{ $product->harga }}">

    <br><br>

    <textarea name="deskripsi">{{ $product->deskripsi }}</textarea>

    <br><br>

    <input type="number"
           name="stok"
           value="{{ $product->stok }}">

    <br><br>

    <input type="file"
           name="gambar">

    <br><br>

    <button class="btn">
        Update Produk
    </button>

</form>

</div>

@endsection