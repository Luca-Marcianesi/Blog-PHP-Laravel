@extends('layouts.userLayout')

@section('title', 'I Miei Amici')

@section('content')
<div>
   

    

    <div>Amicizie Accettate</div>

    @isset($amici)
    @foreach($amici as $amico)
    <div class="main_element">
        <div >Nome: {{$amico->name}} Cognome: {{$amico->surname}}</div>
        <div>L'amicizia è stata chiesta il {{$amico->data}}</div>

        <div ><a href="{{ route('visualizzaProfilo',[$amico->user_id]) }}" class="highlight" >Visualizza Profilo</a></div>
        <div ><a href="{{ route('eliminaAmico',[$amico->amicizia_id,$amico->user_id]) }}" class="highlight" >Elimina Amicizia</a></div>
        
        
    </div>
    @endforeach 
    @endisset() 
    
    <br>
    <div>Amicizie sospese</div>

    @isset($richieste)
    @foreach($richieste as $richiesta)
    <div class="main_element">
        <div > {{$richiesta->name}} {{$richiesta->surname}} ha chiesto di entrare nel tuo gruppo di amici</div>
        <div ><a href="{{ route('risposta',[$richiesta->id,true]) }}" class="highlight" >Accetta</a></div>
        <div ><a href="{{ route('risposta',[$richiesta->id,false]) }}" class="highlight" >Rifiuta</a></div>
        
    </div>     
    @endforeach
    @endisset() 

    <br>
    <div>Amicizie rifiutate</div>

    @isset($rifiutate)
    @foreach($rifiutate as $rifiutata)
    <div class="main_element">
        <div > {{$rifiutata->name}} {{$rifiutata->surname}}</div>
        
    </div>     
    @endforeach
    @endisset()
    
    
</div>
@endsection