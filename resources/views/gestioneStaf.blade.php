@extends('layouts.adminLayout')

@section('title', 'Gestione Staf')

@section('content')
<hr class="spaziaturahr">
<div  style="text-align: center; font-size: large">
    <div>
        <h1>In questa pagina potrai gestire il tuo staff!</h1>
        <br>
        <br>
        <h2>Di seguito è riportato l'elenco degli utenti che fanno parte dello staff del sito <br><br>
    </div> 
<div>
>>>>>>> 3067e78964f40b5e94a495e4b18d7f67c3c1b255

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