<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login GreenStore</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background-color: #eaf2fb;
        }

        .card-login{
            max-width: 420px;
            margin: 80px auto;
            border-radius: 15px;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/soft-ui.css') }}">
</head>
<body>

<div class="container">

    <div class="card shadow p-4 card-login">

        <h2 class="text-center mb-4">

            GreenStore Login

        </h2>

        @if(session('error'))

            <div class="alert alert-danger">

                {{ session('error') }}

            </div>

        @endif

        <form action="/login"
              method="POST">

            @csrf

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

            <button class="btn btn-primary w-100">

                Login

            </button>

        </form>

    </div>

</div>

</body>
</html>