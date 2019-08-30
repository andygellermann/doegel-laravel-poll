@extends('layout')

@section('title','Create new Project')

@section('content')

    <form action="/projects" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title of your new Project</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Project title" autofocus>
        </div>
        <div class="form-group">
            <label for="description">Project Details</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Create Project</button>
    </form>

@endsection
