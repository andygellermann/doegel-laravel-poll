@extends('layouts.public')
@section('title', 'Umfrage: ' . $poll->title )
@section('content')
    <blockquote class="blockquote mb-0">
        <p>{{ $poll->description }}</p>
        <footer class="blockquote-footer">Diese Umfrage wurde von <cite title="Source Title">{{ $poll->owner->name }}</cite> erstellt.</footer>
    </blockquote>
    <div class="alert alert-success" style="display:none"></div>
    @if ($poll->showQuestions == 1)
        @if ($poll->listQuestions == 1)
    <div id="votingCheck">
        @if ($poll->question->count())
            <form method="post" action="/umfrage/{{ $poll->id }}">
                @csrf
                @method('PATCH')
                <div class="list-group mx-sm-5 my-3">
                    <div class="list-group-item custom-control custom-radio pt-3 pl-3 pb-1">
                        <h5>
                            Bitte treffen Sie Ihre Wahl:
                        </h5>
                    </div>
                    @foreach ($poll->question as $question)
                        <div class="list-group-item custom-control custom-radio pl-5">
                            <input name="id" value="{{ $question->id }}" type="radio" class="custom-control-input" id="option-{{ $question->id }}" required>
                            <input name="votes" value="{{ $question->votes + 1 }}" type="hidden">
                            <input name="poll_id" value="{{ $poll->id }}" type="hidden">
                            <input name="cookie" value="{{ $poll->cookie() }}" type="hidden">
                            <label class="custom-control-label" for="option-{{ $question->id }}">{{ $question->text }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="mx-sm-5 mt-0 mb-3">
                    <div class="text-right">
                        <strong>Hinweis:</strong> Das Umfrageergebnis wird am {{ date('d.m.Y', strtotime($poll->deadline)) }} auf dieser Seite veröffentlicht!
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-danger">Abstimmen</button>
                        <a href="/" class="btn btn-primary">zurück</a>
                    </div>
                    <div class="text-right">
                        <small class="text-right">*Um doppelte Abstimmungen zu vermeiden, wird Ihre Auswahl anonymisiert gespeichert!</small>
                    </div>
                </div>
            </form>

        @endif
    </div>
    @else
    <div id="votingStop">
        <div class="alert alert-success mx-3 mt-5 p-5">
            <h5>
                Vielen Dank, Sie haben bereits für diese Umfrage abgestimmt!
            </h5>
            <p>
                Das endgültige Umfrageergebnis wird am {{ date('d.m.Y', strtotime($poll->deadline)) }} auf dieser Seite veröffentlicht!
            </p>
        </div>
    </div>
    @endif
    @else
        <div class="list-group mx-5 my-3">
            <div class="list-group-item custom-control custom-radio pt-3 pl-3 pb-1">
                <h5>
                    Umfrage-Ergebnis (Insgesamt {{ $poll->voteSum }} Abstimmungen)
                </h5>
            </div>

            @foreach ($poll->question as $question)
                <div class="list-group-item pl-3">
                    <div>
                        {{ $question->text }} {{ $question->voteDisplay }}
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $question->percentage }}%" aria-valuenow="{{ $question->percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $question->percentDisplay }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @include ('errors')

@endsection
