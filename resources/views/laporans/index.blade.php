@extends('layouts.app')

@section('content')

<h1>Pilih Gunung</h1>

<br>

<div class="grid">

@foreach($mountains as $mountain)

<div class="card">

    @if($mountain->gambar)

        <img src="{{ asset('storage/' . $mountain->gambar) }}"
             width="100%">

    @endif

    <h2>{{ $mountain->nama_gunung }}</h2>

    <p>{{ $mountain->lokasi }}</p>

    <br>

    <a href="{{ url('/buat-laporan/' . $mountain->id) }}"
       class="btn">

       Buat Laporan

    </a>

</div>

@endforeach

</div>

@endsection