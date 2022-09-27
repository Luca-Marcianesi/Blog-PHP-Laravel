


@extends('layouts.stafLayout')

@section('title', 'Home Staf')
@section('content')

<div style="text-align: center; font-size: large">
    <h1> Benvenuto <br> {{ Auth::user()->name }} {{ Auth::user()->surname }}!</h1>
    <hr class="spaziaturahr">
    <div style="font-size: large">
        Questa è la pagina home riservata allo staff del sito!<br>
        Nella sezione in alto troverai tutte le funzionalità dedicate a te!
    </div>
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
<<<<<<< HEAD
        {{ Form::number('id','', ['class' => 'input', 'id' => 'id']) }}
=======
        {{ Form::number('idUtente','', ['class' => 'input','id' => 'idUtente']) }}
>>>>>>> 2549029fff2647ec46b3d737bed74d622c172778
       
    </div>
    <br>
    <div class="container-form-btn">                
        {{ Form::submit('Cerca utente', ['class' => 'button']) }}
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
        {{ Form::submit('Cerca Blog', ['class' => 'button']) }}
    </div>
    
    {{ Form::close() }}
</div>

@endsection
