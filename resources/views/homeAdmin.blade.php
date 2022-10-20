@extends('layouts.adminLayout')

@section('title', 'Home Admin')

@section('content')
<br>
<br>
<div>
    <p class="titolo"> Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname }}</p><br>
    <br>
    <br>
    <p class="sotto-titolo">
        Questa è la home page riservata a te, admin del sito. <br>
        Nella barra in alto troverai tutte le funzionalità dedicate a te! <br>
    </p>
</div>
<br>
<br>

<div style="margin-left: 36.5%">
    <img style="width: 350px; height: 300px" alt="Amministratore del sito" src="/images/products/amministratore.png"></img>
</div>


@endsection