@extends('layouts.app')
@section('title', 'Umfrage-Optionen bearbeiten')
@section('content')

    <h2>
        {{ $poll->title }}
    </h2>
    <div>
        <p>
            {{ $poll->description }}
        </p>
    </div>
    <div class="mb-3">
        <form style="display: inline;">
            <a href="/polls/{{ $poll->id }}/edit" class="btn btn-primary btn-sm">
                Ändern
            </a>
        </form>

        <form action="/polls/{{ $poll->id }}" method="post" style="display: inline;">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm">
                Löschen
            </button>
        </form>
    </div>
    <!-- {{ $counter = 1 }} -->
    @if ($poll->question->count())
    <div>
        <h5 class="mt-3">
            Antwort-Optionen:
        </h5>
        <div class="alert alert-success" style="display:none"></div>
        <div id="sortable">

        @foreach ($poll->question as $question)
            <form method="post" action="/question/{{ $question->id }}" id="drag" data-post-url="/polls/question/post" data-id="{{ $question->id }}">
                @csrf
                @method('PATCH')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text grip" id="{{ $question->id }}">{{ $counter++ }}</div>
                    </div>
                    <input type="text" name="text" value="{{ $question->text }}" class="form-control" aria-label="Question" aria-describedby="Poll">
                    <div class="input-group-append">
                        <button class="btn btn-primary" id="patchButton" type="submit">Ändern</button>
                        <button class="btn btn-danger" id="deleteButton" type="submit">Löschen</button>
                    </div>
                </div>
            </form>
        @endforeach
        </div>
    </div>
    @endif
    <div class="sortable-hint-text mt-3" id="sortable-text-{{ $counter }}" style="display: {{ $counter > 2 ? 'inherit' : 'none' }} !important">
        <h5>Auswahl-Antworten sortieren</h5>
        <p>Die Ziffer vor der Antwort geklickt halten um diese an die gewünschte Position zu verschieben!</p>
    </div>
    <div class="mt-3">
        <h5>Neue Auswahl-Antwort hinzufügen</h5>
        <form action="/polls/{{ $poll->id }}/question" method="post">
            <div class="input-group">
                @csrf
                <input type="hidden" name="position" value="{{ ($counter > 0 ) ? $counter-1:0 }}">
                <input id="text" name="text" type="text" class="form-control" placeholder="Neue Auswahl-Antwort" aria-label="Question" aria-describedby="Poll" autofocus>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">speichern</button>
                </div>
            </div>
        </form>
    </div>

    @include ('errors')

@endsection
