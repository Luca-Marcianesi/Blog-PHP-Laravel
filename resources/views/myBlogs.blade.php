@extends('layouts.userLayout')

@section('title', 'I Miei Blog')

@section('content')
<div style="text-align: center; font-size: large;">
    <div class="main_element">
        <p class="titolo">Questi sono i tuoi blogs!</p>

        <p class="sotto-titolo"> Ciao {{Auth::user()->name}} {{Auth::user()->surname}}!,<br>
       
        il tuo account è @if(Auth::user()->visibility())
                            pubblico
                        @else
                            privato 
                        @endif() <br>
                        Di seguito è riportata la lista di tutti i tuoi blog e il relativo tema!
                        Potrai inoltre modificare la visibilità di ognuno di loro.</p>
                        <hr class="spaziaturahr">
    </div>


    @if(count($blogs)===0)

        <br>
        <p class="titolo">Attualmente non hai postato nessun blog.</p>
        <br>
        <p class="sotto-titolo">Iniziane uno nella sezione NUOVO BLOG!</p>
    
    @else

        @isset($blogs)

            @foreach($blogs as $blog)
                <div class="contenitoreblog">
                    <p class="tema_blog">Tema: {{$blog->tema}}</p>
                    <br>
                    {{ Form::open(array('route' => ['modificaBlog',$blog->id], 'class' => '')) }}          
                    <div  class="wrap-input">
                        {{ Form::label('stato', 'Visibilità', ['class' => 'label-input']) }}
                        {{ Form::select('stato',['0' => 'Solo amici selezionati','1' => 'Tutti gli amici'], $blog->stato, ['class' => 'input','id' => 'stato']) }}
                        @if ($errors->first('stato'))
                        <ul class="errors">
                            @foreach ($errors->get('stato') as $message)
                            <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <br>
                    <div class="container-form-btn">                
                        {{ Form::submit('Modifica ►', ['class' => 'bottone_conferma']) }}
                    </div>
                    {{ Form::close() }}
                    <div style="text-align: center; font-size: large">
                        <a href="{{ route('blog',$blog->id) }}"><button class="bottone_conferma">Visualizza Blog ►</button></a>
                        <button class='bottone_elimina' id='del_<?= $blog->id ?>' data-id='<?= $blog->id?>' >Elimina</button>
                    </div>
                
                    @if(!$blog->stato)
                        <div class="container-form-btn">            
                            <a href="{{ route('selezionaAmici',$blog->id) }}"><button class="bottone_conferma">Seleziona Amici ►</button></a>
                        </div>
                    @endif()
                </div>
                <hr class="spaziaturahr">
            @endforeach
        @endisset()
    @endif()
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
            bootbox.confirm("Sei sicuro di voler eliminare il blog?", function (result) {

                if (result) {
                    // AJAX Request
                    $.ajax({
                        
                        url: "{{ route('eliminaBlog') }}",
                        type: 'POST',
                        data: {id: deleteid},
                        dataType: "json",
                        error: function (data) {
                            
                                bootbox.alert("blog non eliminato");  
                            
        
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