@extends('layouts.adminLayout')

@section('title', 'Gestione Staf')

@section('content')
<div>
   
    spazio
    <br>
    <br>

    <div ><a href="{{ route('nuovoStaf') }}" class="highlight" >Aggiungi  un membro allo staf</a></div>

    <div>Membri dello staf</div>

    @isset($staf)
    @foreach($staf as $s)
    <div class="main_element">
        <div >Nome: {{$s->name}} Cognome: {{$s->surname}}</div>

        <div ><a href="{{ route('modificaStaf',[$s->id]) }}" class="highlight" >Modifica </a></div>
        <div ><a href="{{ route('eliminaStaf',[$s->id]) }}" class="highlight" >Elimina </a></div>
        
        
    </div>
    @endforeach 
    @endisset() 

    
        
    
</div>
@endsection