@extends('layouts.stafLayout')


@section('title', 'Blog')

@section('content')
@isset($blog)
@isset($proprietario)

<p class="titolo">Informazioni generali</p>
<hr class="spaziaturahr">

<div style="width: 400px; height: 200px; margin-left: 37%; padding-top: 1%" class="contenitoreGestioneBlog">    
    <p>Proprietario del blog:<br> {{$proprietario->name}} {{$proprietario->surname}}</p><br>
    <p>Tema:{{$blog->tema}}</p><br>
    <a href="{{ route('inserisciMotivoBlog',$blog->id) }}"><button title="Elimina questo blog" class='bottone_elimina' >Elimina ►</button></a>
</div>
<br>
<br>

<div style="text-align: center">
<a href="{{ route('ricerca') }}"><button class="bottone_conferma">◄ Indietro</button></a>
</div>

<hr class="spaziaturahr">
<hr style="height: 1px; width: 100%; border-style: solid; border-color: black; border-width: 2px"></hr>

<br>
<br>

<p class="titolo">Posts</p>
<br>
<br>
<div style="text-align: center;">
    @isset($posts)
        @if(count($posts)== 0)
            <p class="sotto-titolo">
                Attualmente non è presente alcun post su questo blog
            </p>
        @else
        @foreach($posts as $post)
            <div style="width: 400px; height: 250px; margin-left: 37%; padding-top: 1%" class="contenitoreGestioneBlog">
                <p>
                    Autore: {{$post->name}} {{$post->surname}}
                    <br>
                    <br>
                    Data:{{$post->data}}
                    <br>
                    <br>
                    Contenuto: {{$post->testo}}
                </p>
                <br>
                <a href="{{ route('inserisciMotivoPost',[$post->id,$blog->id]) }}"><button title="Elimina questo post" class='bottone_elimina' >Elimina ►</button></a>
            </div>
            <br>
            <br>
        @endforeach
        @endif

    @endisset()
</div>
</div>

@endisset() 
@endisset()

@isset($blognt)
<div style="text-align: center">
    <p class="titolo">Il blog con Id = {{$blognt}} non esiste </p> <br> <br>
    <a href="{{ route('ricerca') }}"><button class="bottone_conferma">◄ Indietro</button></a>
</div>
@endisset

@endsection
