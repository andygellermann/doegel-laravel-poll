@component('mail::message')
# New Project: {{ $project->title }}

{{ $project->description }}

@component('mail::button', ['url' => url('/projects/' . $project->id)])
View {{ $project->title }}
@endcomponent

Greetings from Bahamas,<br>
{{ config('app.name') }}
@endcomponent
