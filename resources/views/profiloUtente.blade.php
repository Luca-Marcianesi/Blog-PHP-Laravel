@extends('layouts.userLayout')

@section('title', 'Profilo')

@section('content')
<div>
   

    @isset($utente)
        <div class="main_element" style="text-align: center; font-size: large">
            
            <p class="titolo">Dati anagrafici</p>
            
            <div >Nome: {{$utente->name}}</div><br>
            <div>Cognome: {{$utente->surname}}</div><br>
            <div>E-mail: {{$utente->email}}</div><br>
            <div>Data di Nascita: {{$utente->data_nascita}}</div><br>
            <div>Biografia: {{$utente->descrizione}}</div>
        </div>

        <hr class="spaziaturahr">

        <div style="text-align: center; font-size: large">
            @can('isFriend',$utente->id)

                <p class="sotto-titolo">Attualmente siete amici</p>
            
                <hr class="spaziaturahr">
                
                @isset($blogs)

                    @if(@count($blogs)===0)
                        <p>Attualmente non ci sono blog pubblicati</p> 
                    @endif()  
                    
                    
                    @foreach($blogs as $blog)
                        <div class="blog-link">
                            <a href="{{ route('blog',$blog->id) }}" >Tema: {{$blog->tema}}</a> 
                        </div>
                        <hr class="spaziaturahr">
                        
                    @endforeach
                @endisset()
            @endcan

            
            @can('isRifiutata',$utente->id)
                <p>Amicizia rifiutata <br>
                <a href="{{ route('inviaAmicizia',$utente->id) }}" title="richiesta">Invia di nuovo</a></p>
            @endcan

            @can('isSospesa',$utente->id)
                <p>Amicizia in attesa di risposta</p>
            @endcan

            @can('richiedereAmicizia',$utente->id)
                <p>Devi far parte del gruppo di amici per visualizzare i blog 
                <a href="{{ route('inviaAmicizia',$utente->id) }}" title="richiesta">Invia richiesta</a>
                </p>
            @endcan
        </div>
    @endisset()
    
</div>
@endsection