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
        <a href="/projects/{{ $project->id }}/edit" class="button btn-primary">
            Edit Project
        </a>
    </p>


@endsection
