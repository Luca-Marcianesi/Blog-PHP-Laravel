@extends('layouts.userLayout')

@section('title', 'Risultati')

@section('content')
<div>
   

    @isset($users)

    @foreach($users as $user)
    <div class="main_element">
        <div class="tema_blog">Nome: {{$user->name}}</div>
        <div class="stato_blog">Cognome:{{$user->surname}}</div>
        <a href="{{ route('visualizzaProfilo', [$user->id])}}">Visualizza profilo</a>
        

        
    </div>         
    @endforeach

    @endisset()
    
    
</div>
@endsection