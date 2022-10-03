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
        <div ><a href="{{ route('eliminaNotifica',[$notifica->id]) }}" class="highlight">Elimina</a></div>
        <hr class="spaziaturahr">
    </div>     
    @endforeach
    @endif
    @endisset() 

@endsection
