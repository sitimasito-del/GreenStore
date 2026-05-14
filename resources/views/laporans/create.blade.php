<h1>Buat Laporan</h1>

<h2>{{ $mountain->nama_gunung }}</h2>

<form action="/laporans"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <input type="hidden"
           name="mountain_id"
           value="{{ $mountain->id }}">

    <br>

    <input type="text"
           name="jenis_laporan"
           placeholder="Jenis Laporan">

    <br><br>

    <textarea name="deskripsi"
              placeholder="Deskripsi"></textarea>

    <br><br>

    <input type="file" name="foto">

    <br><br>

    <button type="submit">
        Kirim Laporan
    </button>

</form>