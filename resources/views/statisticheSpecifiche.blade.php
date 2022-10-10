@extends('layouts.adminLayout')

@section('title', 'Statistiche Specifiche ')

@section('content')
<hr class="spaziaturahr">
<div style="text-align: center; font-size: large">

    @isset($utente)
    @isset($amicizie)
    @isset($numero)


    Le richieste ricevute da {{$utente->name}} {{$utente->surname}} [{{$utente->username}}] :{{$numero}}
    @endisset()

    @foreach($amicizie as $amicizia)
    <div class="main_element">
        <div >Utente: {{$amicizia->name}} {{$amicizia->surname}}</div>
        <div>
            @if($amicizia->stato)
                Amicizia
            @else
                Amicizia rifiutata
            @endif
        </div>  
    </div>
    @endforeach 
    @endisset() 


    @isset($gruppoAmici)

    Il gruppo di amici di {{$utente->name}} {{$utente->surname}} [{{$utente->username}}]
    @foreach($gruppoAmici as $amico)
    <div class="main_element">
        <div>Nome: {{$amico->name}} Cognome: {{$amico->surname}}</div>
        
        
    </div>
    @endforeach 
    @endisset()

    
    @endisset() 
    @isset($utentent)
    <div>L'Utente {{$utentent}} da te cercato non è stato trovato, riprova!</div>
    @endisset() 

    
        
    
</div>
@endsection