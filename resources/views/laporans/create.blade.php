<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Buat Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background-color: #eaf2fb;
        }

        .card-form{
            border-radius: 15px;
        }

    </style>

</head>
<body>

<div class="container mt-5">

    <div class="card shadow p-4 card-form">

        <h2 class="mb-4">

            Buat Laporan
            {{ $mountain->name }}

        </h2>

        {{-- ERROR VALIDASI --}}
        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ url('/laporan/store') }}"
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

                    Upload Gambar

                </label>

                <input type="file"
                       name="gambar"
                       class="form-control">

            </div>

            <button type="submit"
                    class="btn btn-primary">

                Kirim Laporan

            </button>

        </form>

    </div>

</div>

</body>
</html>