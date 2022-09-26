@extends('layouts.userLayout')

@section('title', 'I Miei Amici')

@section('content')
<hr class="spaziaturahr">
<div>
    <h1 style="text-align: center">Questa è la lista delle tue amicizie</h1>
    <br>

    @isset($amici)
    @foreach($amici as $amico)
    <div class="main_element" style="text-align: center; font-size: large">
        <div >Nome: {{$amico->name}}<br> Cognome: {{$amico->surname}}</div>
        <div>L'amicizia è stata chiesta il {{$amico->data}}</div>

        <div ><a href="{{ route('visualizzaProfilo',[$amico->user_id]) }}" class="highlight" >Visualizza Profilo</a></div>
        <div ><a href="{{ route('eliminaAmico',[$amico->amicizia_id,$amico->user_id]) }}" class="highlight">Elimina Amicizia</a></div>   
    </div>
    <hr class="spaziaturahr"> 
    @endforeach 
    @endisset() 
    <div style="text-align: center; font-size: large">Amicizie sospese:
    </div>
    
    @isset($richieste)
    @foreach($richieste as $richiesta)
    <div class="main_element">
        <div > {{$richiesta->name}} {{$richiesta->surname}} ha chiesto di entrare nel tuo gruppo di amici</div>
        <div ><a href="{{ route('risposta',[$richiesta->id,true]) }}" class="highlight" >Accetta</a></div>
        <div ><a href="{{ route('risposta',[$richiesta->id,false]) }}" class="highlight" >Rifiuta</a></div>     
    </div>     
    @endforeach

    @empty($richieste->first)
    <div class="main_element" style="text-align: center; font-size: large">
        <div>Nessuna amicizia sospesa</div>  
    </div>   
    @endempty
    @endisset() 
    <hr class="spaziaturahr">
    <div style="text-align: center; font-size: large">Amicizie rifiutate:</div>

    @isset($rifiutate)
    
    
    @foreach($rifiutate as $rifiutata)
    <div class="main_element" style="text-align: center; font-size: large">
        <div>{{$rifiutata->name}} {{$rifiutata->surname}}</div>
        
    </div>     
    @endforeach
    @empty($rifiutate->first)
    <div class="main_element" style="text-align: center; font-size: large">
        <div>Nessuna richiesta rifiutata</div>  
    </div>   
    @endempty
    @endisset()
    
    
</div>
@endsection