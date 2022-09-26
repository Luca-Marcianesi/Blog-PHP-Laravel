


@extends('layouts.stafLayout')

@section('title', 'Home Staf')
@section('content')

<div style="text-align: center; font-size: large">
    <hr class="spaziaturahr">
    <hr class="spaziaturahr">
    <h1> Benvenuto <br> {{ Auth::user()->name }} {{ Auth::user()->surname }}!</h1>
    <hr class="spaziaturahr">
    <div style="font-size: large">
        Questa è la tua area profilo!<br>
        Nella sezione in alto troverai tutte le funzionalità dedicate a te!
    </div>



    {{ Form::open(array('route' => ['attivitaUtente'], 'class' => '')) }}

    <div  class="wrap-input">
        {{ Form::label('id', 'Id utente', ['class' => 'label-input']) }}
        {{ Form::number('id','', ['class' => 'input','id' => 'id']) }}
        @if ($errors->first('id'))
        <ul class="errors">
            @foreach ($errors->get('id') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="container-form-btn">                
        {{ Form::submit('Cerca utente', ['class' => 'button']) }}
    </div>
    
    {{ Form::close() }}


    {{ Form::open(array('route' => ['cercaBlog'], 'class' => '')) }}

    <div  class="wrap-input">
        {{ Form::label('id', 'Id blog', ['class' => 'label-input']) }}
        {{ Form::number('id','', ['class' => 'input','id' => 'id']) }}
        @if ($errors->first('id'))
        <ul class="errors">
            @foreach ($errors->get('id') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="container-form-btn">                
        {{ Form::submit('Cerca Blog', ['class' => 'button']) }}
    </div>
    
    {{ Form::close() }}
</div>

@endsection
