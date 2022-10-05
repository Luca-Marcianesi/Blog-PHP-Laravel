@extends('layouts.userLayout')

@section('title', 'Seleziona Amici')

@section('content')
<hr class="spaziaturahr">
@isset($amici)
@isset($blog)

<p>Tema del blog: {{$blog->tema}}</p>


@foreach($amici as $amico)

<p>I tuoi Amici</p>

<div> <p>{{$amico->name}} {{$amico->surname}}</p> </div> 

@can('autorizzato',[$amico->user_id,$blog->id])

<a href="{{ route('setAccesso',[$blog->id,$amico->user_id,false]) }}" class="highlight" >Elimina Accesso </a>
@else
<a href="{{ route('setAccesso',[$blog->id,$amico->user_id,true]) }}" class="highlight" >Concedi Accesso</a>
@endcan()

@endforeach

@isset($autorizzati)
<div><p>Gli utenti autorizzati ad accesere sono</p></div>  

@foreach($autorizzati as $autorizzato)

<div><p>{{$autorizzato->username}}</p></div>


@endforeach

@endisset()
@endisset()
@endisset()

    
        
    
@endsection