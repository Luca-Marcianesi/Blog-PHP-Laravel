@extends('layouts.userLayout')

@section('title', 'I Miei Amici')

@section('content')
<hr class="spaziaturahr">
<div>
    <h1 class ="prova-titolo" style="text-align: center">Questa è la lista delle tue amicizie</h1>
    <br>

    @isset($amici)
    @if(count($amici)===0)
    <div style="text-align: center; font-size: large">Attualmente la tua lista amici è vuota</div>
    @else
    @foreach($amici as $amico)
    <div class="main_element" style="text-align: center; font-size: large">
        <div class ="prova" >Nome: {{$amico->name}}<br> Cognome: {{$amico->surname}}</div>
        <div class ="prova">L'amicizia è stata chiesta il {{$amico->data}}</div>

        <div ><a href="{{ route('visualizzaProfilo',[$amico->user_id]) }}"><button class="bottone_conferma">Visualizza Profilo</button></a></div>
        <div ><a href="{{ route('eliminaAmico',[$amico->amicizia_id,$amico->user_id]) }}"><button class="bottone_conferma">Elimina Amicizia</button></a></div>
        <br>    
    </div>
    @endforeach

    @include('pagination.paginator', ['paginator' => $amici])
    @endif
    @endisset()     
   
    <hr class="spaziaturahr">
    <div style="text-align: center; font-size: large">Amicizie rifiutate:</div>

    @isset($rifiutate)
    @if(count($rifiutate)===0)
    <div class="main_element" style="text-align: center; font-size: large"> Nessuna richiesta rifiutata </div>
    @else
    @foreach($rifiutate as $rifiutata)
    <div class="main_element" style="text-align: center; font-size: large">
        <div>{{$rifiutata->name}} {{$rifiutata->surname}}</div>    
    </div>     
    @endforeach
    @endif
    @endisset()
    
    
</div>
@endsection