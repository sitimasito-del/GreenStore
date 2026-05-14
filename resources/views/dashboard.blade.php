<h1> GreenStore</h1>

<h3>Selamat datang,
{{ auth()->user()->name }}</h3>

<hr>

<a href="/mountains">
    Data Gunung
</a>

<br><br>

<a href="/laporans">
    Data Laporan
</a>

<br><br>

<form action="/logout" method="POST">

    @csrf

    <button type="submit">
        Logout
    </button>

</form>