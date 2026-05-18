<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Register GreenStore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background-color: #eaf2fb;
        }

        .card-register{
            max-width: 450px;
            margin: 60px auto;
            border-radius: 15px;
        }

    </style>

</head>
<body>

<div class="container">

    <div class="card shadow p-4 card-register">

        <h2 class="text-center mb-4">

            Register GreenStore

        </h2>

        {{-- ERROR VALIDASI --}}
        @if($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="/register"
              method="POST">

            @csrf

            <div class="mb-3">

                <label>Nama</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label>Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label>Password</label>

                <input type="password"
                       name="password"
                       class="form-control"
                       required>

            </div>

            <button class="btn btn-success w-100">

                Register

            </button>

        </form>

        <div class="text-center mt-3">

            <a href="/login">

                Sudah punya akun?

            </a>

        </div>

    </div>

</div>

</body>
</html>