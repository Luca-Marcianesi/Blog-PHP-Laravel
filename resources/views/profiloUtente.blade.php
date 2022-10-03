@extends('layouts.userLayout')

@section('title', 'Profilo')

@section('content')
<div>
   

    @isset($utente)
    


  
    <div class="main_element" style="text-align: center; font-size: large">
        <h1>Dati anagrafici</h1>
        <hr class="spaziaturahr">
        <div >Nome: {{$utente->name}}</div><br>
        <div>Cognome: {{$utente->surname}}</div><br>
        <div>E-mail: {{$utente->email}}</div><br>
        <div>Data di Nascita: {{$utente->data_nascita}}</div><br>
        <div>Biografia: {{$utente->descrizione}}</div>
    </div>

    <hr class="spaziaturahr">
    @can('isFriend',$utente->id)
        <div style="text-align: center; font-size: large">Attualmente siete amici</div>
        <hr class="spaziaturahr">
        @isset($blogs)
        @if(@count($blogs)===0)
            Non ci sono blog pubblicati
        
        @endif()  
         
        
        @foreach($blogs as $blog)
        
        <div style="text-align: center; font-size: large">
            <a href="{{ route('blog',$blog->id) }}" class="highlight" >Tema: {{$blog->tema}}</a> 
        </div>
        <br>
        @endforeach
        @endisset()
    @endcan

        
    @can('isRifiutata',$utente->id)
        <div style="text-align: center; font-size: large"> 
            Amicizia rifiutata <br>
            <a href="{{ route('sedRequest',$utente->id) }}" title="richiesta">Invia di nuovo</a>
        </div>
    @endcan

    @can('isSospesa',$utente->id)
        <div style="text-align: center; font-size: large">Amicizia in attesa di risposta</div>
    @endcan

    @can('richiedereAmicizia',$utente->id)
        <div style="text-align: center; width: auto; height: auto">
            <div>Devi far parte del gruppo di amici per visualizzare i blog </div>
            <a href="{{ route('sedRequest',$utente->id) }}" title="richiesta">Invia richiesta</a>
        </div>
    @endcan
    @endisset()
    
    
</div>
@endsection