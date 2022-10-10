@extends('layouts.gestoreLayout')

@section('title', 'Ricerca')
@section('content')
<hr class="spaziaturahr">
    In questa pagina, hai la possibilità di cercare le attività degli utenti <br>
    registrati oppure i blog che sono stati creati!
    <hr class="spaziaturahr">

    @if ($errors->first('idUtente'))
        <ul class="errors">
            @foreach ($errors->get('idUtente') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif

    @if ($errors->first('idBlog'))
        <ul class="errors">
            @foreach ($errors->get('idBlog') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif

    {{ Form::open(array('route' => ['attivitaUtente'], 'class' => '')) }}

    <div  class="wrap-input">
        {{ Form::label('idUtente', 'Id utente', ['class' => 'label-input']) }}
        <br>
        {{ Form::number('idUtente','', ['class' => 'input','id' => 'idUtente']) }}
       
    </div>
    <br>
    <div class="container-form-btn">                
        {{ Form::submit('Cerca Utente', ['class' => 'bottone_conferma']) }}
    </div>
    
    {{ Form::close() }}
    <hr class="spaziaturahr">

    {{ Form::open(array('route' => ['cercaBlog'], 'class' => '')) }}

    <div  class="wrap-input">
        {{ Form::label('idBlog', 'Id blog', ['class' => 'label-input']) }}
        <br>
        {{ Form::number('idBlog','', ['class' => 'input','id' => 'idBlog']) }}
    </div>
    <br>
    <div class="container-form-btn">                
        {{ Form::submit('Cerca Blog', ['class' => 'bottone_conferma']) }}
    </div>
    
    {{ Form::close() }}
</div>
@endsection