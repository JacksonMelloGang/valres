@extends('layouts.layout')
@section('content')
    <div>
        <h1>Valres</h1>
        <h2>Reservation</h2>
        <h3>Log in</h3>
        <form action="/" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Log in">
        </form>
        <!-- show error message if only $error is defined -->
        @isset($error)
            <p>{{$error}}</p>
        @endisset
    </div>

@endsection
