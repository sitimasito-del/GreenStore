<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eaf2fb;
        }

        .card-menu{
            border-radius:20px;
            transition:0.3s;
        }

        .card-menu:hover{
            transform:translateY(-5px);
            box-shadow:0 5px 20px rgba(0,0,0,0.2);
        }

    </style>

</head>

<body>

<div class="container mt-5">

    {{-- ADMIN PUSAT --}}
    @if(Auth::user()->role == 'admin_pusat')

        <h1 class="fw-bold mb-5">

            Dashboard Admin Pusat

        </h1>

        <div class="row">

            <div class="col-md-6 mb-4">

                <div class="card shadow p-4 card-menu h-100">

                    <h3 class="fw-bold mb-3">

                        Riwayat Laporan

                    </h3>

                    <p>

                        Melihat semua laporan dari setiap gunung.

                    </p>

                    <a href="/admin/laporans"
                       class="btn btn-primary">

                        Lihat Riwayat

                    </a>

                </div>

            </div>

            <div class="col-md-6 mb-4">

                <div class="card shadow p-4 card-menu h-100">

                    <h3 class="fw-bold mb-3">

                        Tambah Gunung

                    </h3>

                    <p>

                        Menambahkan gunung dan admin gunung baru.

                    </p>

                    <a href="/admin/mountains/create"
                       class="btn btn-success">

                        Tambah Gunung

                    </a>

                </div>

            </div>

        </div>

    @else

        {{-- ADMIN GUNUNG --}}

        <h1 class="fw-bold mb-5">

            Dashboard {{ $mountain->name }}

        </h1>

        <div class="card shadow p-4">

            <h3 class="fw-bold mb-4">

                Daftar Laporan

            </h3>

            <table class="table table-bordered">

                <thead class="table-primary">

                    <tr>

                        <th>No</th>

                        <th>Jenis</th>

                        <th>Deskripsi</th>

                        <th>Status</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($laporans as $laporan)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                {{ $laporan->jenis_laporan }}

                            </td>

                            <td>

                                {{ $laporan->deskripsi }}

                            </td>

                            <td>

                                {{ $laporan->status }}

                            </td>

                            <td>

                                <form action="/admin/laporan/update-status/{{ $laporan->id }}"
                                      method="POST">

                                    @csrf

                                    <select name="status"
                                            class="form-select mb-2">

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

                                    <button class="btn btn-success btn-sm">

                                        Update

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @endif

</div>

</body>
</html>