<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="fipr-token" content="">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="dragging">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/umfragen">Umfragen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">Repository</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrierung') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/">Startseite</a>
                                <a class="dropdown-item" href="/umfragen">Umfragen (Vorschau)</a>
                                <a class="dropdown-item" href="/polls">Umfragen (Admin)</a>
                                <a class="dropdown-item" href="/about">Repository</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Abmelden') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="/">Startseite</a></li>
            <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
        </ol>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="m-1">@yield('title')</h3>
                        </div>
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="{{ asset('js/imprint.js') }}"></script>
<script>
    var scenarios = ["availableScreenResolution", "canvas", "colorDepth", "cookies", "cpuClass", "deviceDpi", "doNotTrack", "indexedDb", "installedFonts", "language", "localIp", "localStorage", "pixelRatio", "platform", "plugins", "processorCores", "publicIp", "screenResolution", "sessionStorage", "timezoneOffset", "touchSupport", "userAgent", "webGl"];
    imprint.test(scenarios).then(function(e) {
        $("meta[name=fipr-token]").attr("content", e), $("input[name=fipr_token]").val(e), console.log(e);
        var poll_id = {{ $poll->id ?? 0 }};
        if ( poll_id > 0 && e ){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:'/fiprcheck/' + poll_id + '/' + e,
                success:function(data){
                    console.log(data);
                    if(data<1){
                        $('#votingCheck').show().fadeIn(500);
                        $('#votingStop').hide();
                    } else {
                        $('#votingCheck').hide();
                        $('#votingStop').show().fadeIn(500);
                    }
                }
            });
        }
    });
</script>
</body>
</html>
