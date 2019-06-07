<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
@include('includes.navbarGuest')
@include('includes.jumbo')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            @include('includes.msg')
        </div>
    </div>
</div>

<body>
    <div id="app">
        <div class="container-full-bg">
            @yield('content')
        </div>
    </div>
    @include('includes.footer')
</body>

</html>
