@extends('layouts.adminLayout')

@section('title', 'Home Admin')

@section('content')
<hr class="spaziaturahr">
<div style="text-align: center; font-size: large">
    <h1> Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname }}<br>
    <hr class="spaziaturahr">
    <h3> Questa è la home page riservata a te, admin del sito. <br>
    <br>
    <h4> Nella barra in alto troverai tutte le funzionalità dedicate a te! <br>
</div>
@endsection