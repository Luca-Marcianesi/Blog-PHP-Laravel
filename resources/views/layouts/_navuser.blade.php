<ul>
    <li><a href="{{ route('home') }}" title="Va alla Home del sito">Home Sito</a></li>
    <li><a href="{{ route('newBlog') }}" title="Azione1">Nuovo Blog</a></li>
    <li><a href="{{ route('myBlogs') }}" title="Azione2">I miei Blog</a></li>
    <li><a href="{{ route('user') }}" title="Azione3">Azione3</a></li>
    @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth    
</ul>
   