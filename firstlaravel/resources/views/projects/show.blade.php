@extends('layout')

@section('title', 'Project Details')

@section('content')

    <h2>
        {{ $project->title }}
    </h2>
    <div>
        <p>
            {{ $project->description }}
        </p>
    </div>
    <p>
    <form style="display: inline;">
        <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary btn-sm">
            Edit
        </a>
    </form>

    <form action="/projects/{{ $project->id }}" method="post" style="display: inline;">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger btn-sm">
            Delete
        </button>
    </form>
    </p>

    <div>
        @if ($project->tasks->count())

                @foreach ($project->tasks as $task)
                <form method="post" action="/tasks/{{ $task->id }}">
                    @csrf
                    @method('PATCH')
                    <label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
                        <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                        {{ $task->name }}
                    </label>

                </form>
                @endforeach

        @endif

        <form action="/projects/{{ $project->id }}/tasks" method="post">

            @csrf

            <div class="input-group mb-3">
                <input type="hidden" name="due" value="{{ date('Y-m-d H:i:s') }}">
                <input id="name" name="name" type="text" class="form-control" placeholder="new Task" aria-label="Task" aria-describedby="Project" autofocus>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Create Task</button>
                </div>
            </div>
        </form>

        @include ('errors')

@endsection
