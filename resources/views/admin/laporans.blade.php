<!DOCTYPE html>
<html lang="id">
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

    <div class="card shadow p-4">

        <table class="table table-bordered">

            <thead class="table-primary">

                <tr>

                    <th>No</th>

                    <th>Gunung</th>

                    <th>Jenis</th>

                    <th>Deskripsi</th>

                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @foreach($laporans as $laporan)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            {{ $laporan->mountain->name ?? '-' }}

                        </td>

                        <td>

                            {{ $laporan->jenis_laporan }}

                        </td>

                        <td>

                            {{ $laporan->deskripsi }}

                        </td>

                        <td>

                            {{ $laporan->status }}

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>