<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script> 
        <script src='https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js'></script>
        <script defer src="/js/popup.js"></script>
        @show
        @section('scripts')
        @show
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