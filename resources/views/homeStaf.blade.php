@extends('layouts.stafLayout')

@section('title', 'Home Staf')
@section('content')

<div style="text-align: center">
    <p class="titolo"> Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname }}!</p>
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
</div>

<div style="position: relative; text-align: center; ">
    <img alt="Badge dello staff" src="/images/products/staffBadge.png">
    <div style="position: absolute; top: 56.7%; left: 55%; transform: translate(-50%, -50%); font-size: 19px"> 
    {{ Auth::user()->name }} 
    </div>
    <div style="position: absolute; top: 64.4%; left: 55%; transform: translate(-50%, -50%); font-size: 19px"> 
    {{ Auth::user()->surname }} 
    </div>
    <div style="position: absolute; top: 72%; left: 55%; transform: translate(-50%, -50%); font-size: 19px"> 
    {{ Auth::user()->data_nascita }} 
    </div>
    <div style="position: absolute; top: 79.5%; left: 55%; transform: translate(-50%, -50%); font-size: 19px"> 
    {{ Auth::user()->username }} 
    </div>
</div>



@endsection
