@extends('layouts.userLayout')

@section('title', 'Seleziona Amici')

@section('content')
<br>
<br>
<p class="titolo">
    In questa pagina puoi selezionare gli amici che possono vedere questo blog<br>
</p>
<br>
@isset($amici)
@isset($blog)

<p class="sotto-titolo">
    Questa è la lista dei tuoi amici. Seleziona chi di loro può visionare questo blog
</p>
<br>
@foreach($amici as $amico)

<div class="contenitoreSelezioneAmici">
     <p>
        Name: {{$amico->name}} <br>
        Cognome: {{$amico->surname}}<br>
        Tema del blog: {{$blog->tema}}<br>
    </p>  

@can('autorizzato',[$amico->user_id,$blog->id])

<a href="{{ route('setAccesso',[$blog->id,$amico->user_id,0]) }}"><button class="bottone_elimina">Elimina Accesso</button></a>
@else
<a href="{{ route('setAccesso',[$blog->id,$amico->user_id,true]) }}"><button class="bottone_conferma">Concedi Accesso</button></a>
@endcan()
</div>
<br>
<br>
@endforeach
<br>

@isset($autorizzati)
<div>
    <p class="titolo">
        Gli utenti autorizzati ad accedere sono: <br>
    </p>
</div>

@if(count($autorizzati)===0)
<p class="sotto-titolo">
    Attualmente nessuno dei tuoi amici è autorizzato a vedere questo blog.
</p>

@else
@foreach($autorizzati as $autorizzato)

<div>
    <p class="sotto-titolo">
        {{$autorizzato->name}} {{$autorizzato->surname}}
    </p>
</div>


@endforeach
@endif

@endisset()
@endisset()
@endisset()

@endsection