<ul>
    <li><a href="{{ route('home') }}" title="Torna alla home del sito">Home</a></li>
    <li><a href="{{ route('who') }}" title="Il nostro profilo aziendale">Chi siamo</a></li>
    <li><a href="{{ route('where') }}" title="Dove trovarci">Dove Siamo</a></li>
    <li><a href="mailto:info@blog+.it" title="Mandaci un messaggio">Contattaci</a></li>
    @can('isAdmin')
        <li><a href="{{ route('admin') }}" class="highlight" title="Vai alla pagina di benvenuto">Home Admin</a></li>
    @endcan
    @can('isUser')
        <li><a href="{{ route('user') }}" class="highlight" title="Vai alla pagina di benvenuto">Home User</a></li>
    @endcan
    @can('isStaf')
        <li><a href="{{ route('staf') }}" class="highlight" title="Vai alla pagina di benvenuto">Home Staf</a></li>
    @endcan
    @auth
        <li><a href="" title="Esci dalla tua area riservata" class="highlight" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth    
    @guest
        <li><a href="{{ route('login') }}" class="highlight" title="Accedi">Accedi</a> </li>  
    @endguest
</ul>
