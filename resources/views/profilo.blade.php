@extends('layouts.userLayout')

@section('title', 'Profilo')

@section('content')
<br>
<br>
<div style="text-align: center; font-size: large">
    <div>
        <p class="titolo"> Il tuo profilo utente </p>
        <br>
        <br>
        <p class="sotto-titolo">Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname}}!</p>
        <div style="text-align: center; font-size: large">
        @if(Auth::user()->visibilita)
            <p class="sotto-titolo">Attualmente il tuo account è visibile a tutti.</p><br>
        @else
            <p class="sotto-titolo">Attualmente il tuo account è visibile solo ai tuoi amici.</p><br>
        @endif()
        </div>
        <p class="sotto-titolo">Di seguito sono riportati i tuoi dati inseriti in fase di registrazione:</p>

        <hr class="spaziaturahr"></hr>

        <div class="contenitoredatiprofilo">
            <p>Nome: {{ Auth::user()->name}}</p><br>
            <p>Cognome: {{ Auth::user()->surname}}</p><br>
            <p>E-Mail: {{ Auth::user()->email}}</p><br>
            <p>Data di nascita: {{ Auth::user()->data_nascita}}</p><br>
        </div>
        <br>
        <div class="contenitorebiografia">
            <p>Biografia: {{ Auth::user()->descrizione}}
        </div>
        <br>
    </div>

    <br>

    <div style="text-align: center">
        <p class="sotto-titolo">Se desideri modificare i dati del tuo profilo clicca qui sotto!</p>
        <br>
        <a href="{{route('modificaProfilo')}}"><button class="bottone_conferma">Modifica Profilo ►</button></a>
    </div>

    <br>
    <br>

    <div style="text-align: center">
        <p class="sotto-titolo">Se desideri modificare la password del tuo account clicca qui sotto!</p>
        <br>
        <a href="{{ route('getmodificaUserPassword')}}"><button class="bottone_conferma">Modifica Password ►</button></a>
    </div>
</div>

        
@endsection
