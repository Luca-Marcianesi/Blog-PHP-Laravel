<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scalee=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <script defer src="/js/popup.js"></script>
        <title> Blog | @yield('title', 'Home')</title>
    </head>
    <body>
        <nav id="nav">
            @include('layouts/_navpublic')
        </nav>

        <div class="main-content">
            @yield('content')
        </div>

        @include('layouts/footer')
    </body>
</html>