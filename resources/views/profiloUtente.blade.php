@extends('layouts.userLayout')

@section('title', 'Profilo')

@section('content')
<div>
   

    @isset($utente)
    @isset($amicizia)
    @isset($blogs)


  
    <div class="main_element">
        <h1>Dati anagrafici</h1>
        <div >Nome: {{$utente->name}}</div>
        <div>Cognome:{{$utente->surname}}</div>
        <div>E-mail:{{$utente->email}}</div>
        <div>Data di Nascita:{{$utente->data_nascita}}</div>
        <div>Bio:{{$utente->descrizione}}</div>
        

    </div>
    @if(@empty($amicizia))
        <a href="{{ route('sedRequest',$utente->id) }}" class="highlight" title="richiesta">Invia richiesta</a>
    @endif() 
    
    
    

    @if($utente->visibilita or $amicizia->stato)

        @if(@empty($blogs))
            non ci sono blog pubblicati
        
        @endif()
            
         
         
        @foreach($blogs as $blog)
            <a href="{{ route('blog',$blog->id) }}" class="highlight" >Tema : {{$blog->tema}}</a>
        
        @endforeach

    @else
        Devi far parte del gruppo di amici per visualizzare i blog 
    
    @endif() 
        

    @endisset()
    @endisset()
    @endisset()
    
    
</div>
@endsection