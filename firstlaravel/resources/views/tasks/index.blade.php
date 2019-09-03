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
    </ul>
    </p>

    @include ('errors')

    <p>

    <form action="/tasks" method="post">

        @csrf

        <input type="hidden" name="due" value="{{ date('Y-m-d H:i:s') }}">
        <div class="form-group">
            <label for="name">new Task</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Task content" autofocus>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Create Task</button>
    </form>
    </p>

@endsection
