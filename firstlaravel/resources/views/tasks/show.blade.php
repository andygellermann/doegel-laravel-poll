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
        <a href="/tasks/{{ $task->id }}/edit" class="btn btn-primary">
            Edit Task
        </a>
    </p>
    <p>
        <a href="/tasks/{{ $task->id }}/delete" class="btn btn-danger">
            Delete Task
        </a>
    </p>

    @include ('errors')


@endsection
