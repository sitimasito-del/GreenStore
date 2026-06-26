<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Gunung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eef5fb;
        }

        .edit-card{
            border:none;
            border-radius:25px;
        }

        .form-control{
            border-radius:12px;
            padding:12px;
        }

        .btn-update{
            background:#198754;
            color:white;
            border:none;
            padding:12px 25px;
            border-radius:12px;
            font-weight:bold;
        }

        .btn-update:hover{
            background:#157347;
        }

        .preview-img{
            width:100%;
            max-height:280px;
            object-fit:cover;
            border-radius:18px;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow edit-card p-5">

                <h1 class="fw-bold mb-4">

                    Edit Gunung

                </h1>

                <!-- FORM -->

                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="/admin/mountain/update/{{ $mountain->id }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <!-- NAMA -->

                    <div class="mb-4">

                        <label class="fw-bold mb-2">

                            Nama Gunung

                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $mountain->name) }}">

                    </div>

                    <!-- DESKRIPSI -->

                    <div class="mb-4">

                        <label class="fw-bold mb-2">

                            Deskripsi Gunung

                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="6">{{ old('description', $mountain->description) }}</textarea>

                    </div>

                    <div class="mb-4">

                        <label class="fw-bold mb-2">

                            Gambar Gunung

                        </label>

                        <img src="{{ $mountain->image_url }}"
                             class="preview-img mb-3"
                             alt="{{ $mountain->name }}">

                        <input type="file"
                               name="image"
                               class="form-control"
                               accept="image/jpeg,image/png,image/webp">

                        <small class="text-muted">

                            Kosongkan jika tidak ingin mengganti gambar.

                        </small>

                    </div>

                    <!-- BUTTON -->

                    <div class="d-flex gap-3">

                        <button class="btn-update">

                            Update Gunung

                        </button>

                        <a href="/admin/dashboard"
                           class="btn btn-secondary rounded-3 px-4">

                            Kembali

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>
