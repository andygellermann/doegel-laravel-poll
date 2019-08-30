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


@endsection
