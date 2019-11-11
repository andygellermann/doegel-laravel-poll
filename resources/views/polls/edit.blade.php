@extends('layouts.app')

@section('title', 'Umfrage bearbeiten')

@section('content')

    <form action="/polls/{{ $poll->id }}" method="post">

        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="title">Umfrage Titel</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Umfrage Titel" value="{{ $poll->title }}">
        </div>
        <div class="form-group">
            <label for="description">Umfrage Beschreibung</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $poll->description }}</textarea>
        </div>
        <div class="form-group" id="deadline">
            <label for="deadline">Umfrage "Deadline"-Datum</label>
            <input type="text" class="form-control" name="deadline" value="{{ date('d.m.Y', strtotime($poll->deadline)) }}">
        </div>

        <button type="submit" class="btn btn-primary mb-2">Umfrage aktualisieren</button>
    </form>
    <form action="/projects/{{ $poll->id }}" method="post">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger mb-2">Umfrage endgültig löschen</button>
    </form>

    @include ('errors')

@endsection
