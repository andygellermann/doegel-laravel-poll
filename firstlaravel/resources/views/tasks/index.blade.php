@extends('layout')

@section('title','Meine Aufgaben...')

@section('content')
    <p>
    <ul style="text-align: left;">
        @foreach($tasks as $task)
            <li style="margin-bottom: 5px; list-style-type: none;">
                <form style="display: inline;">
                    <a href="/tasks/{{ $task->id }}/edit" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                </form>

                <form action="/tasks/{{ $task->id }}" method="post" style="display: inline;">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>

                <a href="/tasks/{{ $task->id }}">
                    {{ $task->name }}
                </a>

            </li>
        @endforeach
            <li style="margin-bottom: 5px; list-style-type: none;">
                <a href="/tasks/create" class="btn btn-success btn-sm">new Task</a>
            </li>
    </ul>
    </p>
    <p>
    </p>

@endsection
