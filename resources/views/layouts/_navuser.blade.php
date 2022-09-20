<ul>
    <li><a href="{{ route('home') }}" title="Va alla Home del sito">Home Sito</a></li>
    <li><a href="{{ route('newBlog') }}" title="Crea un nuovo blog">Nuovo Blog</a></li>
    <li><a href="{{ route('myBlogs') }}" title="Visualizza i tuoi blog">I miei Blog</a></li>
    <li><a href="{{ route('amici') }}" title="Visualizza le tue amicizie">Amici</a></li>
    <li><a href="{{ route('notifiche') }}" title="Controlla le tue notifiche">Notifiche</a></li>
    <li><a href="{{ route('profilo') }}" title="Visualizza le informazioni sul tuo profilo">Profilo</a></li>
    <li><a href="{{ route('user') }}" title="Trova i tuoi amici">Cerca</a></li>

    @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth    
</ul>
   