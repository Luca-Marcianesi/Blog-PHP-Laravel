@extends('layouts.userLayout')

@section('title', 'Notifiche')

@section('content')
@isset($notifiche)
    @foreach($notifiche as $notifica)
    <div class="main_element">
        Data: {{$notifica->data}}
        Testo: {{$notifica->messaggio}}
        <div ><a href="" class="highlight" >Elimina</a></div>
        
    </div>     
    @endforeach
    @endisset() 

@endsection
