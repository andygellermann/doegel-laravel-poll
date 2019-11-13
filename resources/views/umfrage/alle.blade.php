@extends('layouts.public')

@section('title','Aktuelle Umfragen')

@section('content')
    <div>
        <h5 class="mx-4">
            Hier finden Sie eine Übersicht aller Umfragen inkl. dem Enddatum der Abstimmung.
        </h5>
        <div class="list-group mb-3">
            @foreach($polls as $poll)
                <a class="list-group-item list-group-item-action" href="/umfrage/{{ $poll->id }}"><strong>&raquo; {{ $poll->title }}</strong> (bis {{ date('d.m.Y', strtotime($poll->deadline)) }})</a>
            @endforeach
        </div>
    </div>

    @include ('errors')
@endsection
