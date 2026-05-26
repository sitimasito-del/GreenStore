<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

<<<<<<< HEAD
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Tambah Gunung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background:#eaf2fb;">

<div class="container mt-5">

    <div class="card shadow p-4">

        <h1 class="fw-bold mb-4">

            Tambah Gunung

        </h1>

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
                       required>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Deskripsi Gunung

                </label>

                <textarea name="description"
                          class="form-control"
                          rows="4"
                          required></textarea>

            </div>

            <div class="mb-4">

                <label class="form-label">

                    Upload Gambar Gunung

                </label>

                <input type="file"
                       name="image"
                       class="form-control"
                       required>

            </div>

            <button type="submit"
                    class="btn btn-primary">

                Simpan Gunung

            </button>

        </form>

    </div>

</div>

</body>
</html>
=======
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mountains', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('foto');
            $table->string('tinggi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mountains');
    }
};
>>>>>>> 2649c0eb5aba5c612d50adbe56020bd9fab984a6
