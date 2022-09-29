@extends('layouts.userLayout')

@section('title', 'Risultati')

@section('content')
<div>
   

    @isset($users)

    @foreach($users as $user)
    <div class="main_element" style="text-align: center; font-size: large">
        <div class="tema_blog">Nome: {{$user->name}}</div><br>
        <div class="stato_blog">Cognome: {{$user->surname}}</div><br>
        <a href="{{ route('visualizzaProfilo', [$user->id])}}">Visualizza profilo</a>  
    </div>         
    @endforeach

    @endisset()
    
    
</div>
@endsection