<h1>Data Laporan1 </h1>

<hr>

@foreach($laporans as $laporan)

    <h3>{{ $laporan->jenis_laporan }}</h3>

    <p>{{ $laporan->deskripsi }}</p>

    <p>Status: {{ $laporan->status }}</p>

    <p>Gunung: {{ $laporan->mountain->nama_gunung }}</p>

    <br>

    <img src="{{ asset('storage/' . $laporan->foto) }}"
         width="300">

    <hr>

@endforeach