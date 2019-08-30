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
            <li style="margin-bottom: 5px; list-style-type: none;">
                <a href="/projects/create" class="btn btn-success btn-sm">new Project</a>
            </li>
        </ul>
    </p>

@endsection
