@extends('layouts.userLayout')

@section('title', 'Risultati')

@section('content')
<div>
   

    @isset($friends)

    @foreach($friends as $friend)
    <div class="main_element">
        <div class="tema_blog">Nome: {{$friend->name}}</div>
        <div class="stato_blog">Cognome:{{$friend->surname}}</div>
        
    </div>         
    @endforeach

    @endisset()
    
    
</div>
@endsection