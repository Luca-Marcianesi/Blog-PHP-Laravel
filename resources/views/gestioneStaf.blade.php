@extends('layouts.adminLayout')

@section('title', 'Gestione Staf')

@section('content')
<hr class="spaziaturahr">
<div  style="text-align: center; font-size: large">
    <div>
        <p class="titolo">In questa pagina potrai gestire il tuo staff!</p>
        <br>
        <br>
        <p class="sotto-titolo">
            Di seguito è riportato l'elenco degli utenti che fanno parte dello staff del sito
        </p>
        <br><br>
    </div> 

    @isset($staf)
    @if(count($staf)===0)
        <p class="sotto-titolo">Attualmente non sono presenti membri nello staff</p>
        @else
        @foreach($staf as $s)
            <div style="width: 400px; height: 220px; margin-left: 37%" class="contenitoreStaff">
                <p>Nome: {{$s->name}} <br> Cognome: {{$s->surname}}</p> <br>
                <a href="{{ route('modificaStaf',[$s->id]) }}"><button class="bottone_conferma">Modifica ►</button></a><br>
                <button title="Elimina questo blog" class='bottone_elimina' id='del_<?= $s->id ?>' data-id='<?= $s->id?>'>Elimina</button>
            </div>
            <br>
            <br>

        @include('pagination.paginator', ['paginator' => $staf])

        @endforeach
    @endif()
    @endisset()
    <hr class="spaziaturahr">
    <div>
        <p class="sotto-titolo">Se desideri aggiungere un nuovo membro allo staff puoi farlo qui:</p><br>
        <a href="{{ route('nuovoStaf') }}"><button class="bottone_conferma">Aggiungi ►</button></a>
    </div>
    
        
    
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
            var deleteid = $(this).data('id');

            // Confirm box
            bootbox.confirm("Sei sicuro di voler eliminare questo membro?", function (result) {

                if (result) {
                    // AJAX Request
                    $.ajax({
                        
                        url: "{{ route('eliminaStaf') }}",
                        type: 'POST',
                        data: {id: deleteid},
                        dataType: "json",
                        error: function (data) {

                                bootbox.alert("staf non eliminato"+data.status);  
                            
        
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