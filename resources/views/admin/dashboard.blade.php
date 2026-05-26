<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin Pusat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eef5fb;
        }

        .card-custom{
            border:none;
            border-radius:20px;
        }

        .mountain-img{
            width:120px;
            border-radius:15px;
            box-shadow:0 4px 10px rgba(0,0,0,0.2);
        }

        .laporan-img{
            width:220px;
            border-radius:15px;
            box-shadow:0 4px 10px rgba(0,0,0,0.2);
        }

        .edit-btn{
            background:#ffc107;
            color:#000;
            font-weight:bold;
            border:none;
            padding:8px 16px;
            border-radius:10px;
            text-decoration:none;
        }

        .edit-btn:hover{
            background:#e0a800;
            color:#000;
        }

        .badge-status{
            padding:8px 15px;
            border-radius:10px;
            font-size:14px;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <!-- HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-5">

        <h1 class="fw-bold">

            Dashboard Admin Pusat

        </h1>

        <a href="/logout"
           class="btn btn-danger rounded-pill px-4">

            Logout

        </a>

    </div>

    <!-- TOMBOL TAMBAH -->

    <a href="/admin/mountains/create"
       class="btn btn-primary rounded-pill px-4 mb-5">

        + Tambah Gunung

    </a>

    <!-- DAFTAR GUNUNG -->

    <div class="card shadow card-custom p-4 mb-5">

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

                        <th>Email Admin</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($mountains as $mountain)

                    <tr>

                        <!-- GAMBAR -->

                        <td>

                            <img src="{{ asset('storage/' . $mountain->image) }}"
                                 class="mountain-img">

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

                        <!-- EDIT -->

                        <td>

                            <a href="/admin/mountain/edit/{{ $mountain->id }}"
                               class="edit-btn">

                               ✏️ Edit

                            </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <!-- REKAP -->

    <div class="row mb-5">

        <div class="col-md-4">

            <div class="card shadow border-0 rounded-4 p-4">

                <h5>Total Pending</h5>

                <h1 class="fw-bold text-warning">

                    {{ $totalPending }}

                </h1>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow border-0 rounded-4 p-4">

                <h5>Total Proses</h5>

                <h1 class="fw-bold text-primary">

                    {{ $totalProses }}

                </h1>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow border-0 rounded-4 p-4">

                <h5>Total Selesai</h5>

                <h1 class="fw-bold text-success">

                    {{ $totalSelesai }}

                </h1>

            </div>

        </div>

    </div>

    <!-- REKAP BULANAN -->

    <div class="card shadow card-custom p-4 mb-5">

        <h2 class="fw-bold mb-4">

            Rekap Laporan Bulanan

        </h2>

        <table class="table">

            <thead>

                <tr>

                    <th>Bulan</th>

                    <th>Tahun</th>

                    <th>Total Laporan</th>

                </tr>

            </thead>

            <tbody>

                @foreach($rekapBulanan as $rekap)

                <tr>

                    <td>

                        {{ $rekap->bulan }}

                    </td>

                    <td>

                        {{ $rekap->tahun }}

                    </td>

                    <td>

                        {{ $rekap->total }}

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <!-- REKAP TAHUNAN -->

    <div class="card shadow card-custom p-4 mb-5">

        <h2 class="fw-bold mb-4">

            Rekap Laporan Tahunan

        </h2>

        <table class="table">

            <thead>

                <tr>

                    <th>Tahun</th>

                    <th>Total Laporan</th>

                </tr>

            </thead>

            <tbody>

                @foreach($rekapTahunan as $rekap)

                <tr>

                    <td>

                        {{ $rekap->tahun }}

                    </td>

                    <td>

                        {{ $rekap->total }}

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <!-- RIWAYAT LAPORAN -->

    <div class="card shadow card-custom p-4">

        <h2 class="fw-bold mb-4">

            Semua Riwayat Laporan

        </h2>

        @foreach($laporans as $laporan)

            <div class="border rounded-4 p-4 mb-4">

                <div class="row align-items-center">

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

                            <b>Tanggal:</b>

                            {{ $laporan->created_at->format('d M Y') }}

                        </p>

                        <p>

                            <b>Status:</b>

                            @if($laporan->status == 'Pending')

                                <span class="badge bg-warning text-dark badge-status">

                                    Pending

                                </span>

                            @elseif($laporan->status == 'Proses')

                                <span class="badge bg-primary badge-status">

                                    Proses

                                </span>

                            @else

                                <span class="badge bg-success badge-status">

                                    Selesai

                                </span>

                            @endif

                        </p>

                    </div>

                    <div class="col-md-4 text-end">

                        @if($laporan->gambar)

                            <img src="{{ asset('storage/' . $laporan->gambar) }}"
                                 class="laporan-img">

                        @endif

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

</body>
</html>