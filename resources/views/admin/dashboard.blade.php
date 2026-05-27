<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>

        body{
            background:#eef5fb;
            font-family:Arial;
        }

        .card-box{
            border:none;
            border-radius:20px;
            padding:25px;
            color:white;
        }

        .table-box{
            background:white;
            border-radius:20px;
            padding:25px;
            box-shadow:0 5px 15px rgba(0,0,0,0.08);
        }

        .mountain-img{
            width:180px;
            height:120px;
            object-fit:cover;
            border-radius:12px;
        }

        .badge-status{
            padding:8px 15px;
            border-radius:20px;
            font-size:14px;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h1 class="fw-bold">

                Dashboard Admin Pusat

            </h1>

            <p class="text-muted">

                Rekap laporan dan data gunung EcoHike

            </p>

        </div>

        <div>

            <a href="/admin/mountains/create"
               class="btn btn-primary">

                <i class="fa-solid fa-plus"></i>
                Tambah Gunung

            </a>

            <a href="/logout"
               class="btn btn-danger">

                Logout

            </a>

        </div>

    </div>

    {{-- CARD REKAP --}}

    <div class="row mb-5">

        <div class="col-md-4 mb-4">

            <div class="card-box bg-warning">

                <h5>

                    Pending

                </h5>

                <h1 class="fw-bold">

                    {{ $totalPending }}

                </h1>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card-box bg-primary">

                <h5>

                    Proses

                </h5>

                <h1 class="fw-bold">

                    {{ $totalProses }}

                </h1>

            </div>

        </div>

        <div class="col-md-4 mb-4">

            <div class="card-box bg-success">

                <h5>

                    Selesai

                </h5>

                <h1 class="fw-bold">

                    {{ $totalSelesai }}

                </h1>

            </div>

        </div>

    </div>

    {{-- DAFTAR GUNUNG --}}

    <div class="table-box mb-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">

                Daftar Gunung

            </h2>

        </div>

        <div class="table-responsive">

            <table class="table align-middle">

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

                            <img src="data:image/jpeg;base64,{{ $mountain->image }}"
                                 class="mountain-img">

                        </td>

                        <td>

                            <h5 class="fw-bold">

                                {{ $mountain->name }}

                            </h5>

                            <small class="text-muted">

                                {{ Str::limit($mountain->description, 80) }}

                            </small>

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

                                <i class="fa-solid fa-pen"></i>
                                Edit

                            </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    {{-- REKAP BULANAN --}}

    <div class="table-box mb-5">

        <h2 class="fw-bold mb-4">

            Rekap Bulanan

        </h2>

        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>

                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Total Laporan</th>

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

                            <span class="badge bg-primary">

                                {{ $item->total }} laporan

                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    {{-- REKAP TAHUNAN --}}

    <div class="table-box mb-5">

        <h2 class="fw-bold mb-4">

            Rekap Tahunan

        </h2>

        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>

                        <th>Tahun</th>
                        <th>Total Laporan</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($rekapTahunan as $item)

                    <tr>

                        <td>

                            {{ $item->tahun }}

                        </td>

                        <td>

                            <span class="badge bg-success">

                                {{ $item->total }} laporan

                            </span>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    {{-- LAPORAN TERBARU --}}

    <div class="table-box">

        <h2 class="fw-bold mb-4">

            Laporan Terbaru

        </h2>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>User</th>
                        <th>Gunung</th>
                        <th>Jenis</th>
                        <th>Status</th>
                        <th>Tanggal</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($laporans as $laporan)

                    <tr>

                        <td>

                            {{ $laporan->user->name ?? '-' }}

                        </td>

                        <td>

                            {{ $laporan->mountain->name ?? '-' }}

                        </td>

                        <td>

                            {{ $laporan->jenis_laporan }}

                        </td>

                        <td>

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

                        </td>

                        <td>

                            {{ $laporan->created_at->format('d M Y') }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>