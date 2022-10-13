@extends('layouts.stafLayout')


@section('title', 'Blog')

@section('content')
@isset($blog)
@isset($proprietario)

<div style="text-align: center;">
    <p class="titolo">Informazioni generali</p>
    <hr class="spaziaturahr">
    <p>Proprietario del blog: {{$proprietario->name}} {{$proprietario->surname}}</p>
    <a href=""><button class="bottone_conferma">Visualizza profilo (non collegato)</button></a>
    <p>Tema:{{$blog->tema}}</p>
</div>

<div>
{{ Form::open(array('route' => ['eliminaBlogGestore',$blog->id], 'id'=>'eliminablog','class' => '')) }}          
    <div  class="wrap-input">
        {{ Form::label('motivo', 'Visibilità', ['class' => 'label-input']) }}
        {{ Form::text('motivo', '', ['id' => 'motivo', 'placeholder'=> 'Motivazione', 'size' => '105', 'maxlength' => '80']) }}
        @if ($errors->first('motivo'))
        <ul class="errors">
            @foreach ($errors->get('motivo') as $message)
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
</div>



<hr class="spaziaturahr">

<p class="titolo">Posts</p>

<div style="text-align: center;">
    @isset($posts)
        @foreach($posts as $post)
            post
            <div class="contenitorepost">
                <p class="sotto-titolo">Autore: {{$post->name}} {{$post->surname}} </p>
                <p class="sotto-titolo">Data:{{$post->data}}</p>
                <p class="sotto-titolo">Contenuto:{{$post->testo}}</p>
            </div>
            <hr class="spaziaturahr">
        @endforeach
        @if(count($posts)== 0)
            <p>
                Non sono stati pubblicati ancora post
            </p>
        @endif()

    @endisset()
</div>
</div>

@endisset() 
@endisset()

@isset($blognt)
<div>
    <p class="titolo">Il blog con ID = {{$blognt}} non esiste</p>
    <p class="sotto-titolo"><a  href="{{ route('ricerca') }}">Torna alla pagina di ricerca</a></p>
</div>
@endisset


<script>
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

    $(document).ready(function () {

        

        var form = new FormData(document.getElementById('eliminablog'));

        // Delete 
        $('.bottone_elimina').click(function () {

            var form = new FormData(document.getElementById(formId));
            

            // Confirm box
            bootbox.confirm("Sei sicuro di voler eliminare il blog?", function (result) {

                if (result) {
                    // AJAX Request
                    $.ajax({
                        
                        url: "{{ route('eliminaBlog') }}",
                        type: 'GET',
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
