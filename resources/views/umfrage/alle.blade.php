@extends('layouts.public')

@section('title','Aktuelle Umfragen')

@section('content')
    <div>
        <h5 class="mx-4">
            Hier finden Sie eine Übersicht aller Umfragen inkl. dem Enddatum der Abstimmung.
        </h5>
        <div class="list-group mb-3">
            @foreach($polls as $poll)
                <a class="list-group-item list-group-item-action" href="/umfrage/{{ $poll->id }}">
                    <strong>
                        <span class="glyphicon glyphicon-check"></span>
                        {{ $poll->title }}
                    </strong>
                    <em>
                        @if (strtotime($poll->deadline) > time())
                        (bis {{ date('d.m.Y H:i', strtotime($poll->deadline)) }} Uhr)
                        @else
                        (Ergebnisse ansehen)
                        @endif
                    </em>
                </a>
            @endforeach
        </div>
    </div>

    @include ('errors')
@endsection
