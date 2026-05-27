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
            border-radius:25px;
        }

        .mountain-img{
            width:120px;
            height:80px;
            object-fit:cover;
            border-radius:15px;
        }

        .laporan-img{
            width:180px;
            border-radius:15px;
        }

        .stat-card{
            border:none;
            border-radius:25px;
            color:white;
        }

        .table{
            vertical-align:middle;
        }

        .badge-status{
            padding:10px 16px;
            border-radius:10px;
            font-size:14px;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <!-- HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="fw-bold">

                Dashboard Admin Pusat

            </h1>

            <p class="text-muted">

                Monitoring seluruh laporan GreenStore

            </p>

        </div>

        <div>

            <a href="/admin/mountains/create"
               class="btn btn-success rounded-pill px-4">

                + Tambah Gunung

            </a>

            <a href="/logout"
               class="btn btn-danger rounded-pill px-4">

                Logout

            </a>

        </div>

    </div>

    <!-- CARD STATISTIK -->

    <div class="row mb-5">

        <div class="col-md-4 mb-3">

            <div class="card stat-card bg-warning shadow p-4">

                <h5>Total Pending</h5>

                <h1 class="fw-bold">

                    {{ $totalPending }}

                </h1>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card stat-card bg-primary shadow p-4">

                <h5>Total Proses</h5>

                <h1 class="fw-bold">

                    {{ $totalProses }}

                </h1>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card stat-card bg-success shadow p-4">

                <h5>Total Selesai</h5>

                <h1 class="fw-bold">

                    {{ $totalSelesai }}

                </h1>

            </div>

        </div>

    </div>

    <!-- REKAP -->

    <div class="row mb-5">

        <!-- REKAP BULANAN -->

        <div class="col-md-6 mb-4">

            <div class="card shadow card-custom p-4 h-100">

                <h4 class="fw-bold mb-4">

                    Rekap Bulanan

                </h4>

                <div class="table-responsive">

                    <table class="table">

                        <thead>

                            <tr>

                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Total</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($rekapBulanan as $item)

                            <tr>

                                <td>

                                    {{ $item->bulan }}

                                </td>

                                <td>

                                    {{ $item->tahun }}

                                </td>

                                <td>

                                    {{ $item->total }}

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <!-- REKAP TAHUNAN -->

        <div class="col-md-6 mb-4">

            <div class="card shadow card-custom p-4 h-100">

                <h4 class="fw-bold mb-4">

                    Rekap Tahunan

                </h4>

                <div class="table-responsive">

                    <table class="table">

                        <thead>

                            <tr>

                                <th>Tahun</th>
                                <th>Total</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($rekapTahunan as $item)

                            <tr>

                                <td>

                                    {{ $item->tahun }}

                                </td>

                                <td>

                                    {{ $item->total }}

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

    <!-- DAFTAR GUNUNG -->

    <div class="card shadow card-custom p-4 mb-5">

        <h3 class="fw-bold mb-4">

            Daftar Gunung

        </h3>

        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>

                        <th>Gambar</th>
                        <th>Gunung</th>
                        <th>Admin</th>
                        <th>Email</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($mountains as $mountain)

                    <tr>

                        <td>

                            <img src="{{ asset('storage/' . $mountain->image) }}"
                                 class="mountain-img">

                        </td>

                        <td>

                            <b>

                                {{ $mountain->name }}

                            </b>

                        </td>

                        <td>

                            {{ $mountain->admin->name ?? '-' }}

                        </td>

                        <td>

                            {{ $mountain->admin->email ?? '-' }}

                        </td>

                        <td>

                            <a href="/admin/mountain/edit/{{ $mountain->id }}"
                               class="btn btn-warning rounded-pill">

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

    <div class="card shadow card-custom p-4">

        <h3 class="fw-bold mb-4">

            Riwayat Laporan

        </h3>

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

                        <b>Pelapor:</b>

                        {{ $laporan->user->name ?? '-' }}

                    </p>

                    <p>

                        <b>Tanggal:</b>

                        {{ $laporan->created_at->format('d M Y') }}

                    </p>

                    <p>

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