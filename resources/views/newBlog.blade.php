@extends('layouts.userLayout')

@section('title', 'Nuovo Blog')

@section('content')
<hr class="spaziaturahr">
<div>
    <div style="text-align: center">
            {{ Form::open(array('route' => 'newBlog', 'class' => 'form')) }}
            <h1>Inizia subito un nuovo blog!<h1>
            <hr class="spaziaturahr">
             <div class="wrap-input">
                {{ Form::label('tema', 'Inserisci il tema del blog', ['class' => 'label-form']) }}
                <p class="subtitleform">Di cosa parlerà?</p>
                <br>
                <br>
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
            <div  class="wrap-element-form">
                {{ Form::label('messaggio', 'Primo messaggio', ['class' => 'label-form']) }}
                <p class="subtitleform">Qual'è la tua opinione?</p>
                {{ Form::textarea('messaggio', '', ['class' => 'input-form','id' => 'messaggio', 'placeholder'=> 'La mia opinone è ...']) }}
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
    </div>    
</div>

@endsection
