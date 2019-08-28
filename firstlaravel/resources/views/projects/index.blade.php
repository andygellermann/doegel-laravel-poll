@extends('layout')

@section('title','Projects')

@section('content')
    <p>
        <ul style="text-align: left;">
            @foreach($projects as $project)
                <li><strong><a href="/projects/{{ $project->id }}/edit">{{ $project->title }}</a>:</strong> {{ $project->description }}</li>
            @endforeach
        </ul>
    </p>
    <p>
        <a href="/projects/create">Create new Project</a>
    </p>

@endsection
