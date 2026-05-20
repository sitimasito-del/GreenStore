<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Riwayat Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#eaf2fb;">

<div class="container mt-5">

    <h1 class="fw-bold mb-4">

        Riwayat Laporan

    </h1>

    @foreach($laporans as $laporan)

        <div class="card shadow mb-4">

            <div class="card-body">

                <h4 class="fw-bold">

                    {{ $laporan->jenis_laporan }}

                </h4>

                <p>

                    {{ $laporan->deskripsi }}

                </p>

                <p>

                    <b>Status:</b>

                    {{ $laporan->status }}

                </p>

                <p>

                    <b>Gunung:</b>

                    {{ $laporan->mountain->name ?? 'Gunung Tidak Ditemukan' }}

                </p>

                @if($laporan->gambar)

                    <img src="{{ asset('storage/' . $laporan->gambar) }}"
                         width="250"
                         class="rounded">

                @endif

            </div>

        </div>

    @endforeach

</div>

</body>
</html>