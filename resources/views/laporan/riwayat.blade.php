<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Riwayat Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <a href="/profile"
       class="btn btn-dark mb-4">

        ← Kembali

    </a>

    <h1 class="fw-bold mb-5">

        Riwayat Laporan Saya

    </h1>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @forelse($laporans as $laporan)

        <div class="card shadow border-0 rounded-4 p-4 mb-4">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <h3 class="fw-bold">

                        {{ $laporan->jenis_laporan }}

                    </h3>

                    <p class="mb-2">

                        {{ $laporan->deskripsi }}

                    </p>

                    <p>

                        <b>Status:</b>

                        @if($laporan->status == 'Pending')

                            <span class="badge bg-warning text-dark">

                                Pending

                            </span>

                        @elseif($laporan->status == 'Terima' || $laporan->status == 'Proses')

                            <span class="badge bg-primary">

                                Terima

                            </span>

                        @else

                            <span class="badge bg-success">

                                Selesai

                            </span>

                        @endif

                    </p>

                </div>

                <div class="col-md-4 text-end">

                    @if($laporan->gambar)

                        <img src="{{ asset('storage/' . $laporan->gambar) }}"
                             width="220"
                             class="rounded shadow">

                    @endif

                </div>

            </div>

        </div>

    @empty

        <div class="card shadow border-0 rounded-4 p-5 text-center">

            <h3>

                Belum ada laporan

            </h3>

            <a href="/dashboard#gunung"
               class="btn btn-primary mt-3">

                Buat Laporan

            </a>

        </div>

    @endforelse

</div>

</body>
</html>
