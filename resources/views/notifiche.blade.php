@extends('layouts.userLayout')

@section('title', 'Notifiche')

@section('content')

<br>
<br>
<p class="titolo"> Questa è la pagina dedicata alle tue notifiche </p>
@isset($amicizieRicevute)
@if(count($amicizieRicevute)==0)
    <div class="main_element" style="text-align: center; font-size: large">
        <p class="sotto-titolo">Nessuna richiesta di amicizia ricevuta</p>  
    </div>

    @else
    @foreach($amicizieRicevute as $amicizia)
    <div class="main_element" style="text-align:center; font-size: large">
        <div> {{$amicizia->name}} {{$amicizia->surname}} ha chiesto di entrare nel tuo gruppo di amici</div>
        <a href="{{ route('rispostaAmicizia',[$amicizia->id,true]) }}" ><button class="bottone_conferma">Accetta</button></a>
        <a href="{{ route('rispostaAmicizia',[$amicizia->id,false]) }}" > <button class="bottone_conferma">Rifiuta</button> </a>    
    </div>     
    @endforeach
    @endif
@endisset()


@isset($notifiche)
<hr class="spaziaturahr">
    @if(count($notifiche)===0)
    <div style="text-align: center; font-size: large">
        <p class="sotto-titolo">Attualmente non hai nessuna notifica</p>
    </div>
    @else
    @foreach($notifiche as $notifica)
    <div class="main_element" style="text-align:center; font-size: large">
        Data: {{ $notifica->data }}<br>
        Testo: {{ $notifica->messaggio }}<br>
        <div><button class="bottone_conferma" onclick="togglePopupEliminaNotifica()">Elimina</button></div>
        <div><a href="{{ route('archiviaNotifica',[$notifica->id]) }}"><button class="bottone_conferma">Archivia</button></a></div>
    </div>


    

    <div id="elimina-notifica" class="popup">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopupEliminaNotifica()">&times;</div>
            <br>
            <h2>Conferma</h1>
            <br>
            <div style="text-align: center; font-size: large">
                Sei sicuro di voler cancellare questa notifica?
            </div>
            <br> <br>
            <div>
            <a href="{{ route('eliminaNotifica', $notifica->id) }}"><button class="bottone_conferma">Si</button></a>
            <button class="bottone_conferma" style="cursor: pointer" onclick="togglePopupEliminaNotifica()">Annulla</button>
            </div>
        </div>  
    </div>
    @endforeach
    @endif
@endisset()
<hr class="spaziaturahr">

@isset($archiviate)
<div style="text-align: center; font-size: large; color: rebeccapurple">
    <button class="bottone_conferma" onclick="togglePopupNotifiche()">Visualizza notifiche archiviate ►</button>
</div>

<div id="notifiche-Archiviate" class="popup">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopupNotifiche()">&times;</div>
            <br>
            <h2>Notifiche Archiviate</h1>
            <br>
            @if(count($archiviate)===0)
                <div style="text-align: center; font-size: large;">
                    Attualmente non hai <br> nessuna notifica archiviata
                </div>
            @else
            @foreach($archiviate as $archiviata)
                <div style="text-align: center; font-size: large">
                    <h3>La lista delle notifiche da te archiviate</h3><br>
                    Messaggio: {{$archiviata->messaggio}}
                </div>
                <br>
                <br>
            @endforeach
            @endif
            <br>
            <div>
            <button class="bottone_conferma" style="cursor: pointer" onclick="togglePopupNotifiche()">Chiudi</button>
            </div>
        </div>
</div>
@endisset()


@endsection
