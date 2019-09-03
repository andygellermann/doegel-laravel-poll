@extends('layout')

@section('title','Create new Task')

@section('content')

    <form action="/tasks" method="post">

        @csrf

        <input type="hidden" name="due" value="{{ date('Y-m-d H:i:s') }}">
        <div class="form-group">
            <label for="name">new Task</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Task content" autofocus>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Create Task</button>
    </form>

    @include ('errors')

@endsection
