@extends('layout')

@section('title','Meine Aufgaben...')

@section('content')
    <p>
    <ul style="text-align: left;">
        @foreach($tasks as $task)
            <li><a href="/tasks/{{ $task->id }}/edit">{{ $task->name }}</a></li>
        @endforeach
    </ul>
    </p>
    <p>
        <a href="/tasks/create">Create new Task</a>
    </p>

@endsection
