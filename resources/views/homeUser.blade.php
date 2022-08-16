@extends('layouts.userLayout')

@section('title', 'Home User')

@section('content')
<div>
    <h3>Cerca i tuoi amici<h3>
    <div class="wrap-contact1">
            {{ Form::open(array('route' => 'home', 'class' => 'contact-form')) }}
            
      
             <div  class="wrap-input">
                {{ Form::label('richiesta', 'Cerca Amici', ['class' => '']) }}
                {{ Form::text('richiesta', '', ['class' => '','id' => 'richiesta']) }}
                @if ($errors->first('richiesta'))
                <ul class="errors">
                    @foreach ($errors->get('richiesta') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Cerca', ['class' => 'button']) }}
            </div>
            
            {{ Form::close() }}
        </div>
    <p>Benvenuto {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
    <p>Seleziona la funzione da attivare</p>
</div>
@endsection
