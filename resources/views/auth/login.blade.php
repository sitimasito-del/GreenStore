<h1>Login GreenStore</h1>

@if(session('error'))

    <p>{{ session('error') }}</p>

@endif

<form action="/login" method="POST">

    @csrf

    <input type="email"
           name="email"
           placeholder="Email">

    <br><br>

    <input type="password"
           name="password"
           placeholder="Password">

    <br><br>

    <button type="submit">
        Login
    </button>

</form>