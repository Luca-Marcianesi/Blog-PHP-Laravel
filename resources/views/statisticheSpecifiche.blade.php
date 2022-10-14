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
    <p class="sotto-titolo">Fino ad ora "{{$utente->name}} {{$utente->surname}}" ha ricevuto {{$numero}} richieste:
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
    <p class="sotto-titolo">Il gruppo di amici di "{{$utente->name}} {{$utente->surname}}" [{{$utente->username}}]:</p>
    <hr class="spaziaturahr">
    @foreach($gruppoAmici as $amico)
    <div style="width: 600px; margin-left: 30%" class="contenitoreStatistiche">
        <p>Nome: {{$amico->name}} Cognome: {{$amico->surname}}</p>
    </div>
    <hr class="spaziaturahr">
    @endforeach 
    @endisset()

    
    @endisset() 
    @isset($utentent)
    <p class="titolo">
        L'Utente "{{$utentent}}" da te cercato non è stato trovato, riprova!
    </p>
    <br>
    <br>
    <a href="{{ route('statistiche') }}"><button class="bottone_conferma">Torna alle statistiche</button></a>
    @endisset()

</div>
@endsection