@extends('layouts.userLayout')

@section('title', 'Nuovo Blog')

@section('content')
<hr class="spaziaturahr">
<div style="text-align: center">

    <p class="titolo">Inizia subito un nuovo blog!</p>
    <hr class="spaziaturahr">

    {{ Form::open(array('route' => 'newBlog', 'class' => 'form')) }}
    
    <div>
        

        {{ Form::label('tema', 'Inserisci il tema del blog', ['class' => 'label-form']) }}
        <p class="sotto-titolo">Di cosa parlerà?</p><br>
        {{ Form::text('tema', '', ['id' => 'tema', 'placeholder'=> 'Tema del blog', 'size' => '105', 'maxlength' => '50']) }}
        @if ($errors->first('tema'))
        <ul class="errors">
            @foreach ($errors->get('tema') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <hr class="spaziaturahr">
    <div class="wrap-element-form">
        {{ Form::label('messaggio', 'Primo messaggio', ['class' => 'label-form']) }}
        <p class="sotto-titolo">Qual'è la tua opinione?</p>
        {{ Form::textarea('messaggio', '', ['class' => 'input-form-nuovoBlog','id' => 'messaggio', 'placeholder'=> 'La mia opinone è ...', 'maxlength' => '300']) }}
        @if ($errors->first('messaggio'))
        <ul class="errors">
            @foreach ($errors->get('messaggio') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <br>
    <br>
    <div style="font-size: 18px">
        {{ Form::label('stato', 'Visibilità') }}
        {{ Form::select('stato',['0' => 'Solo amici selezionati','1' => 'Tutti gli amici'], 1 , ['class' => 'input','id' => 'stato', 'title' => 'Imposta chi può vedere questo blog']) }}
        @if ($errors->first('stato'))
        <ul class="errors">
            @foreach ($errors->get('stato') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <br>
    <br>
    <div class="container-form-button">                
        {{ Form::submit('Crea ►', ['class' => 'bottone_conferma', 'title' => 'Conferma la creazione di questo blog'])}}
    </div>
    {{ Form::close() }}
</div>    

@endsection
