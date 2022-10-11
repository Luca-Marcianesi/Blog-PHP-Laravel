@extends('layouts.userLayout')

@section('title', 'Profilo')

@section('content')
<br>
<br>
<p class="titolo">Dati anagrafici</p>
<br>
<div style="text-align: center; font-size: 18px">
   

    @isset($utente)
        
        <div class="contenitore_anagrafica">
            <p class="info-anagrafica">Nome: {{$utente->name}}</p>
            <p class="info-anagrafica">Cognome: {{$utente->surname}}</p>
            <p class="info-anagrafica">E-mail: {{$utente->email}}</p>
            <p class="info-anagrafica">Data di Nascita: {{$utente->data_nascita}}</p>
            <br>
        </div>
  
        <br>
        <div style="margin-left: 38%" class="info-biografia">
            <p style="color: white">
                Biografia: <br>
            </p>
            <p style="color: white">
                {{$utente->descrizione}}
            </p>
        </div>

        <hr class="spaziaturahr">
        <hr style="width: 100%; background-color: black; height: 2px; border: none">

        <div style="text-align: center; font-size: large">
            @can('isFriend',$utente->id)
                <hr class="spaziaturahr">

                <p class="sotto-titolo">Attualmente siete amici</p>
            
                <hr class="spaziaturahr">
                
                @isset($blogs)

                    @if(@count($blogs)===0)
                        <p>Attualmente non ci sono blog pubblicati</p> 
                    @endif()  
                    
                    
                    @foreach($blogs as $blog)
                        <div class="blog-link">
                            <a href="{{ route('blog',$blog->id) }}" ><button class="bottone_conferma"> Tema: {{$blog->tema}} ►</button</a> 
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