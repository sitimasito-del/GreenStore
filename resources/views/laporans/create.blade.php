@extends('layouts.app')

@section('content')

<div class="card">

<h1>
Buat Laporan
</h1>

<form action="/laporans/store"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <input type="hidden"
           name="mountain_id"
           value="{{ $mountain->id }}">

    <input type="text"
           name="jenis_laporan"
           placeholder="Jenis Laporan">

    <br><br>

    <textarea name="deskripsi"
              placeholder="Deskripsi"></textarea>

    <br><br>

    <input type="file"
           name="gambar">

    <br><br>

    <button class="btn">

        Kirim Laporan

    </button>

</form>

</div>

@endsection