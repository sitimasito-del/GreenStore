<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Laporan Gunung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
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

            <a href="/admin/mountains"
               class="btn btn-primary">
                Data Gunung
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

    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif

    <div class="row mb-4">

        <div class="col-md-4 mb-3">

            <div class="card shadow border-0 rounded-4 p-4">

                <p class="text-muted mb-1">Pending</p>
                <h2 class="fw-bold mb-0">{{ $rekap['pending'] }}</h2>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card shadow border-0 rounded-4 p-4">

                <p class="text-muted mb-1">Terima</p>
                <h2 class="fw-bold mb-0">{{ $rekap['terima'] }}</h2>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card shadow border-0 rounded-4 p-4">

                <p class="text-muted mb-1">Selesai</p>
                <h2 class="fw-bold mb-0">{{ $rekap['selesai'] }}</h2>

            </div>

        </div>

    </div>

    @forelse($laporans as $laporan)

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
                        <b>Gunung:</b>
                        {{ $laporan->mountain->name ?? $mountain->name }}
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

                    <div class="mt-3">

                        <p class="fw-bold mb-2">
                            Aksi Status
                        </p>

                        <form action="/admin/laporan/update-status/{{ $laporan->id }}"
                              method="POST">

                        @csrf

                            <div class="d-flex gap-2 flex-wrap">

                                <button type="submit"
                                        name="status"
                                        value="Pending"
                                        class="btn btn-warning text-dark">

                                    Pending

                                </button>

                                <button type="submit"
                                        name="status"
                                        value="Terima"
                                        class="btn btn-primary">

                                    Terima

                                </button>

                                <button type="submit"
                                        name="status"
                                        value="Selesai"
                                        class="btn btn-success">

                                    Selesai

                                </button>

                            </div>

                        </form>

                    </div>

                    <form action="/admin/laporan/delete/{{ $laporan->id }}"
                          method="POST"
                          class="mt-3"
                          onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger">

                            Hapus Laporan

                        </button>

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

    @empty

        <div class="card shadow border-0 rounded-4 p-5 text-center">

            <h3 class="fw-bold">
                Belum ada laporan untuk {{ $mountain->name }}
            </h3>

            <p class="text-muted mb-0">
                Laporan user akan muncul di sini jika user membuat laporan pada gunung ini.
            </p>

        </div>

    @endforelse

</div>

</body>
</html>
