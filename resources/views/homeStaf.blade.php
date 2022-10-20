@extends('layouts.stafLayout')

@section('title', 'Home Staf')
@section('content')

<div style="text-align: center">
    <p class="titolo"> Benvenuto <br> {{ Auth::user()->name }} {{ Auth::user()->surname }}!</p>
    <br>
    <br>
    <div>
        <p class="sotto-titolo">
        Questa è la pagina home riservata allo staff del sito!<br>
        Nella sezione in alto troverai tutte le funzionalità dedicate a te!
        </p>
    </div>

    <br>
    <br>

    <div class="staff-Organization">
        <p style="padding-top: 40%; padding-left: 3%; font-size: 19px">
        {{ Auth::user()->name }} {{ Auth::user()->surname }}
        </p>
    </div>



</div>
@endsection
