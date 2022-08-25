@extends('layouts.userLayout')

@section('title', 'Profilo')

@section('content')
<div>
   

    @isset($utente)
    @isset($amicizia)


  
    <div class="main_element">
        <div class="tema_blog">Nome: {{$utente->name}}</div>
        <div class="stato_blog">Cognome:{{$utente->surname}}</div>
        

    </div>         

    @if($utente->visibilita)
        <div class="tema_blog">account publico  </div> 
        @empty($amicizia){
            <a href="{{ route('sedRequest',$utente->id) }}" class="highlight" title="richiesta">Invia richiesta</a>
        }
        @endempty
            {{$amicizia}}
       
        
    @else
        
        
        
    @endif()

   


    
    

    @endisset()
    @endisset()
    
    
</div>
@endsection