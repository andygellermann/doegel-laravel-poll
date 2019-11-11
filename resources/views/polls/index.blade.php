@extends('layouts.app')

@section('title','Umfragen')

@section('content')
    <div class="mb-3">
        <ul class="list-group m-1">
            @foreach($polls as $poll)

                <li class="list-group-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-8 m-0 p-0">
                                <h5 class="mt-2 mb-0 p-0">
                                    <a href="/polls/{{ $poll->id }}">{{ $poll->title }}</a>
                                </h5>
                            </div>
                            <div class="col-4 text-right m-0 p-0">
                                <form style="display: inline;">
                                    <a href="/polls/{{ $poll->id }}/edit" class="btn btn-primary btn-sm">
                                        Bearbeiten
                                    </a>
                                </form>

                                <form action="/polls/{{ $poll->id }}" method="post" style="display: inline;">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Löschen
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
<hr>
    <h4 class="mt-3">Neue Umfrage:</h4>
    @include ('errors')

    <div style="text-align: left">
        <form action="/polls" method="post">

            @csrf
            <div class="form-group">
                <label for="title">Umfrage-Titel</label>
                <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid':'' }}" id="title" name="title" placeholder="Poll title" autofocus value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Umfrage Beschreibung</label>
                <textarea class="form-control {{ $errors->has('description') ? ' is-invalid':'' }}" id="description" name="description" rows="3" >{{ old('description') }}</textarea>
            </div>
            <div class="form-group" id="deadline">
                <label for="deadline">Umfrage "Deadline"-Datum</label>
                <input type="text" class="form-control {{ $errors->has('deadline') ? ' is-invalid':'' }}" name="deadline" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary mb-2">Umfrage anlegen</button>
        </form>
    </div>
@endsection
