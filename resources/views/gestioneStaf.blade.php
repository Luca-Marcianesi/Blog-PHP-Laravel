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
    @if(count($staf)===0)
        Attualmente non sono presenti membri nello staff
        @else
        @foreach($staf as $s)
            <div class="main_element">
                <div>Nome: {{$s->name}} <br> Cognome: {{$s->surname}}</div> <br>
                <div><a href="{{ route('modificaStaf',[$s->id]) }}" class="highlight" >Modifica</a></div>
                <div><a href="{{ route('eliminaStaf',[$s->id]) }}" class="highlight" >Elimina</a></div>
                <hr class="spaziaturahr">
            </div>
    @endforeach
    @endif()
    @endisset()
    <hr class="spaziaturahr">
    <div>
        <h3>Se desideri aggiungere un nuovo membro allo staff puoi farlo qui: <br> <br>
        <a href="{{ route('nuovoStaf') }}" class="highlight" >Aggiungi  un membro allo staff</a>
    </div>
    
        
    
</div>
@endsection