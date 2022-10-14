@extends('layouts.stafLayout')


@section('title', 'Blog')

@section('content')
@isset($blog)
@isset($proprietario)

<p class="titolo">Informazioni generali</p>
<hr class="spaziaturahr">

<div style="width: 400px; height: 200px; margin-left: 37%; padding-top: 1%" class="contenitoreGestioneBlog">    
    <p>Proprietario del blog:<br> {{$proprietario->name}} {{$proprietario->surname}}</p><br>
    <p>Tema:{{$blog->tema}}</p><br>
    <a href=""><button class="bottone_conferma">Visualizza profilo (non collegato)</button></a>    
</div>
<hr class="spaziaturahr">

<div style="text-align: center">
{{ Form::open(array('route' => ['eliminaBlogGestore',$blog->id], 'id'=>'eliminablog','class' => '')) }}          
    <div>
        {{ Form::label('motivo', 'Visibilità', ['class' => 'label-form']) }}<br><br>
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
    <div>                
        {{ Form::submit('Modifica ►', ['class' => 'bottone_conferma']) }}
    </div>
    {{ Form::close() }}
</div>



<hr class="spaziaturahr">

<p class="titolo">Posts</p>
<br>
<br>
<div style="text-align: center;">
    @isset($posts)
        @foreach($posts as $post)
            <div style="width: 300px; height: 150px; margin-left: 40%; padding-top: 1%" class="contenitoreGestioneBlog">
                <p>
                    Autore: {{$post->name}} {{$post->surname}}
                    <br>
                    Data:{{$post->data}}
                    <br>
                    Contenuto:<br>{{$post->testo}}
                </p>
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
<div style="text-align: center">
    <p class="titolo">Il blog con Id = {{$blognt}} non esiste </p> <br> <br>
    <a href="{{ route('ricerca') }}"><button class="bottone_conferma">Torna alla pagina di ricerca</button></a>
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
