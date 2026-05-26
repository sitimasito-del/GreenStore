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

    <!-- HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="fw-bold">

                Admin Gunung

            </h1>

            <h4>

                {{ $mountain->name }}

            </h4>

        </div>

        <a href="/logout"
           class="btn btn-danger">

            Logout

        </a>

    </div>

    <!-- ALERT -->

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <!-- LAPORAN -->

    @foreach($laporans as $laporan)

        <div class="card shadow border-0 rounded-4 p-4 mb-4">

            <div class="row align-items-center">

                <!-- KIRI -->

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

                    <!-- FORM UPDATE STATUS -->

                    <form action="/admin/laporan/update-status/{{ $laporan->id }}"
                          method="POST"
                          class="mt-3">

                        @csrf

                        <div class="row">

                            <div class="col-md-6">

                                <select name="status"
                                        class="form-select">

                                    <option value="Pending">

                                        Pending

                                    </option>

                                    <option value="Proses">

                                        Proses

                                    </option>

                                    <option value="Selesai">

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

                <!-- KANAN -->

                <div class="col-md-4 text-end">

                    @if($laporan->gambar)

                        <img src="{{ asset('storage/' . $laporan->gambar) }}"
                             width="250"
                             class="rounded shadow">

                    @endif

                </div>

            </div>

        </div>

    @endforeach

</div>

</body>
</html>