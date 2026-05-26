<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin Pusat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#eef5fb;">

<div class="container py-5">

    <!-- HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-5">

        <h1 class="fw-bold">

            Dashboard Admin Pusat

        </h1>

        <a href="/logout"
           class="btn btn-danger">

            Logout

        </a>

    </div>

    <!-- TOMBOL -->

    <a href="/admin/mountains/create"
       class="btn btn-primary mb-5">

        + Tambah Gunung

    </a>

    <!-- DAFTAR GUNUNG -->

    <div class="card shadow border-0 rounded-4 p-4 mb-5">

        <h2 class="fw-bold mb-4">

            Daftar Gunung

        </h2>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Gambar</th>

                        <th>Gunung</th>

                        <th>Admin</th>

                        <th>Email</th>

                        <th>No WA</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($mountains as $mountain)

                    <tr>

                        <!-- GAMBAR -->

                        <td>

                            <img src="{{ asset('storage/' . $mountain->image) }}"
                                 width="120"
                                 class="rounded shadow">

                        </td>

                        <!-- NAMA -->

                        <td>

                            <b>

                                {{ $mountain->name }}

                            </b>

                        </td>

                        <!-- ADMIN -->

                        <td>

                            {{ $mountain->admin->name ?? '-' }}

                        </td>

                        <!-- EMAIL -->

                        <td>

                            {{ $mountain->admin->email ?? '-' }}

                        </td>

                        <!-- WA -->

                        <td>

                            {{ $mountain->admin->nomor_wa ?? '-' }}

                        </td>

                        <!-- AKSI -->

                        <td>

                            <a href="/admin/mountain/edit/{{ $mountain->id }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <!-- RIWAYAT LAPORAN -->

    <div class="card shadow border-0 rounded-4 p-4">

        <h2 class="fw-bold mb-4">

            Semua Riwayat Laporan

        </h2>

        @foreach($laporans as $laporan)

            <div class="border rounded p-4 mb-3">

                <div class="row">

                    <div class="col-md-8">

                        <h4 class="fw-bold">

                            {{ $laporan->jenis_laporan }}

                        </h4>

                        <p>

                            {{ $laporan->deskripsi }}

                        </p>

                        <p>

                            <b>Gunung:</b>
                            {{ $laporan->mountain->name ?? '-' }}

                        </p>

                        <p>

                            <b>User:</b>
                            {{ $laporan->user->name ?? '-' }}

                        </p>

                        <p>

                            <b>Status:</b>

                            <span class="badge bg-primary">

                                {{ $laporan->status }}

                            </span>

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

        @endforeach

    </div>

</div>

</body>
</html>