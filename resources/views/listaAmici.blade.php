@extends('layouts.userLayout')

@section('title', 'I Miei Amici')

@section('content')
<div>
   

    @isset($amici)

    @foreach($amici as $amico)
    <div class="main_element">
        <div class="tema_blog">Nome: {{$amico->name}}</div>
        <div class="stato_blog">Cognome: {{$amico->surname}}</div>
        
        
    </div>
            

          
    @endforeach

    @endisset()
    
    
</div>
@endsection