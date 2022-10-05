@extends('layouts.userLayout')

@section('title', 'Notifiche')

@section('content')
@isset($notifiche)
<hr class="spaziaturahr">
    @if(count($notifiche)===0)
    <div style="text-align: center; font-size: large">Attualmente non hai nessuna notifica</div>
    @else
    @foreach($notifiche as $notifica)
    <div class="main_element" style="text-align:center; font-size: large">
        Data: {{ $notifica->data }}<br>
        Testo: {{ $notifica->messaggio }}<br>
        <div><p onclick="togglePopupEliminaNotifica()" style="cursor: pointer">Elimina</p></div>
        <div><a href="{{ route('archiviaNotifica',[$notifica->id]) }}" class="highlight">Archivia</a></div>
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
            </div>
        </div>  
    </div>
    @endforeach
    @endif
@endisset()
<hr class="spaziaturahr">

@isset($archiviate)
<div style="text-align: center; font-size: large; color: rebeccapurple">
    <p onclick="togglePopupNotifiche()" style="cursor: pointer">Visualizza notifiche archiviate</p>
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
                    <h3>Di seguito troverai la lista delle notifiche da te archiviate</h3><br>
                    Messaggio: {{$archiviata->messaggio}}
                </div>
                <br>
                <br>
            @endforeach
            @endif
        </div>
</div>
@endisset()


@endsection
