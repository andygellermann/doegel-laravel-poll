@extends('layout')

@section('title','Contact me!')

@section('content')

    <p>
        <form action="/send" method="post">
            {{ csrf_field() }}
            <input type="password" name="pw">
            <input type="submit" value="send">
        </form>
    </p>

@endsection
