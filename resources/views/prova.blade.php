@extends('layouts.userLayout')

@section('title', 'Profilo')

@section('content')
<br>
<br>
<p class="titolo">Dati anagrafici</p>
<br>
<div style="text-align: center; font-size: 18px">
   

    @isset($utente)
        {{$utente}}
    @endisset()


@endsection