<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Gunung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body style="background:#eaf2fb;">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2 class="fw-bold mb-4">

            Tambah Gunung

        </h2>

        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="/admin/mountains/store"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Nama Gunung

                </label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name') }}"
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Deskripsi

                </label>

                <textarea name="description"
                          class="form-control"
                          rows="4"
                          required>{{ old('description') }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Gambar Gunung

                </label>

                <input type="file"
                       name="image"
                       class="form-control"
                       accept="image/jpeg,image/png,image/webp"
                       required>

            </div>

            @if(Auth::user()->role == 'admin_pusat')

                <hr>

                <h4 class="fw-bold mb-3">

                    Admin Gunung

                </h4>

                <div class="mb-3">

                    <label class="form-label">

                        Nama Admin

                    </label>

                    <input type="text"
                           name="admin_name"
                           class="form-control"
                           value="{{ old('admin_name') }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Email Admin

                    </label>

                    <input type="email"
                           name="admin_email"
                           class="form-control"
                           value="{{ old('admin_email') }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Nomor WA Admin

                    </label>

                    <input type="text"
                           name="nomor_wa"
                           class="form-control"
                           value="{{ old('nomor_wa') }}">

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        Password Admin

                    </label>

                    <input type="password"
                           name="admin_password"
                           class="form-control"
                           required>

                </div>

            @else

                <div class="alert alert-info">

                    Gunung baru akan terhubung ke akun admin gunung yang sedang login.

                </div>

            @endif

            <button class="btn btn-primary">

                Simpan Gunung

            </button>

        </form>

    </div>

</div>

</body>
</html>
