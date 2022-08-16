@extends('layouts.userLayout')

@section('title', 'Nuovo Blog')

@section('content')
<div>
    
    <div class="wrap-form-main-space">
            {{ Form::open(array('route' => 'newBlog', 'class' => 'form')) }}
            <h1>Inizia subito un nuovo blog<h1>
      
             <div  class="wrap-element-form">
                {{ Form::label('tema', 'Inserisci il tema del vlog', ['class' => 'label-form']) }}
                <p class="subtitleform">Di cosa parlerà il tuo blog?</p>
                {{ Form::text('tema', '', ['class' => 'input-form','id' => 'tema', 'placeholder'=> 'Tema del blog']) }}
                @if ($errors->first('tema'))
                <ul class="errors">
                    @foreach ($errors->get('tema') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>


            <div  class="wrap-element-form">
                {{ Form::label('messaggio', 'Primo messaggio', ['class' => 'label-form']) }}
                <p class="subtitleform">Qual'è la tua opinione?</p>
                {{ Form::text('messaggio', '', ['class' => 'input-form','id' => 'messaggio', 'placeholder'=> 'La mia opinone è ...']) }}
                @if ($errors->first('messaggio'))
                <ul class="errors">
                    @foreach ($errors->get('messaggio') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div class="container-form-button">                
                {{ Form::submit('Crea', ['class' => 'form-button']) }}
            </div>
            
            {{ Form::close() }}
        </div>
</div>
@endsection
