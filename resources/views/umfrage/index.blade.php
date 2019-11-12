@extends('layouts.public')

@section('title','Herzlich Willkommen')

@section('content')
    <div class="m-4">
        <p>Vielen Dank für Ihr Interesse an äußerst raffinierten Umfragen und deren fantastische Welt der Administration!</p>
        <p>Diese Seite wurde komplett mit Laravel sowie mit dem unaufregendem Design-Framework Bootstrap entwickelt und benötigt für den öffentlichen Bereich (fast) keine Cookies (wenngleich die Laravel-App diese auf Nutzerseite speichert). Stattdessen wird zur Eindämmung von mehrfach-Abstimmungen zusätzlich die "sogenannte" Fingerprint-Technologie verwendet. Sicherlich ist diese Technik mehr ein Schlupfloch als gesetzlich akzeptierte Technologie. Aber schauen Sie selbst.</p>
        <p>Ich wünsche Ihnen maximale Neugier und Spaß!</p>
        <p>Ihr Andy Gellermann</p>
    </div>
    <hr class="my-4 py-4">
    <div class="mx-4">
        <h4>
            Aktuelle Umfragen:
        </h4>
    </div>
    <div>
        <div class="list-group mb-3">
            @foreach($polls as $poll)
                    <a class="list-group-item list-group-item-action" href="/umfrage/{{ $poll->id }}"><strong>{{ $poll->title }}</strong></a>
            @endforeach
        </div>
    </div>

    @include ('errors')
@endsection
