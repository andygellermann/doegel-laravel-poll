@extends('layout')

@section('title', 'Task-Details')

@section('content')

    <h2>
        {{ $task->name }}
    </h2>
    <p>
        Due: {{ $task->due }}
    </p>
    <p>
        Prio: {{ $task->priority }}
    </p>
    <p>
        <a href="/tasks/{{ $task->id }}/edit" class="button btn-primary">
            Edit Task
        </a>
    </p>


@endsection
