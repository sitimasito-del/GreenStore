@extends('layouts.app')

@section('content')

<h2>Tambah Produk</h2>

<form action="{{ route('products.store') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div>
        <label>Nama Produk</label>
        <input type="text" name="nama_produk">
    </div>

    <br>

    <div>
        <label>Harga</label>
        <input type="number" name="harga">
    </div>

    <br>

    <div>
        <label>Stock</label>
        <input type="number" name="stok">
    </div>

    <br>

    <div>
        <label>Deskripsi</label>
        <textarea name="deskripsi"></textarea>
    </div>

    <br>

    <div>
        <label>Gambar</label>
        <input type="file" name="gambar">
    </div>

    <br>

    <button type="submit">
        Simpan
    </button>

</form>

@endsection