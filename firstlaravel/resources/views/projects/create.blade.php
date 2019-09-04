@extends('layouts.app')

@section('title','Create new Project')

@section('content')

    <form action="/projects" method="post">

        @csrf

        <div class="form-group">
            <label for="title">Title of your new Project</label>
            <input
                type="text"
                class="form-control"
                id="title"
                name="title"
                placeholder="Project title"
                value="{{ old('title') }}"
                required
                autofocus>
        </div>

        <div class="form-group">
            <label for="description">Project Details</label>
            <textarea
                class="form-control"
                id="description"
                name="description"
                rows="3"
                required
            >{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mb-2">Create Project</button>
    </form>

    @include ('errors')

@endsection
