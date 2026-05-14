<h1>Data Gunung GreenStore</h1>

<a href="/mountains/create">
    Tambah Gunung
</a>

<hr>

@foreach($mountains as $mountain)

    <h2>{{ $mountain->nama_gunung }}</h2>

    <p>Lokasi: {{ $mountain->lokasi }}</p>

    <p>{{ $mountain->deskripsi }}</p>

    <hr>

@endforeach