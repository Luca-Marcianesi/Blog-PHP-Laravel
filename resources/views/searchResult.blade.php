@extends('layouts.userLayout')

@section('title', 'Risultati')

@section('content')
<br>
<br>
<p class="titolo">I risultati della tua ricerca:</p>
<hr class="spaziaturahr">
<div style="text-align: center; font-size: 18px">
   
    @isset($users)

    @if(count($users)== 0)
    <div><p>Nessun utente corrisponde alle tue specifiche</p></div>
    @endif

    @foreach($users as $user)
    <div class="contenitore_utenti_cercati">
        <div class="">Nome: {{$user->name}}</div><br>
        <div class="">Cognome: {{$user->surname}}</div><br>
        @can('isFriend',$user->id)
        <div class="">Email: {{$user->email}}</div><br>
        <div class="">Username: {{$user->username}}</div><br>
        <div class="">Data di nascita: {{$user->data_nascita}}</div><br>
        <div class="">Bio: {{$user->descrizione}}</div><br>

        <p class="sotto-titolo">Siete amici<br><br><a href="{{ route('visualizzaProfilo', [$user->id])}}"><button class="bottone_conferma">Visualizza profilo ►</button></a></p><br>
        @else
        <p class="sotto-titolo">Non siete amici</p><br>
        <a href="{{ route('inviaAmicizia',$user->id) }}" title="richiesta"><button class="bottone_conferma">Invia richiesta ►</button></a>
        @endcan()
        <br>
        <br>
    </div>
    <hr class="spaziaturahr">         
    @endforeach

    @endisset()
    
    
</div>
@endsection