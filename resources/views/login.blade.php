<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login EcoHike</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#eaf2fb;
        }

        .card-login{
            border-radius:20px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card shadow p-4 card-login">

                <h2 class="fw-bold text-center mb-4">

                    Login EcoHike

                </h2>

                {{-- ERROR --}}
                @if(session('error'))

                    <div class="alert alert-danger">

                        {{ session('error') }}

                    </div>

                @endif

                <form action="/login"
                      method="POST">

                    @csrf

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

                        Login

                    </button>

                </form>

                <div class="text-center mt-3">

                    Belum punya akun?

                    <a href="/register">

                        Register

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>