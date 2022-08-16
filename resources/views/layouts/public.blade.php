<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>Home</title>
    </head>
    <body>
            <nav id="nav">
                @include('layouts/_navpublic')
            </nav>
            <section  id="main_content">
                <div class="main_element">
                    <h1 >main content</h1>
                </div>
                
                <div class="main_element ">
                    chi siamo
                </div>
                <div class="main_element">
                    cosa facciamo
                </div>
            </section>
            @guest
            <section id="register_main">
                @include('auth/register_main')
            </section>
            @endguest

        <footer id="footer">
            <h1>footer</h1>
        </footer>     
    </body>
</html>