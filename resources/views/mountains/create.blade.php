<h1>Tambah Nama Gunung</h1>

<form action="/mountains" method="POST">

    @csrf

    <input type="text"
           name="nama_gunung"
           placeholder="Nama Gunung">

    <br><br>

    <input type="text"
           name="lokasi"
           placeholder="Lokasi">

    <br><br>

    <textarea name="deskripsi"
              placeholder="Deskripsi"></textarea>

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>