<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Register EcoHike</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eef5fb;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial;
        }

        .register-card{
            width:100%;
            max-width:450px;
            background:white;
            padding:40px;
            border-radius:25px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>

<body>

<div class="register-card">

    <h2 class="fw-bold mb-4 text-center">

        Register EcoHike

    </h2>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="/register/store"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">

                Nama

            </label>

            <input type="text"
                   name="name"
                   class="form-control"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">

                Email

            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   required>

        </div>

        <div class="mb-4">

            <label class="form-label">

                Password

            </label>

            <input type="password"
                   name="password"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-primary w-100">

            Register

        </button>

    </form>

    <div class="text-center mt-4">

        Sudah punya akun?

        <a href="/login">

            Login

        </a>

    </div>

</div>

</body>
</html>