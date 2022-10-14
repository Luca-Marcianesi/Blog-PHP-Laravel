
@extends('layouts.stafLayout')

@section('title', 'Attività Utente')
@section('content')

@isset($user)
@isset($blogs)
@isset($posts)

<div style="text-align: center">
        <p class="titolo">L'utente da te cercato è il seguente: </p> <br> <br>
        <div style="width: 300px; margin-left: 40%" class="contenitoreAttivitaUtente">
            Nome: {{ $user->name }}<br>
            Cognome: {{ $user->surname }}
        </div>
        <hr class="spaziaturahr">
        <p class="titolo">Di seguito sono elencati i blog creati dall'utente</p>
        <br>
        <br>
        
            @if(count($blogs)===0)
                <p class="sotto-titolo">Attualmente non ha creato nessun blog</p>
                @else
                @foreach($blogs as $blog)
                    <div style="width: 700px; margin-left: 27%" class="contenitoreAttivitaUtente">
                        Tema: {{ $blog->tema }}
                        <br>
                    </div>
                    <br>
                @endforeach
            @endif()
        
        <hr class="spaziaturahr">
        <p class="titolo">Di seguito sono elencati i post fatti dall'utente</p>
        <br>
        <br>

        
            @if(count($posts)===0)
                <p class="sotto-titolo">Attualmente l'utente non ha effettuato nessun post</p>
                @else
                @foreach($posts as $post)
                    <div style="margin-left: 27%; width: 700px" class="contenitoreAttivitaUtente">
                        Testo: {{ $post->testo }} ► nel blog {{ $post->tema }}
                    </div>
                    <br>
                @endforeach
            @endif()
        
</div>

@endisset()
@endisset()
@endisset()

@isset($utentent)
<div style="text-align: center">
    <p class="titolo">L'utente con Id = {{$utentent}} non esiste</p> <br><br>
    <a href="{{ route('ricerca') }}"><button class="bottone_conferma">Torna alla pagina di ricerca</button></a>
</div>
@endisset
@endsection



