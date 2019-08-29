@extends('layout')

@section('title', 'Edit Project')

@section('content')

    <form action="/projects/{{ $project->id }}" method="post">

        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="title">Title of your new Project</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Project title" value="{{ $project->title }}">
        </div>
        <div class="form-group">
            <label for="description">Project Details</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $project->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Update Project</button>
    </form>
    <form action="/projects/{{ $project->id }}" method="post">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-warning mb-2">Delete Project</button>
    </form>

@endsection
