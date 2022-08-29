<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <script defer src="/js/popup.js"></script>
        <title>LaProj5 | @yield('title', 'User')</title>
    </head>
    <body>
        <nav id="nav">
            @include('layouts/_navuser')
        </nav>

        <div class="main-content">
            @yield('content')
        </div>

        @include('layouts/footer')
    </body>
</html>