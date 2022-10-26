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

        @isset($indietro)
        <a href="{{$indietro}}"><button class='bottone_conferma'>◄ Indietro</button></a>
        @endisset()
  
        <br>
        <div class="info-biografia">
            <p>
                Biografia: {{$utente->descrizione}}
            </p>
        </div>
        <br>
        <hr style="width: 100%; background-color: black; height: 2px; border: none">

        <div style="text-align: center; font-size: large">
            @can('isFriend',$utente->id)
                
                <p class="sotto-titolo">Attualmente siete amici</p>
                @isset($amicizia)
                <button class="bottone_elimina" id='del_<?= $utente->id?>' data-user='<?= $utente->id?>' data-amicizia='<?= $amicizia?>'>Elimina amico</button>
                <br>
                @endisset()
                <hr style="width: 100%; background-color: black; height: 2px; border: none">
                @isset($blogs)

                    @if(@count($blogs)===0)
                        <p class="sotto-titolo">Attualmente non ci sono blog pubblicati</p> 
                    @endif()
                    <br>
                    <br>
                    
                    
                    <a href="{{ route('amici') }}"><button class='bottone_conferma'>◄ Indietro</button></a>
                    
                    
                    @foreach($blogs as $blog)
                        <div class="blog-link">
                            <a href="{{ route('getBlog', [$blog->id]) }}" ><button class="bottone_conferma"> Tema: {{$blog->tema}} ►</button</a> 
                        </div>
                        <hr class="spaziaturahr">
                        
                    @endforeach
                @endisset()
            @endcan

            
            @can('isRifiutata',$utente->id)
                <p>Amicizia rifiutata <br>
                <a href="{{ route('inviaAmicizia',$utente->id) }}" title="Invia nuovamente la richiesta di amicizia"><button class="bottone_conferma">Invia di nuovo ►</button></a></p>
            @endcan

            @can('isSospesa',$utente->id)
                <p>Amicizia in attesa di risposta</p>
            @endcan

            @can('richiedereAmicizia',$utente->id)
                <p>Devi far parte del gruppo di amici per visualizzare i blog 
                <a href="{{ route('inviaAmicizia',$utente->id) }}" title="richiesta"><button class="bottone_conferma">Invia richiesta ►</button></a>
                </p>
            @endcan
        </div>
    @endisset()
</div>

<script>
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $(document).ready(function () {

        // Delete 
        $('.bottone_elimina').click(function () {
            var el = this;

            // Delete id
            var amiciziaid = $(this).data('amicizia');
            var userid = $(this).data('user');

            // Confirm box
            bootbox.confirm("Sei sicuro di voler eliminare l'amico?", function (result) {

                if (result) {
                    // AJAX Request
                    $.ajax({
                        
                        url: "{{ route('eliminaAmico') }}",
                        type: 'POST',
                        data: {id_amicizia: amiciziaid ,id_user : userid},
                        dataType: "json",
                        error: function (data) {

                                bootbox.alert("amico non eliminato"+data.status);  
                            
        
                        },
                        success: function (response) {
                            window.location.replace(response.redirect);

                        }
                        
                    });
                }

            });

        });
    });
</script>
 
@endsection