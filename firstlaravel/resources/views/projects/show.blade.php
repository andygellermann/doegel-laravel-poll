@extends('layout')

@section('title', 'Project Details')

@section('content')

    <h2>
        {{ $project->title }}
    </h2>
    <p>
        {{ $project->description }}
    </p>
    <p>
        <a href="/projects/{{ $project->id }}/edit" class="btn btn-primary">
            Edit Project
        </a>
        <a href="/projects/{{ $project->id }}/delete" class="btn btn-danger">
            Delete Project
        </a>
    </p>


@endsection
