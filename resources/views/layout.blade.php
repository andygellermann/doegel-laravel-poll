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
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">

        <div class="links">
            <a href="/">Startseite</a>
            <a href="/umfrage">Umfragen</a>
            <a href="/about">About</a>
        </div>
        <div class="title m-b-md">
            @yield('title')
        </div>
        <div class="content_box">
            @yield('content', 'Lorem Ipsum dolor sit amet!')
        </div>

    </div>
</div>

<script src="{{ asset('js/imprint.js') }}"></script>
<script>var scenarios=["availableScreenResolution","canvas","colorDepth","cookies","cpuClass","deviceDpi","doNotTrack","indexedDb","installedFonts","language","localIp","localStorage","pixelRatio","platform","plugins","processorCores","publicIp","screenResolution","sessionStorage","timezoneOffset","touchSupport","userAgent","webGl"];imprint.test(scenarios).then(function(e){$("meta[name=fipr-token]").attr("content",e),console.log(e)});</script>
</body>
</html>
