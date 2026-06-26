<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Kelola Gunung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body style="background:#eaf2fb;">

<div class="container mt-5">

    <h1 class="fw-bold mb-4">

        Daftar Gunung

    </h1>

    <div class="mb-4">

        <a href="/admin/mountains/create"
           class="btn btn-primary">

            Tambah Gunung

        </a>

        <a href="/admin/dashboard"
           class="btn btn-secondary">

            Kembali

        </a>

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

    <div class="card shadow p-4">

        <table class="table table-bordered">

            <thead class="table-primary">

                <tr>

                    <th>No</th>

                    <th>Gambar</th>

                    <th>Gunung</th>

                    <th>Deskripsi</th>

                    <th>Admin</th>

                    <th>Email</th>

                    <th>No WA</th>

                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

                @foreach($mountains as $mountain)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <img src="{{ $mountain->image_url }}"
                                 alt="{{ $mountain->name }}"
                                 style="width:120px;height:85px;object-fit:cover;border-radius:12px;">

                        </td>

                        <td>

                            {{ $mountain->name }}

                        </td>

                        <td>

                            {{ $mountain->description }}

                        </td>

                        <td>

                            {{ $mountain->admin->name ?? '-' }}

                        </td>

                        <td>

                            {{ $mountain->admin->email ?? '-' }}

                        </td>

                        <td>

                            {{ $mountain->admin->nomor_wa ?? '-' }}

                        </td>

                        <td>

                            <a href="/admin/mountain/edit/{{ $mountain->id }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="/admin/mountain/delete/{{ $mountain->id }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus gunung ini?')">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>
