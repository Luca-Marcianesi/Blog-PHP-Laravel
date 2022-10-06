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

    @isset($staf)
    @if(count($staf)===0)
        Attualmente non sono presenti membri nello staff
        @else
        @foreach($staf as $s)
            <div class="main_element">
                <div>Nome: {{$s->name}} <br> Cognome: {{$s->surname}}</div> <br>
                <div><a href="{{ route('modificaStaf',[$s->id]) }}"><button class="bottone_conferma">Modifica</button></a></div>
                <div>
                    <button class="bottone_conferma" onclick="togglePopupEliminaStaf()">Elimina</button>
                </div>
                <hr class="spaziaturahr">
            </div>

        <div id="elimina-staf" class="popup">
            <div class="overlay"></div>
            <div class="content">
                <div class="close-btn" onclick="togglePopupEliminaStaf()">&times;</div>
                <br>
                <h2>Conferma</h1>
                <br>
                <div style="text-align: center; font-size: large">
                    Sei sicuro di voler eliminare "{{ $s->name }} {{ $s->surname }}" dallo staff?
                </div>
                <br> <br>
                <div>
                <a href="{{ route('eliminaStaf', $s->id) }}"><button class="bottone_conferma">Si</button></a>
                </div>
            </div>  
        </div>





    @endforeach
    @endif()
    @endisset()
    <hr class="spaziaturahr">
    <div>
        <h3>Se desideri aggiungere un nuovo membro allo staff puoi farlo qui:</h3><br>
        <a href="{{ route('nuovoStaf') }}"><button class="bottone_conferma">Aggiungi</button></a>
    </div>
    
        
    
</div>
@endsection