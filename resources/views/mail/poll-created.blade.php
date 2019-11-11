@component('mail::message')
    # New Project: {{ $poll->title }}

    {{ $poll->description }}

    @component('mail::button', ['url' => url('/polls/' . $poll->id)])
        View {{ $poll->title }}
    @endcomponent

    Greetings from your voting-machine,<br>
    {{ config('app.name') }}
@endcomponent
