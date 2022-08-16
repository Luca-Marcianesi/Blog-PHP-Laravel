<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>LaProj5 | @yield('title', 'User')</title>
    </head>
    <body>
        <section id="main">
            <nav id="nav">
                @include('layouts/_navuser')
            </nav>
            <section id="main_content">
                @yield('content')
            </section>
    </body>
</html>