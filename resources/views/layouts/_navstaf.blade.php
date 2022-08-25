<ul>
    <li><a href="{{ route('who') }}" title="Il nostro profilo aziendale">Chi siamo</a></li>
    <li><a href="{{ route('where') }}" title="Dove trovarci">Dove Siamo</a></li>
    <li><a href="mailto:info@blog+.it" title="Mandaci un messaggio">Contattaci</a></li>
    <li><a href="{{ route('home') }}" class="highlight" title="Home Sito">Home Sito</a></li>
    @auth
        <li><a href="" title="Esci dal sito" class="highlight" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth    
    @guest
        <li><a href="{{ route('login') }}" class="highlight" title="Accedi">Accedi</a> </li>  
    @endguest
</ul>
