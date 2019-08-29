@extends('layout')

@section('title','Projects')

@section('content')
    <p>
        <ul style="text-align: left;">
            @foreach($projects as $project)
                <li>
                    <strong>
                        <a href="/projects/{{ $project->id }}">
                            {{ $project->title }}
                        </a>
                        :
                    </strong>
                    {{ $project->description }}
                    [<a href="/projects/{{ $project->id }}/edit">
                        Edit
                    </a>]
                    [<a href="/projects/{{ $project->id }}/delete">
                        Delete
                    </a>]

                </li>
            @endforeach
        </ul>
    </p>
    <p>
        <a href="/projects/create">Create new Project</a>
    </p>

@endsection
