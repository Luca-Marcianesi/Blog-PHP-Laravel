@extends('layouts.userLayout')

@section('title', 'Home User')

@section('content')
<div>
    <h3>Cerca i tuoi amici<h3>
    <div class="wrap-contact1">
            {{ Form::open(array('route' => 'searchFriends', 'class' => 'contact-form')) }}
            
      
             <div  class="wrap-input">
                {{ Form::label('name', 'Nome', ['class' => '']) }}
                {{ Form::text('name', '', ['class' => '','id' => 'name']) }}
                @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                {{ Form::label('surname', 'Cognome', ['class' => '']) }}
                {{ Form::text('surname', '', ['class' => '','id' => 'surname']) }}
                @if ($errors->first('surname'))
                <ul class="errors">
                    @foreach ($errors->get('surname') as $message)
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
