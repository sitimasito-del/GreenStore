<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #eaf2fb; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/user/dashboard">GreenStore</a>
        <form action="/logout" method="POST" class="ms-auto">
            @csrf
            <button class="btn btn-light btn-sm">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-5" style="max-width: 600px;">

    <h4 class="fw-bold mb-4">Buat Laporan - {{ $mountain->nama }}</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/laporan/store" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="mountain_id" value="{{ $mountain->id }}">

        <div class="mb-3">
            <label class="form-label fw-semibold">Judul Laporan</label>
            <input type="text"
                   name="judul"
                   class="form-control"
                   placeholder="Contoh: Jalur Rusak"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Deskripsi</label>
            <textarea name="deskripsi"
                      class="form-control"
                      rows="5"
                      placeholder="Deskripsikan kondisi atau kejadian..."
                      required></textarea>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">Foto (Opsional)</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary">Kirim Laporan</button>
        </div>

    </form>

    <a href="/mountains">← Kembali</a>

</div>

</body>
</html>