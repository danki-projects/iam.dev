<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('meta_description')">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @hasSection('css')
        @yield('css')
    @endif

    <title>@yield('title', env('APP_NAME', 'Laravel'))</title>
</head>
<body>

<div class="min-vh-100">
    @include('layouts.main.header')
    @yield('content')
    @include('layouts.main.footer')
</div>


@include('partials.session-message')
@hasSection('js')
    @yield('js')
@endif
</body>
</html>
