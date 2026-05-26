<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Buat Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <a href="/mountain/{{ $mountain->id }}"
       class="btn btn-dark mb-4">

        ← Kembali

    </a>

    <div class="card shadow border-0 rounded-4 p-4">

        <h2 class="fw-bold mb-4">

            Buat Laporan -
            {{ $mountain->name }}

        </h2>

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="/laporan/store"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <input type="hidden"
                   name="mountain_id"
                   value="{{ $mountain->id }}">

            <div class="mb-3">

                <label class="form-label">

                    Jenis Laporan

                </label>

                <input type="text"
                       name="jenis_laporan"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Deskripsi

                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="5"
                          required></textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Foto (Opsional)

                </label>

                <input type="file"
                       name="gambar"
                       class="form-control">

            </div>

            <button class="btn btn-primary">

                Kirim Laporan

            </button>

        </form>

    </div>

</div>

</body>
</html>