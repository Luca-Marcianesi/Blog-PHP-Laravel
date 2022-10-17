<ul>
    <li><a href="{{ route('home') }}" title="Torna alla pagina Home del sito">Home Sito</a></li>
    <li><a href="{{ route('admin') }}" title="Vai alla pagina di benvenuto">Home Admin</a></li>
    <li><a href="{{ route('gestioneStaf') }}" title="Gestisci lo staff del sito">Gestione Staf</a></li>
    <li><a href="{{ route('statistiche') }}" title="Vai alla pagina delle statistiche">Statistiche</a></li>
    <li><a href="{{ route('ricerca') }}" title="Vai alla pagina di ricerca">Ricerca</a></li>
    
    @auth
        <li><a href="" class="highlight" title="Esci dalla tua area riservata" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth    
</ul>
   