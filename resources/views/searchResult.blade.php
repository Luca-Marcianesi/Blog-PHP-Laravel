@extends('layouts.userLayout')

@section('title', 'Risultati')

@section('content')
<div>
   

    @isset($users)

    @foreach($users as $user)
    <div class="main_element">
        <div class="tema_blog">Nome: {{$user->name}}</div>
        <div class="stato_blog">Cognome:{{$user->surname}}</div>
        <a href="{{ route('sedRequest', [$user->id])}}">Invia richiesta</a>
        

        
    </div>         
    @endforeach

    @endisset()
    
    
</div>
@endsection