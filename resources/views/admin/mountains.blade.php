<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Kelola Gunung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#eaf2fb;">

<div class="container mt-5">

    <h1 class="fw-bold mb-4">

        Daftar Gunung

    </h1>

    <div class="card shadow p-4">

        <table class="table table-bordered">

            <thead class="table-primary">

                <tr>

                    <th>No</th>

                    <th>Gunung</th>

                    <th>Deskripsi</th>

                    <th>Admin</th>

                    <th>Email</th>

                    <th>No WA</th>

                </tr>

            </thead>

            <tbody>

                @foreach($mountains as $mountain)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

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

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>