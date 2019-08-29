@extends('layout')

@section('title','Create new Task')

@section('content')

    <form action="/tasks" method="post">

        @csrf

        <input type="hidden" name="due" value="{{ date('Y-m-d H:i:s') }}">
        <div class="form-group">
            <label for="task">new Task</label>
            <input type="text" class="form-control" id="task" name="task" placeholder="Task content">
        </div>

        <button type="submit" class="btn btn-primary mb-2">Create Task</button>
    </form>

@endsection
