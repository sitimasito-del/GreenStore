<h1>Pilih Gunung</h1>

<hr>

@foreach($mountains as $mountain)

    <div style="
        border:1px solid #ccc;
        padding:20px;
        margin-bottom:20px;
        width:300px;
    ">

        <img src="https://via.placeholder.com/300x200"
             width="300">

        <h2>{{ $mountain->nama_gunung }}</h2>

        <p>{{ $mountain->lokasi }}</p>

        <a href="/laporans/create/{{ $mountain->id }}">
            Buat Laporan
        </a>

    </div>

@endforeach