@extends('layouts.app')

@section('content')

<div class="card">

    <h1>Tambah Produk</h1>

    <form action="/products"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <input type="text"
               name="nama_produk"
               placeholder="Nama Produk">

        <br><br>

        <input type="number"
               name="harga"
               placeholder="Harga">

        <br><br>

        <textarea name="deskripsi"
                  placeholder="Deskripsi Produk"></textarea>

        <br><br>

        <input type="number"
               name="stok"
               placeholder="Stok Produk">

        <br><br>

        <input type="text"
               name="nomor_wa"
               placeholder="Nomor WhatsApp">

        <br><br>

        <input type="file"
               name="gambar">

        <br><br>

        <button class="btn">
            Simpan Produk
        </button>

    </form>

</div>

@endsection