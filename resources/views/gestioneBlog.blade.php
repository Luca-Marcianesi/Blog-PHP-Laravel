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
    <a href="{{ route('inserisciMotivoBlog',$blog->id) }}"><button title="Elimina questo blog" class='bottone_elimina' >Elimina</button></a>

</div>
<hr class="spaziaturahr">



<hr class="spaziaturahr">

<p class="titolo">Posts</p>
<br>
<br>
<div style="text-align: center;">
    @isset($posts)
        @foreach($posts as $post)
            <div style="width: 300px; height: 150px; margin-left: 40%; padding-top: 1%" class="contenitoreGestioneBlog">
                <p>
                    Autore: {{$post->name}} {{$post->surname}}
                    <br>
                    Data:{{$post->data}}
                    <br>
                    Contenuto:<br>{{$post->testo}}
                </p>
                <a href="{{ route('inserisciMotivoPost',[$post->id,$blog->id]) }}"><button title="Elimina questo post" class='bottone_elimina' >Elimina</button></a>
            </div>
            <hr class="spaziaturahr">
        @endforeach
        @if(count($posts)== 0)
            <p>
                Non sono stati pubblicati ancora post
            </p>
        @endif()

    @endisset()
</div>
</div>

@endisset() 
@endisset()

@isset($blognt)
<div style="text-align: center">
    <p class="titolo">Il blog con Id = {{$blognt}} non esiste </p> <br> <br>
    <a href="{{ route('ricerca') }}"><button class="bottone_conferma">Torna alla pagina di ricerca</button></a>
</div>
@endisset

@endsection
