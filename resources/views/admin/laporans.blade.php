```blade
<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Laporan Gunung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="fw-bold">
                Admin Gunung
            </h1>

            <h4>
                {{ $mountain->name }}
            </h4>

        </div>

        <div class="d-flex gap-2">

            <a href="/admin/mountains/create"
               class="btn btn-primary">
                Tambah Gunung
            </a>

            <a href="/logout"
               class="btn btn-danger">
                Logout
            </a>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    @foreach($laporans as $laporan)

        <div class="card shadow border-0 rounded-4 p-4 mb-4">

            <div class="row align-items-center">

                <div class="col-md-8">

                    <h3 class="fw-bold">
                        {{ $laporan->jenis_laporan }}
                    </h3>

                    <p>
                        {{ $laporan->deskripsi }}
                    </p>

                    <p>
                        <b>User:</b>
                        {{ $laporan->user->name ?? '-' }}
                    </p>

                    <p>
                        <b>Tanggal Laporan:</b>
                        {{ $laporan->created_at->format('d-m-Y H:i') }}
                    </p>

                    <p>

                        <b>Status Saat Ini:</b>

                        @if($laporan->status == 'Pending')

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @elseif($laporan->status == 'Proses')

                            <span class="badge bg-primary">
                                Proses
                            </span>

                        @else

                            <span class="badge bg-success">
                                Selesai
                            </span>

                        @endif

                    </p>

                    <form action="/admin/laporan/update-status/{{ $laporan->id }}"
                          method="POST"
                          class="mt-3">

                        @csrf

                        <div class="row">

                            <div class="col-md-6">

                                <select name="status"
                                        class="form-select">

                                    <option value="Pending"
                                        {{ $laporan->status == 'Pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="Proses"
                                        {{ $laporan->status == 'Proses' ? 'selected' : '' }}>
                                        Proses
                                    </option>

                                    <option value="Selesai"
                                        {{ $laporan->status == 'Selesai' ? 'selected' : '' }}>
                                        Selesai
                                    </option>

                                </select>

                            </div>

                            <div class="col-md-4">

                                <button class="btn btn-primary">
                                    Update Status
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

                <div class="col-md-4 text-end">

                    @if($laporan->gambar)

                        <img src="{{ asset('storage/' . $laporan->gambar) }}"
                             alt="Foto Laporan"
                             width="250"
                             class="rounded shadow img-fluid">

                    @else

                        <div class="text-muted">
                            Tidak ada gambar
                        </div>

                    @endif

                </div>

            </div>

        </div>

    @endforeach

</div>

</body>
</html>
```
