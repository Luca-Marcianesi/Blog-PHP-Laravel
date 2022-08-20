<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <script defer src="/js/popup.js"></script>
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
            <div class="popup" id="popuplog">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup1()">&times;</div>
                    @include('auth/login')
                </div>
            </div>
            <div class="popup" id="popupreg">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup2()">&times;</div>
                    @include('auth/register')
                </div>
            </div>

            

        <footer id="footer">
            <h1>footer</h1>
        </footer>     
    </body>
</html>