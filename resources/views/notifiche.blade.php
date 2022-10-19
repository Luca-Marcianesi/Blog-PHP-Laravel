@extends('layouts.userLayout')

@section('title', 'Notifiche')

@section('content')

<br>
<br>
<p class="titolo"> Questa è la pagina dedicata alle tue notifiche </p>
<br>
<br>

@isset($amicizieRicevute)
@if(count($amicizieRicevute)==0)
    <div class="main_element" style="text-align: center; font-size: large">
        <p class="sotto-titolo">Nessuna richiesta di amicizia ricevuta</p>  
    </div>

    @else
    @foreach($amicizieRicevute as $amicizia)
    <div class="contenitoreNotificaDiAmicizia">
        <p>L'utente "{{$amicizia->name}} {{$amicizia->surname}}" ha chiesto di entrare nel tuo gruppo di amici</p>
        <a href="{{ route('rispostaAmicizia',[$amicizia->id,true]) }}" ><button class="bottone_conferma">Accetta</button></a>
        <a href="{{ route('rispostaAmicizia',[$amicizia->id,false]) }}" > <button class="bottone_conferma">Rifiuta</button> </a>    
    </div>     
    @endforeach
    @endif
@endisset()


@isset($notifiche)
<br>
<br>
    @if(count($notifiche)===0)
    <div style="text-align: center; font-size: large">
        <p class="sotto-titolo">Attualmente non hai nessuna notifica</p>
    </div>
    @else
    @foreach($notifiche as $notifica)
    <div class="contenitoreNotifiche">
        Data: {{ $notifica->data }}<br>
        Testo: {{ $notifica->messaggio }}<br>
        <br>
        <div><a href="{{ route('archiviaNotifica',[$notifica->id]) }}"><button class="bottone_conferma">Archivia</button></a></div>
    </div>
    <br>
    <br>

    @endforeach
    @endif
@endisset()

<hr class="spaziaturahr">

@isset($archiviate)
<div style="text-align: center; font-size: large; color: rebeccapurple">
    <button title="Clicca per visualizzare la lista delle notifiche da te archiviate" class="bottone_conferma" onclick="togglePopupNotifiche()">Visualizza notifiche archiviate ►</button>
</div>

<div id="notifiche-Archiviate" class="popup">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" onclick="togglePopupNotifiche()">&times;</div>
            <br>
            <p class="titolo">Notifiche Archiviate</p>
            @if(count($archiviate)===0)
                <div>
                    <p style="font-size: 18px; color: black">Attualmente non hai <br> nessuna notifica archiviata</p>
                </div>
            @else
            <p style="font-size: 18px">La lista delle notifiche da te archiviate:</p><br>
            @foreach($archiviate as $archiviata)
                <div style="text-align: center; font-size: 18px">
                    <div style="border-style: solid; border-width: 4px; border-color: black">
                    Messaggio: {{$archiviata->messaggio}}<br>
                    Ricevuto il: {{$archiviata->data}}<br>
                    <a href= "{{ route('eliminaNotifica',[$archiviata->id]) }}"><button class="bottone_elimina">Elimina</button></a>
                    </div>
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
