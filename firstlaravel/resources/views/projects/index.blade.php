@extends('layout')

@section('title','Projects')

@section('content')
    <p>
        <ul style="text-align: left;">
            @foreach($projects as $project)

            <li style="margin-bottom: 5px; list-style-type: none;">
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

                <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>&nbsp;{{ $project->description }}
            </li>
            @endforeach
        </ul>
    </p>

    @include ('errors')

    <div style="text-align: left">
        <form action="/projects" method="post">

            @csrf

            <p>
                <a href="https://laravel.com/docs/5.8/validation#available-validation-rules">Validation-Rules?</a>
            </p>
            <div class="form-group">
                <label for="title">Title of your new Project</label>
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid':'' }}" id="title" name="title" placeholder="Project title" autofocus value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Project Details</label>
                <textarea class="form-control {{ $errors->has('description') ? ' is-invalid':'' }}" id="description" name="description" rows="3" >{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Create Project</button>
        </form>
    </div>

@endsection
