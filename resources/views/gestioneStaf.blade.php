@extends('layouts.adminLayout')

@section('title', 'Gestione Staf')

@section('content')
<hr class="spaziaturahr">
<div  style="text-align: center; font-size: large">
    <div>
        <p class="titolo">In questa pagina potrai gestire il tuo staff!</p>
        <br>
        <br>
        <p class="sotto-titolo">
            Di seguito è riportato l'elenco degli utenti che fanno parte dello staff del sito
        </p>
        <br><br>
    </div> 

    @isset($staf)
    @if(count($staf)===0)
        <p class="sotto-titolo">Attualmente non sono presenti membri nello staff</p>
        @else
        @foreach($staf as $s)
            <div style="width: 400px; height: 220px; margin-left: 37%" class="contenitoreStaff">
                <p>Nome: {{$s->name}} <br> Cognome: {{$s->surname}}</p> <br>
                <a href="{{ route('modificaStaf',[$s->id]) }}"><button class="bottone_conferma">Modifica ►</button></a><br>
                <button class="bottone_elimina" onclick="togglePopupEliminaStaf()">Elimina ►</button>
            </div>
            <br>
            <br>

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
                <button class="bottone_conferma" style="cursor: pointer" onclick="togglePopupEliminaStaf()">Annulla</button>
                </div>
            </div>  
        </div>
        @include('pagination.paginator', ['paginator' => $staf])





    @endforeach
    @endif()
    @endisset()
    <hr class="spaziaturahr">
    <div>
        <p class="sotto-titolo">Se desideri aggiungere un nuovo membro allo staff puoi farlo qui:</p><br>
        <a href="{{ route('nuovoStaf') }}"><button class="bottone_conferma">Aggiungi ►</button></a>
    </div>
    
        
    
</div>
@endsection