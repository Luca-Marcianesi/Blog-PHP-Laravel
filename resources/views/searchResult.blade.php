@extends('layouts.userLayout')

@section('title', 'Risultati')

@section('content')
<div>
   

    @isset($users)

    @if(count($users)== 0)
    <div><p>Nessun utente corrisponde alle tue specifiche</p></div>
    @endif

    @foreach($users as $user)
    <div class="user" style=" font-size: large">
        <div class="">Nome: {{$user->name}}</div><br>
        <div class="">Cognome: {{$user->surname}}</div><br>
        @can('isFriend',$user->id)
        <div class="">Email: {{$user->email}}</div><br>
        <div class="">Username: {{$user->username}}</div><br>
        <div class="">Data di nascita: {{$user->data_nascita}}</div><br>
        <div class="">Bio: {{$user->descrizione}}</div><br>


       
        <p> Siete amici<a href="{{ route('visualizzaProfilo', [$user->id])}}">Visualizza profilo</a></p>
        @else
        <p>Non siete amici</p>
        <a href="{{ route('sedRequest',$user->id) }}" title="richiesta">Invia richiesta</a>
        @endcan()
    </div>         
    @endforeach

    @endisset()
    
    
</div>
@endsection