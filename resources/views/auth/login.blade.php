@extends('layouts.app')

@section('content')

<div class="card">

<h1>Login GreenStore</h1>

<form action="/login"
      method="POST">

    @csrf

    <input type="email"
           name="email"
           placeholder="Email">

    <br><br>

    <input type="password"
           name="password"
           placeholder="Password">

    <br><br>

    <button class="btn">

        Login

    </button>

</form>

</div>

@endsection