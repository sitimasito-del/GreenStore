```blade
<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Buat Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <a href="/mountain/{{ $mountain->id }}"
       class="btn btn-dark mb-4">

        ← Kembali

    </a>

    <div class="card shadow border-0 rounded-4 p-4">

        <h2 class="fw-bold mb-4">
            Buat Laporan - {{ $mountain->name }}
        </h2>

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

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

                <select name="jenis_laporan"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Jenis Laporan --
                    </option>

                    <option value="Sampah">
                        Sampah
                    </option>

                    <option value="Kerusakan Jalur">
                        Kerusakan Jalur
                    </option>

                    <option value="Fasilitas">
                        Fasilitas
                    </option>

                    <option value="Keamanan">
                        Keamanan
                    </option>

                    <option value="Lainnya">
                        Lainnya
                    </option>

                </select>

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

                    Foto Bukti (Opsional)

                </label>

                <input type="file"
                       name="gambar"
                       class="form-control"
                       accept="image/*">

                <small class="text-muted">
                    Format: JPG, JPEG, PNG (maksimal 2MB)
                </small>

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
```
