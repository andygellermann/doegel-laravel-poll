@extends('layout')

@section('title', 'Edit Task')

@section('content')

    <form action="/tasks/{{ $task->id }}" method="post">

        @method('PATCH')
        @csrf

        <input type="hidden" name="due" value="{{ date('Y-m-d H:i:s') }}">
        <div class="form-group">
            <label for="name">Your Task</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Task" value="{{ $task->name }}">
        </div>

        <button type="submit" class="btn btn-primary mb-2">Update Task</button>
    </form>
    <form action="/tasks/{{ $task->id }}" method="post">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger mb-2">Delete Task</button>
    </form>

@endsection
