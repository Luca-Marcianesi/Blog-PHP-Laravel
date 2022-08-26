@extends('layouts.userLayout')

@section('title', 'I Miei Amici')

@section('content')
<div>
   

    @isset($amici)
    @isset($amicizie)

    <div>Amicizie Accettate</div>
    @foreach($amici as $amico)
    <div class="main_element">
        <div >Nome: {{$amico->name}}</div>
        <div >Cognome: {{$amico->surname}}</div>
        
        
    </div>     
    @endforeach
    <div>Amicizie sospese</div>
    @foreach($amicizie as $amicizia)
    <div class="main_element">
        <div > {{$amicizia->name}} {{$amicizia->surname}} ha chiesto di entrare nel tuo gruppo di amici</div>
        <div ><a href="{{ route('risposta',[$amicizia->id,true]) }}" class="highlight" >Accetta</a></div>
        <div ><a href="{{ route('risposta',[$amicizia->id,false]) }}" class="highlight" >Rifiuta</a></div>
        
    </div>     
    @endforeach

    <div>Amicizie rifiutate</div>
    @foreach($rifiutate as $rifiutata)
    <div class="main_element">
        <div > {{$rifiutata->name}} {{$rifiutata->surname}}</div>
        
    </div>     
    @endforeach

    @endisset()
    @endisset()
    
    
</div>
@endsection