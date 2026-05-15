<h1>Marketplace GreenStore</h1>

<hr>

@foreach($products as $product)

    <h2>{{ $product->nama_produk }}</h2>

    <p>Rp {{ $product->harga }}</p>

    <hr>

@endforeach

@extends('layouts.app')

@section('content')

<div>

    <div>
        <h2>Marketplace Pendakian</h2>

        <a href="{{ route('products.create') }}">
            Tambah Produk
        </a>
    </div>

    <hr>

    @foreach($products as $product)

        <div>

            <h3>{{ $product->nama_produk }}</h3>

            <p>Harga: Rp {{ $product->harga }}</p>

            <p>{{ $product->deskripsi }}</p>

            <a href="{{ route('products.edit', $product->id) }}">
                Edit
            </a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>
            </form>

        </div>

        <hr>

    @endforeach

</div>

@endsection