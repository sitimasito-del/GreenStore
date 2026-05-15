<h1>Marketplace GreenStore</h1>

<hr>

@foreach($products as $product)

    <h2>{{ $product->nama_produk }}</h2>

    <p>Rp {{ $product->harga }}</p>

    <hr>

@endforeach