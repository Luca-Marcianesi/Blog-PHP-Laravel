<ul>
    <li><a href="{{ route('home') }}" title="Vai alla pagina Home del sito">Home Sito</a></li>
    <li><a href="{{ route('staf') }}" title="Vai alla pagina di benvenuto">Home Staf</a></li>
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
