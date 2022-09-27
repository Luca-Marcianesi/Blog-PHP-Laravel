
@extends('layouts.stafLayout')

@section('title', 'Attività Utente')
@section('content')


<div style="text-align: center; font-size: large">
        @isset($user)
            Nome: {{ $user->name }}<br>
            Cognome: {{ $user->surname }}
        @endisset()

        <hr class="spaziaturahr">
        Di seguito sono elencati i blog creati dall'utente
        <br>
        <br>
        @isset($blogs)
            @if(count($blogs)===0)
                Attualmente non ha creato nessun blog
                @else
                @foreach($blogs as $blog)
                    <div>
                        Tema: {{ $blog->tema }}<br>
                    </div>
                    <br>
                @endforeach
            @endif()
        @endisset()

        <hr class="spaziaturahr">
        Di seguito sono elencati i post fatti dall'utente
        <br>
        <br>

        @isset($posts)
            @if(count($posts)===0)
                Attualmente l'utente non ha effettuato nessun post
                @else
                @foreach($posts as $post)
                    <div>
                        Testo: {{ $post->testo }} nel blog {{ $post->tema }}
                    </div>
                    <br>
                @endforeach
            @endif()
        @endisset()
</div>

@endsection



