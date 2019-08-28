@extends('layout')

@section('title','Contact me!')

@section('content')

    <form action="/send" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Your Password</label>
            <input type="password" class="form-control" id="title" name="pw">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Let's start</button>
    </form>

@endsection
