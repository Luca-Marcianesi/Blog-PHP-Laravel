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
        <p class="sotto-titolo">Di cosa parlerà?</p>
        {{ Form::text('tema', '', ['id' => 'tema', 'placeholder'=> 'Tema del blog', 'size' => '105', 'maxlength' => '80']) }}
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
        {{ Form::textarea('messaggio', '', ['class' => 'input-form-nuovoBlog','id' => 'messaggio', 'placeholder'=> 'La mia opinone è ...', 'maxlength' => '255']) }}
        @if ($errors->first('messaggio'))
        <ul class="errors">
            @foreach ($errors->get('messaggio') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <hr class="spaziaturahr">
    <div class="container-form-button">                
        {{ Form::submit('Crea', ['class' => 'bottone_conferma'])}}
    </div>
    {{ Form::close() }}
</div>    

@endsection
