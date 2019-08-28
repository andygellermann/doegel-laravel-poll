@extends('layout')

@section('title','Herzlich Willkommen!')

@section('content')

    <p>
        Hello piepel!
        Hello piepel!
        Hello piepel!
        Hello piepel!
        Hello piepel!
        Hello piepel!
        Hello piepel!
        Hello piepel!
    </p>
    <div>
        @foreach($tasks as $element)
            <p>{{ $element }}</p>
        @endforeach
    </div>

@endsection
