@extends('layouts.adminLayout')

@section('title', 'Statistiche Specifiche ')

@section('content')
<hr class="spaziaturahr">
<div>

    @isset($utente)
    @isset($amicizie)
    @isset($numero)

    <p class="titolo">Queste sono le richieste di amicizia ricevute da "{{$utente->name}} {{$utente->surname}}" [{{$utente->username}}]
    <br>
    <br>
    <p class="sotto-titolo">Fino ad ora "{{$utente->name}} {{$utente->surname}}" ha ricevuto {{$numero}} richieste
    @endisset()
    <hr class="spaziaturahr">
    @foreach($amicizie as $amicizia)
    <div style="width: 500px; margin-left: 34%" class="contenitoreStatistiche">
        <p>Utente: {{$amicizia->name}} {{$amicizia->surname}}</p>
        <p>
            @if($amicizia->stato)
                Amicizia accettata
            @else
                Amicizia rifiutata
            @endif
        </p>  
    </div>
    <hr class="spaziaturahr">
    @endforeach 
    @endisset() 


    @isset($gruppoAmici)

    <p class="titolo">Queste sono le informazioni correnti sugli amici di "{{$utente->name}} {{$utente->surname}}" </p>
    <br>
    <br>
    <p class="sotto-titolo">Il gruppo di amici di "{{$utente->name}} {{$utente->surname}}" [{{$utente->username}}]</p>
    <hr class="spaziaturahr">
    @foreach($gruppoAmici as $amico)
    <div style="width: 600px; margin-left: 30%" class="contenitoreStatistiche">
        <p>Nome: {{$amico->name}} Cognome: {{$amico->surname}}</p>
    </div>
    <br>
    <br>
    @endforeach 
    @endisset()
    @endisset()

    <br>

    @isset($utentent)
    <p class="titolo">
        L'Utente "{{$utentent}}" da te cercato non è stato trovato, riprova!
    </p>
    <br>
    <br>
    <div style="text-align: center">
    <a href="{{ route('statistiche') }}"><button class="bottone_conferma">◄ Indietro</button></a>
    </div>
    @endisset()

    <div style="text-align: center">
        <a href="{{ route('amici') }}"><button class='bottone_conferma'>◄ Indietro</button></a>
    </div>

    

</div>
@endsection