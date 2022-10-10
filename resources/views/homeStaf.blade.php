@extends('layouts.stafLayout')

@section('title', 'Home Staf')
@section('content')

<div style="text-align: center; font-size: large">
    <h1> Benvenuto <br> {{ Auth::user()->name }} {{ Auth::user()->surname }}!</h1>
    <hr class="spaziaturahr">
    <div style="font-size: large">
        Questa è la pagina home riservata allo staff del sito!<br>
        Nella sezione in alto troverai tutte le funzionalità dedicate a te!
    </div>
</div>
@endsection
